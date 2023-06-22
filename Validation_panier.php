<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    
    <!-- Connexion bdd php -->
    <?php
    
     require_once("Connexionbdd/Connex.php");
     session_start();
     $paiement = "https://buy.stripe.com/test_3cs5lRgzeaJz48g8ww";
     
     if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))){
         $Connexion = "Deconnexion";
         $contact = "Contact";
         
     }
     
     if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
         $Connexion = "Deconnexion";
         $_SESSION['MailA']="ADMINISTRATEUR";
         print "Jo tu dois faire le panier";
     }
     
     if(!isset($_SESSION['Mail']) && !isset($_SESSION['MailA'])) {
       header("location:connexion.php");
        
     }

    
     ?>
     <a href="<?php print $paiement ?>">Paiement</a>