<?php 
    function createSelectBox($arrData = array(), $selectBoxName, $keySelected){
        if (!empty($arrData)) {
            $str = '<select name="'. $selectBoxName .'" id="'. $selectBoxName .'">';
                for ($i = 0; $i <= count($arrData) - 1; $i++) { 
                    if ($i == 0) {
                        $str .= '<option disabled value="'. $i .'">'. $arrData[$i] .'</option>';
                    } else if ($keySelected == $i) {
                        $str .= '<option selected="selected" value="'. $i .'">'. $arrData[$i] .'</option>';
                    } else {
                        $str .= '<option value="'. $i .'">'. $arrData[$i] .'</option>';
                    }
                }
            $str .= '</select>';
        }
        return $str;
    }

    function addTime($format, $date, $type, $value){
        $arrDate = date_parse_from_format($format, $date);
        $type = strtolower($type);
        switch ($type) {
            case 'day':
                $ts = mktime(0, 0, 0, $arrDate['month'], $arrDate['day'] + $value, $arrDate['year']);
                break;

            case 'month':
                $ts = mktime(0, 0, 0, $arrDate['month'] + $value, $arrDate['day'], $arrDate['year']);
                break;

            case 'year':
                $ts = mktime(0, 0, 0, $arrDate['month'], $arrDate['day'], $arrDate['year'] + $value);
                break;
        }
        $result = date($format, $ts);
        return $result;
    }         
?>