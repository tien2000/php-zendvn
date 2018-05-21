<?php 
    $content = file_get_contents('http://www.giaitri.vnexpress.net');

    // echo $content;

    $pattern = '#<article class="list_news">(.*)\s*</article>#misU';
    preg_match_all($pattern, $content, $matches);
	
	$strXML = '<?xml version="1.0" encoding="UTF-8"?>';
	$strXML .= '<news>';
    foreach ($matches[0] as $key => $value) {
        $pattern = '#href="(.*)".*title="(.*)".*src="(.*)".*class="description">(.*)<.*"#misU';
        $data = array();
		preg_match($pattern, $value, $data);

		if ($data[1] != null) {
			$strXML .= '<article>
						<link>'. @$data[1] .'</link>
						<image>'. @$data[3] .'</image>
						<title>'. @$data[2] .'</title>
						<description>'. @$data[4] .'</description>
					</article>';
		}		
	}
	echo $strXML .= '</news>';

	file_put_contents('news.xml', $strXML) or die("Error");
?>