<!-- Autor: Paras Navlani -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inciar la Sessió</title>
    <link rel="stylesheet" href="../Estils/formulari.css">
    <!-- Script ReCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>Iniciar Sessió</h1>
    <div>
    <form method="post" action="../Controlador/logar.php">

       <label> Email</label>
        <input type="text" id="email" name="email" placeholder="Email">
        <label> Contrasenya</label>
        <input type="password" id="contrasenya" name="contrasenya" placeholder="Contrasenya">
       
        <!-- Recaptcha -->
        <?php if($_SESSION['intents'] >= 3){ ?>
        <div class="g-recaptcha" data-sitekey="6LfbtQwpAAAAADK7SFB31j2ivquNW3rQIVHsqw8L"></div>
        <?php } ?>

        <input type="submit" value="Inciar Sessió" name="submit">
        <input type="button" value="Tornar enrere"  onclick="window.location.href='../index.php'"> 
        <input type="button" value="Recuperar Contrasenya"  onclick="window.location.href='recuperar.php'"> 
          <!-- Google Oauth2 -->
         <div class="enllaç">
         <img src="../img/ui.svg">
         <?php require '../Controlador/autentificacioGoogle.php'?>
       <a href="<?php echo $client->createAuthUrl() ?>">Iniciar sessió amb Google</a> 
       </div>  
        <!-- GitHub HybridAuth -->
       <div class="enllaç">
        <a href="../Controlador/githubHybrid.php">Iniciar sessió amb GitHub</a>
       </div>

       <?php if (!empty($error)) { 
                echo $error; 
             } ?>

  </form>

  



</div>
  
</body>
</html>