<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['patient']));{
	$id_P=htmlspecialchars($_GET['dossier']);

	$req=$bdd->prepare('SELECT * FROM patients,dossierpatient WHERE patients.id_p=? and dossierpatient.id_p=?');
	$req->execute(array($id_P,$id_P));
    $DPI=$req->fetchAll();}
?>
<!DOCTYPE html>
<html lang="en">
<title>consulter le DPI</title>
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
	<ul class="navbar-nav ml-auto">
		
		<li class="nav-item">
    <a class="nav-link " href="lipatient.php">liste des patients</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="déconnexion.php">déconnecter</a>
	</li>
		</ul>
</div>
</nav>
<!--fin navigation bar--->



<!-- Modal -->
<section class="container">
	<hr><h3 class="text-center text-dark mt-3">liste des patient préinscrit</h3><hr><br><br>
			 <table class="table table-hover">
	<thead>
	      <tr>
	        <th>nom</th>
	        <th>prénom</th>
	        <th>adresse</th>
	        <th>téléphone</th>
	        <th>sexe</th>
	        <th>date de naissance </th>
	        
	      </tr>
	    </thead>
		   <tbody>
			
			<?php foreach ($DPI as  $dpi):?>
				<tr>
					<td><?=$dpi['nom_p']?> </td><td><?=$dpi['prenom_p']?></td><td><?=$dpi['adr_p']?> </td><td><?=$dpi['Ntel_p']?></td><td> <?=$dpi['sexe_p']?></td><td><?=$dpi['DDN']?></td>
						<?php endforeach;?>
				</tr></tbody>
				<thead>
					   <tr>
					   	<th>NDP</th>
	        <th>age</th>
	        <th>groupe sanguin</th>
	        <th>assurance</th>
	        <th>numéro assurance</th>
	        <th>poid sec</th>
	        <th>bain </th>
	         <th>conductivité</th>
	          <th>UF</th>
	           
	       </tr>
	   </thead><tbody>
	        <?php foreach ($DPI as  $dpi):?>
				<tr>
				<td><?=$dpi['NDP']?> </td>	<td><?=$dpi['age_p']?> </td><td><?=$dpi['Gr_sanguin']?></td><td><?=$dpi['Num_ass']?> </td><td><?=$dpi['ass']?></td><td> <?=$dpi['P_sec']?></td><td><?=$dpi['bain']?></td><td><?=$dpi['conductivite']?></td><td><?=$dpi['UF']?></td>
						<?php endforeach;?>
	        
	        
	      </tr></tbody>
	      <thead>
	      <tr>
	      <th>description</th>
	  	 <th>action</th></tr>
	      </thead>
	      <tbody>
	      	<?php foreach ($DPI as  $dpi):?>
	      	<tr>
	      		<td><?=$dpi['description']?> </td>
	      		<td>
		
						<a href="RDVform.php?dossier=<?=$dpi['id_p'];?>" class="btn btn-info p-2">fixe séance</a>	
	      		<?php endforeach;?>
	      	</tr>
	      </tbody>


					
				</table></section></body></html>
		