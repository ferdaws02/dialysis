<?php

$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

  if(isset($_POST['ajouter'])){

    if(isset($_POST['num_post']) and isset($_POST['MM']) and isset($_POST['num_lit']) and isset($_POST['N_ch'])  and isset($_POST['Dispo'])){
 if(!empty($_POST['num_post']) and !empty($_POST['MM']) and !empty($_POST['num_lit']) and !empty($_POST['N_ch']) and !empty($_POST['Dispo'])){
    $id_AA=trim(htmlspecialchars($_POST['id_AA']));
$id_org=trim(htmlspecialchars($_POST['id_org']));
    $NP=htmlspecialchars($_POST['num_post']);
    $MM=trim(htmlspecialchars($_POST['MM']));
    $NL=trim(htmlspecialchars($_POST['num_lit']));
    $N_ch=trim(htmlspecialchars($_POST['N_ch']));
    $dispo=trim(htmlspecialchars($_POST['Dispo']));
    $Pdispo=trim(htmlspecialchars($_POST['PDispo']));
    $req=$bdd->prepare("INSERT INTO `postes` (`num_post`, `marq_M`, `num_lit`, `num_ch`, `dispo`,`Pde_dispo`,`id_AA` ,`nom`) VALUES(?,?,?,?,?,?,?,?)");   
    $req->execute(array($NP,$MM,$NL,$N_ch,$dispo ,$Pdispo,  $id_AA, $id_org));
          $error="votre compte créer avec succée";
            }

           
     
}
}
if(isset($_GET['delete'])){
  $NP=$_GET['delete'];
   $req=$bdd->prepare('DELETE FROM postes WHERE num_post=?');
              $req->execute(array( $NP));
           
  
  header('location:postes.php');
  $_SESSion['response']="supprimer avec succès";
  $_SESSion['res_type']="danger";

}



           



?>

    
