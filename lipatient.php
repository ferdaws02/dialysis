<?php
include'action.php';
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['organisation']));{
	$id_org=htmlspecialchars($_SESSION['nom']['nom']);

	$req=$bdd->prepare('SELECT * FROM patients WHERE nom=?');
	$req->execute(array($id_org));
$patient=$req->fetchAll();
}


?>
<!DOCTYPE html>
<html lang="en">
<title>liste des patient </title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/styleAA.css" rel="stylesheet">
	
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
	<a class="navbar-brand" href="../index.php"><img src="../images/logo ws.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
		<button type="button" class="btn " data-toggle="modal" data-target="#staticBackdrop">
         enregistrer
		</button>
	
	</li>
		<li class="nav-item">
    <a class="nav-link " href="../profilAA.php">profile </a>
	</li>
			<li class="nav-item">
    <a class="nav-link " href="../postes.php">liste des poste</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="../déconnexion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>
<!--fin navigation bar--->



<!-- Modal -->
<section class="container">
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ajouter un patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <form accept="action.php" method="POST">
		<div class="modal-body"> 
		<div class="form-group">
			<?php
			$id_org=htmlspecialchars($_SESSION['nom']['nom']);
			$reponse = $bdd->prepare('SELECT nom FROM organisations Where nom=? ');
			$reponse->execute(array($id_org));
			 
			while ($donnees = $reponse->fetch()):
			?>
			<select name="id_org">
			           <option value=" <?= $donnees['nom']; ?>"> <?php echo $donnees['nom']; ?></option>
			       </select> 
			<?php
			endwhile;
			 
			$reponse->closeCursor();
			 
			?>
		</div>
 
		<div class="form-group">
		    <label>nom</label>
		    <input type="text" class="form-control" name="nom_P" id="exampleInputEmail1" placeholder="nom_Patient">
		 </div>
		 <div class="form-group">
		    <label >Prénom</label>
		    <input type="text" class="form-control" name="prenom_P" id="exampleInputPassword1" placeholder="prénom_Patient">
		 </div>
		  <div class="form-group">
		    <label >adresse</label>
		    <input type="text" class="form-control" name="adr_P" id="exampleInputPassword1"placeholder="adresse_Patient">
		  </div>
		  <div class="form-group">
		    <label >numéro de téléphone</label>
		    <input type="text" name="Ntel_P" class="form-control" id="exampleInputPassword1"placeholder="téléphone_Patient">
		  </div>
		  <label>sexe :</label>
		  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe_P" id="inlineRadio1" value="femme">
  <label class="form-check-label" for="inlineRadio1">femme</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe_P" id="inlineRadio2" value="homme" >
  <label class="form-check-label" for="inlineRadio2">homme</label>
</div>
		  <div class="form-group">
		    <label >date de naissance</label>
		    <input type="text" name="DDN" class="form-control" placeholder="aaaa-mm-jj">
		  </div>
		  <div class="form-group">
		    <label >email</label>
		    <input type="text" name="email" class="form-control" placeholder= "email s il existe si non  saisir rien">
		  </div>
		  <div class="form-group">
		    <label >pseudo</label>
		    <input type="text" name="pseudo" class="form-control" placeholder= "un pseudo">
		  </div>
		   <div class="form-group">
		    <input type="hidden" name="mdp" class="form-control" value="">
		  </div>


		 
		</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" name="ajouter" class="btn btn-primary">ajouter</button>
		      </div>
	 </form>
		    </div>
		</div>
		  </div>
		</div>


	
	<h3 class="text-center text-dark mt-3">liste des patient préinscrit</h3>
			 <table class="table table-hover">
	<thead>
	      <tr>
	        <th>nom</th>
	        <th>prénom</th>
	        <th>adresse</th>
	        <th>téléphone</th>
	        <th>sexe</th>
	        <th>date de naissance </th>
	        <th>action</th>
	      </tr>
	    </thead>
		   <tbody>
			
			<?php foreach ($patient as  $pat):?>
				<tr>
					<td><?=$pat['nom_p']?> </td><td><?=$pat['prenom_p']?></td><td><?=$pat['adr_p']?> </td><td><?=$pat['Ntel_p']?></td><td> <?=$pat['sexe_p']?></td><td><?=$pat['DDN']?></td>
					<td>
		
						<a href="DPI.php?dossier=<?=$pat['id_p']?>pseudo=<?=$_SESSION['nom']['id_AA'];?>" class="btn btn-primary p-2">valider</a>
	        	<a href="action.php?delete=<?= $pat['id_p'];?>" class="btn btn-danger p-2" onclick="return confirm('vous voulez supprimer ce patient!?')">supprimer</a>
	        	<a href="modipatient.php?modif=<?= $pat['id_p'];?>"  class="btn btn-success p-2">modifier</a>
	        </td>
	    </tr>
				
			<?php endforeach;?>
			</tbody>
		</table>

</section>
</body>
</html>
