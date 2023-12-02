<form name="frm" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img">
    <input type="submit" name="submit" value="upload">

</form>
<?php
    if (count($_FILES)){
         print_r($_FILES);
        $fileName = $_FILES['img']['name'];
        $filePath = $_FILES['img']['tmp_name'];
        // $ext = end(explode(".", $fileName));

        $target_dir = "uploads//"; 
        $target_file = $target_dir . basename($_FILES["img"]["name"]); 

        move_uploaded_file($filePath,  "pic/" . $fileName);
        var_dump($target_file);       

    }        
    ?>
