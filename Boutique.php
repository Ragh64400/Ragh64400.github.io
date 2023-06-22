    <!-- Connexion bdd php -->
    <?php
    session_start() ;
     require_once("Connexionbdd/connex.php");
     require_once("ajouter_panier.php"); // lier une valeur au aray 
    
     
    
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
    <link rel="stylesheet" href="css/boutique.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    <link rel="stylesheet" href="css/Footer.css">

    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!-- titre h2 et h3 -->
     <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
     <!-- texte -->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
    
      

    <title>Cocktail Jo</title>
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
            
            <!-- if pour afficher le degres de connexion -->
            <div id="mail_utilisateur">

            <?php   

             if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))){
             echo $_SESSION['Mail']; }
             if  (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
               echo $_SESSION['MailA']; } ?> 

            </div>
          
          </nav>
      </header>
      
      <section id="section1">
             <div class="Titre1">
                 <h1>Notre boutique</h1>
             </div>
            
                <div id="divtext1">
             
                   <div class="text1">
                     <p>
                       Nous mettons à votre disposition plusieurs de nos cocktails en bouteille, prêt à être dégusté immédiatement après ouverture. 
                       Basé sur les recettes des célèbres cocktails de notre marque.
                     </p>
                    </div>
                     
                      
                       
                </div>
                       
                

          <div id="trait"></div>
          <div class="link"> 
           <a href="Panier.php"><i class="fa-solid fa-bag-shopping"></i> <span><?php echo array_sum($_SESSION['panier'])?></span></a>
          </div>
          
          <section>

    
        
      
<div class="container">               
    <?php

                /* While php affichage élément boutique */
                $SQL_SELECT = "SELECT c.ID, c.Nom, c.Descriptions, b.NomBouteille, b.ImgBouteille, b.Prix
                FROM cocktails c
                JOIN bouteilles b ON c.ID = b.ID_B
                WHERE 1";
               $resultat=mysqli_query($db,$SQL_SELECT);
               while ($enrg=mysqli_fetch_assoc($resultat)){
               $IdCocktails=$enrg['ID'];
               $Nom=$enrg["Nom"];
               $NomBouteille=$enrg["NomBouteille"];
               $img_Bouteille=$enrg['ImgBouteille']; 
               $Desc=$enrg['Descriptions'];
               $Prix=$enrg['Prix'];

   ?>

               
             

         <a href="grandeimage.php?pan=<?php print $IdCocktails;?> "> 

	<div class="bloc_bouteille">
              <a href="grandebouteille.php?ref=<?php print $IdCocktails;?>">
			  <div class="bloc_img"></div>
              <img src="img/<?php print $img_Bouteille; ?> " id="Photo<?php echo $IdCocktails?>" alt="<?php echo $NomBouteille ?>"></a>  
            
			
            
             <div class="bloc_text">
               <p class="textcocktail2">Recette : "<?php  print $Nom ?>"</p>
               <p class="textcocktail2"><?php  print $Prix;?>€</p>
               <a href="ajouter_panier.php?pan=<?=$IdCocktails?>#Photo<?php echo $IdCocktails?>" class="bouton_acheter">Ajouter au panier</a><br>
             </div>
	</div>

        <?php    
            }
        ?>

<!-- Fin div container -->  
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