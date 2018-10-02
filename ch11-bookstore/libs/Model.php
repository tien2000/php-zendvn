<?php 
    /*
     * mysqli_insert_id($this->_connect): Trả vể id vừa mới insert
     */
?>

<?php 
    class Model{
        protected $_connect;
        protected $_db;
        protected $_table;
        protected $_resultQuery;

        // CONNECT DATABASE
        public function __construct($params = null) {
            if ($params == null) {
                $params['server']   = DB_HOST;
                $params['username'] = DB_USER;
                $params['password'] = DB_PASS;
                $params['database'] = DB_NAME;
                $params['table']    = DB_TABLE;
            }
            
            $link = mysqli_connect($params['server'], $params['username'], $params['password'])
                                    or die('Cannot connect to Database: ' . mysqli_error($link));
            $this->_connect  = $link;
            $this->_db       = $params['database'];
            $this->_table    = $params['table'];
            $this->query("SET NAMES 'utf8'");
            $this->query("SET CHARATER SET 'utf8'");
            $this->setDB();
        }

        // SET CONNECT
        public function setConnect($_connect){
            $this->_connect = $_connect;
        }

        // SET DATABASE
        public function setDB($_db = null){
            if ($_db != null) {
                $this->_db = $_db;
            }
            mysqli_select_db($this->_connect, $this->_db);
        }

        // SET TABLE
        public function setTable($_table){
            $this->_table = $_table;
        }

        // DISCONNECT DATABASE
        public function destruct($_connect){
            mysqli_close($this->_connect);
        }

        // INSERT
        public function insert($data, $type = 'single'){
            if ($type == 'single') {
                $newQuery = $this->createInsertSQL($data);
                $sql      = "INSERT INTO `$this->_table`(". $newQuery['cols'] .") VALUES (". $newQuery['vals'] .")";                    
                $this->query($sql);
            } else {
                foreach ($data as $value) {
                    $newQuery = $this->createInsertSQL($value);
                    $sql = "INSERT INTO `$this->_table`(". $newQuery['cols'] .") VALUES (". $newQuery['vals'] .")";    
                    $this->query($sql);
                }
            }

            return $this->lastID();
        }

        // UPDATE
        public function update($data, $where){
            $newSet   = $this->createUpdateSQL($data);
            $newWhere = $this->createWhereUpdateSQL($where);
            $sql = "UPDATE `$this->_table` SET $newSet WHERE $newWhere";
            $this->query($sql);
            return $this->affectedRow();
        }

        public function delete($where){
            $newWhere = $this->createWhereDeleteSQL($where);

            $sql = "DELETE FROM `$this->_table` WHERE `id` IN ($newWhere)";
            
            $this->query($sql);
            return $this->affectedRow();
        }

        // CREATE INSERT SQL
        public function createInsertSQL($data){
            $newQuery = array();
            $cols = '';
            $vals = '';
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $cols .= ", `$key`";
                    $vals .= ", '$value'";
                }
            }
    
            $newQuery['cols'] = substr($cols, 2);
            $newQuery['vals'] = substr($vals, 2);
            
            return $newQuery;        
        }

        // CREATE UPDATE SQL
        public function createUpdateSQL($data){
            $newQuery = '';
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $newQuery .= ", `$key` = '$value'";
                }
            }
            $newQuery = substr($newQuery, 2);
            return $newQuery;
        }

        // CREATE WHERE UPDATE SQL
        public function createWhereUpdateSQL($data){   
            $newWhere = array();         
            if (!empty($data)) {
                foreach ($data as $value) {
                    @$newWhere[] = "`$value[0]` = '$value[1]'";
                    @$newWhere[] = $value[2];
                }
                $newWhere = implode(' ', $newWhere);
            }            
            return $newWhere;
        }

        // CREATE WHERE DELETE SQL
        public function createWhereDeleteSQL($data){
            $newWhere = '';
            if (!empty($data)) {
                foreach ($data as $id) {
                    $newWhere .= "'" . $id . "', ";
                }
                $newWhere .= "'0'";
            }            
            return $newWhere;
        }

        // LAST ID
        public function lastID(){
            return mysqli_insert_id($this->_connect);
        }

        // QUERY
        public function query($sql){
            $this->_resultQuery = mysqli_query($this->_connect, $sql);
            return $this->_resultQuery;
        }        

        // AFFECTED ROW
        public function affectedRow(){
            return mysqli_affected_rows($this->_connect);
        }
        
        // LIST RECORD
        public function listRecord($query){
            $result = array();
            if (!empty($query)) {
                $resultQuery = $this->query($query);
                if (mysqli_num_rows($resultQuery) > 0) {
                    while ($row = mysqli_fetch_assoc($resultQuery)) {
                        $result[] = $row;
                    }    
                    mysqli_free_result($resultQuery);
                }
            }            
            return $result;
        }

        // LIST SELECTBOX
        public function createSelectbox($query = '', $selectBoxName = '', $keySelected = null, $class = null){            
            $xhtml = '';
            if(!empty($query)){
                $resultQuery = $this->query($query);
                if(mysqli_num_rows($resultQuery) > 0){
                    $xhtml = '<select class="'.$class.'" name="'.$selectBoxName.'">';
                    $xhtml .= '<option value="selectGroup">-- Select Group --</option>';
                    while($row = mysqli_fetch_assoc($resultQuery)){
                        if ($keySelected == $row['id'] && $keySelected != null) {
                            $xhtml .= '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] .'</option>';
                        } else {
                            $xhtml .= '<option value="'. $row['id'] .'">'. $row['name'] .'</option>';
                        }
                    }
                    $xhtml .= '</select>';
                    mysqli_free_result($resultQuery);
                }
            }            
            return $xhtml;
        }

        // SINGLE RECORD
        public function singleRecord($query){
            $result = array();
            if (!empty($query)) {
                $resultQuery = $this->query($query);
                if (mysqli_num_rows($resultQuery) > 0) {
                    $result = mysqli_fetch_assoc($resultQuery);
                    mysqli_free_result($resultQuery);
                }
            }
            return $result;
        }

        // EXISTS
        public function isExist($query){
            if ($query != null) {
                $this->_resultQuery = $this->query($query);
            }
            if (mysqli_num_rows($this->_resultQuery) > 0) return true;
            return false;
        }

        public function realEscapeString($escapestr){
            return mysqli_real_escape_string($this->_connect, $escapestr);
        }
    }
?>