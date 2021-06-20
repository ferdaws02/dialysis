<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');

if(isset($_GET['dossier']));{
  $id_P=htmlspecialchars($_GET['dossier']);
$req=$bdd->prepare('SELECT * FROM patients,dossierpatient WHERE patients.id_p=? and dossierpatient.id_p=?');
  $req->execute(array($id_P,$id_P));
    $patient=$req->fetchAll();}
?>
<!DOCTYPE html>
<html lang="en">
<title>séance</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="css/styleinf.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
</head>
 <style type="text/css">
        .hideButTakeUpSpace
        {
            visibility: hidden;
        }

        .hideDontTakeUpSpace
        {
            display:none;
        }

    </style>

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
     </thead><tbody> <?php foreach ($patient as  $dpi):?>
        <tr>
        <td><?=$dpi['NDP']?> </td>  <td><?=$dpi['age_p']?> </td><td><?=$dpi['Gr_sanguin']?></td><td><?=$dpi['Num_ass']?> </td><td><?=$dpi['ass']?></td><td> <?=$dpi['P_sec']?></td><td><?=$dpi['bain']?></td><td><?=$dpi['conductivite']?></td><td><?=$dpi['UF']?></td></tr>
            <?php endforeach;?></tbody>
     
    </table>  
	 


    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Séance</strong>
    </h5>  

    <div class="ragistration-box">
        <form  action="POST.php"method="POST"class="text-center" >

  
            <div class="md-form">
               <div class="row">
               <div class="col">
              <label>patient:</label>
              <?php
                $id_P=htmlspecialchars($_GET['dossier']);
                    
                    $reponse = $bdd->prepare("SELECT id_p,nom_p,prenom_p FROM patients Where id_p=? ");
                    $reponse->execute(array($id_P));
                    ?>
                  <select name="id_P">  
                    <option  value="">patient </option>
                  <?php while ($donnees = $reponse->fetch()):?>
                    <option value=" <?= $donnees['id_p']; ?>"> <?php echo $donnees['nom_p'], " ".$donnees['prenom_p']; ?></option> 
                  <?php endwhile; $reponse->closeCursor();?>
                  </select> 
                         </div>
 <div class="col">
              <label>medecin:</label>
              <?php
                
                    
                    $reponse = $bdd->prepare("SELECT pseudo_med,id_med FROM medecin  ");
                  $reponse->execute();
                    ?>
                  <select name="id_med">  
                    <option  value="0">choisir medecin</option>
                  <?php while ($donnees = $reponse->fetch()):?>
                    <option value="<?= $donnees['id_med'];?>"> <?php echo $donnees['pseudo_med']; ?></option> 
                  <?php endwhile; $reponse->closeCursor();?>
                  </select> 
                         </div></div></div></div>
                
               <div class="row">
                <div class="col">
                  <label for="materialRegisterFormFirstName">date de séance</label>
                    <input type="Date" class="form-control" id="materialRegisterFormFirstName" placeholder="nom du patient" name="DS">
                </div>
                <div class="col">
                  <label>plage horaire du séance</label>
                    <select name="PH">
                        <option value="0">choisit</option>
                        <option value="matin">matin </option>
                        <option value="aprés midi">aprés midi </option>
                    </select>
                </div>
                      <div class="row">
                    <div class="col">
              <label>poste:</label>
              <?php
                    $reponse = $bdd->prepare("SELECT * FROM postes  ");
                    $reponse->execute(array($dispo));
                    ?>
                  <select name="num_post">  
                    <option  value="0">num_post/marque/lit/chambre/plage de dispo </option>
                  <?php while ($donnees = $reponse->fetch()):?>
                    <option value=" <?= $donnees['num_post']; ?>"> <?php echo $donnees['num_post'], "/".$donnees['marq_M'],"/".$donnees['num_lit'] ,"/".$donnees['num_ch'] ,"/".$donnees['Pde_dispo']; ?></option> 
                  <?php endwhile; $reponse->closeCursor();?>
                  </select> 
                         </div>
                <div class="col">
                <label for="materialRegisterFormPassword">numéro de séance</label>
                <input type="number" class="form-control"   name="NS"   >
                </div> 
                       </div></div>

              
                      
   

            <!-- Password -->
            <div class="md-form">
               <div class="row">
                <div class="col-md-6">
                <label for="materialRegisterFormPassword">tension artériel au début de séance</label>
                <input type="decimal" class="form-control"   name="TA_D"  >
                </div>
        
               <div class="col-md-6">
                <label for="materialRegisterFormPassword">tension artériel au fin de séance</label>
                <input type="decimal" class="form-control"   name="TA_F"   >
               </div>
            </div>
          </div>
 <div class="md-form">
               <div class="row">
                <div class="col-md-6">
                <label for="materialRegisterFormPassword">poid au début de séance </label>
                <input type="float" class="form-control"   name="PD"  >
                </div>
        
               <div class="col-md-6">
                <label for="materialRegisterFormPassword">poid a la fin de séance</label>
                <input type="float" class="form-control"   name="PF"  >
               </div>
            </div>
          </div> <div class="md-form">
               <div class="row">
                <div class="col-md-6">
                <label for="materialRegisterFormPassword">prise de poid</label>
                <input type="decimal" class="form-control" name="Prise_P"  >
                </div>
        
               <div class="col-md-6">
                <label for="materialRegisterFormPassword">pert du poid</label>
                <input type="decimal" class="form-control"   name="Pert_P"   >
               </div>
            </div>
          </div>
           <div class="md-form">
               <div class="row">
                <div class="col-md-6">
                <label for="materialRegisterFormPassword">pression vineuse</label>
                <input type="decimal" class="form-control"   name="PV"  >
                </div>
        
               <div class="col-md-6">
                <label for="materialRegisterFormPassword">presion transmembranaire</label>
                <input type="decimal" class="form-control"   name="PTM"   >
               </div>
            </div>
          </div>
           <div class="md-form">
               <div class="row">
                <div class="col-md-6">
                 <label for="materialRegisterFormPassword">observation</label>
                <textarea  class="form-control "   name="ob"  ></textarea>
                </div>
        
               <div class="col-md-6">
                <label for="materialRegisterFormPassword">taux d'héparine</label>
                <input type="text" class="form-control"   name="T_H"  >
               </div>
            </div>
          </div>
         
                  <div class="row">
                
              </div><button type="submit" class="btn btn-primary" name="enregistrer">enregistrer</button></form>
 </div>
        </form>
        </div>
      </div>
</body>
</html> 
 
  

