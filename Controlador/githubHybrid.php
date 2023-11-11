<?php
/* Paras Navlani*/
require_once '../vendor/autoload.php';

use Hybridauth\Hybridauth;

$config = [
    'callback'=> 'http://localhost/githubHybrid.php',
    'providers'=> [
        'Github' => [
            'enabled' => true,
            'keys' => [
                'id' => '',
                'secret'=> '',
            ]
        ]
    ]
    ];


    $hybridauth = new Hybridauth($config);

    if($_SERVER['REQUEST_METHOD'] === 'POST ') {
        $adapter = $hybridauth->authenticate('Github');
        $userProfile = $adapter->getUserProfile();

        $_SESSION['email'] = $userProfile->email;

        header('Location: usuari.php');
        exit;
    }else if(isset($_GET['logout'])){

        $hybridauth->disconnectAllAdapters();
        header('Location: logar.php');
        exit;
    }else{
          // Mostra un formulari per a iniciar sessió
        echo '<form method="post" action="githubHybrid.php">';
        echo '<input type="submit" value="Iniciar sessió amb GitHub">';
        echo '</form>';
    }
    

?>