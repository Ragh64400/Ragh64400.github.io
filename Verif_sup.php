<?php
     require_once("Connexionbdd/connex.php");

      $sup=$_GET["sup"];
      $SQL_SELECT="SELECT * FROM `cocktails` WHERE ID=".$sup;
      $resultat = mysqli_query($db,$SQL_SELECT);
      $enrg=mysqli_fetch_assoc($resultat);
      $IdCocktails=$enrg['ID'];
      $images=$enrg['Images']; 
      
      $sup=$_GET["sup"];

    
      ?>
<h1>Etes vous sur de vouloir supprimer ce produit</h1>
 <div id=Image_sup><?php print $IdCocktails ?> <img src="img/<?php print $images;?>" width="300px" heigth="300px"></div>
<Button type="submit"><a href="delete.php?sup=<?=$IdCocktails;?>">Supprimer</button></a>
<button type="submit"><a href="Suppression_produit.php?sup=<?=$IdCocktails;?>">Annuler</button></a>