<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Baniere.css">
    <link rel="stylesheet" href="css/baseMedias.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/Footer.css">
    
    <!-- Connexion bdd php -->
    <?php
    
    require_once("Connexionbdd/Connex.php");
    $erreur = "";
    session_start();
    
    /* Vérification de la connexion pour l'utilisateur et l'admin */
    if (isset($_POST["MailForm"]) && isset($_POST["mdpForm"])) {
        $email = mysqli_real_escape_string($db, $_POST["MailForm"]);
        $password = mysqli_real_escape_string($db, $_POST["mdpForm"]);
        
        $userQuery = "SELECT * FROM `utilisateurs` WHERE Mail='$email' and mdp='" . hash('sha256', $password) . "'";
        $userResult = mysqli_query($db, $userQuery);
        $userRows = mysqli_num_rows($userResult);
        
        $adminQuery = "SELECT * FROM `admin` WHERE MailA='$email' and mdpA='" . hash('sha256', $password) . "'";
        $adminResult = mysqli_query($db, $adminQuery);
        $adminRows = mysqli_num_rows($adminResult);
        
        if ($userRows == 1) {
            $_SESSION['Mail'] = $email;
            header("location:index.php");
        } elseif ($adminRows == 1) {
            $_SESSION['MailA'] = $email;
            header("location:admin.php");
        } else {
            $erreur = "Compte incorrect ou inexistant";
        }
    }
    
    /* Changement de bannière */
    if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))) {
        $Connexion = "Deconnexion";
    } else {
        $Connexion = "Connexion";
        $_SESSION['Mail'] = "";
    }
    
    /* Inscription réussie */
    if (isset($_GET["err"]) && $_GET["err"] == 1) {
        $msg = "Votre inscription a réussi !";
    } else {
        $msg = "";
    }
    ?>
    
    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
    <!-- texte -->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
    <title>Connexion</title>
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
            <a href="Contact.php" class="lienNav" onclick="toggleNav()">Contact</a> 
            <a href="<?php echo $Connexion?>.php" class="lienNav" onclick="toggleNav()">Connexion</a>
            <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>
            <div id="mail_utilisateur"><?php echo $_SESSION['Mail'] ?></div>
        </nav>
    </header>

    <form action="connexion.php" method="post" name="login">
        <label for="mail">Email</label>
        <input type="email" id="mail" name="MailForm" required autofocus><br>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="mdpForm" required><br>

        <input type="submit" value="Connexion" name="submit">
       
        <p>Si vous n'avez pas de compte :<a id="inscription" href="Inscription.php"> Inscrivez-vous !</a></p>

        <div id="erreur_connexion">
            <p><?php echo $erreur, $msg ?></p>
        </div>
    </form>

    <footer>
        <div id="divfooter">
            <link rel="stylesheet"> <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <link rel="stylesheet"> <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>

    <script src="JS/app.js"></script>
</body>
</html>