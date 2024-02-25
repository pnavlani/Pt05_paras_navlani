<?php
/**
 * Autor: Paras Navlani
 */
require_once('../Model/connexio.php');
require_once('../Controlador/controlador.php');
//Ens conectem a la BDD
$connexio = conectar();
//Validem el submit de formulari
if(isset($_POST['submit'])) {
    $usuari = $_POST['usuari'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];
    //Mirem per especific quin camp esta buit i si esta algun camp esta buit, doncs ho mostrara per la vista (registrar.vista.php) a traves de l'array d'errors
    if(empty($usuari) || empty($email) || empty($contrasenya) || empty($contrasenya2)) {
        if(empty($_POST['email'])){
            $errors["email"] = "Ompliu el email";
        }
    
        if(empty($_POST['usuari'])){
            $errors["usuari"] = "Ompliu el camp d'usuari";
        }

        if(empty($_POST['contrasenya'])){
            $errors["contrasenya"] = "Ompliu el camp de contrasenya";
        }

        if(empty($_POST['contrasenya2'])){
            $errors["contrasenya2"] = "Ompliu el segon camp de contrasenya";
        }
        //Comprovem si les contrasenyes coicideixen
    } else if( $contrasenya != $contrasenya2) {
        echo 'Les contrasenyes no coincideixen';
    } else {
        //Una vegada comprovat que tot esta be, doncs ens redirigim cap  a la funció de regsitrarse
        registrarse($email,$usuari,$contrasenya);
    }
    
}
    //Funcio per poder registrar-se
    function registrarse($email,$usuari,$contrasenya){
        $connexio =conectar();
        //Comprovem si l'usuari ja existeix o no
        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
            $stmt->execute();
            $comprv = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($comprv){
                echo "L'usuari ja existeix";
            }
            $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE usuari = '$usuari'");
            $stmt->execute();
            $comprv = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($comprv){
                echo "L'usuari ja existeix";
        

            } else {
                //Encriptació de la contrasenya
                $contrasenya = hash('md5', $contrasenya);
                //Si l'usuari no existeic, es registra un nou compte
                $stmt = $connexio->prepare("INSERT INTO usuaris (usuari, email, contrasenya) VALUES ('$usuari', '$email', '$contrasenya')");
                $stmt->execute();
                echo "Usuari registrat amb èxit";
            }

    }

include '../Vista/registrar.vista.php';


?>