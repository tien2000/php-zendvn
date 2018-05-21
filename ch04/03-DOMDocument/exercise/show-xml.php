<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link type="text/css" rel="stylesheet" href="css/styles.css">
</head>

<body>
	<div class="content">
<?php
	$data = simplexml_load_file('news.xml');
	foreach($data as $value){
?>
		<div class="news">
			<img src="<?php echo $value->image;?>" alt="News" />
			<h3><a href="<?php echo $value->link;?>"><?php echo $value->title;?></a></h3>
			<p><?php echo $value->description;?></p>
			<div class="clr"></div>
		</div>
		
<?php 
	}
?>		
	</div>
</body>
</html>