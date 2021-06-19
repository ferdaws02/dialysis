<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
if(isset($_GET['patient']));{
	$id_med=htmlspecialchars($_SESSION['nom_med']['id_med']);
$id_p=$_GET['patient'];
	$req=$bdd->prepare("SELECT * FROM seances,patients WHERE seances.id_p= patients.id_p and  patients.id_p=? AND id_med=?");
	$req->execute(array($id_p,$id_med));
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
		<tr><th>date</th><th>nom_patient</th><th>prénom_patient</th><th>numéro de séance</th> <th>action</th></tr>
 
		<?php foreach ($patient as  $pat):?>
			<tr>
				<td><?=$pat['DS']?> </td><td><?=$pat['nom_p']?></td><td><?=$pat['prenom_p']?> </td><td><?=$pat['num_S']?></td><td><a href="consultsea.php?patient=<?=$pat['id_p'];?>&amp;num_S=<?=$pat['num_S'];?>"class="btn btn-primary p-2">consulter la séance</a></td>
						</td>
 
			</tr>
		<?php endforeach;?>
	</table>
</section>
</body>
</html>
 