<!-- Autor: Paras Navlani -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inciar la Sessió</title>
    <link rel="stylesheet" href="../Estils/formulari.css">
</head>
<body>
    <h1>Iniciar Sessió</h1>
    <div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

       <label> Email</label>
        <input type="text" id="email" name="email" placeholder="Email">
        <label> Contrasenya</label>
        <input type="password" id="contrasenya" name="contrasenya" placeholder="Contrasenya">

        <input type="submit" value="Inciar Sessió" name="submit">
        <input type="button" value="Tornar enrere"  onclick="window.location.href='../index.php'"> 
  </form>
</div>
  
</body>
</html>