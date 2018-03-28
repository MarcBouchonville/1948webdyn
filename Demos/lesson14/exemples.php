<?php
// code exploratoire, à exécuter dans la console
echo false;
echo true;
echo (0 == false);
echo ( 0 == true );
echo gettype(0);
echo gettype(false);
$var1 = 10;
echo gettype($var1);
$var1 = '10';
echo gettype($var1);
echo gettype('100');

if(0) { echo "vrai"; } else { echo "faux";};
if(1) { echo "vrai"; } else { echo "faux";};
if("toto") { echo "vrai"; } else { echo "faux";};
if("") { echo "vrai"; } else { echo "faux";};
if( [] ) { echo "vrai"; } else { echo "faux";};
if( ['a' => 'qlq chose'] ) { echo "vrai"; } else { echo "faux";};
$a = true;
if( $a ) { echo "phrase 1"; } else { echo "phrase 2";};
$b = false;
if( $b ) { echo "phrase 1"; } else { echo "phrase 2";};
if( true and true ) { echo "phrase 1"; } else { echo "phrase 2";};
if( true and false ) { echo "phrase 1"; } else { echo "phrase 2";};
if( false and true ) { echo "phrase 1"; } else { echo "phrase 2";};
if( false and false ) { echo "phrase 1"; } else { echo "phrase 2";};
if( true or false ) { echo "phrase 1"; } else { echo "phrase 2";};
if( ! true ) { echo "phrase 1"; } else { echo "phrase 2";};

$tab = [ 'a' => 'première lettre', 'b' => 'deuxième lettre', 'c' => 'troisième lettre' ];
var_dump($tab);
echo $tab['b'];

$tab = ['a' => 'lettre a', 'b' => 'lettre b'];
echo isset( $tab['a'] );
echo isset( $tab['c'] );
