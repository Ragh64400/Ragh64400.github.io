<?php

require_once("Connexionbdd/connex.php");
session_start();
$sup=$_GET["sup"];


$SQL_DELETE = "DELETE c, b
               FROM cocktails AS c
               JOIN bouteilles AS b ON c.ID = b.ID_B
               WHERE c.ID = $sup";


 /* Sécurité de connexion */
if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
	$resultat=mysqli_query($db,$SQL_DELETE);
	header("location:Suppression_produit.php?action=ok");

}else{

     header("location:index.php?action=pasok");
     session_destroy();
     $resultat = "Erreur";

}
   
    

