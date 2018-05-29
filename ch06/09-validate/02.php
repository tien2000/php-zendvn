<?php 
    require_once 'Validate.class.php';

    $source = array(
        'name'      => 'TienLS',
        'age'      => 28,
        'url'      => 'www.zendvn.com',
        'email'      => 'neotien200065@gmail.com',
    );

    $validate = new Validate($source);

    // Rule
    $validate->addRule('name', 'string', 5, 20)
             ->addRule('age', 'int', 1, 90);

    // Rules
    $rules = array(
        'url' => array('type' => 'url'),
        'email' => array('type' => 'email'),
    );

    $validate->addRules($rules);

    echo "<pre>";
    print_r($validate);
    echo "</pre>";
?>