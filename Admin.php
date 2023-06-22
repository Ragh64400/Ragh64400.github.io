<?php
     require_once("Connexionbdd/connex.php");
     session_start();
     
   /* Securité session adm */
   /* Variable déclaré et pas vide */
     if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
      $ConnexionA = "Deconnexion";
      $_SESSION['MailA']="ADMINISTRATEUR";
      }else{
      $ConnexionA = "Connexion";
      $_SESSION['MailA']="";
      header("location:index.php");
      session_destroy();
      }

   ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/Footer.css">
    <!-- Connexion bdd php -->
   

    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
     <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!-- texte -->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
    
      

    <title>Coctail Jo</title>
</head>



<body>
      <!--Entete du site -->
      <header id="acceuil">
          
          <nav id="Navigation">
          
             <div id="IconCocdiv">
               <a href=""><i id="IconCoc" class="fa-solid fa-martini-glass-citrus"></i></a>
             </div>
               
               <a href="index.php" class="lienNav" onclick="toggleNav()">Accueil</a>
               <a href="Inscription_admin.php"  class="lienNav" onclick="toggleNav()">Inscription admin</a>
               <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
               <a href="admin.php" class="lienNav" onclick="toggleNav()">Admin</a>
               <a href="<?php echo $ConnexionA?>.php" class="lienNav" onclick="toggleNav()"><?php echo $ConnexionA?></a>
               <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
               <div id="mail_utilisateur"><?php echo $_SESSION['MailA']; ?></div>
          
          </nav>
      </header>


      <section>
            <div class="container_admin">
                  <div class="Element_modif">
                     <div id="Element_modif1"><a href="Formulaire_boutique.php">Ajouter un produit</a></div>
                   </div>

                  <div class="Element_modif">
                     <div id="Element_modif2"><a href="Modification_produit.php">Modifier un produits</a></div>
                  </div>

                  <div class="Element_modif">
                    <div id="Element_modif3"><a href="Suppression_produit.php">Supprimer un produit</a></div>
                  </div>
                  <div class="Element_modif">
                    <div id="Element_modif4"><a href="afficher_messages.php">Message</a></div>
                  </div>
            </div>
      </section>

      <footer>
          <div id="divfooter">
         <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
         <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>
          </footer>
          <script src="JS/app.js"></script>
</body>
</html>