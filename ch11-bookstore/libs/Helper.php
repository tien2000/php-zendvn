<?php 
class Helper{
    // Create Button
    public static function cmsButton($name, $id, $icon, $btnClass, $link = '', $type = 'new'){
        $xhtml = '<div class="btn-wrapper" id="'. $id .'">';
        if ($type == 'new') {
            $xhtml .= '<a href="'. $link .'" class="btn btn-small '. $btnClass .'" title="'. ucfirst($name) .'">
                        <span class="'. $icon .'" aria-hidden="true"></span>
                            '. ucfirst($name) .'
                    </a>';
        } else if ($type == 'submit') {
            $xhtml .= '<a href="#" onclick="javascript:submitForm(\''. $link .'\');" class="btn btn-small '. $btnClass .'" title="'. ucfirst($name) .'">
                        <span class="'. $icon .'" aria-hidden="true"></span>
                            '. ucfirst($name) .'
                    </a>';
        }
        
        $xhtml .= '</div>';
        
        return $xhtml;
    }

    // Format DATE
    public static function dateFormat($format, $val){
        $result = '';
        if (!empty($val) && $val != '0000-00-00') {
            $result = date($format, strtotime($val));
        }
        return $result;
    }

    // Create Icon Status
    public static function cmsStatus($statusVal, $link , $id){
        $strStatus = ($statusVal == 1) ? 'publish' : 'unpublish' ;
        $xhtml     = '<a id="status-'. $id .'" class="btn btn-micro" href="javascript:changeStatus(\''. $link .'\');" data-original-title="'. ucfirst($strStatus) .' and is Current.">
                            <span class="icon-'. $strStatus .'" aria-hidden="true"></span>
                        </a>';
        return $xhtml;
    }

    // Create Icon Group_ACP
    public static function cmsGroupACP($GroupACPVal, $link , $id){
        $strGroupACP = ($GroupACPVal == 1) ? 'publish' : 'unpublish' ;
        $xhtml     = '<a id="group-acp-'. $id .'" class="btn btn-micro" href="javascript:changeGroupACP(\''. $link .'\');" data-original-title="'. ucfirst($strGroupACP) .' and is Current.">
                            <span class="icon-'. $strGroupACP .'" aria-hidden="true"></span>
                        </a>';
        return $xhtml;
    }
}
?>