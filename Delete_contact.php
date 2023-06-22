<?php
require_once("Connexionbdd/Connex.php");

$sup=$_GET["sup"];

$SQL_DELETE="DELETE FROM `contact` WHERE IdUser_C=$sup";

if ($res=mysqli_query($db,$SQL_DELETE)){
    header("location:afficher_messages.php");
} else {
    header("location:afficher_messages.php?err=erreur");
}




?>