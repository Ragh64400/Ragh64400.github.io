<?php
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
      $modif = $_GET["modif"];
      
      
     

      
      $SQL_SELECT = "SELECT c.*, b.NomBouteille, b.ImgBouteille, b.Prix
               FROM cocktails AS c
               JOIN bouteilles AS b ON c.ID = b.ID_B
               WHERE c.ID = ".$modif;
      $resultat=mysqli_query($db,$SQL_SELECT);
     $enrg=mysqli_fetch_assoc($resultat);
    if ($resultat){
         
            $IdCocktails=$enrg['ID'];
            $Nom=$enrg["Nom"];
            $images=$enrg['Images']; 
            $NomBouteille=$enrg["NomBouteille"];
            $img_Bouteille=$enrg['ImgBouteille']; 
            $Desc=$enrg['Descriptions'];
            $Prix=$enrg['Prix'];
            $ingr=$enrg['Ingredients'];
    } else{   
        header("location:Modification_produit.php?action=pasok");
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
    
    <!-- Connexion bdd php -->
   

    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
     <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

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




    <h1>Modifier un produit</h1>
	<form method="post" action="Traitement_produit.php?modif=<?php echo $IdCocktails ?>">




        
        
        <fieldset> 
		<label for="nom">Nom du produit:</label><br>
		<input type="text" id="nom" name="nom" value="<?=$Nom ?>" required><br>
       
       
		<label for="image">Image du produit:</label><br>
		<input type="text" id="image" name="image" value="<?= $images ?>" required><br>
        </fieldset> 
        <fieldset> 
        <label for="image_bouteille">Image de la bouteille:</label><br>
		<input type="text" id="image_bouteille" name="image_bouteille" value="<?= $img_Bouteille ?>" required><br>
         

         
		<label for="nom_bouteille">Nom de la bouteille:</label><br>
		<input type="text" id="nom_bouteille" name="nom_bouteille" value="<?=$NomBouteille ?>" required><br>
     
		<label for="description">Description:</label><br>
		<textarea id="description" name="description" echo required><?php echo $Desc ?></textarea><br>
        </fieldset> 
   
        <fieldset> 
		<label for="prix">Prix:</label><br>
		<input type="number" id="prix" name="prix" step="0.01" min="0" value="<?= $Prix ?>" required><br>
      
        
		<label for="ingredients">Ingrédients:</label><br>
		<textarea id="ingredients" name="ingredients" required><?php echo $ingr ?></textarea><br>
        </fieldset> 

		<input type="submit" value="Modifier">
	</form>     
    <script src="JS/app.js"></script>
</body>
</html>