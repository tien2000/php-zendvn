<?php 
    $content = file_get_contents('https://www.vietcombank.com.vn/');

    // Get Table
    $pattern = '#(?<=Content_HomeSideBar_RatesBox_ExchangeRates_ExrateView">).*(?<=</table)#misu';
    preg_match($pattern, $content, $matches);    

    // Create Array
    $pattern = '#class="code">(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td.*/tr>#misU';
    preg_match_all($pattern, $content, $matches);

    // echo "<pre>";
    // print_r($matches);
    // echo "</pre>";

    foreach ($matches[1] as $key => $value) {
        $result[$value][] = $matches[2][$key];
        $result[$value][] = $matches[3][$key];
        $result[$value][] = $matches[4][$key];
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";