<?php 
    require_once "class/Database.class.php";

    $params = array(
        'server'    => 'localhost',
        'username'  => 'root',
        'password'  => '',
        'database'  => 'db_manage_user',
        'table'     => 'news',
    );
    
    $db         = new Database($params);
    $pos        = $_GET['pos'];
    $item       = $_GET['item'];

    $query[]    = "SELECT `id`, `title`, `description`";
    $query[]    = "FROM `news`";
    $query[]    = "LIMIT $pos, $item";
    $query      = implode(' ', $query);

    $list       = $db->listRecord($query);

    $xhtml = '';
    if (!empty($list)) {
        foreach ($list as $key => $value) {
            $xhtml   .= '<div class="item">
                            <h3>'. $value['title'] .'</h3>
                            <p>'. $value['description'] .'</p>
                        </div>';
        }
    }
    echo $xhtml;
?>