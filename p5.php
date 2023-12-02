<?php


function handle_errors($errNo, $errStr, $errFile, $errLine){
    //  die("----");
    
}

// set_exception_handler("handle_errors");
// set_error_handler("handle_errors");

// die();
// throw new Exception('some error occured');   

try{
    throw new Exception('some error occured');   
    echo "msg";    
}
catch(Exception $ex){
   var_dump($ex->getTrace());
}

$currentTime= getdate();
echo $currentTime['year'] . '/' . $currentTime['mon'] . "/" . $currentTime['mday'] . "<br>";
foreach($currentTime as $key => $value){
    echo "$key = $value <br>";
}
// echo time();
echo "<br>";
 echo date("H:i:s", time());


