<?php
  /* Connexion bdd php */
     require_once("Connexionbdd/connex.php");
     session_start();
   
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
    <link rel="stylesheet" href="css/Modif_boutique.css">
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


    <header id="acceuil">
          
          <nav id="Navigation">
          
             <div id="IconCocdiv">
               <a href=""><i id="IconCoc" class="fa-solid fa-martini-glass-citrus"></i></a>
             </div>
               
               <a href="index.php" class="lienNav" onclick="toggleNav()">Accueil</a>
               <a href="Inscription_admin.php"  class="lienNav" onclick="toggleNav()">Inscription admin</a>
               <a href="admin.php" class="lienNav" onclick="toggleNav()">Admin</a>
               <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
               <a href="<?php echo $ConnexionA?>.php" class="lienNav" onclick="toggleNav()"><?php echo $ConnexionA?></a>
               <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
               <div id="mail_utilisateur"><?php echo $_SESSION['MailA']; ?></div>
          
          </nav>
      </header>



  

	<h1>Ajouter un produit</h1>

<form method="post" action="Ajout_boutique.php" enctype="multipart/form-data">
        
 <fieldset>
      <legend>Le cocktail</legend>
		  <label for="nom">Nom du produit:</label><br>
		  <input type="text" id="nom" name="nom" required><br>

      <label for="description">Description:</label><br>
		  <textarea id="description" name="description" required></textarea><br>
	
    <fieldset> 
      <legend>Inserez les ingrédients en séparant simplement d'un espace</legend>
		  <label for="ingredients">Ingrédients:</label><br>
		  <textarea id="ingredients" name="ingredients" required></textarea><br>
    </fieldset> 

    <fieldset>
      <legend>Selectionner votre image</legend>
		  <label for="image">Image du produit:</label><br>
		  <input type="file" id="image" name="image" required><br>
    </fieldset>
 </fieldset>
  
 <fieldset>
      <legend>La bouteille</legend>
		  <label for="nom_bouteille">Nom de la bouteille:</label><br>
		  <input type="text" id="nom_bouteille" name="nom_bouteille" required><br>

    <fieldset> 
      <legend>Selectionner votre image</legend>
      <label for="image_bouteille">Image de la bouteille:</label><br>
		  <input type="File" id="image_bouteille" name="image_bouteille" required><br>
    </fieldset> 

    <fieldset>
      <legend>Inserez le prix sans € </legend>
		  <label for="prix">Prix:</label><br>
		  <input type="number" id="prix" name="prix" step="0.01" min="0" required><br>
    </fieldset>
 </fieldset> 
    
  

		<input type="submit" value="Ajouter">
</form>

	<footer>
          <div id="divfooter">
         <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
         <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>

    </footer>
          <script src="JS/app.js"></script>
