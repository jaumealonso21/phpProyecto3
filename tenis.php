<?php 
$puntsUltim = (isset($_COOKIE["puntsUltim"]))?$puntsUltim = $_COOKIE["puntsUltim"]:$puntsUltim="";
$jocUltim = (isset($_COOKIE["jocUltim"]))?$jocUltim = $_COOKIE["jocUltim"]:$jocUltim="";
$setUltim = (isset($_COOKIE["setUltim"]))?$setUltim = $_COOKIE["setUltim"]:$setUltim="";

//session_start($nou_id);
session_start();
if (!isset($_SESSION['web_tenis'])) {
   header('Location: login.php');//Si no està iniciada la sessió, torna
 } else {
    echo "Iniciada la sessió ".$_SESSION['web_tenis'];//Indica si inicia la sessió
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tenis</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        function ptoCookie() { //Funció que  afegeix cookie en marcar punt
            $puntsUltim = date('s');
            setcookie("puntsUltim", "L'ùltim punt marcat:".$puntsUltim." s", time()+(3600*24));//Inserto cookie, expira 24 hores
        }
        function jocCookie() { //Funció que  afegeix cookie en marcar joc
            $jocUltim = date('s');
            setcookie("jocUltim", "L'ùltim joc marcat:".$jocUltim." s", time()+(3600*24));//Inserto cookie, expira 24 hores
        }
        function estCookie() { //Funció que  afegeix cookie en marcar set
            $setUltim = date('s');
            setcookie("setUltim", "L'ùltim set marcat:".$setUltim." s", time()+(3600*24));//Inserto cookie, expira 24 hores
        }
        //$pto = 15;
        if(isset($_REQUEST['enviar1'])){ //Marca jugador1
            $punto1 = $_REQUEST['punto1'];
            if($punto1 === "A") {
                $punto1 = 50;
            }
            $game1 = $_REQUEST['game1'];
            $set1 = $_REQUEST['set1'];
            $punto2 = $_REQUEST['punto2'];
            $game2 = $_REQUEST['game2'];
            $set2 = $_REQUEST['set2'];
            switch($punto1){
                case 0:
                    $punto1 = 15;
                    ptoCookie();
                    break;
                case 15:
                    $punto1 = 30;
                    ptoCookie();
                    break;
                case 30:
                    $punto1 = 40;
                    ptoCookie();
                    break;
                case 40:
                    if($punto2 == 40){
                        $punto1 = 'A';
                        ptoCookie();
                    } else {
                        $punto2 = 0;
                        $punto1 = 0;
                        $game1++;
                        jocCookie();
                        if($game1 >= 6) {
                            $game1 = 0;
                            $set1++;
                            estCookie();
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
                case 50:
                    $punto1 = 0;
                    $punto2 = 0;
                    $game1++;
                    jocCookie();
                    if($game1 >= 6) {
                        $game1 = 0;
                        $set1++;
                        estCookie();
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
            $game2 = $_REQUEST['game2'];
            $set2 = $_REQUEST['set2'];
            switch($punto2){
                case 0:
                    $punto2 = 15;
                    ptoCookie();
                    break;
                case 15:
                    $punto2 = 30;
                    ptoCookie();
                    break;
                case 30:
                    $punto2 = 40;
                    ptoCookie();
                    break;
                case 40:
                    if($punto1 == 40){
                        $punto2 = "A";
                        ptoCookie();
                    } else {
                        $punto2 = 0;
                        $punto1 = 0;
                    }
                    $game2++;
                    jocCookie();
                    if($game2 >= 6) {
                        $game2 = 0;
                        $set2++;
                        estCookie();
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
                    break;
                case A:
                    $punto1 = 0;
                    $punto2 = 0;
                    break;
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
        <h1>Marcador</h1>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
                <label>Set1</label><input type="text" name="set1" value="<?php echo $set1 ?>" />
                <label>Game1</label><input type="text" name="game1" value="<?php echo $game1 ?>"/>
                <label>Punto1</label><input type="text" name="punto1" value="<?php echo $punto1 ?>" />
                <input type="submit" value="Pto Jug1" name="enviar1" />
                <br />
                <label>Set2</label><input type="text" name="set2" value="<?php echo $set2 ?>" />
                <label>Game2</label><input type="text" name="game2" value="<?php echo $game2 ?>" />
                <label>Punto2</label><input type="text" name="punto2" value="<?php echo $punto2 ?>" />
                <input type="submit" value="Pto Jug2" name="enviar2" />
                <br />
                <?php echo $puntsUltim ?>
                <br />
                <?php echo $jocUltim ?>
                <br />
                <?php echo $setUltim ?>
            </form>
        </div>
    </body>
</html>

