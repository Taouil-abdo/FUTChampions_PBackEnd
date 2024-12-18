<?php 


    
        $serverName = "localhost";
        $userName = "root";
        $passWord = "";
        $dbname = "futchampion";

    $connect = mysqli_connect($serverName,$userName,$passWord,$dbname);

    if ($connect->connect_error) {
        die("Connection failed: " .$connect->connect_error);
    }
    else{
        echo "connected succefuly";
    }
    
?>