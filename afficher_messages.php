<?php require_once("Connexionbdd/connex.php"); 
    
    session_start();

    if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))) {
        $ConnexionA = "Deconnexion";
        $_SESSION['MailA'] = "ADMINISTRATEUR";
    } else {
        $ConnexionA = "Connexion";
        $_SESSION['MailA'] = "";
        header("location:index.php");
        session_destroy();
    }

    // Récupérer les messages de la base de données
    $SQL_SELECT = "SELECT * FROM contact";
    $resultat = mysqli_query($db, $SQL_SELECT);
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
    <link rel="stylesheet" href="css/Afficher_contact.css">
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

</head>
<body>
    <h1>Messages de contact</h1>

    <table>
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
            <th>Supprimer</th>
        </tr>

        <?php
        // Afficher les messages dans un tableau
        while ($enrg = mysqli_fetch_assoc($resultat)) {
            $IdUser =$enrg["IdUser_C"];
            $date = $enrg["Date"];
            $Nom = $enrg["Nom_C"];
            $Email = $enrg['Mail_C'];
            $Message = $enrg['Message_C'];

            echo "<tr>";
            echo "<td>$date</td>";
            echo "<td>$Nom</td>";
            echo "<td>$Email</td>";
            echo "<td>$Message</td>";
            echo "<td><a href='Delete_contact.php?sup=$IdUser'<i id='Poubelle' class='fa-solid fa-trash-can'></i></td>";
            echo "</tr>";
        }
        ?>

    </table>
    <footer>
          <div id="divfooter">
         <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
         <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
          </div>
          </footer>
          <script src="JS/app.js"></script>
</body>
</html>


