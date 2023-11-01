<?php
/**
 * Autor: Paras Navlani
 */
session_start();
require_once ('../Model/connexio.php'); 
//Ens conectem a la BDD   
$connexio = conectar();
//Validem el submit del formulari
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    //Comprvar si els camps no estan buits
    if( empty($email) || empty($contrasenya)) {
        echo "Omplu els camps si us plau";
    }  else {
        //Si no estan buits seguim el process de logar-se
        //Encriptem la contrasenya
        $contrasenya = hash('md5', $contrasenya);

        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
        $stmt->execute();
    if($stmt->rowCount() == 1) {
       
        $usuari = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['id'] = $usuari['id'];
        $_SESSION['usuari'] = $usuari['usuari'];
        $_SESSION['email'] = $usuari['email'];
        $_SESSION['contrasenya'] = $usuari['contrasenya'];
        //Una vegada iniciat sessió ens anem cap la pagina d'usuari
        header('Location: usuari.php');
    }else{
        echo "L'usuari no existeix";
    }
} 


}

    include '../Vista/logar.vista.php';

?>