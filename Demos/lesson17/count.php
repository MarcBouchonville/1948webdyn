<?php
// rem: génére un code HTML non valide
if( ! isset($_COOKIE['count'])) {
    $count = 1;
} else {
    $count = $_COOKIE['count'] + 1;
}
setcookie("count", $count);
echo $count;