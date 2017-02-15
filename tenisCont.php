
use DateTime;
<?php
//$puntsUltim = (isset($_COOKIE["puntsUltim"]))?$puntsUltim = $_COOKIE["puntsUltim"]:$puntsUltim="";
$puntsUltim = filter_input(INPUT_COOKIE, "puntsUltim", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$enviar = filter_input(0, 'submit');//El 0 és INPUT_POST

if(isset($enviar)){ //Marca jugador1
    //funció per calcular el temps entre el punt i l'inici de la partida
    function temps() {
          if(!$puntsUltim) {
              $puntsUltim = new DateTime('s');
          }else{
              $dt = new DateTime('s');
          }
    }
    $punto1 = $_REQUEST['punto1'];
//    $punto1 = filter_input(INPUT_POST, 'punto1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    setcookie("puntsUltim", "El jugador 1 ha marcat: ".$punt1, time()+(3600*24));//Inserto cookie, expira 24 hores
    if($punto1 === "A") {
        $punto1 = 50;
    }
    $game1 = $_REQUEST['game1'];
//    $game1 = filter_input(INPUT_POST, 'game1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $set1 = $_REQUEST['set1'];
//    $set1 = filter_input(INPUT_POST, 'set1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $punto2 = $_REQUEST['punto2'];
//    $punto2 = filter_input(INPUT_POST, 'punto2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if($punto2 === "A") {
        $punto2 = 50;
    }
    $game2 = $_REQUEST['game2'];
//    $game2 = filter_input(INPUT_POST, 'game2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $set2 = $_REQUEST['set2'];
//    $set2 = filter_input(INPUT_POST, 'set2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    switch($punto1){
                case 0:
                    $punto1 = 15;
                    break;
                case 15:
                    $punto1 = 30;
                    break;
                case 30:
                    $punto1 = 40;
                    break;
                case 40:
                    if($punto2 == 40){
                        $punto1 = 'A';
                    } elseif ($punto2 == 50) {
                        $punto2 = 40;
                    } else {
                        $punto2 = 0;
                        $punto1 = 0;
                        $game1++; 
                        if($game1 >= 6) {
                            $game1 = 0;
                            $set1++;
                            if($set1 >= 3){
                                echo "<script>alert('Fin de la partida');</script>";
                                $set1 = 0;
                                $game1 = 0;
                                $punto1 = 0;
                                $set2 = 0;
                                $game2 = 0;
                                $punto2 = 0;
                            }
                        }
                    }
                    break;
                case 50: // Ventatge 'A'
                    $punto1 = 0;
                    $punto2 = 0;
                    $game1++; 
                    if($game1 >= 6) {
                        $game1 = 0;
                        $set1++;
                        if($set1 >= 3){
                            echo "<script>alert('Fin de la partida');</script>";
                            $set1 = 0;
                            $game1 = 0;
                            $punto1 = 0;
                            $set2 = 0;
                            $game2 = 0;
                            $punto2 = 0;
                        }
                    }
                    break;
                default:
                    break;
            } 
        } elseif(isset($_REQUEST['enviar2'])) { //Marca jugador2
            $punto1 = $_REQUEST['punto1'];
            $game1 = $_REQUEST['game1'];
            $set1 = $_REQUEST['set1'];
            $punto2 = $_REQUEST['punto2'];
            if($punto2 === "A") { 
                $punto2 = 50;               
            }
            $game2 = $_REQUEST['game2'];
            $set2 = $_REQUEST['set2'];
            switch($punto2){
                case 0:
                    $punto2 = 15;
                    break;
                case 15:
                    $punto2 = 30;
                    break;
                case 30:
                    $punto2 = 40;
                    break;
                case 40:
                    if($punto1 == 40){
                        $punto2 = 'A';
                    } elseif ($punto1 == 50) {
                        $punto1 = 40;
                    } else {
                        $punto2 = 0;
                        $punto1 = 0;
                        $game2++; 
                        if($game2 >= 6) {
                            $game2 = 0;
                            $set2++;
                            if($set2 >= 3){
                                echo "<script>alert ('Fin de la partida');</script>";
                                $set1 = 0;
                                $game1 = 0;
                                $punto1 = 0;
                                $set2 = 0;
                                $game2 = 0;
                                $punto2 = 0;
                            }
                        }
                    }
                    break;
                case 50: //Avantatge
                    $punto1 = 0;
                    $punto2 = 0;
                    $game2++; 
                    if($game2 >= 6) {
                        $game2 = 0;
                        $set2++;
                        if($set2 >= 3){
                            echo "<script>alert('Fin de la partida');</script>";
                            $set1 = 0;
                            $game1 = 0;
                            $punto1 = 0;
                            $set2 = 0;
                            $game2 = 0;
                            $punto2 = 0;
                        }
                    }
                default:
                    break;
            }    
        } else { //Principi de partida
            $set1 = 0;
            $game1 = 0;
            $punto1 = 0;
            $set2 = 0;
            $game2 = 0;
            $punto2 = 0;
        }
        ?>