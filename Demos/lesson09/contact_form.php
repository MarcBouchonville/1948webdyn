<?php

$monText = "camel case";    // choix au cours
echo $monText . "<br>";

$mon_text = "lower_case";
echo $mon_text . "<br>";

$MonText = "Pascal case";

//$commerceDb = new PDO("mysql:host=localhost;dbname=commerce;charset=utf8", "root", "root");
//$reponse = $commerceDb->query('SELECT * FROM jeux_video');
//$donnees = $reponse->fetch();

$i = 2;

echo $i + 1 . "<br>";

echo "<a hre=''>$i+1</a><br>";

echo "<a hre=''>" . $i + 1 . "</a><br>";

echo "<a hre=''>" . ($i + 1) . "</a><br>";

//Le double guillemets permet d'interpréter les variables
echo "Voici la convention : $mon_text<br>"; // variable interprétée
echo 'Voici la convention : $mon_text<br>'; // variable pas interprétée
//le français contient des '
echo "L'arbre<br>";
echo 'L\'arbre<br>';    // ' doit être "escapé" : \'










