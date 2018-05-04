<?php 
    $content = file_get_contents('http://www.giaitri.vnexpress.net');

    // echo $content;

    $pattern = '#<article class="list_news">(.*)\s*</article>#misU';
    preg_match_all($pattern, $content, $matches);

    $result = array();
    foreach ($matches[0] as $key => $value) {
        // link
        $pattern = '#href="(.*)".*title="(.*)".*src="(.*)".*class="description">(.*)<.*"#misU';
        $data = array();
        preg_match($pattern, $value, $data);

        @$result[$key]['link'] = $data[1];
        @$result[$key]['title'] = $data[2];
        @$result[$key]['image'] = $data[3];
        @$result[$key]['description'] = $data[4];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style type="text/css">
	* {
		margin: 0px;
		padding: 0px;
	}
	
	.clr {
		clear: both;
	}
	.content{
		margin: 30px auto;
		width: 800px;
	}
	
	div.news{
		margin-bottom: 10px;
		border-bottom: 1px solid #6bb5ef;
		padding-bottom: 10px;
	}
	
	div.news img{
		margin-right: 10px;
		float: left;
	}
	
	div.news h3{
		margin-bottom: 10px;
	}
	
	div.news p{
		text-align: justify;
		line-height: 24px;
	}
	
</style>
<body>
	<div class="content">
<?php
	foreach($result as $key => $value){
?>
		<div class="news">
			<img src="<?php echo $value['image'];?>" alt="News" />
			<h3><a href="<?php echo $value['link'];?>"><?php echo $value['title'];?></a></h3>
			<p><?php echo $value['description'];?></p>
			<div class="clr"></div>
		</div>
		
<?php 
	}
?>
		
		
	</div>
</body>
</html>