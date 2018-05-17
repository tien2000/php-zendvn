<?php
    header('Content-type: text/xml');
    $books = array(
        array(
            'id'        => 11,
            'title'     => 'Lập trình PHP',
            'author'    => 'ZendVN',
            'pages'     => 400,
            'weight'    => array(400, 'gram'),
            'price'     => array('real' => 100.00, 'sale-off' => 30.00),
            'shipping'  => array('US' => 1.3, 'EU' => 2.3, 'VN' => 3.3)
        ),
        array(
            'id'        => 22,
            'title'     => 'Lập trình Wordpress',
            'author'    => 'ZendVN',
            'pages'     => 300,
            'weight'    => array(200, 'gram'),
            'price'     => array('real' => 70.00, 'sale-off' => 20.00),
            'shipping'  => array('US' => 1.1, 'EU' => 2.1, 'VN' => 3.1)
        ),
        array(
            'id'        => 33,
            'title'     => 'Lập trình Zend',
            'author'    => 'ZendVN',
            'pages'     => 200,
            'weight'    => array(100, 'gram'),
            'price'     => array('real' => 60.00, 'sale-off' => 10.00),
            'shipping'  => array('US' => 2.1, 'EU' => 3.1, 'VN' => 4.1)
        )
    );

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<book_store>'; 
    foreach ($books as $value) {
        $xml .= '<book id="'.$value['id'].'">
                    <title>'.$value['title'].'</title>
                    <author>'.$value['author'].'</author>
                    <pages>'.$value['pages'].'</pages>
                    <weight units="'.$value['weight'][1].'">'.$value['weight'][0].'</weight>
                    <price>
                        <real>'.$value['price']['real'].'</real>
                        <sale-off>'.$value['price']['sale-off'].'</sale-off>
                    </price>
                    <shipping>
                        <US>'.$value['shipping']['US'].'</US>
                        <EU>'.$value['shipping']['EU'].'</EU>
                        <VN>'.$value['shipping']['VN'].'</VN>
                    </shipping>
                </book>';
    }
    $xml .= '</book_store>'; 

    echo $xml;
?>