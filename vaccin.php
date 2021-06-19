<?php
session_start();
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 
if(isset($_GET['dossier'])){
	$id_P=htmlspecialchars($_GET['dossier']);echo($id_p);
	$id_med=htmlspecialchars($_GET['med']);
      $nom=htmlspecialchars($_SESSION['nom_med']['nom']);
 
	$req=$bdd->prepare('SELECT * FROM dossierpatient,patients WHERE patients.id_p=dossierpatient.id_p and patients.id_p=? and nom=?');
	$req->execute(array($id_P,$nom));
    $DPI=$req->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<title>connexion</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	
			
		<li class="nav-item">
    <a class="nav-link " href="liseance.php">liste despatients</a>
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
	<hr><h3 class="text-center text-dark mt-3">Dossier patient</h3><hr><br><br>
			 <table class="table table-hover">
	<thead>
	      <tr>
	        <th>nom</th>
	        <th>prénom</th>
	        
 
	      </tr>
	    </thead>
		   <tbody><tr><?php foreach ($DPI as  $dpi):?>
					<td><?=$dpi['nom_p']?> </td><td><?=$dpi['prenom_p']?></td>
						<?php endforeach;?>
				</tr></tbody>
 
			
</tbody></table>
 <div class="ragistration-box">
 <h5 ><center>fixer vaccin</center></h5>
 <form action="vaccpost.php" method="POST">
<?PHP $bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
 $id_med=$_GET['id_med'];
$id_p=$_GET['dossier'];
	$req=$bdd->prepare('SELECT * FROM `seances` WHERE id_med=? and id_p=? ');
 
     $req->execute(array($id_med,$id_p));
     $postes=$req->fetch();
    ?><div class="form-group">
     <input type="hidden" class="form-control" name="id_p" value="<?=$postes['id_p'];?>">
     </div>
    <div class="form-group">
     <input type="hidden" class="form-control" name="id_med" value="<?=$postes['id_med'];?>">
     </div>

<div class="form-group">
  <label>numéro de rappel</label>
     <input type="text" class="form-control" name="RV" >
     </div>
    <div class="form-group">
 <label>date de rappel</label>
     <input type="date" class="form-control" name="DV" >
     </div>
  
    <br>
        <button type="submit" class="btn btn-primary" name="insérer"> insérer</button>
   </form>  
				