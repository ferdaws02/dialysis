<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');


if(isset($_POST['update'])){
	if(isset($_POST['pseudo'])){
		if($_POST['pseudo']!=$_SESSION['nom']['pseudo_AA'])
			{$pseudo=htmlspecialchars($_POST['pseudo']);;
                         $id_AA=$_SESSION['nom']['id_AA'];
		
			$req=$bdd->prepare("UPDATE Agent_administratif SET pseudo_AA='$pseudo' where id_AA='$id_AA'");
			$req->execute();
			$_SESSION['nom']['pseudo_AA']=$pseudo;

		

		}
	}
	

if(isset($_POST['password'])){
	if($_POST['password']== $_POST['password2']){$password=htmlspecialchars($_POST['password']); 
		if(strlen($password)>= 8 AND strlen($password) <=100){
                 $id_AA=$_SESSION['nom']['id_AA'];
                   $mdp=md5($password);
			$req=$bdd->prepare("UPDATE Agent_administratif SET mdp_AA='$mdp' WHERE id_AA='$id_AA'");
					$req->execute();
					$_SESSION['nom']['mdp_AA']=md5($password);

	header("location:connect_AA.php?organisation=".$_SESSION['nom_AA']['nom']);

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
 
				<li class="nav-item ">
    <a class="nav-link "  href="postes.php">list des postes</a>
	</li>
 
 
		<li class="nav-item">
    <a class="nav-link " href="dossier patient/lipatient.php">liste des patients</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="#">déconnecter</a>
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
		<td><input type="text" name="pseudo"value="<?=$_SESSION['nom']['pseudo_AA'];?>"/></td>
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