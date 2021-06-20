<?php
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

  $id_p=$_GET['modif'];

	$req=$bdd->prepare('SELECT * FROM `patients` WHERE id_p=? ');

     $req->execute(array( $id_p));
     $postes=$req->fetch();?>




<!DOCTYPE html>
<html lang="en">
<title>modifier patient</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/styleAA.css" rel="stylesheet">
	<link href="../../inscrit/css/style.css" rel="stylesheet">
	
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
	<a class="navbar-brand" href="../index.php"><img src="../images/logo ws.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
		<button type="button" class="btn " data-toggle="modal" data-target="#staticBackdrop">
         enregistrer
		</button>
				<li class="nav-item ">
    <a class="nav-link "  href="postes.php">loste des postes</a>
	</li>
			<li class="nav-item">
    <a class="nav-link " href="lipatient.php">liste des patient</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="../déconnexion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>
<section class="container">

	        <div class="ragistration-box">
 <h5 ><center>modifier les données du patient</center></h5>
 <form action="modifpa_action.php" method="POST">
<div class="form-group">
		   
		    <input type="hidden" class="form-control" name="id_p" value="<?=$postes['id_p'];?>">
		 </div>
		<div class="form-group">
		    <label>nom patient</label>
		    <input type="text" class="form-control" name="nom_p" value="<?=$postes['nom_p'];?>">
		 </div>
                  <div class="form-group">
		    <label>prénom  patient</label>
		    <input type="text" class="form-control" name="prenom_p" value="<?=$postes['prenom_p'];?>">
		 </div>
		 <div class="form-group">
		    <label >adresse</label>
		    <input type="text" class="form-control" name="adr_p" value="<?=$postes['adr_p'];?>">
		 </div>
		  <div class="form-group">
		    <label >téléphone</label>
		    <input type="text" class="form-control" name="Ntel_p"value="<?=$postes['Ntel_p'];?>">
		  </div>
		  
		<br>
		        <button type="submit" name="modifier"class="btn btn-primary">enregistrer les modification</button>
	 </form>	</div></section></body></html>