<?php
session_start();
$bdd = new PDO('mysql:host=dialyskfer.mysql.db;dbname=dialyskfer;charset=utf8', 'dialyskfer', 'Ons2017ie');
if(isset($_POST['enregistrer'])){echo('ok');

  if(isset($_POST['DS']) and isset($_POST['PH']) and isset($_POST['TA_D']) and isset($_POST['TA_F']) and isset($_POST['PD'])and isset($_POST['PF'])and isset($_POST['Prise_P'])and isset($_POST['Pert_P'])and isset($_POST['PV'])and isset($_POST['PTM'])and isset($_POST['ob'])and isset($_POST['T_H'])and isset($_POST['num_post'])){
  if(!empty($_POST['DS']) and !empty($_POST['PH']) and !empty($_POST['TA_D']) and !empty($_POST['TA_F']) and !empty($_POST['PD'])and !empty($_POST['PF'])and !empty($_POST['Prise_P'])and !empty($_POST['Pert_P'])and !empty($_POST['PV'])and !empty($_POST['PTM'])and !empty($_POST['ob'])and !empty($_POST['T_H'])and !empty($_POST['num_post'])){echo('ok');
      $id_P=htmlspecialchars($_POST['id_P']);echo($id_P."/");
     $id_med=htmlspecialchars($_POST['id_med']);echo($id_med."/");
    $id_inf=htmlspecialchars($_SESSION['nom_inf']['id_inf']);echo($id_inf."/");
    $DS=trim(htmlspecialchars($_POST['DS']));echo($DS."/");
    $NS=trim(htmlspecialchars($_POST['NS']));echo($NS."/");
    $PH=trim(htmlspecialchars($_POST['PH']));echo($PH."/");
    $TA_D=trim(htmlspecialchars($_POST['TA_D']));echo($TA_D."/");
    $TA_F=trim(htmlspecialchars($_POST['TA_F']));echo($TA_F."/");
    $PD=trim(htmlspecialchars($_POST['PD']));echo($PD."/");
    $PF=trim(htmlspecialchars($_POST['PF']));echo($PF."/");
    $Prise_P=trim(htmlspecialchars($_POST['Prise_P']));echo($Prise_P."/");
    $Pert_P=trim(htmlspecialchars($_POST['Pert_P']));echo($Pert_P."/");
    $PV=trim(htmlspecialchars($_POST['PV']));echo($PV."/");
    $PTM=trim(htmlspecialchars($_POST['PTM']));echo($PTM."/");
    $ob=trim(htmlspecialchars($_POST['ob']));echo($ob."/");
    $EC="";echo($EC."/");
    $num_post=trim(htmlspecialchars($_POST['num_post']));echo($num_post."/");
    $T_H=trim(htmlspecialchars($_POST['T_H']));echo($T_H);
$req=$bdd -> prepare('INSERT INTO seances (num_S,DS,plage_H,t_hepa,TA_D,Prise_P,TA_F,Pert_P,PD,PF,obser,EC,PV,PTM,id_inf,id_p,num_post,id_med) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $req->execute(array($NS,$DS,$PH,$T_H,$TA_D,$Prise_P,$TA_F,$Pert_P,$PD,$PF,$ob,$EC,$PV,$PTM,$id_inf,$id_P,$num_post,$id_med));
 

             }}}
  $id_P=htmlspecialchars($_POST['id_P']);
  $req=$bdd->prepare('SELECT * FROM patients WHERE id_p=?');
    $req->execute(array($id_P));
   if($req->rowCount()==1){
        $row=$req->fetch();
        $_SESSION['nom_P']=$row;   header("location:liseance.php?patient=".$_SESSION['nom_P']['id_p']);}
             ?>
