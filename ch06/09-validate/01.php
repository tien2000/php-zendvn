<?php 
    require_once 'Validate.class.php';

    $source = array(
        'name'      => 'TienLS',
        'age'      => 28,
        'url'      => 'www.zendvn.com',
        'email'      => 'neotien200065@gmail.com',
    );

    $rules = array(
        'name' => array(
            'type' => 'string',
            'min' => 10,
            'max' => 50
        ),
        'age' => array(
            'type' => 'int',
            'min' => 1,
            'max' => 90
        )
    );

    $validate = new Validate($source);

    $validate->addRules($rules);

    echo "<pre>";
    print_r($validate);
    echo "</pre>";
?>