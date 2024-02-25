<?php
 /*Paras Navlani */
 //FITXER CONFIG GOOGLE OAUTH2
  require_once '../Controlador/googleAuth.php';
 require_once '../Model/connexio.php';

  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    //Continua nomes si 'acces_token' esta present
    if (isset($token['access_token'])) {
        $client->setAccessToken($token['access_token']);
    $client->setAccessToken($token['access_token']);
  
    //aconseguir info de perfil
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
      'usuari' => $google_account_info['givenName'],
      'email' => $google_account_info['email'],
      'token' => $google_account_info['id'],
    ];
    $connexio = conectar();
    $statement = $connexio->prepare("SELECT * FROM usuaris WHERE email = '{$userinfo['email']}'");
    $statement->execute();
    if($statement->rowCount() == 0){
      $statement = $connexio->prepare("INSERT INTO usuaris (usuari, email, token) VALUES ('{$userinfo['usuari']}', '{$userinfo['email']}', {$userinfo['token']})");

        $statement->execute();
        if ($statement) {
          $token = $userinfo['token'];
          header('Location: ../Controlador/usuari.php');
        } else {
          echo "User is not created";
          die();
        }

    }else{
      
      $userinfo = $statement->fetch(PDO::FETCH_ASSOC);
      $token = $userinfo['token'];
      header('Location: ../Controlador/usuari.php');
    }
 
    //guardem la dada de usuari en la sessio
    $_SESSION['user_token'] = $token;
  }
  } else {
    if (!isset($_SESSION['user_token'])) {
      header("Location: ../index.php");
      die();
    }
  
    // comprovem si usuari existeix en la bdd
    $statement = $connexio->prepare("SELECT * FROM usuaris WHERE token ='{$_SESSION['user_token']}'");
    $statement->execute();
    if ($statement->rowCount() > 0) {
      // usuari existeix
      $userinfo = $statement->fetch(PDO::FETCH_ASSOC);
    }
  }

 
?> 
