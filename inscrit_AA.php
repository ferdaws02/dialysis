<?php
session_start();
$bdd=new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(isset($_POST['enregistrer'])){
  if(isset($_POST['id_org']) and isset($_POST['nom']) and isset($_POST['Numtel']) and isset($_POST['adr']) and isset($_POST['mdp'])and isset($_POST['mdp_confirme'])){
  if(!empty($_POST['nom']) and !empty($_POST['Numtel']) and !empty($_POST['adr'])and !empty($_POST['mdp'])and !empty($_POST['mdp_confirme'])){
    $id=trim(htmlspecialchars($_POST['id_org']));
    $nom=trim(htmlspecialchars($_POST['nom']));
    $num=trim(htmlspecialchars($_POST['Numtel']));
    $adr=trim(htmlspecialchars($_POST['adr']));
    $mdp=trim(htmlspecialchars($_POST['mdp']));
    $mdp_c=trim(htmlspecialchars($_POST['mdp_confirme']));
        if(strlen($nom)>=3 and strlen($nom)<=255){
           if(strlen($mdp)>=8 and strlen($mdp)<=100){
            if($mdp==$mdp_c){
              $mdp_cry=md5($mdp);
              $req=$bdd->prepare('INSERT INTO Agent_administratif ( pseudo_AA, NTel_AA, adr_AA, mdp_AA, nom) VALUES (?,?,?,?,?)');
              $req->execute(array($nom ,$num, $adr, $mdp_cry, $id));
              $error="votre compte créer avec succée";}

            else
            {$error="vos mots de passe ne correspondent pas";}

        }else
        {$error="votre mot de passe doit comporter entre 8 et 100 caractères";}

        }else
        {$error="votre pseudo doit faire moin de 255 caractères et plus que 3 caractères";}

      
}}}
?>
<!DOCTYPE html>
<html>
<head>
<title>inscrivez-vous</title>
<!-- custom-theme -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/stylenavbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php"><img src="images/logo ws.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link " href="../indexcomm.php">bievenue</a>
      </li>
       <li class="nav-item ">
      <a class="nav-link " href="../login/connect_AA.php">se connecter</a>
      </li>
 
    </ul>
  </div>
</div>
</nav>
<!--fin navigation bar--->


<div class="container">
  <?php if (isset($error)){
echo' <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>'  ,$error,
'</div>';}?>
  <div class="ragistration-box">
   <h2><center>formulaire d'inscription</center></h2>
   <br>
  <div class="row justify-content-center">
    <div class="col-md-8">
<form action="inscrit_AA.php" method="POST">
 <div class="form-group">
      <?php
      $id_org=htmlspecialchars($_SESSION['nom_org']['nom']);
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
  <label>votre pseudo </label>
  <input type="text" name="nom" class="form-control" id='nom'placeholder="par exemple nom et prénom" required>
</div>
<div class="form-group">
  <label>votre adresse </label>
  <input type="text" name="adr" class="form-control" id='adr'placeholder="votre adresse" required>
</div>
<div class="form-group">
  <label>votre numéro de téléphone </label>
  <input type="text" name="Numtel" class="form-control" id='Numtel'placeholder="votre numéro de téléphone" required>
</div>
<div class="form-group">
  <label>mot de passe </label>
  <input type="password" name="mdp" class="form-control" id='mdp'placeholder="saisir votre mot de passe" required>
</div>
<div class="form-group">
  <label>confirme mot de passe </label>
  <input type="password" name="mdp_confirme" class="form-control" id='mdp_confirme'placeholder="resaisir votre mot de passe " required>
</div>
<button type="submit" class="btn btn-primary" name="enregistrer"id="enregistrer">s'inscrire</button>
</form>
</div>
</div>
</div>

<?php if (isset($error)){
echo' <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>'  ,$error,
'</div>';}?>


 </body>
</html>