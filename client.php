<?php
// define("WEBSERVICE_URL", "http://localhost/practice/database.php");
define("WEBSERVICE_URL", "http://localhost/php-api-c/database.php");

function getWebserviceData($op, $value){
try{
    $handle = curl_init();
    $formData = [
        'op' => $op,
        'search' => $value
    ];
    $queryData = http_build_query($formData,'', '&');    
    $url = WEBSERVICE_URL;
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_TRANSFERTEXT, true);
    curl_setopt($handle, CURLOPT_FAILONERROR, true);  
    curl_setopt($handle, CURLOPT_POST, TRUE);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $queryData);
    curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
    // curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    $result = curl_exec($handle);    
    // print($result);
    // $resultData = json_decode($result);  
    // print($resultData) ;
    // print($result);
    
    if(curl_errno($handle)){
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($httpCode == 404){            
            echo "Your URL does not exist";
        }    
        die();
    } else {
        // $resultData = json_decode(json_decode($result), true);        
        $resultData = json_decode($result, true);        
        // echo ($resultData);
        // print_r($resultData['data']);
        
       
        foreach($resultData['data'] as $data){
            echo "<br>";
            print_r($data);
        }
        
        
    }
    curl_close($handle);
}
catch(Exception $ex){
    echo $ex->getMessage();
}
}

function setWebserviceData(){
    $person = [
        'op' => 'create',        
        'name' => 'mohammad',
        'family' => 'sharifi',
        'username' => 'usr',
        'password' => md5('123456')   
    ];
    try{
        $handle = curl_init();        
        $queryData = http_build_query($person,'', '&');    
        $url = WEBSERVICE_URL;
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_TRANSFERTEXT, true);
        curl_setopt($handle, CURLOPT_FAILONERROR, true);  
        curl_setopt($handle, CURLOPT_POST, TRUE);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $queryData);
        curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($handle);    
        if(curl_errno($handle)){
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 404){            
                echo "Your URL does not exist";
            }    
            die();
        } else {
            $resultData = json_decode($result);
            print($resultData);
        }
        curl_close($handle);
    
    }
    catch(Exception $ex){
        echo $ex->getMessage();
    }
}
getWebserviceData('srch', 'moh');
// setWebserviceData();
?>
