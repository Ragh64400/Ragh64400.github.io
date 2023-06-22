
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
    <link rel="stylesheet" href="css/modif_produit.css">
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
  
    
      

    <title>Modification produit admin</title>
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

       <div class="Titre1">
                 <h1>Modification des produits</h1>
      </div>

<div class="container">
     
     
     <?php
      $SQL_SELECT="SELECT c.*, b.* 
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
        <div class="bloc_div">
           <img src="img/<?php print $img_Bouteille; ?> " id="Photo<?php echo $IdCocktails?>" alt="<?php echo $NomBouteille ?>">
           <img src="img/<?php print $images; ?> " id="Photo<?php echo $IdCocktails?>" alt="<?php echo $NomBouteille ?>">
       </div>
       <div class="bloc_text">
             <h2>Description :</h2>
             <p><?php print $Desc ?> </p>  
             <h2>Ingredient :</h2>
             <p><?php print $ingr ?> </p>  
             <div class="bloc_prix"><p class=textcocktail2> <?php print $Prix;?>€</p></div>
      <div class="bloc_modif"><a href="get.php?modif=<?php echo $IdCocktails ?>">Modification du produit</a></div>
    </div>
  </div>

<?php    
    }
?>

</div>

<footer>
          <div id="divfooter">
          <link rel="stylesheet"> <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
          <link rel="stylesheet"> <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>
          </footer>
          <script src="JS/app.js"></script>
</body>
</html>