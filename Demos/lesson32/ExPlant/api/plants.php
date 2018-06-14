<?php

$filter = '%' . filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '%';
$limit = intval(filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_NUMBER_INT));
$limit = ($limit > 0) ? $limit : 10;
$offset = intval(filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_NUMBER_INT));
$offset = ($offset >= 0) ? $offset : 0;

try {
    $conn = new PDO("mysql:host=localhost;dbname=plant;charset=utf8", 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM plant WHERE familiar_name LIKE :filter "
            . "LIMIT :offset,:limit");
    $stmt->bindValue(':filter', $filter);
    $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
    $stmt->bindValue(':limit', intval($limit), PDO::PARAM_INT);
    $stmt->execute();
    // FETCH_ASSOC => un tableau association
    // $tableau_associatif = ['a' => 'A', 'b' => 'B'];
    // retourne un tableauu associatif :
    // [ 
    //      [colonne1 => valeur_col1, colonne2 => valeur_col2, ...]
    //      [colonne1 => valeur_col1, colonne2 => valeur_col2, ...]
    //      [colonne1 => valeur_col1, colonne2 => valeur_col2, ...]
    // ]
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    // var_dump($results);
    echo json_encode($results);
} catch (PDOException $e) {
    header("Location: HTTP/1.1 500 try later" + $e->getMessage());
}

