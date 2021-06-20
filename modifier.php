<?php
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

  $NP=$_GET['modif'];
 $P=$_GET['plage'];
	$req=$bdd->prepare('SELECT * FROM `postes` WHERE num_post=? AND Pde_dispo=?');

     $req->execute(array( $NP,$P));
     $postes=$req->fetch();?>




<!DOCTYPE html>
<html lang="en">
<title>modifier poste</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/styleAA.css" rel="stylesheet">
	<link href="../inscrit/css/style.css" rel="stylesheet">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
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
	
				<li class="nav-item ">
    <a class="nav-link "  href="postes.php">liste des postes</a>
	</li>
			<li class="nav-item">
    <a class="nav-link " href="lipatient.php">liste des patient</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="déconnexion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>
<section class="container">

	        <div class="ragistration-box">
 <h5 ><center>modifier les données d'une poste</center></h5>
 <form action="modif_action.php" method="POST">
		<div class="form-group">
		    <label>numéro de poste</label>
		    <input type="number" class="form-control" name="num_post" value="<?=$postes['num_post'];?>">
		 </div>
		 <div class="form-group">
		    <label >marque du machine</label>
		    <input type="text" class="form-control" name="MM" value="<?=$postes['marq_M'];?>">
		 </div>
		  <div class="form-group">
		    <label >numéro du lit</label>
		    <input type="number" class="form-control" name="num_lit"value="<?=$postes['num_lit'];?>">
		  </div>
		  <div class="form-group">
		    <label >numéro du chambre</label>
		    <input type="number" name="N_ch" class="form-control"value="<?=$postes['num_ch'];?>">
		  </div>
		    <div class="form-group">
		 <label>disponibilité </label>
		    <input type="text" name="Dispo" class="form-control"">

		</div>
  <div class="form-group">
		 <label> plage de disponibilité </label>
		    <input type="text" name="PDispo" class="form-control"value="<?=$postes['Pde_dispo'];?>">

		</div>
		<br>
		        <button type="submit" name="modifier"class="btn btn-primary">enregistrer les modification</button>
	 </form>	</div>