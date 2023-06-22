
    <!-- Connexion bdd php -->

  <?php
     require_once('connexionbdd/Connex.php');

     session_start();
     $msg = "";

   if (isset($_POST['mail'], $_POST['password'])){
    // récupérer l'email en supprimant les espaces en début et fin de chaîne
    $email = trim(mysqli_real_escape_string($db, $_POST['mail']));
    
    // récupérer le mot de passe en supprimant les espaces en début et fin de chaîne
    $password = trim(mysqli_real_escape_string($db, $_POST['password']));
    
    // requête SQL + mot de passe crypté
    $query = "INSERT INTO `utilisateurs`(`Mail`,`mdp`) VALUES ('$email','".hash('sha256', $password)."')";
    
    // Exécute la requête sur la base de données
    $res = mysqli_query($db, $query);
   
    if($res){
        header("location:connexion.php?err=1");
    } else {
        $msg = "Votre inscription a échoué.";
    }
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
    <link rel="stylesheet" href="css/Footer.css">
    <link rel="stylesheet" href="css/connexion.css">
  

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
     <!-- Entete du site -->
      <header id="acceuil">
          
          <nav id="Navigation">
          
             <div id="IconCocdiv">
               <a href=""><i id="IconCoc" class="fa-solid fa-martini-glass-citrus"></i></a>
             </div>
               
               <a href="index.php" class="lienNav" onclick="toggleNav()">Accueil</a>
               <a href="index.php#Mescocktails"  class="lienNav" onclick="toggleNav()">Nos cocktails</a>
               <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
               <a href="Contact.php"  class="lienNav" onclick="toggleNav()">Contact</a>
               <a href="connexion.php" class="lienNav" onclick="toggleNav()">Connexion</a>
               <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
               
        
          </nav>
      </header>

      <form action="Inscription.php" method="POST">
      <label for="mail">Email</label>
      <input type="email" id="mail" name="mail" required autofocus><br>

      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" required><br>



  <input type="submit" value="Inscription" name="submit">

  <div id="message_erreur"> 
  <?php  
echo $msg;
?>
</div>
</form>




<footer>
          <div id="divfooter">
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
             <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>
</footer>
          <script src="JS/app.js"></script>

</body>