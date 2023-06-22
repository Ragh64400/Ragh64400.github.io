<?php
$server="localhost";
$user="root";
$mdp="";
$bdd="mescocktails";

$db=mysqli_connect($server,$user,$mdp,$bdd);
if(mysqli_connect_errno()){
  $b_connect=false;
  exit();
  }else{
    $b_connect=true;
    mysqli_select_db($db,$bdd);
  }

?>