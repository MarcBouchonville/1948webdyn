<?php

// TODO filter_input
$filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '%';

try {
    $con = new PDO("mysql:host=localhost;dbname=plant;charset=utf8", "root", "root");
    $stmt = $con->prepare("SELECT * FROM plant WHERE ? LIMIT 10");
    $stmt->execute([$filter]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    echo json_encode($result);
} catch (Exception $ex) {
    header("HTTP/1.1 500 unvailable - try later");
}