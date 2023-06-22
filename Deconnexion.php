<?php

 session_start();

 //Detruire la session

 if(session_destroy())
 {
    //redirection vers la page de connexion
    header("location:index.php");
 }


?>
