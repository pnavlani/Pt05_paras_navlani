<?php
/*Paras Navlani */
//Fitxer Config de Google OAuth
  require_once '../vendor/autoload.php';
 
  require_once '../Model/connexio.php';
  

  $clientID = '1075172545438-5gd1hj048psvo03m2f2ddd1kgacnqrfv.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/Practiques/Servidor/Pt05_paras_navlani/Controlador/autentificacioGoogle.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 $pdo = conectar();
?>