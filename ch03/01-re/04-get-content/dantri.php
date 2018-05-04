<?php 
    $content = file_get_contents('http://dantri.com.vn/the-thao.htm');

    // echo "<pre>";
    // print_r($content);
    // echo "</pre>";

    // LIST
    $pattern = '#eplcheck">.*src="(.*)".*class="fon6".*>(.*)<.*fon5 wid324 fl">(.*)<#misU';
    preg_match_all($pattern, $content, $dataList);
    
    $result = array();

    foreach ($dataList[1] as $key => $value) {
        $result[$key]['image']          = $dataList[1][$key];
        $result[$key]['title']          = $dataList[2][$key];
        $result[$key]['description']    = $dataList[3][$key];
    }

    // TOP
    $pattern = '#class="mt3 clearfix".*src="(.*)".*class="fon44".*>(.*)<.*fon5 wid255 fl">(.*)<#misU';
    preg_match($pattern, $content, $dataTop);
    
    $top['image']       = $dataTop[1];
    $top['title']       = $dataTop[2];
    $top['description'] = $dataTop[3];
       
    array_unshift($result, $top);

    echo "<pre>";
    print_r($result);
    echo "</pre>";