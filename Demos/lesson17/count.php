<?php
/**
 * compte le nombre de chargement de la page (= nombre exécution du script)
 */
// rem: génére un code HTML non valide
if( ! isset($_COOKIE['count'])) {   // si le COOKIE 'count' n'existe pas => c'est le premier chargement de la page
    $count = 1;                     // initialiser la variable $count à 1
} else {                            // si le COOKIE 'count' exist => la page est chargée une nouvelle fois
    $count = $_COOKIE['count'] + 1; // assigner le COOKIE 'count' à la variable $count et ajouter 1
}
setcookie("count", $count);         // écrire le cookie
echo "La page a été chargée $count fois";                        // afficher le nombre de chargements
