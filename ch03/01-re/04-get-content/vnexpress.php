<?php 
    $content = file_get_contents('http://www.giaitri.vnexpress.net');

    // echo $content;

    $pattern = '#<article class="list_news">(.*)\s*</article>#misU';
    preg_match_all($pattern, $content, $matches);

    $result = array();
    foreach ($matches[0] as $key => $value) {
        // link
        $pattern = '#href="(.*)"#misU';
        preg_match($pattern, $value, $link);

        // image
        $pattern = '#src="(.*)"#misU';
        preg_match($pattern, $value, $image);

        // title
        $pattern = '#title="(.*)"#misU';
        preg_match($pattern, $value, $title);

        // description
        $pattern = '#<h4 class="description">(.*)<#misU';
        preg_match($pattern, $value, $description);

        $result[$key]['link'] = $link[1];
        $result[$key]['image'] = $image[1];
        $result[$key]['title'] = $title[1];
        $result[$key]['description'] = $description[1];
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";
?>

