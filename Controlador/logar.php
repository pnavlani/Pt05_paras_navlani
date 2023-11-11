<?php
/**
 * Autor: Paras Navlani
 */
require_once ('../Model/connexio.php'); 
require_once './autentificacioGoogle.php';

session_start();

//Ens conectem a la BDD   
$connexio = conectar();



    if(isset($_SESSION['email']) && isset($_SESSION['usuari'])){
    $email = $_SESSION['email'];
    $name = $_SESSION['usuari'];

    $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
    $stmt->execute();
    if($stmt->rowCount() == 0) {
      $stmt = $connexio->prepare("INSERT INTO usuaris (usuari, email) VALUES ('$name', '$email')");
      $stmt->execute();
    }
    $stmt->errorInfo();
}




//Validem el submit del formulari
if(isset($_POST['submit'])) {
    $correo = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    //Comprvar si els camps no estan buits
    if( empty($correo) || empty($contrasenya)) {
        echo "Omplu els camps si us plau";
    }  else {
        //Si no estan buits seguim el process de logar-se
        //Encriptem la contrasenya
        $contrasenya = hash('md5', $contrasenya);

        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$correo'");
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
/*
require 'autentificacioGoogle.php';

$stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
    $stmt->execute();
    if($stmt->rowCount() == 0) {
      $stmt = $connexio->prepare("INSERT INTO usuaris (usuari, email) VALUES ($name, $email)");
      $stmt->execute();
    }
    //Obrim la sessio
    
    $_SESSION['usuari'] = $name;
    $_SESSION['email'] = $email;

    header('Location: usuari.php');
  */

    include '../Vista/logar.vista.php';

?>