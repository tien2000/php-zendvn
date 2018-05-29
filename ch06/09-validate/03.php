<?php 
    require_once 'Validate.class.php';

    $source = array(
        'name'      => 'TienLS',
        'age'      => 28,
        'url'      => 'http://www.zendvn.com',
        'email'      => 'neotien200065@gmail.com',
    );

    $validate = new Validate($source);

    // Rule
    $validate->addRule('name', 'string', 100, 200)
             ->addRule('age', 'int', 1, 90)
             ->addRule('url', 'url')
             ->addRule('email', 'email');

    $validate->run();

    echo "<pre>";
    print_r($validate);
    echo "</pre>";

    echo '<hr>';

    echo "<pre>";
    print_r($validate->getError());
    echo "</pre>";

    echo "<pre>";
    print_r($validate->getResult());
    echo "</pre>";
?>