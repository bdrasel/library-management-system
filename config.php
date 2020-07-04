<?php 

    $bd_host = 'localhost';
    $bd_user = 'root';
    $bd_password = '';
    $bd_name = 'lms';

    $con = mysqli_connect($bd_host,$bd_user,$bd_password,$bd_name);

    if(!$con){
        echo "database connection error";
    }

?>