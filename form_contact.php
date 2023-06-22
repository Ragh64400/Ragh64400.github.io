<?php

require_once("Connexionbdd/Connex.php");

$date = date('Y-m-d H:i:s');

if (isset($_POST["mail"]) && !empty($_POST["mail"])){
    $mail = trim(mysqli_real_escape_string($db, $_POST["mail"]));
    $bmail = true;
} else {
    $bmail = false;
}

if (isset($_POST["nom"]) && !empty($_POST["nom"])){
    $nom = trim(mysqli_real_escape_string($db, $_POST["nom"]));
    $bnom = true;
} else {
    $bnom = false;
}

if (isset($_POST["demande"]) && !empty($_POST["demande"])){
    $demande = trim(mysqli_real_escape_string($db, $_POST["demande"]));
    $bdemande = true;
} else {
    $bdemande = false;
}

$SQL_INSERT = "INSERT INTO `contact`(`Date`,`Mail_C`, `Nom_C`, `Message_C`) VALUES ('$date','$mail','$nom','$demande')";

$res = mysqli_query($db, $SQL_INSERT);

if ($res){
    header("location:Contact.php?err=1");
} else {
    header("location:Contact.php?err=2");
}


?>