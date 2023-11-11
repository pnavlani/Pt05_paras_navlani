<?php
 /*Paras Navlani */
  require_once 'googleAuth.php';
 require_once '../Model/connexio.php';

  

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // iniciar sessio

  session_start();
  $_SESSION['email'] = $email;
  $_SESSION['usuari'] = $name;
  }
  


 
?>