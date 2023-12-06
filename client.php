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
    curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
    // curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    $result = curl_exec($handle);    
    print($result);
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
        $resultData = json_decode($result);        
        // echo ($resultData);
        // print($resultData);
        
       
        foreach($resultData as $data){
            echo $data;
        }
        
        
    }
    curl_close($handle);
}
catch(Exception $ex){
    echo $ex->getMessage();
}
?>
