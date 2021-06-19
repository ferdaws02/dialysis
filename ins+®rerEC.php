<!DOCTYPE html>
<html lang="en">
<title>insérer un etat clinique</title>
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
 <div class="ragistration-box">
 <h5 ><center>insérer les observation clinique</center></h5>
 <form action="EC_action.php" method="POST">
<?PHP $bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 $num_S=$_GET['num_S'];
$id_p=$_GET['dossier'];
	$req=$bdd->prepare('SELECT * FROM `seances` WHERE num_S=? and id_p=? ');

     $req->execute(array($num_S,$id_p));
     $postes=$req->fetch();
    ?>
<div class="form-group">
     <input type="hidden" class="form-control" name="id_p" value="<?=$postes['id_p'];?>">
     </div>
    <div class="form-group">
     <input type="hidden" class="form-control" name="num_S" value="<?=$postes['num_S'];?>">
     </div>
  <div class="form-group">
     <label>observation clinique </label>
        <input type="text" name="EC" class="form-control">
 
    </div>
    <br>
            <button type="submit" name="insérer"class="btn btn-primary">insérer</button>
   </form>  </div><