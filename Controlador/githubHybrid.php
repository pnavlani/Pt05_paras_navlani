<?php
/* Paras Navlani*/
require '../hybridauth/src/autoload.php';

 require_once '../Model/connexio.php'; 

    $config = [
        'callback' => 'http://localhost/Practiques/Servidor/Pt05_paras_navlani/Controlador/githubHybrid.php',
    
        'keys' => [
            'key' => '8c87a06a9e6fd9040b35',
            'secret' => '623ddcc86a5d44672f34fbdabead071662a4ed0c',
        ],
    ];
    
    function alert(){
       echo "No s'ha pogut conectar amb el servidor de GitHub", " error";
    }
    /**
     * Funcio que comprova que el usuari i la contrasenya sigui correcte
     * @param $config array amb la configuració de l'HybridAuth
     * @return objecte amb les dades de l'usuari
     */
    session_start();

    function oauth($config){
       try {
           $github = new Hybridauth\Provider\GitHub($config);
           $github->authenticate();
           $usuari = $github->getUserProfile();
           $token = $github->getAccessToken();
           $github->disconnect();
           return [$usuari,$token];
       } catch (Exception $e) {
           echo "Error: " . $e->getMessage();
       }
    }
    
    $dades = oauth($config);
    $usuari = $dades[0];
    $token = $dades[1];

    $pdo = conectar();
    if ($usuari) {
        githubBDD($pdo, $usuari->email, $usuari->displayName, $token);
    } else {
        alert();
    }
    
    
    function githubBDD($pdo, $email, $usuari, $token){
        try {
            $pdo = conectar();
            // ara fem una consulta a la base de dades per veure si l'usuari ja existeix, si no existeix l'afegim a la base de dades.
        $stmt = $pdo->prepare("SELECT * FROM usuaris WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $comprovar = $stmt->fetch(PDO::FETCH_ASSOC);
        if($comprovar) {
            header("Location: usuari.php");
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuaris (usuari, email, token) VALUES (:usuari, :email, :token)");
            $stmt->bindValue(':usuari', $usuari);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':token', $token['access_token']);
            $stmt->execute();
            header("Location: usuari.php");
        }
            $_SESSION['usuari'] = $usuari;
            $_SESSION['email'] = $email;
            $_SESSION['token'] = $token;
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    

    

?>