<?php
require_once("Connexionbdd/connex.php");
$modif = $_GET["modif"];

if (isset($_POST["nom"]) && !empty($_POST["nom"])){
	$nom = trim(mysqli_real_escape_string($db, $_POST["nom"]));
	$bnom = true;
} else {
	$bnom = false;
}

if (isset($_POST["image"]) && !empty($_POST["image"])){
	$image = trim(mysqli_real_escape_string($db, $_POST["image"]));
	$bimage = true;
} else {
	$bimage = false;
}

if (isset($_POST["nom_bouteille"]) && !empty($_POST["nom_bouteille"])){
	$nom_bouteille = trim(mysqli_real_escape_string($db, $_POST["nom_bouteille"]));
	$bnom_bouteille = true;
} else {
	$nom_bouteille = false;
}

if (isset($_POST["image_bouteille"]) && !empty($_POST["image_bouteille"])){
	$image_bouteille = trim(mysqli_real_escape_string($db, $_POST["image_bouteille"]));
	$bimage_bouteille = true;
} else {
	$bnom = false;
}

if (isset($_POST["description"]) && !empty($_POST["description"])){
	$description = trim(mysqli_real_escape_string($db, $_POST["description"]));
	$bdescription = true;
} else {
	$bdescription = false;
}

if (isset($_POST["prix"]) && !empty($_POST["prix"])){
	$prix = trim(mysqli_real_escape_string($db, $_POST["prix"]));
	$bprix = true;
} else {
	$bprix = false;
}

if (isset($_POST["ingredients"]) && !empty($_POST["ingredients"])){
	$ingredients = trim(mysqli_real_escape_string($db, $_POST["ingredients"]));												
	$bingredients = true;
} else {
	$bingredients = false;
}


$SQL_UPDATE = "UPDATE cocktails AS c
               JOIN bouteilles AS b ON c.ID = b.ID_B
               SET c.Nom = '$nom', b.NomBouteille = '$nom_bouteille', c.Images = '$image', b.ImgBouteille = '$image_bouteille', c.Descriptions = '$description', b.Prix = '$prix', c.Ingredients = '$ingredients'
               WHERE c.ID = $modif";
 





$resultat=mysqli_query($db,$SQL_UPDATE);
if ($resultat){
    header("location:index.php?add=ok");
} else {
    header ("location:index.php?add=pasok");
}



?>