<?php
    include('dbconn.php');

    $name = strtolower($_POST['search']);
    
    $stmt =$pdo->prepare("SELECT * FROM donatelist where lower(name) LIKE :name");
    $stmt->bindParam(':name', $name_like);
    $name_like = '%' . $name . '%';
    $stmt -> execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>