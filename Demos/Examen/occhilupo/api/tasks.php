<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=organisation;charset=utf8", 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM task");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    //var_dump($results);
    echo json_encode($results);
} catch (PDOException $e) {
    header("Location: HTTP/1.1 500 try later" + $e->getMessage());
}