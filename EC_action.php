<?php
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
if (isset($_POST['insérer'])){
$EC=htmlspecialchars($_POST['EC']);
 $num_S=htmlspecialchars($_POST['num_S']);
 $id_p=htmlspecialchars($_POST['id_p']);
 
	 $sql=$bdd->prepare("UPDATE `seances`SET `EC`='$EC' WHERE `seances`.`num_S`='$num_S' and `seances`.`id_p`='$id_p' "); 
    $sql->execute();
     $postes=$sql->fetch();}
 
?>
<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
if(isset($_GET['organisation']));{
	$id_org=htmlspecialchars($_SESSION['nom_med']['nom']);
 
	$req=$bdd->prepare('SELECT * FROM patients,dossierpatient WHERE patients.id_p=dossierpatient.id_p and  nom=?');
	$req->execute(array($id_org));
$patient=$req->fetchAll();
}
 
?>
<!DOCTYPE html>
<html lang="en">
<title>liste des dossier patient</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="../inscrit/css/style.css" rel="stylesheet">
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
</head>
 
 
<body>
<header></header>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="../index.php"><img src="images/logo ws.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
 
	
			<li class="nav-item">
    <a class="nav-link " href="liseance.php">liste des patients</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="déconnexion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>
<!--fin navigation bar--->
<section class="container">
	<h3>liste des patient </h3>
	<table class="table table-hover">
		<tr><th>nom</th><th>prenom</th><th>adresse</th><th>téléphone</th><th>sexe</th><th>date de naissance</th><th>action</th></tr>
 
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['nom_p']?> </td><td><?=$pat['prenom_p']?></td><td><?=$pat['adr_p']?> </td><td><?=$pat['Ntel_p']?></td><td> <?=$pat['sexe_p']?></td><td><?=$pat['DDN']?></td>
 
			<td><a href="consulter.php?dossier=<?=$pat['id_p']?>&amp;id_med=<?=$_SESSION['nom_med']['id_med'];?>" class="btn btn-info p-2">consulte DPI</a></td></tr>
		<?php endforeach;?>
	</table>
</section>
</body>
</html>
 
 
   