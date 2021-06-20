<?php
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_POST['ajouter'])){
  if(isset($_POST['nom_P']) and isset($_POST['prenom_P']) and isset($_POST['Ntel_P']) and isset($_POST['adr_P'])  and isset($_POST['sexe_P'])){
  	if(!empty($_POST['nom_P']) and !empty($_POST['prenom_P']) and !empty($_POST['Ntel_P']) and !empty($_POST['adr_P']) and !empty($_POST['sexe_P'])) {

    $id=trim(htmlspecialchars($_POST['id_org']));
    $nom_P=trim(htmlspecialchars($_POST['nom_P']));
    $prenom_P=trim(htmlspecialchars($_POST['prenom_P']));
    $num=trim(htmlspecialchars($_POST['Ntel_P']));
    $adr=trim(htmlspecialchars($_POST['adr_P']));
    $DDN=trim(htmlspecialchars($_POST['DDN']));
    $sexe_P=trim(htmlspecialchars($_POST['sexe_P']));
     $mdp="";
     $email=trim(htmlspecialchars($_POST['email']));
      $pseudo=trim(htmlspecialchars($_POST['pseudo']));
              $req=$bdd->prepare('INSERT INTO patients (nom_p,prenom_p,sexe_p,DDN, adr_p, Ntel_p,pseudo,email,password,nom) VALUES (?,?,?,?,?,?,?,?,?,?)');
              $req->execute(array( $nom_P, $prenom_P,$sexe_P,$DDN, $adr, $num,$pseudo,  $email,$mdp, $id));
              $error="votre compte créer avec succée";
            }

           
     
}
}







if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	 $req=$bdd->prepare('DELETE FROM patients WHERE id_p=?');
              $req->execute(array( $id));
           
	
	header('location:lipatient.php');
	$_SESSion['response']="supprimer avec succès";
	$_SESSion['res_type']="danger";

}
?>