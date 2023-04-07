<?php
function connect(){
  $appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $connStr = "host=localhost port=5432 dbname=upwork-mastery user=postgres password=maya";
  
  $conn = pg_connect($connStr);
  if ($conn) {
      # code...
      // echo "connection established";
      return $conn;
  }
  }

 ?>
