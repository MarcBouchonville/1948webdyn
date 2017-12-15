<?php

$jour_de_la_semaine = [
    1 => "lundi",
    2 => "mardi",
    3 => "mercredi",
    4 => "jeudi",
    5 => "vendredi",
    6 => "samedi",
    7 => "dimanche"
];
echo "<ul>\n";
foreach ($jour_de_la_semaine as $nr => $jour) {
    echo "\t<li>$nr : $jour</li>\n";
}
echo "</ul>\n";
