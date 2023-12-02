<?php
try{
    $handle = curl_init();
    $formData = [
        'op' => 'srch',
        'search' => 'pc'
    ];
    $queryData = http_build_query($formData,'', '&');    
    $url = "http://localhost/practice/database.php";
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_TRANSFERTEXT, true);
    curl_setopt($handle, CURLOPT_FAILONERROR, true);  
    curl_setopt($handle, CURLOPT_POST, TRUE);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $queryData);
    $result = curl_exec($handle);    
    if(curl_errno($handle)){
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($httpCode == 404){            
            echo "Your URL does not exist";
        }    
        die();
    } else {
        $resultData = json_decode($result);        
        echo ($resultData);
        
        /*
        foreach($resultData[0] as $data){
            echo $data;
        }
        */
        
    }
    curl_close($handle);
}
catch(Exception $ex){
    echo $ex->getMessage();
}
?>
