<?php
session_start();
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(!isset($_GET['nom_org'])){
	$nom=htmlspecialchars($_GET['id']);

	$req=$bdd->prepare('SELECT * FROM organisations WHERE nom=?');
	$req->execute(array($nom));
	if($req->rowCount()==1){
		$org=$req->fetch();



	} else{
		$error="utilisateur introuvable";
	}

}else{
	$error="aucun utilisateur préciser";
}
if(isset($_SESSION['nom_org'])){
 if($_SESSION['nom_org']['nom']==$org['nom']){
 	$set=1;
 }else{$set=0;
 }
}else{
	$set=0;
}
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
				<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" >inscription :staff sanitaire</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="espace med/inscrit/inscrit_med.php">medecins </a>
      <a class="dropdown-item" href="espace infirmier/inscrit/inscrit_inf.php">infirmiers</a>
      <a class="dropdown-item" href="espace_AA/inscrit/inscrit_AA.php">agent d'accueil</a>
    </div>
	</li>
			<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">se connecter</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="espace med/login/connect_med.php">medecin</a>
      <a class="dropdown-item" href="espace infirmier/login/connect_inf">infermier</a>
       <a class="dropdown-item" href="espace_AA/login/connect_AA.php">agent d'accueil</a>
     
    </div>
	</li>
		</ul>
	</div>
</div>
</nav>
<!--fin navigation bar--->
<br><br>
<h2><center>information sur votre organisation</center></h2>
<br>
<hr>
<br>
<section class="container-fluid bg">
<section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-4">

<table>
	<tr>
		<td>votre organisation est : </td>
		<td><?php  echo $_SESSION['nom_org']['nom'];?></td>
	</tr>
	
	
</table>
</section>
</section>
</section>
<br>
<hr>
<?php if (isset($error)){echo $error;}?>


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
