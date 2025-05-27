<?php
    $host="localhost";
    $dbname = "bozhya_niva";
    $user = "root";
    $password = "";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "OK";
        return $pdo;
    }catch(PDOException $ex) {
        echo $ex->getMessage();
    }