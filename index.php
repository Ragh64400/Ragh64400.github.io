<!-- Connexion bdd php -->
<?php
require_once("Connexionbdd/connex.php");

session_start();
$Connexion = "Connexion";
$contact = "Contact";

if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))) {
    $Connexion = "Deconnexion";
    $contact = "Contact";
}

if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))) {
    $Connexion = "Deconnexion";
    $_SESSION['MailA'] = "ADMINISTRATEUR";
    $contact = "Admin";
}

if (!isset($_SESSION['Mail']) && !isset($_SESSION['MailA'])) {
    $_SESSION['Mail'] = "";
    unset($_SESSION['Mail']);
    $_SESSION['MailA'] = "";
    unset($_SESSION['MailA']);
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


    <!-- Lien google font, police-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h1 et nav  -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- titre h2 et h3 -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
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
            <a href="#Mescocktails" class="lienNav" onclick="toggleNav()">Nos cocktails</a>
            <a href="Boutique.php" class="lienNav" onclick="toggleNav()">Boutique</a>
            <a href="<?php echo $contact ?>.php" class="lienNav" onclick="toggleNav()"><?php echo $contact ?></a>
            <a href="<?php echo $Connexion ?>.php" class="lienNav" onclick="toggleNav()"><?php echo $Connexion ?></a>
            <a class="icons" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>

            <!-- if pour afficher le degres de connexion -->
            <div id="mail_utilisateur">

                <?php

                if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))) {
                    echo $_SESSION['Mail'];
                }
                if (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))) {
                    echo $_SESSION['MailA'];
                }
                ?>

            </div>
        </nav>
    </header>

    <!-- Premiere section, qui somme nous -->
    <section id="section1">
        <div class="Titre1">
            <h1>Qui sommes nous?</h1>
        </div>

        <div id="divtext1">

            <div class="text1">
                <p>
                    Après avoir accompagné et conseillé diverses entités dans le milieu des spiritueux,
                    la société Cocktail JO a créé en 2023
                    "La distillerie de Captain Jo", la seule et unique distillerie crée pour un projet web.<br>
                    Nous avons créé pour vous toute une game de cocktail en bouteille
                    basé sur les véritables recettes de vos célèbres boissons préférées.
                </p>
            </div>

            <div class="image1"></div>

        </div>
    </section>

    <!-- div trait rouge séparation -->
    <div id="trait"></div>

    <!-- Deuxieme sections, Nos cocktails -->
    <div id="Mescocktails"></div>
    <section id="section2">

        <div class="Titre2">
            <h2>Nos cocktails</h2>
        </div>

        <?php

        $turner = false;

        $SQL_SELECT = "SELECT * FROM `cocktails` WHERE 1";
        $resultat = mysqli_query($db, $SQL_SELECT);
        while ($enrg = mysqli_fetch_assoc($resultat)) {
            $IdCocktails = $enrg['ID'];
            $Nom = $enrg["Nom"];
            $images = $enrg['Images'];
            $Desc = $enrg['Descriptions'];

            /* Div un sur deux */
            if ($turner == true) {
                $turner = false;
            } else {
                $turner = true;
            }
        ?>

            <div class="contenant">
                <div id="img<?php echo $turner == false ? "1" : "2"; ?>">

                    <a href="grandeimage.php?ref=<?php print $IdCocktails; ?> ">


                        <img src="img/<?php print $images; ?> " class="Photo"></a>
                    <div class="div1h3">
                        <h3 class="Titreh3"><?php print $Nom; ?></h3>
                        <p class="textcocktail2"> <?php print $Desc; ?>
                        </p>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>

    <div id="trait"></div>

    <section id="section3">
        <div class="zoomcocktail">
            <img src="img/pinacolada.jpg" alt="pinacolada"></img>
            <img src="img/cucombermojito.jpg" alt="cucombermojito"></img>
            <img src="img/expressomartini.jpg" alt="expressomartini"></img>
            <img src="img/Amaretosour2.jpg" alt="Amaretosour"></img>
            <img src="img/gariga.jpg" alt="gariga"></img>
            <img src="img/mojito.jpg" alt="mojito"></img>
            <img src="img/pinacolada2.jpg" alt="pinacolada"></img>
            <img src="img/frenchmartini.jpg" alt="frenchmartini"></img>
        </div>
    </section>

    <div id="trait"></div>

    <section id="phrasesSlide">
        <div class="cadre">
            <div class="centre">
                <div class="carousel">
                    <div class="changeHidden">
                        <div class="contenant">
                            <div class="element">"Divin ! "</div>
                            <div class="element">"Un pur délice"</div>
                            <div class="element">"5 étoiles"</div>
                            <div class="element">"Mérite le detour!"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="trait"></div>

    <footer>
        <div id="divfooter">
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>

    <script src="JS/app.js"></script>
    <script>
        confirm("Il est indispensable d'être âgé de Plus de 18 ans,pour accéder à ce site de vente d'alcool.")
    </script>

</body>

</html>

         