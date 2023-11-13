<?php
 /*Paras Navlani */
 //FITXER CONFIG GOOGLE OAUTH2
  require_once 'googleAuth.php';
 require_once '../Model/connexio.php';

 $token = null;

// Autentificar codi de Google OAuth 
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  //Aconseguir informació d'usuari
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $token = $google_account_info->id;

 //Comprovar si l'usuari existeix 
 $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
 $stmt->execute();
 //Si l'usuari no existeix doncs s'afegirà a la BDD
 $comprovar = $stmt->fetch(PDO::FETCH_ASSOC);
 if(!$comprovar) {
     $stmt = $pdo->prepare("INSERT INTO usuaris (usuari, email, token) VALUES (:usuari, :email, :token)");
     $stmt->bindValue(':usuari', $name);
     $stmt->bindValue(':email', $email);
     $stmt->bindValue(':token', $token);
     $stmt->execute();
 }

  // Guardem Dades
  $_SESSION["token"] = $token;
  $_SESSION['email'] = $email;
  $_SESSION['usuari'] = $name;

  } else{
    if(!isset($SESSION['token'])){
    //  header('Location: index.php');
    }

    //Comprovem si el token del usuari ja existeix
    $stmt = "SELECT * FROM usuaris WHERE token='$token'";
  }
  


 
?>