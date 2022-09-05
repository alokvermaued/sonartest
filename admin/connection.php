<?php 

error_reporting(0);
    
    $severname = "localhost";
    $username  ="root";
    $password  ="";
    $dbname    ="testlogin";
 

    $conn = mysqli_connect(  $severname,$username,$password,$dbname);

    if($conn)
    {
        // echo "connection ok";
    }
    else
    {
       echo "connection faild".mysqli_connect_error(); 
    }












?>