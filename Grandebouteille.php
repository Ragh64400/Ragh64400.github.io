<?php

require_once("Connexionbdd/connex.php");




if (isset($_GET["ref"]) && !empty ($_GET["ref"])){
    $reference=$_GET["ref"];
} else {
   header("location:index.php");
}
/* Afficher les élements grandes bouteilles */
$SQL_SELECT = "SELECT c.ID, c.Nom, c.Descriptions, c.Ingredients, b.NomBouteille, b.ImgBouteille, b.Prix
               FROM cocktails c
               JOIN bouteilles b ON c.ID = b.ID_B
               WHERE c.ID = '$reference'";
$resultat = mysqli_query($db,$SQL_SELECT);
$enrg=mysqli_fetch_assoc($resultat);
$IdCocktails=$enrg['ID'];
$Nom=$enrg["Nom"];
$NomBouteille=$enrg["NomBouteille"];
$img_Bouteille=$enrg['ImgBouteille']; 
$Desc=$enrg['Descriptions'];
$Prix=$enrg['Prix'];
$ingr=$enrg['Ingredients'];


session_start();
$paiement = "https://buy.stripe.com/test_3cs5lRgzeaJz48g8ww";
$Connexion = "Connexion";
$contact = "Contact";

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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/grandebouteille.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
     <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!-- texte -->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     
   

    <title>Nos cocktails</title>
</head>
<body>
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
                  echo $_SESSION['MailA']; }
               ?>
                
              </div>
           
          
          </nav>
      </header>

    <div class=grandcontainer>
    <div class=Grandeimgingr>
        <h3>Composition :</h3>
        <?php print nl2br ($ingr) ?>
        <a href="<?php print $paiement ?>" class="bouton_acheter">Acheter</a><br>
        
         </div>
        <div class=Grandebouteilleimg>  
            <div class=nom>     
        <?php print $NomBouteille ?>  
        
           </div> 
        <img src="img/<?php print $img_Bouteille; ?>" class="Grandebouteille"></a>
        <p><?php print $NomBouteille ?>  basé sur la recette du délicieux "<?php print $Nom ?> "</p>
       
        </div>
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