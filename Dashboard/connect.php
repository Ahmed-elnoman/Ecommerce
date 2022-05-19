<?php
    //CONNECT WAS DATA BASE


    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
      $connect = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
      // set the PDO error mode to exception
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }










