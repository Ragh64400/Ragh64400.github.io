<?php
session_start();
require_once("Connexionbdd/connex.php");

// Vérifier si le panier existe dans la session
if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    // Récupérer les clés (IDs des produits) du panier
    $ids = array_keys($_SESSION['panier']);
    // Construire la chaîne des IDs pour la requête SQL
    $idsString = implode(',', $ids);

    // Récupérer les informations des produits à partir de la base de données
    $SQL_SELECT = "SELECT c.*, b.NomBouteille, b.ImgBouteille, b.Prix
                   FROM cocktails AS c
                   JOIN bouteilles AS b ON c.ID = b.ID_B
                   WHERE c.ID IN ($idsString)";
    $resultat = mysqli_query($db, $SQL_SELECT);

    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($resultat) > 0) {
        // Générer un numéro de commande unique
        $numeroCommande = uniqid();

        // Récupérer l'adresse e-mail du client depuis la session
        $emailClient = $_SESSION['Mail'];

        // Préparer la requête SQL pour l'insertion des données de commande
        $SQL_INSERT = "INSERT INTO commandes (Numero_Commande, utilisateurs_ID, Bouteille_ID, Quantité) VALUES ";

        // Parcourir les produits du panier
        foreach ($resultat as $product) {
            // Récupérer la quantité du produit depuis $_SESSION['panier']
            $quantite = $_SESSION['panier'][$product['ID']];
            // Ajouter les données de commande à la requête SQL
            $SQL_INSERT .= "('$numeroCommande', '$emailClient', '{$product['NomBouteille']}', $quantite), ";
        }

        // Supprimer la virgule et l'espace à la fin de la requête SQL
        $SQL_INSERT = rtrim($SQL_INSERT, ", ");

        // Exécuter la requête d'insertion des données de commande
        $resultInsert = mysqli_query($db, $SQL_INSERT);

        if ($resultInsert) {
            echo "Les informations de commande ont été ajoutées à la base de données avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout des informations de commande à la base de données.";
        }

        // Vider le panier après l'ajout des données de commande à la base de données
        $_SESSION['panier'] = array();
    } else {
        echo "Aucun produit trouvé dans le panier.";
    }
} else {
    echo "Le panier est vide.";
}
?>