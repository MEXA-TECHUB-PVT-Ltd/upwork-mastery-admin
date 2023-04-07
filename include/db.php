<?php
function connect(){
     // variable initialization
     $hostname = "localhost";
     $dbname = "upwork_mastery";
     $username = "root";
     $password = "";
     $conn = mysqli_connect($hostname, $username,  $password, $dbname);
     if($conn->connect_errno){
       // true => it means that it has some error
       print_r($conn->connect_error);
       exit;
     }else{
       // false => it means no error in connection details
       return $conn;
      //  echo "--successful connection--";
      //  print_r($conn);
     }
  }


 ?>
