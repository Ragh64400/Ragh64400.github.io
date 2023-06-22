<?php
require_once("Connexionbdd/connex.php");
$modif = $_GET["modif"];
$Upload = "img";
$acceptableFiles = ["image/png"];
session_start();



/* Securité session adm */
/* Variable déclaré et pas vide */
if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))) {
    $ConnexionA = "Deconnexion";
    $_SESSION['MailA'] = "ADMINISTRATEUR";
} else {
    $ConnexionA = "Connexion";
    $_SESSION['MailA'] = "";
    header("location:index.php");
    session_destroy();
}

if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $nom = trim(mysqli_real_escape_string($db, $_POST["nom"]));
    $bnom = true;
} else {
    $bnom = false;
}

if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $tmp_image=$_FILES['image']['tmp_name'];
    $name = basename($_FILES['image']['tmp_name']);
    $ext = end(explode('.', $_FILES["image"]["name"]));
    $name = str_replace("tmp", $ext, $name);
    move_uploaded_file($tmp_image, "$Upload/$name");
    $image = $name;
} else { 
    $bimage = false;
}


if (isset($_POST["nom_bouteille"]) && !empty($_POST["nom_bouteille"])) {
    $nom_bouteille = trim(mysqli_real_escape_string($db, $_POST["nom_bouteille"]));
    $bnom_bouteille = true;
} else {
    $bnom_bouteille = false;
}

if ($_FILES["image_bouteille"]["error"] == UPLOAD_ERR_OK) {
    $tmp_image=$_FILES['image_bouteille']['tmp_name'];
    $name = basename($_FILES['image_bouteille']['tmp_name']);
    $ext = end(explode('.', $_FILES["image_bouteille"]["name"]));
    $name = str_replace("tmp", $ext, $name);
    move_uploaded_file($tmp_image, "$Upload/$name");
    $image_bouteille = $name;
} else { 
    $bimage_bouteille = false;
}

if (isset($_POST["description"]) && !empty($_POST["description"])) {
    $description = trim(mysqli_real_escape_string($db, $_POST["description"]));
    $bdescription = true;
} else {
    $bdescription = false;
}

if (isset($_POST["prix"]) && !empty($_POST["prix"])) {
    $prix = trim(mysqli_real_escape_string($db, $_POST["prix"]));
    $bprix = true;
} else {
    $bprix = false;
}

if (isset($_POST["ingredients"]) && !empty($_POST["ingredients"])) {
    $ingredients = trim(mysqli_real_escape_string($db, $_POST["ingredients"]));
    $bingredients = true;
} else {
    $bingredients = false;
}

$SQL_INSERTC = "INSERT INTO `cocktails` (`Nom`,`Images`,`Descriptions`,`Ingredients`) VALUES ('$nom','$image','$description','$ingredients')";

$SQL_INSERTB = "INSERT INTO `bouteilles` (`NomBouteille`, `ImgBouteille`, `Prix`) VALUES ('$nom_bouteille','$image_bouteille','$prix')";

/* Sécurité de connexion pour éviter l'ajout aléatoire */
if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))) {
    $resc = mysqli_query($db, $SQL_INSERTC);
    $resb = mysqli_query($db, $SQL_INSERTB);
    header("location:admin.php?add=ok");
} else {
    header("location:index.php");
    session_destroy();
    $resc = "Erreur";
    $resb = "Erreur";
}
?>
    <script src="JS/app.js"></script>
</body>
</html>


