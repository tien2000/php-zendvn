<?php
    $book = array(
        'id'        => 1,
        'author'    => 'ZendVN',
        'title'     => 'Lập trình PHP',
        'pages'     => 500,
        'weight'    => array(
                            'data'          => 200,
                            'attributes'    => array('units' => 'gram')
                        ),
        'shipping'  => array(
                            'data'          => array('us' => 1.3, 'eu' => 2.3, 'vn' => 3.3)
                        )
    );

    $xml = new DOMDocument('1.0', 'UTF-8');

    $root = $xml->createElement('book');
    $xml->appendChild($root);

    foreach ($book as $key => $value) {
        if (is_array($value)) {            
            if (is_array($value['data'])) {
                $node = $xml->createElement($key);
                foreach ($value['data'] as $keyD => $valueD) {
                    $nodeChild = $xml->createElement($keyD, $valueD);
                    $node->appendChild($nodeChild);
                }
            } else {
                $node = $xml->createElement($key, $value['data']);
            }
            if (array_key_exists('attributes', $value)) {
                foreach ($value['attributes'] as $keyA => $valueA) {
                    $nodeAttr = $xml->createAttribute($keyA);
                    $nodeAttr->value = $valueA;
                    $node->appendChild($nodeAttr);
                }
            }
        } else {
            $node = $xml->createElement($key, $value);            
        }

        $root->appendChild($node);       
        
    }

    $xml->formatOutput = true;
    $xml->save('../files/tlsBook-06.xml') or die("Error");
?>