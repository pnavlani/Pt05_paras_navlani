<?php
/* Paras Navlani */
   $estat = session_status();
   if($estat != PHP_SESSION_NONE){
   }else{
    session_start();
   } 
/*
   $SESSION['email'] = $_GET['email'];
   $SESSION['token'] = $_GET['token'];
   */
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Estils/formulari.css">
        <title>Recuperació de contrasenya</title>
    </head>
    <body>
        <form action="../Controlador/recuperar.php" method="post">
            <h2>Recuperar contrasenya</h2>
            <label>Adreça de correu electrònic</label>
            <input type="email" id="email" name="email" placeholder="Email">
            <button type="submit" name="recuperar-contrasenya">Enviar</button>
            <input type="button" value="Tornar a Inici de la Pagina"  onclick="window.location.href='../index.php'"> 
        </form>
    </body>
    </html>