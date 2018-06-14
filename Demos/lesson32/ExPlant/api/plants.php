<?php

$filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '%';

try {
    $conn = new PDO("mysql:host=localhost;dbname=plant;charset=utf8", 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM plant WHERE familiar_name LIKE ? LIMIT 10");
    $stmt->execute([$filter]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    echo json_encode($results);
} catch (PDOException $e) {
    header("HTTP/1.1 500 try later" + $e->getMessage());
}

