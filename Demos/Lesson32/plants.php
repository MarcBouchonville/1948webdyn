<?php

$filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '%';


try {
    $con = new PDO("mysql:host=localhost;dbname=DBTest;charset=utf8", "root", "root");
    if ($conn->connect_error) {
        die("Connexion impossible: " . $conn->connect_error);
    } 
    echo "Connexion Ok";

    $stmt = $con->prepare("select * from Table01 where ? LIMIT 10");
    $stmt->execute([$filter]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    echo json_decode($result);
} catch (exception $ex) {
        header("http://1.1 500 data indisponible");
}


?>