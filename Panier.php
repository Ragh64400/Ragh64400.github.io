
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/Panier.css">
<?php
 session_start() ;
     require_once("Connexionbdd/connex.php");
     require_once("ajouter_panier.php");
     //Suprimer les produits
     //si la variable sup existe
     if(isset($_GET['sup'])){
        $id_sup = $_GET['sup'] ;
        // Supression 
        unset($_SESSION['panier'][$id_sup]);
     }

     if (isset($_SESSION['Mail']) && (!empty($_SESSION['Mail']))){
        $lien = "https://buy.stripe.com/test_3cs5lRgzeaJz48g8ww";
    } elseif (isset($_SESSION['MailA']) && (!empty($_SESSION['MailA']))){
        $lien = "https://buy.stripe.com/test_3cs5lRgzeaJz48g8ww";
    } else {
        $lien = "connexion.php";
    }
   
?>

     <!DOCTYPE html>
     <html lang="fr">
     <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
     </head>
     <body class="panier">
        
        <section>
        <table>
        <tr>
                <th>Produits</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Supprimer</th>
    

        <?php 
        $total = 0 ;

        
       
        
             
            // liste des produtis 
            //recuperer les cles du tableau session dans la bdd avec id produit
            $ids= array_keys($_SESSION['panier']);
            //s'il n'y a aucune clé dans le tableau
            if(empty($ids)){
                echo"Votre panier est vide";
            }else {
                //si oui
            
            $SQL_SELECT = "SELECT c.*, b.NomBouteille, b.ImgBouteille, b.Prix
               FROM cocktails AS c
               JOIN bouteilles AS b ON c.ID = b.ID_B
               WHERE c.ID IN (".implode(',', $ids).")";
            $resultat=mysqli_query($db,$SQL_SELECT);

            if (isset($_GET['action']) && isset($_GET['id'])) {
                $action = $_GET['action'];
                $id = $_GET['id'];
            
                if ($action === 'enleve') {
                    if ($_SESSION['panier'][$id] > 1) {
                        $_SESSION['panier'][$id]--;
                    }
                } elseif ($action === 'ajoute') {
                    $_SESSION['panier'][$id]++;
                }
            }
           
            // liste des produits avec une boucle foreach
            foreach ($resultat as $product):
                
              
                //calculer le total (prix unitaire * quantité )
                //et additioner le resultat a chaque tour de boucle 
                $total = $total + $product['Prix'] * $_SESSION['panier'][$product['ID']] ;

        ?>
        

<tr>
        <td><img src="img/<?=$product['ImgBouteille']?>"></td>
        <td><?=$product['NomBouteille']?>(<?=$product['Nom']?>)</td>
        <td><?=$product['Prix']?>€</td>
        <td>
         <a href="panier.php?action=enleve&id=<?=$product['ID']?>"><i class="fas fa-minus"></i></a> <!-- Moins sur panier -->
         <?=$_SESSION['panier'][$product['ID']]?>
         <a href="panier.php?action=ajoute&id=<?=$product['ID']?>"><i class="fas fa-plus"></i></a>  <!-- Plus sur panier -->
         </td>
        <td><a href="panier.php?sup=<?=$product['ID']?>"><i id="Poubelle" class="fa-solid fa-trash-can"></td></i>
             
        
</tr>

        <?php endforeach ;} ?>
<tfoot>
        <tr class="total">
                 
                <th>Total : <?=$total?>€</th>


                <th><a href="<?php print $lien ?>">Valider le panier</th></a>
                <th><a href="Boutique.php">Retour a la boutique</th></a>
                
        </tr>
</tfoot>
</table>
</section>

     </body>
     </html>