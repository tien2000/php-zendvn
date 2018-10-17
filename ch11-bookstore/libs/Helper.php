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

    // Create Title sort
    public static function cmsLinkSort($name, $column, $columnPost, $orderPost){
        $arrowUpDown = ($orderPost == 'asc') ? 'up' : 'down' ;
        $order       = ($orderPost == 'asc') ? 'desc' : 'asc' ;
        $arrowSpan   = ''; 
        if ($column == $columnPost) {            
            $arrowSpan = '<span class="icon-arrow-'. $arrowUpDown .'-3"></span>';
        }
        $xhtml = '<a href="#" onclick="javascript:sortList(\''. $column .'\', \''. $order .'\')" class="js-stools-column-order hasPopover"
                    data-order="'. $name .'" data-direction="'. $orderPost .'" data-name="'. $name .'"
                    title="'. $name .'" data-content="Select to sort by this column" data-placement="top">
                    '. $name . $arrowSpan .'</a>';
        return $xhtml;
    }

    // Create Select Box
    public static function cmsSelectBox($id = '', $name = '', $arrVal = array(), $keySelect = 'default'){        
        $xhtml = '<div class="js-stools-field-filter"><select id="'. $id .'" name="'.  $name .'" style="display: none;">'; 
        foreach ($arrVal as $key => $value) {
            if ($key == $keySelect && is_numeric($keySelect)) {
                $xhtml .= '<option value="'. $key .'" selected="selected">'. $value .'</option>';
            } else {
                $xhtml .= '<option value="'. $key .'">'. $value .'</option>';
            }
        }                        
        $xhtml .= '</select></div>';
        return $xhtml;
    }

    // Create Message
    public static function cmsMessage($message){
        $xhtml = '';
        if (!empty($message)) {
            $xhtml = '<div class="alert alert-'. $message['class'] .'">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="alert-heading">'. $message['content'] .'</h4>
                            <div class="alert-message">'. $message['items'] .'</div>
                        </div>';
        }
        return $xhtml;
    }

    // Create Input
    public static function cmsInput($type = '', $name = '', $id = '', $value = '', $readonly = '', $class = '', $size = ''){
        $boolReadOnly   = ($readonly == false) ? '' : "readonly='true'";
        $strSize        = ($size     == null)  ? '' : "size='$size'";
        $strClass       = ($class    == null)  ? '' : "class='$class'";
        $xhtml = '<input type="'. $type .'" name="'. $name .'" id="'. $id .'" value="'. $value .'" '. $strClass .' '. $boolReadOnly .' '. $strSize .' />';
        return $xhtml;
    }

    // Create Row - Admin
        public static function cmsRowForm($lblId, $lblClass, $lblTitle, $lblDataContent, $require = false, $input){        
        $span    = '';
        if ($require == true) $span = '<span class="star">&#160;*</span>';
        $xhtml   = '<div class="control-group">
                        <div class="control-label">
                            <label id="'. $lblId .'" for="'. $lblId .'" class="'. $lblClass .'" title="'. $lblTitle .'"
                                data-content="'. $lblDataContent .'">
                                '. $lblTitle . $span .'
                            </label>
                        </div>
                        <div class="controls">
                            '. $input .'
                        </div>
                    </div>';
        return $xhtml;
    }

    // Create Row - Public
    public static function cmsRow($lblTitle, $input, $submit = false){  
        if ($submit == false) {
            $xhtml   = '<div class="form_row">
                <label class="contact"><strong>'. $lblTitle .':</strong></label>
                '. $input .'
            </div>';    
        } else {
            $xhtml   = '<div class="form_row">
                '. $input .'
            </div>';  
        }
        
        return $xhtml;
    }
}
?>