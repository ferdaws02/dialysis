<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(isset($_GET['pseudo'])){
	$pseudo=htmlspecialchars($_GET['pseudo']);

	$req=$bdd->prepare('SELECT * FROM medecin WHERE pseudo_med=?');
	$req->execute(array($pseudo));
		if($req->rowCount()==1){
		$user=$req->fetch();
	} 

}
if(isset($_SESSION['user'])){
 if($_SESSION['user']['id']==$user['id']){
 	$set=1;
 	header("location:liDPI.php?pseudo=" .$_SESSION['nom_med']['pseudo_med']."organisation=".$_SESSION['nom_med']['nom']);
 }else{$set=0;
 }
}else{
	$set=0;
}
?>

<!DOCTYPE html>
<html lang="en">
<title>profile medecin</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="css/stylemed.css" rel="stylesheet">
	
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
	<br>
	<div class="profbox">
		<h1><center>informations personnelles</center></h1>
	<br>
<section class="row justify-content-center">
<section class="col-md-8">

<table>
	<tr>
		<td>pseudo: </td>
		<td><?php  echo $_SESSION['nom_med']['pseudo_med'];?></td>
	</tr>
		<tr>
			<td>adresse: </td>
		<td><?php  echo $_SESSION['nom_med']['adr_med'];?></td>
	</tr>
	<tr>
		<td>numéro de téléphone: </td>
		<td><?php  echo $_SESSION['nom_med']['NTel_med'];?></td>
	</tr>
	<tr>
		<td>nom organisation sanitaire: </td>
		<td><?php  echo $_SESSION['nom_med']['nom'];?></td>
	</tr>
	<?php if($set==0){ ?>
	<tr>
		<td><a href="setup.php">modifier mes données</a></td>
	</tr>
<?php } ?>
</table>
<br>
</section>
</section>
</div>
</section>
<?php if (isset($error)){echo $error;}?>
<!--footer-->
<footer>
<div class="container-fluid padding">
<div class="row text-center">
<div class="col-md-5">
<img src="images/logo w.png">
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