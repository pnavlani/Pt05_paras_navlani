<?php
/**
 * Autor: Paras Navlani
 */
require_once('Model/connexio.php');

// Establim el numero de pagina en la que l'usuari es troba, si no troba cap valor, assignem la pagina 1
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else{
    $pagina = 1;
}

//Definim quants post per pagina volem carregar
  if (isset($_GET['articles'])) {
    $limit = $_GET['articles'];
  } else {
    $limit = 5; // valor per defecte
  }  

//Calculem el número total de pagines que tindrà la paginació depenent dels articles que en aquest tenim 15 articles insertats en la BDD 
  $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? $_GET['pagina'] : 1;
  $iLimit = ($pagina-1)*$limit;
  $connexio =  conectar();
  $stmt = $connexio->prepare("SELECT * FROM articles");
  $stmt->execute();
  $totalResultats = $stmt->rowCount();
  $totalPagines = ceil($totalResultats/$limit);

/**
 * Mostrem els articles mitjançant la consulta SQL i en aquest cas en ordre de IDs
 * En el cas en que no troba articles doncs es redirigeix a localhost
 */
$stmt = $connexio->prepare('SELECT * FROM articles ORDER BY id LIMIT ?, ?');
$stmt->bindParam(1, $iLimit, PDO::PARAM_INT);
$stmt->bindParam(2, $limit, PDO::PARAM_INT);
$stmt->execute();
$articles = $stmt->fetchAll();

if (!$articles) {
  header('Location: localhost');
  exit;
}

require 'Vista/index.vista.php';

?>