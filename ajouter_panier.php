<?php

     require_once("Connexionbdd/connex.php");
//Verifier si une session existe
     if (!isset($_SESSION)){
        //si non demmarer la session
        session_start();
     }
     //creer la session
     if(!isset($_SESSION['panier'])){
        //s'il n'existe pas une session on en créer une et on met un tableau a l'interieur
        $_SESSION['panier'] = array();
     }
     // récupération de l'id dans le lien

     if(isset($_GET['pan'])){//si un id a été envoyé alors : 
     
        $id = $_GET['pan'];
        //verifier grace a l'id si le produit existe dans la base de donnée
        $SQL_SELECT=("SELECT * FROM cocktails WHERE ID = $id");
        $resultat=mysqli_query($db,$SQL_SELECT);
        if(empty(mysqli_fetch_assoc($resultat))){
            //si ce produit n'existe pas
            die("Ce produit n'existe pas");
        }
        // Ajouter le produit dans le panier (le tableau)

        if(isset($_SESSION['panier'][$id])){// si le produit est déja dans le panier
            $_SESSION['panier'][$id]++; // représente la quantité
            
           
            
        } else {
            // si non on ajoute le produit
            $_SESSION['panier'][$id]= +1 ;
        }
        header("location:Boutique.php"); 
           
           //echo "Le produit a bien été mis dans le panier !";
            //afficher le tableau associé au panier
    
        
    }

 
    