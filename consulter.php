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
					<td><?=$dpi['nom_p']?> </td><td><?=$dpi['prenom_p']?></td><td><?=$dpi['adr_P']?> </td><td><?=$dpi['Ntel_p']?></td><td> <?=$dpi['sexe_p']?></td><td><?=$dpi['DDN']?></td>
						<?php endforeach;?>
				</tr></tbody>
				<thead>
					   <tr>
					   	<th>Num dossier</th>
					   	  <th>age</th>
					   	<th>Gr-sanguin</th>
					   	<th>assurance</th>
                                        <th>num assurance</th>
					   </tr>
					</thead>
					<tbody> 
						<?php foreach ($DPI as  $dpi):?>
				<tr>
				<td><?=$dpi['NDP']?> </td>	<td><?=$dpi['age_p']?> </td><td><?=$dpi['Gr_sanguin']?></td><td><?=$dpi['Num_ass']?> </td><td><?=$dpi['ass']?> </td>
					<?php endforeach;?></tr></tbody>
				<thead><tr>
	        <th>poid sec</th>
	        <th>bain</th>
	        <th>conductivité</th>
                <th>description</th>
                <th>UF</th>
	       </tr> </thead>
	       <tbody>
	       	  <?php foreach ($DPI as  $dpi):?>
	       	<tr><td><?=$dpi['p_sec']?></td><td> <?=$dpi['bain']?></td><td><?=$dpi['conductivite']?></td><td><?=$dpi['description']?></td><td><?=$dpi['UF']?></td>
	       		<?php endforeach;?></tr></tbody>
	       
	        <th>action</th>
 
	       </tr>
	   </thead><tbody>
	        <?php foreach ($DPI as  $dpi):?>
				<tr><td>
				
						<a href="listesean.php?patient=<?=$dpi['id_p'];?>"class="btn btn-primary p-2">afficher liste des séances</a></td>
						<?php endforeach;?></td>
 
 
	      </tr></tbody>
				</table></section></body></html>