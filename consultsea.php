<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
if(isset($_GET['patient']));{
	$num_S=$_GET['num_S'];
$id_p=$_GET['patient'];
	$req=$bdd->prepare("SELECT * FROM seances,patients WHERE seances.id_p= patients.id_p and  patients.id_p=? AND num_S=?");
	$req->execute(array($id_p,$num_S));
$patient=$req->fetchAll();

} 
?>


<!DOCTYPE html>
<html lang="en">
<title>list des séance</title>
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
	<h3>liste des séance</h3>
	<table class="table table-hover">
		<tr><th>date</th><th>nom_patient</th><th>prénom_patient</th> <th>Date de naissance</th><th>numéro de séance</th><th>plage horaire </th></tr>
 
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['DS']?> </td><td><?=$pat['nom_p']?></td><td><?=$pat['prenom_p']?> </td><td><?=$pat['DDN']?> </td><td><?=$pat['num_S']?></td><td><?=$pat['plage_H']?>
						</td>
 
			</tr><?php endforeach;?>
<tr><th>tension artérielle au début de la séance</th><th>poid au début de la séance</th><th>Prise du poid</th> <th></th><th></th><th> </th></tr>
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['TA_D']?> </td><td><?=$pat['PD']?></td><td><?=$pat['Prise_P']?> </td><td> </td><td></td><td></td>
 
			</tr><?php endforeach;?>
<tr><th>tension artérielle à la fin de la séance</th><th>poid à la fin de la séance</th><th>Perte du poid</th> <th></th><th></th><th> </th></tr>
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['TA_F']?> </td><td><?=$pat['PF']?></td><td><?=$pat['Pert_P']?> </td><td> </td><td></td><td></td>
 
			</tr><?php endforeach;?>
<tr><th>pression vineuse </th><th>pression transmembranaire</th><th>observation</th> <th>observation clinique</th><th>action</th><th> </th></tr>
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['PV']?> </td><td><?=$pat['PTM']?></td><td><?=$pat['obser']?> </td><td><?=$pat[EC]?></td><td><a href="insérerEC.php?dossier=<?=$pat['id_p']?>&amp;id_med=<?=$_SESSION['nom_med']['id_med']?>&amp;num_S=<?=$pat['num_S']?>" class="btn btn-info p-2">insérer une observation clinique</a></td><td></td><td></td>
 
			</tr><?php endforeach;?>
	</table>

</section>
</body>
</html>