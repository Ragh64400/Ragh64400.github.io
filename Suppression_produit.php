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

if (!empty($_GET['action'])){
   $action = "Produit supprimé";
    }else{
     $action = "";
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
               <a href="admin.php" class="lienNav" onclick="toggleNav()">Admin</a>
               <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
               <a href="<?php echo $ConnexionA?>.php" class="lienNav" onclick="toggleNav()"><?php echo $ConnexionA?> 
               <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
               <div id="mail_utilisateur"><?php echo $_SESSION['MailA']; ?></div>
          
          </nav>
      </header>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/Modif_produit.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    <link rel="stylesheet" href="css/Footer.css">
    <title>Modification produit</title>
</head>
<body>
<div id="actionsup"><?php print $action  ?></div>
<form>
<div class="container">
<?php
      $SQL_SELECT = "SELECT c.*, b.*
      FROM cocktails AS c
      JOIN bouteilles AS b ON c.ID = b.ID_B
      WHERE 1";
      $resultat=mysqli_query($db,$SQL_SELECT);
      while ($enrg=mysqli_fetch_assoc($resultat)){
      $IdCocktails=$enrg['ID'];
      $Nom=$enrg["Nom"];
      $images=$enrg['Images']; 
      $NomBouteille=$enrg["NomBouteille"];
      $img_Bouteille=$enrg['ImgBouteille']; 
      $Desc=$enrg['Descriptions'];
      $Prix=$enrg['Prix'];
      $ingr=$enrg['Ingredients'];
      
   ?>

               
             


	 <div class="bloc_bouteille">
    
		 <div class="bloc_img">
        
                 <img src="img/<?php print $img_Bouteille; ?> " id="Photo<?php echo $IdCocktails?>" alt="<?php echo $NomBouteille ?>">
              
                  <img src="img/<?php print $images; ?> " id="Photo<?php echo $IdCocktails?>" alt="<?php echo $NomBouteille ?>">
                  <div>
                  <a href="Verif_sup.php?sup=<?php echo $IdCocktails ?>">Supprimer produit</a> 
                 </div>
           </div>

			<div class="bloc_text"><p class=textcocktail2>Numero ID cocktail : <?php print $IdCocktails;?></p></div>
          
          
	 </div>

<?php    
}
?>
</div>
</form>
<script src="JS/app.js"></script>
</body>
</html>