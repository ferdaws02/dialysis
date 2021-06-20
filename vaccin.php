<?php
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

 $id_p=htmlspecialchars($_GET['dossier']);
$sql=$bdd->prepare('SELECT * FROM vaccin ,patients WHERE vaccin.id_p=patients.id_p and vaccin.id_p=?  '); 
 
    $sql->execute(array($id_p));
     $patient=$sql->fetchALL();

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
		<tr><th>nom</th><th>prenom</th><th>adresse</th><th>téléphone</th><th>sexe</th><th>date de naissance</th><th>numéro de rappel</th><th>date de rappel</th></tr>
 
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['nom_p']?> </td><td><?=$pat['prenom_p']?></td><td><?=$pat['adr_p']?> </td><td><?=$pat['Ntel_p']?></td><td> <?=$pat['sexe_p']?></td><td><?=$pat['DDN']?></td><td><?=$pat['Rappel_vaccin']?></td><td><?=$pat['D_Vacc']?></td>
 
			<td></tr>
		<?php endforeach;?>
	</table>
</section>
</body>
</html>
 