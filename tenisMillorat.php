<?php require 'tenisCont.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tenis</title>
    <meta charset="UTF-8" />
</head>
<body>
<h1>Marcador</h1>
<div>
    <form action="tenisMillorat.php" method="POST"> 
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
    </form>
</div>
</body>
</html>


