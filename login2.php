<?php

$usuaris = ['Layani' => 'lechuga', 'Bernardes' => 'tomate', 'Di Maria' => 'cebolla', 'a' => '123'];

//$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST, 'nom');
$password = filter_input(INPUT_POST, 'pass');
$trobat = false; //Per indicar si s'ha trobat la coincidència entre names i passwords

foreach($usuaris as $x => $x_value) {//Pasa por array y lo comprueba
    if($nom === $x && $password === $x_value) {//Comprueba el nombre y el password
        $nou_id = session_id(); //A l'espera de funcionar
//        $nou_id = 1;
        //session_start($nou_id);
        session_start();
        $_SESSION['web_tenis'] = $x;
        header('Location: tenis.php');//Si concuerdan, salta al tenis
        echo $nou_id;
        $trobat = true;
        break;
    }
}
if (!$trobat){
    header('Location: login.php');//Si no concuerdan, vuelve
}
?>