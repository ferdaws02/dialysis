<?php
session_start();
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(isset($_POST['connection'])){
	if(isset($_POST['nom_org'])){
		if(!empty($_POST['nom_org'])){
			$nom_org=htmlspecialchars($_POST['nom_org']);
			$req=$bdd->prepare('SELECT * FROM organisations WHERE nom= ?');
			$req-> execute(array($nom_org));
			if($req->rowCount()==1){
				$org=$req->fetch();
				$_SESSION['nom_org']=$org;
				header('location:indexcomm.php?id='.$_SESSION['nom_org']['nom']);

			}else{
        $error="organisation introuvable";}
		
	}else{
    $error="erreur";}
}}
?>
<!DOCTYPE html>
<html lang="en">
<title>dialysis accueil</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/yourcode.js"></script>
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="index.php"><img src="img/logo ws.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
			<a class="nav-link " href="index.php">accueil</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<br>
<hr>
<h3><center>bienvenu a notre espace</center> </h3>
<br>
<p><center>notre platforme"dialysis" destiné à rendre service:</center> </p>
<p><center>au centre de dialyse pour permettre le staff sanitaire a mieux gérer le centre et les séance des patient </center></p>
<p><center>au patients pour faciliter la consultation de l agenda personnel du patient bien que son dossier patient</center></p>
<hr>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-4">
<form action="organisations.php" method="POST">
<div class="form-group">
	<label>saisir le nom de votre organisation sanitaire </label>
	<input type="text" name="nom_org" class="form-control" id='nom_org'placeholder="nom de l organisation " required>
</div>
<button type="submit" class="btn btn-primary" name="connection"id="connection">envoyer</button>
</form>
</div>
</div>
 <?php if (isset($error)){
echo' <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>'  ,$error,
'</div>';}?>
</div>
<br>
<!--footer-->
<footer>
<div class="container-fluid padding">
<div class="row text-center">
<div class="col-md-5">
<img src="img/logo w.png">
</div>
<div class="col-md-6">
<hr class="light">
<h5>coordonnées</h5>
<hr class="light">
<p>numéro de télèphone: +216 25 585 932</p>
<p>email: dialysis@gmail.com</p>
</div>
</div>
</div>
<!--fin footer--->
</footer>
</body>
</html>
