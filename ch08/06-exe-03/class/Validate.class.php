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

    public function addRule($elemt, $type = 'string', $min = 0, $max = 0, $required = true){
        $this->_rules[$elemt] = array('type' => $type, 'min' => $min, 'max' => $max, 'required' => $required);
        return $this;
    }

    public function getError(){
        return $this->_errors;
    }

    public function getResult(){
        return $this->_result;
    }

    public function run(){
        foreach ($this->_rules as $elemt => $value) {
            if ($value['required'] == true && trim($this->_source[$elemt] == null)) {
                $this->_errors[$elemt] = 'is not Empty';
            } else {    
                switch ($value['type']) {
                    case 'int':                
                        $this->validateInt($elemt, $value['min'], $value['max']);
                        break;
                    case 'string':              
                        $this->validateString($elemt, $value['min'], $value['max']);
                        break;
                    case 'url':              
                        $this->validateUrl($elemt);
                        break;
                    case 'email':              
                        $this->validateEmail($elemt);
                        break;
                    case 'password':              
                        $this->validatePassword($elemt);
                        break;
                    case 'date':              
                        $this->validateDate($elemt, $value['min'], $value['max']);
                        break;
                    case 'status':              
                        $this->validateStatus($elemt);
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
        }        
    }

    public function validateString($elemt, $min = 0, $max = 0){
        $length = strlen($this->_source[$elemt]);    
        if ($length < $min) {
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' too short';
        } else if ($length > $max) {
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' too long';
        } else if(!is_string($this->_source[$elemt])){
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' is not a String';
        }        
    }

    public function validateUrl($elemt){
        if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_URL)) {
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' is not a URL';
        }        
    }

    public function validateEmail($elemt){
        echo 'email';
        if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_EMAIL)) {
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' is not a Email';
        }        
    }

    public function validatePassword($elemt){
        $pattern = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,32}$#';
        if (!preg_match($pattern, $this->_source[$elemt])) {
            $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' is not a Password Type';
        }
    }

    public function validateDate($elemt){
        // if (!filter_var($this->_source[$elemt], FILTER_VALIDATE_EMAIL)) {
        //     $this->_errors[$elemt] = "' " . $this->_source[$elemt]. " '" . ' is not a Email';
        // }        
    }

    public function showErrors(){
        $xhtml = '';
        if (!empty($this->_errors)) {
            $xhtml .= '<ul class="error">';
                foreach ($this->_errors as $key => $value) {
                    $xhtml .= '<li><b>'. ucfirst($key) .': </b> '. $value .'</li>';
                }
            $xhtml .= '</ul>';
        }
        return $xhtml;
    }

    public function isValid(){
        // return $result = (count($this->_errors) > 0) ? false : true;

        if (count($this->_errors) > 0) return false;
        return true;
    }

    public function validateStatus($elemt, $min = 0, $max = 0){
        if ($this->_source[$elemt] < 0 || $this->_source[$elemt] > 1) {
            $this->_errors[$elemt] = "Select Status";
        }        
    }
}
?>