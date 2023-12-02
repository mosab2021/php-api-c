<?php
$myArray = ['name' => 'mohamad', 'family' => 'sharifi', 'avg' => 19.5];
$myJson = json_encode($myArray);
$obj = json_decode($myJson);

foreach($obj as $key => $value){
    echo $key . ' = ' . $value . '<br/>';
}
//var_dump($obj->name);
$arr = json_decode(json_encode($myArray), true);
//$arr = json_decode($myJson, true);
var_dump($arr);
//echo $arr['name'];
?>