<?php 
/**
 * Autor: Paras Navlani
 */
// Ens connectem a la base de dades	mitjançant try...catch i fent servir PDO.
function conectar(){
    try {
       //conectem a la bd 
       $connexio = new PDO('mysql:host=localhost;dbname=Pt03_paras_navlani', 'root', '');
       $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $connexio;
       //echo "Connexio correcta!!" . "<br />";
       
   } catch(PDOException $e){ //
       // mostrarem els errors
       echo "Error al conectar a BD" . $e->getMessage();
       
   } 
   }

?>