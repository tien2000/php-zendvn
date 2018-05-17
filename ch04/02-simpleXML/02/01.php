<?php
    $strXML = '<book id="22">
                    <title>Lập trình Wordpress</title>
                    <author>ZendVN</author>
                    <pages>200</pages>
                    <weight units="gram">300</weight>
                    <price>
                        <real>25.00</real>
                        <sale-off>15.00</sale-off>
                    </price>
                    <shipping>
                        <US>1.1</US>
                        <EU>2.1</EU>
                        <VN>3.1</VN>
                    </shipping>
                </book>';

    // var_dump($strXML);

    $xml = simplexml_load_string($strXML);
    echo "<pre>";
    print_r($xml);
    echo "</pre>";

    echo gettype($xml);
?>