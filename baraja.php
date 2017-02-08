<?php
define("JUGADORES", 2);

$baraja = array(
    "corazones" => array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"),
    "picas" => array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"),
    "diamantes" => array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"),
    "treboles" => array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K")
);
$palos = array("C", "D", "P", "T");
$numeros = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");

//echo $baraja[0][9]."<br />";

//foreach($baraja as $x => $x_value) {
////    foreach ($color as $colores) {
////        echo $colores;
////    }
//    echo $x."\n".$color."\n";
//    //echo "<br />";
//}
//$t = 0;$j = 0;
//$leng = count($baraja);
//$leng2 = count($baraja["corazones"][]);
//
//for(t;t<=$leng;$t){
//    for($j;$j<=$leng2;$j){
//      echo $baraja[t][j]."\n";
//    }  
//}
//echo "<br />";

foreach($palos as $palo) {
    foreach($numeros as $numero){
        $baraja[] = $numero.$palo;
        //echo $numero.$palo."\n";
    }
    //echo "<br />";
}
//echo count($baraja)."\n<br />";
//echo $baraja[0];

shuffle($baraja);
foreach($baraja as $b) {
    echo $b;
}
?>