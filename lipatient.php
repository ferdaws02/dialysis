<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['organisation']));{
	$id_org=htmlspecialchars($_SESSION['nom_inf']['nom']);

	$req=$bdd->prepare('SELECT * FROM patients,dossierpatient WHERE patients.id_p=dossierpatient.id_p and  nom=?');
	$req->execute(array($id_org));
$patient=$req->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en">
<title>patients</title>
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
		
	<ul class="navbar-nav ml-auto">
		
		<li class="nav-item">
    <a class="nav-link " href="profilinf.php">profile </a>
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
			
			<td><a href="DPIconsult.php?dossier=<?=$pat['id_p']?>id_inf=<?=$_SESSION['nom_inf']['id_inf'];?>" class="btn btn-info p-2">consulte DPI</a>
<a href="vaccin.php?dossier=<?=$pat['id_p']?>&amp;id_inf=<?=$_SESSION['nom_inf']['id_inf'];?>" class="btn btn-primary p-2"> liste des vaccins</a></td></tr></tr>
		<?php endforeach;?>
	</table>
</section>
</body>
</html>
