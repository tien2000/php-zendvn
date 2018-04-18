<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
<title>Trắc nghiệm tính cách</title>
</head>
<body>
    <?php
        require_once "function-a.php";  // $arrQuestion
        require_once "function-b.php";  // $arrOption

        // echo "<pre>";
        // print_r($arrOption);
        // echo "</pre>";

        $newArr = array();

        foreach ($arrQuestion as $key => $value) {
            $newArr[$key]["question"] = $value["question"];
            $newArr[$key]["sentense"] = $arrOption[$key];
        }

        // echo "<pre>";
        // print_r($newArr);
        // echo "</pre>";
    ?>
	<div class="content">
		<h1>Trắc nghiệm tính cách</h1>
		<form action="result.php" method="POST" name="mainForm">
            <?php
                $i = 1;
                foreach ($newArr as $key => $value) {
                    echo '<div class="question">';
                    echo '<p>
                            <span>Câu hỏi '. $i .':</span>
                            '. $value["question"] .'
                        </p>';
                    echo '<ul>';
                    foreach ($value["sentense"] as $keyC => $valueC) {
                        echo '<li><label for=""><input type="radio" name="'. $key .'" id="'. $key .'" value="'. $valueC["point"] .'">'. $valueC["option"] .'</label></li>';
                    }                            
                    echo '</ul>';
                    echo '</div>';
                    $i++;
                }
            ?>
			<input type="submit" value="Kiểm tra" name="submit"></input>
		</form>
		
	</div>
</body>
</html>