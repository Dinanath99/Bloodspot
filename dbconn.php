<?php
$host = "127.0.0.1";
$db = "bloodspot";
$user = "root";
$pass = "";
$dsn = "mysql:host=$host;dbname=$db;";
$pdo = new PDO($dsn, $user, $pass);
?>