<?php
include('config.php');

function dbConnect($host, $dbuser, $dbpass,  $dbName){
    $connect = mysqli_connect($host, $dbuser, $dbpass,  $dbName);
    if (mysqli_connect_error()){    
    die(mysqli_error($connect));    
    } else {
        echo "Db connected <br/>";
    }
    return $connect;
}

function dbClose($connect){
    mysqli_close($connect);
}

function dbCreateTable($connect, $tableName){
    $sqlQuery = "CREATE TABLE IF NOT EXISTS " . $tableName . " (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        family VARCHAR(70) NOT NULL,
        age INT,
        /*UNIQUE(id)*/    
        PRIMARY KEY(id)
    )";
    $result = mysqli_query($connect, $sqlQuery);
    if (!$result){
        echo mysqli_error($connect);
    } else {
        echo "table was created successfully<br/>";
    }
    return $result;
}

function dbOrderTable($connect, $tableName){
    $sqlQuery = "CREATE TABLE IF NOT EXISTS " . $tableName . " (
        order_id INT NOT NULL AUTO_INCREMENT,
        order_name VARCHAR(50) NOT NULL,
        customer_id int NOT NULL,
        order_date date,           
        PRIMARY KEY(order_id),
        FOREIGN KEY(customer_id) REFERENCES student(id)
    )";
    var_dump($sqlQuery);

    $result = mysqli_query($connect, $sqlQuery);
    if (!$result){
        echo mysqli_error($connect);
    } else {
        echo "table was created successfully<br/>";
    }
    return $result;
}

function dbInsertTable($connect, $tableName, $name, $family, $age){ 
    $sqlQuery = " INSERT INTO " . $tableName . " VALUES(NULL, '" . $name . "', '" . $family . "',  " . $age . ") ";
    $result = mysqli_query($connect, $sqlQuery);
    if (!$result){
        echo mysqli_error($connect);
    } else {
        echo "One Record inserted <br/>";
    }
    return $result;
}

function dbUpdate($connect, $tableName, $id, $name, $family, $age){ 
    $sqlQuery = " UPDATE " . $tableName . " SET name='" . $name . "', family='" . $family . "', age=" . $age. " 
    WHERE name like '%sasan%'  ";//WHERE id<" .  $id . " AND age<=20";  WHERE age IN (26,35) ";WHERE id BETWEEN 4 AND 12 ";
var_dump($sqlQuery);
    $result = mysqli_query($connect, $sqlQuery);    
    if (!$result){
        echo mysqli_error($connect);
    } else {
        echo mysqli_affected_rows($connect) . " Records updated <br/>";
    }
    return $result;
}


function dbDeleteRecord($connect, $tableName, $id){ 
    $sqlQuery = " DELETE FROM  " . $tableName . " 
    WHERE id = " . $id ;
    
    $result = mysqli_query($connect, $sqlQuery);
    if (!$result){
        echo mysqli_error($connect);
    } else {
        echo mysqli_affected_rows($connect) . " Records deleted <br/>";        
    }
    return $result;
}


function dbShowTable($connect, $tableName){
    /*
    $sqlQuery = " SELECT id,name,family,age FROM " . $tableName . "
    WHERE 1
    ORDER BY id DESC
    GROUP BY 
    ";
    */
    $sqlQuery = " SELECT sum(id) AS id,family,age FROM " . $tableName . "
    WHERE 1    
    GROUP BY name
    HAVING count(name) > 10
    ORDER BY id DESC
    ";
    var_dump($sqlQuery);
    echo "<br/>";

    $result = mysqli_query($connect, $sqlQuery);    
    if (!$result){
        echo mysqli_error($connect);
    } 
    echo mysqli_num_rows($result);
    while($row = mysqli_fetch_array($result)){ //while($row = mysqli_fetch_array($result)){
        //echo $row['id'] . ' - ' . $row['name'] . ' - ' . $row['family'] . ' - ' . $row['age'] . '<br/>';
        echo $row['id'] . ' - '  . '<br/>';
    }
    return $result;
}

$connect = dbConnect($host, $dbuser, $dbpass,  $dbName);
// dbCreateTable($connect, 'student');
if (false){
    for ($i=0; $i<100 ;$i++)
        dbInsertTable($connect, 'student' , 'mohmad' .$i , 'sharifi' .$i, 20);
}

// dbUpdate($connect, 'student' , 10, 'sasan' , 'amini', 13);
//dbDeleteRecord($connect, 'student' , 18);
dbOrderTable($connect, 'orders');
dbShowTable($connect, 'student');
dbClose($connect);




