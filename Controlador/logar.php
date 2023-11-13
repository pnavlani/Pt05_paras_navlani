<?php
/**
 * Autor: Paras Navlani
 */
require_once ('../Model/connexio.php'); 
/* require_once './autentificacioGoogle.php'; */

session_start();
//Ens conectem a la BDD   
$connexio = conectar();
$error = "";
$secret = "6LfbtQwpAAAAAI8RVQVwIoSB89MIZohulyWFylz5";

//Validem el submit del formulari
if(isset($_POST['submit']) && $error == '') {
    $correo = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    //Comprvar si els camps no estan buits
    if( empty($correo) || empty($contrasenya)) {
        $error =  "Omplu els camps si us plau";
    }  else {
        //Si no estan buits seguim el process de logar-se
        //Encriptem la contrasenya
        $contrasenya = hash('md5', $contrasenya);

        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$correo' AND contrasenya = '$contrasenya'");
        $stmt->execute();

        if($stmt->rowCount() == 1) {
        $usuari = $stmt->fetch(PDO::FETCH_ASSOC);
       // session_start();
        $_SESSION['id'] = $usuari['id'];
        $_SESSION['usuari'] = $usuari['usuari'];
        $_SESSION['email'] = $usuari['email'];
        $_SESSION['contrasenya'] = $usuari['contrasenya'];
        $_SESSION['intents'] = 0; //Reiniciar el comptador d'intents
        //Una vegada iniciat sessió ens anem cap la pagina d'usuari
        header('Location: usuari.php');
        }else{
        $_SESSION['intents']++;
        $error = "L'usuari no existeix o la contrasenya es incorrecte";
        }
    } 
}

    // Initcialització de Recaptcha
    if (!isset($_SESSION['intents'])) {
        $_SESSION['intents'] = 0;
    }

   //Validacio de Recaptcha
    function validar_recaptcha($secret, $captcha, $ip) {
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        if(!$responseKeys["success"]) {
            return false;
        } else {
            return true;
        }
    }
    //En el cas de que es passi més de tres intents doncs es mostrarà el recaptcha
    if($_SESSION['intents'] >= 3) {
        if(isset($_POST['g-recaptcha-response'])) {
            $captcha =  $_POST['g-recaptcha-response'];
            if(!$captcha || !validar_recaptcha($secretKey, $captcha, $_SERVER['REMOTE_ADDR'])){
                $error .= "S'ha de validar el ReCaptcha";
            }
        } else {
            $error .= "S'ha de validar el ReCaptcha";
        }
    }

    include '../Vista/logar.vista.php';

?>