<?php 
class HTML{
    static public function createSelecbox($arrData = array(), $selectBoxName, $keySelected = null, $class = null){
        $xhtml = '';
        if (!empty($arrData)) {
            $xhtml = '<select class="'. $class .'" name="'. $selectBoxName .'" id="'. $selectBoxName .'">';
                foreach ($arrData as $key => $val) { 
                    if ($keySelected == $key && $keySelected != null) {
                        $xhtml .= '<option selected="selected" value="'. $key .'">'. $val .'</option>';
                    } else {
                        $xhtml .= '<option value="'. $key .'">'. $val .'</option>';
                    }
                }
            $xhtml .= '</select>';
        }
        return $xhtml;
    }
}
?>