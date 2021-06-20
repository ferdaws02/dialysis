<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

  if(isset($_POST['valider'])){

    if(isset($_POST['age_P']) and isset($_POST['Gr_S']) and isset($_POST['ass']) and isset($_POST['num_ass'])  and isset($_POST['P_sec']) and isset($_POST['conduct']) and isset($_POST['desc']) and isset($_POST['UF'])){
 if(!empty($_POST['age_P']) and !empty($_POST['Gr_S']) and !empty($_POST['ass']) and !empty($_POST['P_sec']) and !empty($_POST['conduct']) and !empty($_POST['desc']) and !empty($_POST['UF'])){
if(isset($_GET['pseudo']));{


    $id_AA=htmlspecialchars($_SESSION['nom']['id_AA']);
    $id_P=htmlspecialchars($_POST['Id_P']);
    $age=trim(htmlspecialchars($_POST['age_P']));
    $Gr_S=trim(htmlspecialchars($_POST['Gr_S']));
    $ass=trim(htmlspecialchars($_POST['ass']));
    $num_ass=trim(htmlspecialchars($_POST['num_ass']));
    $P_sec=trim(htmlspecialchars($_POST['P_sec']));
    $conduct=trim(htmlspecialchars($_POST['conduct']));
    $desc=trim(htmlspecialchars($_POST['desc']));
    $bain=trim(htmlspecialchars($_POST['bain']));
    $UF=trim(htmlspecialchars($_POST['UF']));
  

     $req=$bdd->prepare('INSERT INTO dossierpatient ( age_p, Gr_sanguin, Num_ass, ass, P_sec, bain, conductivite, description, UF, id_AA, id_p)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
    $req->execute(array($age,$Gr_S,$num_ass,$ass,$P_sec,$bain,$conduct,$desc,$UF,$id_AA,$id_P));

   }}}}
   $id_P=htmlspecialchars($_POST['Id_P']);
  $req=$bdd->prepare('SELECT * FROM patients WHERE id_p=?');
    $req->execute(array($id_P));
   if($req->rowCount()==1){
        $row=$req->fetch();
        $_SESSION['nom_P']=$row;   header("location:DPInfo.php?pseudo=" .$_SESSION['nom']['pseudo_AA']."patient=".$_SESSION['nom_P']['id_p']);}
      


    
?>