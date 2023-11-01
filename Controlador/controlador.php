<?php
/**
 * Autor: Paras Navlani
 */
require_once("../Model/connexio.php");

/**
 * Funcio, si l'usuari exiteix en la Base de dades de usuaris
 */
function existeixUsuariBDD($usuari){
    $connexio = conectar();
    $stmt = $connexio->prepare(`SELECT * FROM usuaris WHERE usuari = ?`);
    $stmt->execute([$usuari]);
    $usuariExistent = $stmt->fetch();
    return $usuariExistent ? true : false;
}


?>