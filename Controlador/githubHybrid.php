<?php
/* Paras Navlani*/
require '../hybridauth/src/autoload.php';

/* require_once '../Model/connexio.php'; */

    $config = [
        'callback' => 'http://localhost/Practiques/Servidor/Pt05_paras_navlani/Controlador/usuari.php',
    
        'keys' => [
            'key' => '8c87a06a9e6fd9040b35',
            'secret' => '623ddcc86a5d44672f34fbdabead071662a4ed0c',
        ],
    ];

    $login = oauth($config);
    $pdo = conectar();
    $email = $login->email;
    $username = $login->displayName;
    iniciSessioOauth($pdo, $email, $username);
   
   

    function alert(){
        missatge("No s'ha pogut conectar amb el servidor de GitHub", "error");
    }
    /**
     * Funcio que comprova que el usuari i la contrasenya sigui correcte
     * @param $config array amb la configuració de l'HybridAuth
     * @return objecte amb les dades de l'usuari
     */
    function oauth($config){
       $github = new Hybridauth\Provider\GitHub($config);
        $github->authenticate();
        $usuari = $github->getUserProfile();
        $github->disconnect();
        githubBDD($pdo, $email, $username);
        return $usuari;
    }

    githubBDD($pdo, $email, $username){
     // ara fem una consulta a la base de dades per veure si l'usuari ja existeix si no existeix l'afegim a la base de dades.
     $statement = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
     $statement->execute();
     if($statement->rowCount() == 0){
         $statement = $connexio->prepare("INSERT INTO usuaris (usuari, email) VALUES ('$username', '$email')");
         $statement->execute();
     }
     // finalment obrirem una sessio amb aquest usuari.
     session_start();
     $_SESSION['usuari'] = $username;
     $_SESSION['email'] = $email;
     // i redirigirem a la pagina de l'usuari.
    }





    

?>