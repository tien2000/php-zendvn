<?php 
    $message = '';

    switch ($this->_arrParams['type']) {
        case 'register-success':
            $message = 'Account Created! Please check email to active. Thanks!';
            break;

        case 'not-permision':
            $message = 'You\'re not permision!';
            break;

        case 'not-url':
            $message = 'URL is not exist';
            break;
        
        default:
            # code...
            break;
    }
?>

<div class="notice"><?php echo $message; ?></div>