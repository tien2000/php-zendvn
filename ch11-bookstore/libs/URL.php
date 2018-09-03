<?php 
class URL{
    public static function createLink($module, $controller, $action, $arrParams = null){
        if (!empty($arrParams)) {
            $paramOpts = '';
            foreach ($arrParams as $key => $value) {
                $paramOpts .= "&$key=$value";
            }            
        }
        // index.php?module=admin&controller=group&action=ajaxStatus&id=1&status=0
        @$url = 'index.php?module='. $module .'&controller='. $controller .'&action='. $action . $paramOpts .'';
        return $url;
    }

    public function redirect($link){
        header('location:' . $link);
        exit();
    }
}
?>