<?php
    // try {
    //     $koneksi = new PDO("mysql:host=localhost;dbname=db_crudphp","root","");
    //     // echo "Database terhubung";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
    $host = "localhost";
    $user = "root";
    $database = "db_crudphp";
    $pass = "";

    $koneksi = mysqli_connect($host, $user, $pass, $database);    
?>