<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php        
        $fileName = "myfile.txt";
        $file = fopen($fileName, "w+");
        if ($file == false){
            echo "Error!!!";
        } else {
            echo "OK!";
            // $t = fclose($file);
            // var_dump($t);

            if (fread($file, 3)){
                echo fread($file, 3);
            }

            while($c = fread($file, 3)){
                echo $c . " - ";
            }
            // echo filesize($fileName);
            // fread($file, 5);            
            // fread($file, 5);            
            
            
            
            
            
            fwrite($file, "Hello shirfi" . time());
            fclose($file);
            // unlink("myfile.txt");
        }
        /*
        echo "test<br>"; 
        $x = 50; 
        // print_r($_SERVER);        
        // var_dump($_SERVER); 
        $x += 1;      
        setcookie('model','1402', time() -60,"/","",0);        
        
        var_dump($_COOKIE['model']);

        if (!$_SESSION['counter']){
            $_SESSION['counter']  = 1;
        } else {
            $_SESSION['counter']  += 1;
            echo $_SESSION['counter'];
        }
        // var_dump($_GET);
        if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
            echo "hello";
        }
        echo "<br/>" . $x;
        unset($_SESSION['counter']);
        // session_destroy();
        // var_dump($_SERVER[]);
        /*
        $pattern = '/[A-z]/i';
        $str = $_GET['user'];

        if (preg_match($pattern , $str)){
            echo "You hacked";
        }

        eval("echo 'ali';");
       */

       /* function f1(&$a){
            // $x = 10;
            echo $a++;        
            // echo $GLOBALS['x'];
        }

        f1($x);
        // echo $x;
        // print_r($_REQUEST);
        // echo $_REQUEST['user'];
        echo $_SERVER;
        var_dump($_SERVER);
        // var_dump($_REQUEST);
        */
    ?>
</body>
</html>