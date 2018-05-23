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
        <form action="process.php" name="main-form" id="main-form" method="post" enctype="multipart/form-data">
            <input type="file" name="fileUpload" id="fileUpload">
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>