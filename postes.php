<?php
include'actionliste.php';
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['pseudo']));{
		$id_AA=htmlspecialchars($_SESSION['nom']['id_AA']);

	$req=$bdd->prepare('SELECT * FROM postes WHERE id_AA=?');
	$req->execute(array($id_AA));
$patient=$req->fetchAll();
}


?>
<!DOCTYPE html>
<html lang="en">
<title>liste des poste</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/styleAA.css" rel="stylesheet">
	
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
		<button type="button" class="btn " data-toggle="modal" data-target="#staticBackdrop">
         enregistrer
		</button>
		<li class="nav-item">
    <a class="nav-link " href="profilAA.php">profile </a>
	</li>
	
			<li class="nav-item">
    <a class="nav-link " href="dossier patient/lipatient.php">liste des patient</a>
	</li>
		<li class="nav-item">
    <a class="nav-link " href="déconnexion.php">déconnecter</a>
	</li>
		</ul>
	</div>
</div>
</nav>
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
	 <form accept="actionliste.php" method="POST">
		<div class="modal-body"> 
                   <div class="form-group">
			
			<?php
			$nom=htmlspecialchars($_SESSION['nom']['nom']);
                        $id_AA=htmlspecialchars($_SESSION['nom']['id_AA']);
			$reponse = $bdd->prepare('SELECT nom FROM Agent_administratif Where nom=? and id_AA=?');
			$reponse->execute(array($nom,$id_AA));
			 
			while ($donnees = $reponse->fetch()):
			?>
			<select name="id_org">
			           <option ><?php echo $donnees['nom']; ?></option>
			       </select> 
			<?php
			endwhile;
			 
			$reponse->closeCursor();
			 
			?>
			</div>
 
		<div class="form-group">
			
			<?php
			$id_AA=htmlspecialchars($_SESSION['nom']['id_AA']);
			$reponse = $bdd->prepare('SELECT id_AA,pseudo_AA FROM Agent_administratif Where id_AA=? ');
			$reponse->execute(array($id_AA));
			 
			while ($donnees = $reponse->fetch()):
			?>
			<select name="id_AA">
			           <option value=" <?= $donnees['id_AA']; ?>"> <?php echo $donnees['pseudo_AA']; ?></option>
			       </select> 
			<?php
			endwhile;
			 
			$reponse->closeCursor();
			 
			?>
			</div>
 
		<div class="form-group">
		    <label>numéro de poste</label>
		    <input type="number" class="form-control" name="num_post" id="exampleInputEmail1" placeholder="num_post">
		 </div>
		 <div class="form-group">
		    <label >marque du machine</label>
		    <input type="text" class="form-control" name="MM" id="exampleInputPassword1" placeholder="marque  machine">
		 </div>
		  <div class="form-group">
		    <label >numéro du lit</label>
		    <input type="number" class="form-control" name="num_lit" id="exampleInputPassword1"placeholder="num lit">
		  </div>
		  <div class="form-group">
		    <label >numéro du chambre</label>
		    <input type="number" name="N_ch" class="form-control" id="exampleInputPassword1"placeholder="num chambre">
		  </div>
		    <div class="form-group">
		  <label>disponibilité</label>
		    <input type="text" name="Dispo" class="form-control" >
		</div>
                       <div class="form-group">
		  <label>Plage de disponibilité</label>
		    <input type="text" name="PDispo" class="form-control" >
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
		<h3 class="text-center text-dark mt-3">liste des poste</h3>
			 <table class="table table-hover">
	<thead>
	      <tr>
	        <th>numéro de post</th>
	        <th>marque machine</th>
	        <th>numéro du lit</th>
	        <th>numéro de chambre</th>
	        <th>disponibilité</th>
                  <th>plage de disponibilité</th>
	         <th>action</th>
	      </tr>
	    </thead>
		   <tbody>
			
			<?php foreach ($patient as  $pat):?>
				<tr>
					<td><?=$pat['num_post']?> </td><td><?=$pat['marq_M']?></td><td><?=$pat['num_lit']?> </td><td><?=$pat['num_ch']?></td><td> <?=$pat['dispo']?></td>
					<td> <?=$pat['Pde_dispo']?></td><td>
		
						
	        	<a href="actionliste.php?delete=<?= $pat['num_post'];?>" class="btn btn-danger p-2" onclick="return confirm('vous voulez supprimer cette poste!?')">supprimer</a>
	        	<a href="modifier.php?modif=<?= $pat['num_post'];?>&amp;plage=<?=$pat['Pde_dispo'];?>" class="btn btn-success">modifier</a>
	        </td>
	    </tr>
				
			<?php endforeach;?>
			</tbody>
		</table>


</section>
</body>
</html>
