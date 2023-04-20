<?php
$host = "127.0.0.1";
$user = "root";
$db = "bloodspot";
$pass = "";
$dsn = "mysql:host=$host;dbname=$db;";
$pdo = new PDO($dsn, $user, $pass);


// check database connection

if ($dsn) {
    echo " connection successfully ";
} else {
    echo "connection failed";
}
?>