<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload file</title>
</head>
<body>
    <h3>Upload File</h3>

    <form action="index.php" method="post" enctype="multipart/form-data">
        آپلود عکس
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="آپلود" name="submit">
    </form>


    <?php
    $file = $_FILES["fileToUpload"];
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $destination = './uploads/';
    $fileName = basename($_FILES['name']);
    move_uploaded_file($_FILES['tmp_name'], $destination, $file);


    echo 'OK';
    ?>
</body>
</html>