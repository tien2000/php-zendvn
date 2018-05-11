<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>File Upload</title>
</head>
<body>
    <div class="content">
        <h1>PHP Upload File</h1>
        <form action="upload-03.php" name="main-form" id="main-form" method="post" enctype="multipart/form-data">
            <input type="file" name="fileUpload1" id="fileUpload1">
            <input type="file" name="fileUpload2" id="fileUpload2">
            <input type="file" name="fileUpload3" id="fileUpload3">
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>