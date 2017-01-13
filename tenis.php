<!DOCTYPE html>
<html>
    <head>
        <title>Tenis</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        //$pto = 15;
        if(isset($_REQUEST['enviar1'])){ //Marca jugador1
            $punto1 = $_REQUEST['punto1'];
            $game1 = $_REQUEST['game1'];
            $set1 = $_REQUEST['set1'];
            $punto2 = $_REQUEST['punto2'];
            $game2 = $_REQUEST['game2'];
            $set2 = $_REQUEST['set2'];
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
                case 'A':
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
                        $punto2 = "A";
                    } else {
                        $punto2 = 0;
                        $punto1 = 0;
                    }
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
            <form action="tenis.php" method="POST"> 
                <label>Set1</label><input type="text" name="set1" value="<?php echo $set1 ?>" />
                <label>Game1</label><input type="text" name="game1" value="<?php echo $game1 ?>"/>
                <label>Punto1</label><input type="text" name="punto1" value="<?php echo $punto1 ?>" />
                <input type="submit" value="Pto Jug1" name="enviar1" />
                <br />
                <label>Set2</label><input type="text" name="set2" value="<?php echo $set2 ?>" />
                <label>Game2</label><input type="text" name="game2" value="<?php echo $game2 ?>" />
                <label>Punto2</label><input type="text" name="punto2" value="<?php echo $punto2 ?>" />
                <input type="submit" value="Pto Jug2" name="enviar2" />
            </form>
        </div>
    </body>
</html>

