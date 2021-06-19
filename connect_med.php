<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(isset($_POST['connecter'])){
  if(isset($_POST['nom_med'])and isset($_POST['mdp_med'])){
    if(!empty($_POST['nom_med']) and !empty($_POST['mdp_med'])){echo "ok";
      $pseudo=htmlspecialchars($_POST['nom_med']);
      $mdp=htmlspecialchars(md5($_POST['mdp_med']));
      $req=$bdd->prepare('SELECT * FROM medecin WHERE pseudo_med=? AND mdp_med=?');
      $req->execute(array($pseudo,$mdp));
      if($req->rowCount()==1){
        $med=$req->fetch();
        $_SESSION['nom_med']=$med;
       header("location:profilmed.php?pseudo=" .$_SESSION['nom_med']['pseudo_med']."organisation=".$_SESSION['nom_med']['nom']);


      }else{
        $error="pseudo ou mot de passe incorrecte";}
    }

  }else{
    $error="erreur";
  }
}?>
<!DOCTYPE html>
<html>
<head>
<title>se connecter</title>
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
  <link href="../inscrit/css/style.css" rel="stylesheet">
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
   <h2><center>formulaire de connexion</center></h2>
   <br>
  <div class="row justify-content-center">
    <div class="col-md-8">
<form action="connect_med.php" method="POST">

<div class="form-group">
  <label>votre pseudo </label>
  <input type="text" name="nom_med" class="form-control" placeholder="par exemple nom et prénom" required>
</div>
<div class="form-group">
  <label>mot de passe </label>
  <input type="password" name="mdp_med" class="form-control" placeholder="saisir votre mot de passe" required>
</div>

<button type="submit" class="btn btn-primary" name="connecter"id="connecter">se connecter</button>
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