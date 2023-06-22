   <!-- Connexion bdd php -->
   <?php
     require_once("Connexionbdd/connex.php");
     session_start();
    
     $Connexion = "Connexion";
     $contact = "Contact";
     $erreur = "";
     
     if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))){
         $Connexion = "Deconnexion";
         $contact = "Contact";
     }
     
     if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
         $Connexion = "Deconnexion";
         $_SESSION['MailA']="ADMINISTRATEUR";
         $contact = "Admin";
     }
     
     if(!isset($_SESSION['Mail']) && !isset($_SESSION['MailA'])) {
         $_SESSION['Mail']="";
         unset($_SESSION['Mail']);
         $_SESSION['MailA']="";
         unset($_SESSION['MailA']);
     }


     if (isset($_GET["err"])==1){
      $erreur="Message envoyé avec succès !";
    
    }elseif (isset($_GET["err"])==2){
      $erreur="Erreur d'envoie du message !";
    
     } else {
      $erreur="";
     }
     ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/Contact.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    <link rel="stylesheet" href="css/Footer.css">

 
    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
     <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!-- texte -->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
    
      

    <title>Contact</title>
</head>

<body>
      <!--Entete du site -->
      <header id="acceuil">
          
          <nav id="Navigation">
          
             <div id="IconCocdiv">
               <a href=""><i id="IconCoc" class="fa-solid fa-martini-glass-citrus"></i></a>
             </div>
               
             <a href="index.php" class="lienNav" onclick="toggleNav()">Accueil</a>
             <a href="index.php#Mescocktails"  class="lienNav" onclick="toggleNav()">Nos cocktails</a>
             <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
             <a href="<?php echo $contact?>.php" class="lienNav" onclick="toggleNav()"><?php echo $contact?></a>
             <a href="<?php echo $Connexion?>.php" class="lienNav" onclick="toggleNav()"><?php echo $Connexion?></a>
             <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a> 
               <div id="mail_utilisateur">

               <?php   
                if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))){
                echo $_SESSION['Mail']; }
                if  (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
               echo $_SESSION['MailA']; } ?>
             
               </div>

          </nav>

      </header>

<form action="form_contact.php" method="post">

      <label for="nom">Votre nom et prénom : </label>
      <input type="text" id="nom" name="nom" required autofocus><br>

      <label for="mail">Votre email :</label>
      <input type="email" id="mail" name="mail" required><br>

      <label for="demande">Votre message :</label>
      <textarea id="demande" name="demande" required></textarea><br>

      <input type="submit" value="Envoyer">
      <div id="msg_err"> <?php print $erreur ?> </div>
</form>


<footer>
          <div id="divfooter">
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>
</footer>

</body>

<script src="JS/app.js"></script>


</html>