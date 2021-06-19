<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
 
if(isset($_POST['update'])){
	if(isset($_POST['pseudo'])){
		if($_POST['pseudo']!=$_SESSION['nom_med']['pseudo_med'])
			{$pseudo=htmlspecialchars($_POST['pseudo']);;
                         $id_med=$_SESSION['nom_med']['id_med'];
 
			$req=$bdd->prepare("UPDATE medecin SET pseudo_med='$pseudo' where id_med='$id_med'");
			$req->execute();
			$_SESSION['nom_med']['pseudo_med']=$pseudo;
 
 
 
		}
	}
 
 
if(isset($_POST['password'])){
	if($_POST['password']== $_POST['password2']){$password=htmlspecialchars($_POST['password']); 
		if(strlen($password)>= 8 AND strlen($password) <=100){
                 $id_med=$_SESSION['nom_med']['id_med'];
                   $mdp=md5($password);
			$req=$bdd->prepare("UPDATE medecin SET mdp_med='$mdp' WHERE id_med='$id_med'");
					$req->execute();
					$_SESSION['nom']['mdp_AA']=md5($password);
 
	header("location:connect_med.php?organisation=".$_SESSION['nom_med']['nom']);
 
	}
 
	}else
            {$error="vos mots de passe ne correspondent pas";}
}
}
 
 
 
?>
 
<!DOCTYPE html>
<html lang="fr">
<title>modifier les information </title>
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
<section class="container-fluid bg">
<section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-4">
<h1>modifier les information </h1>
<form method="POST" action="setup.php">
<table>
	<tr>
		<td>pseudo: </td>
		<td><input type="text" name="pseudo"value="<?=$_SESSION['nom_med']['pseudo_med'];?>"/></td>
	</tr>
 
	<tr>
		<td>nouveau mot de passe:</td>
		<td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td>confirmer le nouveau mot de passe:</td>
		<td><input type="password" name="password2"/></td>
	</tr>
	<tr>
		<td></td>
		<td> <button type="submit" class="btn btn-primary" name="update">modifier les information</button></td></tr>
 
</table>
</form>
</section>
</section>
</section>
<?php if (isset($error)){echo $error;}?>
</body>
</html>