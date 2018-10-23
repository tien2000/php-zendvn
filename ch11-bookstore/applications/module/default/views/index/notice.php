<?php 
    $message = '';

    switch ($this->_arrParams['type']) {
        case 'register-success':
            $message = 'Account Created! Please check email to active. Thanks!';
            break;
        
        default:
            # code...
            break;
    }
?>

<div class="notice"><?php echo $message; ?></div>