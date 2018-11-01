<?php 
class Validate{
    private $_errors  = array();
    private $_source  = array();
    private $_rules   = array();
    private $_result  = array();

    public function __construct($source) {
        $this->_source = $source;
    }

    public function addRules($rules){
        $this->_rules = array_merge($rules, $this->_rules);
    }

    public function addRule($elemt, $type = 'string', $options = null, $required = true){
        $this->_rules[$elemt] = array('type' => $type, 'options' => $options, 'required' => $required);
        return $this;
    }

    public function getError(){
        return $this->_errors;
    }

    public function setError($elemt, $message){
        $strElemt = str_replace('-', ' ', $elemt);
        if (array_key_exists($elemt, $this->_errors)) {
            $this->_errors[$elemt] .= ' - ' . $message;
        } else {
            $this->_errors[$elemt] = '<strong>'. ucwords($strElemt) .'</strong>' . ' ' . $message;    
        }
    }

    public function getResult(){
        return $this->_result;
    }

    public function run(){
        foreach ($this->_rules as $elemt => $value) {
            if ($value['required'] == true && trim($this->_source[$elemt] == null)) {                
                $this->setError($elemt, 'is not Empty');
            } else {
                switch ($value['type']) {
                    case 'int':                
                        $this->validateInt($elemt, $value['options']['min'], $value['options']['max']);
                        break;
                    case 'string':              
                        $this->validateString($elemt, $value['options']['min'], $value['options']['max']);
                        break;
                    case 'url':              
                        $this->validateUrl($elemt, $value['options']['min'], $value['options']['max']);
                        break;
                    case 'email':              
                        $this->validateEmail($elemt);
                        break;
                    case 'password':              
                        $this->validatePassword($elemt, $value['options']);
                        break;
                    case 'date':              
                        $this->validateDate($elemt, $value['options']['start'], $value['options']['end']);
                        break;
                    case 'status':         
                        $this->validateStatus($elemt, $value['options']);
                        break;
                    case 'group':         
                        $this->validateGroupID($elemt);
                        break;
                    case 'existRecord':         
                        $this->validateExistRecord($elemt, $value['options']);
                        break;
                    case 'notExistRecord':         
                        $this->validateNotExistRecord($elemt, $value['options']);
                        break;
                    case 'string-notExistRecord':     
                        $this->validateNotExistRecord($elemt, $value['options']);    
                        $this->validateString($elemt, $value['options']['min'], $value['options']['max']);
                        break;
                    case 'email-notExistRecord':
                        $this->validateNotExistRecord($elemt, $value['options']);    
                        $this->validateEmail($elemt);
                        break;
                }
            }            
            if (!array_key_exists($elemt, $this->_errors)) {
                $this->_result[$elemt] = $this->_source[$elemt];
            }
        }
        $elemtNotValidate = array_diff_key($this->_source, $this->_errors);
        $this->_result = array_merge($this->_result, $elemtNotValidate);
    }

    public function validateInt($elemt, $min = 0, $max = 0){
        if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_INT, array('options' => array('min_range' => $min, 'max_range' => $max)))) {
            $this->_errors[$elemt] = "'" . $this->_source[$elemt]. "'" . 'This is not a Number';
            $this->setError($elemt, 'This is not a Number');
        }        
    }

    public function validateString($elemt, $min = 0, $max = 0){
        $length = strlen($this->_source[$elemt]);    
        if ($length < $min) {
            $this->setError($elemt, ' too short');
        } else if ($length > $max) {
            $this->setError($elemt, ' too long');
        } else if(!is_string($this->_source[$elemt])){
            $this->setError($elemt, ' is not a String');
        }        
    }

    public function validateUrl($elemt){
        if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_URL)) {
            $this->setError($elemt, ' is not a URL');
        }        
    }

    public function validateEmail($elemt){
        if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_EMAIL)) {
            $this->setError($elemt, ' is not a Email');
        }        
    }

    public function validatePassword($elemt, $options){
        if ($options['action'] == 'add' || ($options['action'] == 'edit') && $this->_source[$elemt]) {
            $pattern = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,32}$#';
            if (!preg_match($pattern, $this->_source[$elemt])) {
                $this->setError($elemt, ' is not a Password Type');
            }
        }
    }

    public function validateDate($elemt, $dateStart, $dateEnd){
        $formatDay      = "d/m/Y";
        // start
        $arrDateStart   = date_parse_from_format($formatDay, $dateStart);
        $tsStart        = mktime(0, 0, 0, $arrDateStart['month'], $arrDateStart['day'], $arrDateStart["year"]);
        // end
        $arrDateEnd     = date_parse_from_format($formatDay, $dateEnd);
        $tsEnd          = mktime(0, 0, 0, $arrDateEnd['month'], $arrDateEnd['day'], $arrDateEnd["year"]);
        // current
        $arrDateCurrent = date_parse_from_format($formatDay, $this->_source[$elemt]);
        $tsCurrent      = mktime(0, 0, 0, $arrDateCurrent['month'], $arrDateCurrent['day'], $arrDateCurrent["year"]);

        if ($tsCurrent < $tsStart || $tsCurrent > $tsEnd) {
            $this->setError($elemt, ' is invalid Date');
        }        
    }

    public function validateGroupID($elemt){
        if (!is_numeric($this->_source[$elemt])) {
            $this->setError($elemt, 'Select a Group');
        }        
    }

    public function validateStatus($elemt, $options){
        if (in_array($this->_source[$elemt], $options['deny']) == true) {
            $this->setError($elemt, 'Please select a different value!');
        }        
    }

    public function validateExistRecord($elemt, $options){
        $db     = $options['database'];
        $query  = $options['query'];
        if ($db->isExist($query) == false) {
            $this->setError($elemt, 'Record is not exist');
        }
    }

    public function validateNotExistRecord($elemt, $options){
        $db     = $options['database'];
        $query  = $options['query'];
        if ($db->isExist($query) == true) {
            $this->setError($elemt, 'Record is Exist');
        }
    }

    public function showErrors(){        
        $xhtml = '';
        if (!empty($this->_errors)) {
            $xhtml .= '<div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4 class="alert-heading">Error</h4>';
                foreach ($this->_errors as $key => $value) {
                    $xhtml .= '<div class="alert-message">* '. $value .'</div>';
                }
            $xhtml .= '</div>';
        }
        return $xhtml;
    }

    public function showErrorsPublic(){        
        $xhtml = '';
        if (!empty($this->_errors)) {
            $xhtml .= '<ul class="error-public">';
                foreach ($this->_errors as $key => $value) {
                    $xhtml .= '<li>'. $value .'</li>';
                }
            $xhtml .= '</ul>';
        }
        return $xhtml;
    }

    public function isValid(){
        return $result = (count($this->_errors) > 0) ? false : true;
    }    
}
?>