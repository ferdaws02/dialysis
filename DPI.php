<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['dossier']));{
	$id_P=htmlspecialchars($_GET['dossier']);
	$id_AA=htmlspecialchars($_SESSION['nom']['id_AA']);
	$req=$bdd->prepare('SELECT * FROM patients WHERE id_p=?');
	$req->execute(array($id_P));
	$patient=$req->fetchAll();}
?>
<!DOCTYPE html>
<html lang="en">
<title>DPI</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="../css/DPIstyle.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
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
		
				<li class="nav-item ">
    <a class="nav-link "  href="pstdia.php">list des postes</a>
	</li>
	
		<li class="nav-item">
    <a class="nav-link " href="lipatient.php">liste des patients</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="../déconnxion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>

<div class="container">
<h3 class="text-center text-dark mt-3">données du patient</h3>
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
			
			<?php foreach ($patient as  $pat):?>
				<tr>
					<td><?=$pat['nom_p']?> </td><td><?=$pat['prenom_p']?></td><td><?=$pat['adr_p']?> </td><td><?=$pat['Ntel_p']?></td><td> <?=$pat['sexe_p']?></td><td><?=$pat['DDN']?></td>
				
	    </tr>
				
			<?php endforeach;?>
			</tbody>
		</table>	
	</div>


  <div class="profbox">
   <h2><center>formulaire des données médiales </center></h2>
   <br>
  <div class="row justify-content-center">
    <div class="col-md-8">
<form action="actionDPI.php" method="POST">
		<?php
			$id_P=htmlspecialchars($_GET['dossier']);
			$reponse = $bdd->prepare('SELECT id_p,nom_p,prenom_p FROM patients Where id_p=? ');
			$reponse->execute(array($id_P));
			 
			while ($donnees = $reponse->fetch()):
			?>
			<select name="Id_P">
			           <option value="<?= $donnees['id_p']; ?>"> <?php echo $donnees['nom_p']. " " .$donnees['prenom_p']; ?></option>
			       </select>
			   
			<?php
			endwhile;
			 
			$reponse->closeCursor();
			 
			?>
  <div class="form-group">
 
  <label >age</label>
  <input type="number" name="age_P" class="form-control" id='ID'placeholder="saisir l'age du patient" required>
</div> 
<fieldset class="form-group row">
	<legend class="col-form-legend ">groupe sanguin</legend>
    <div class="col-sm-5">

		<select name="Gr_S" class="custom-select">
		  <option selected>choisit</option>
		  <option value="A+">A+</option>
		  <option value="A-">A-</option>
		  <option value="B+">B+</option>
		  <option value="B-">B-</option>
		  <option value="AB+">AB+</option>
		  <option value="AB-">AB-</option>
		  <option value="O+">O+</option>
		  <option value="O-">O-</option>
		</select>
	</div>
</fieldset>

<fieldset class="form-group row">
  <legend class="col-form-legend col-sm-2">assurence</legend>
    <div class="col-sm-7">
  		<select name="ass" class="custom-select">
		  <option selected value="RIEN">RIEN</option>
		  <option value="CNSS">CNSS</option>
		  <option value="CNRPS">CNRPS</option>4
		</select>
	</div>
</fieldset>
<div class="form-group">
  <label >code assurence </label>
  <input type="text" name="num_ass" class="form-control " id='num-ass'placeholder="saisir le numéro d'assurence sociale s'il existe" >
</div>
<div class="form-group">
  <label>poid sec </label>
  <input type="text" name="P_sec" class="form-control" id='P_sec'placeholder="saisir le poid en kg" required>
</div>
<div class="form-group">
  <label>bain</label>
  <input type="text" name="bain" class="form-control" id='bain' required>
</div>
<div class="form-group">
  <label>conductivité </label>
  <input type="text" name="conduct" class="form-control" id='conductivité' required>
</div>
<div class="form-group">
  <label>description </label>
  <textarea type="text" name="desc" class="form-control" id='mdp_confirme'placeholder="description de l'état du patient " required></textarea>
</div>
<div class="form-group">
  <label>UF </label>
  <input type="text" name="UF" class="form-control" id='UF'placeholder="saisir le coeificient d'ultrafiltration" required>
</div>

<button type="submit" class="btn btn-primary" name="valider"id="valider">valider</button></form>
</div>
</div>
</div>



 </body>
</html>

