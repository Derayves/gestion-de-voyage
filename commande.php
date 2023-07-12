<?php 
?>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "factory_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 

?>
<?php 
$mess1="";
$nom=@$_POST["nom"];
$contact=@$_POST["contact"];
$numero=@$_POST["numero"];
$numero2=@$_POST["numero2"];
$nomvoit=@$_POST["nomvoit"];
$id=@$_POST["id"];
?>
<?php 
//enregistrer les commandes
if(isset($_POST['benrg'])&&!empty($numero2)&&!empty($nomvoit)){
$sql=mysqli_query($conn,"insert into tb_action(numero,nom_voiture,nature_action,date_action) values('$numero2','$nomvoit','COMMANDE',now())");
  if($sql){
 $mess1="<b>Enregistrement éffectué avec succès !</b>";
}
else{
 $mess1="<b>Erreur !</b>";
}
}
?>
<?php
$nb=0;
 $rq=mysqli_query($conn,"select count(*) as nb from tb_action where id_action='$id' ");
 if($rst=mysqli_fetch_assoc($rq)){
   $nb=$rst['nb'];
 }
//supprimer un enregistrement de commande
if(isset($_POST['bsupp'])&&!empty($id)){
   if($nb>0){
$sql=mysqli_query($conn,"delete from tb_action where id_action='$id' and nature_action='COMMANDE'");
if($sql){
 $mess1="<b>Suppréssion éffectuée avec succès !</b>";
}
else{
 $mess1="<b>Erreur !</b>";
}
}
else{$mess1="<b>Aucune commande n'a cet identifiant!</b>";}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf8">
</head>

<body>
	<div align="center">
	<br>
<a href="index.php">ENREGISTREMENT DES CLIENTS</a><br><br>
<form action="" method="POST">
<table>
<tr><td><input type="number" min="1" name="numero" value="<?php print $numero;?>" placeholder="Numéro d'ordre"></td><td><input type="submit" name="brech" value="CHERCHER UN CLIENT" class="bouton2"></td></tr>
</table>
</form>
<br>
<?php 
      //recherche d'un client
      if(isset($_POST['brech'])&&!empty($numero)){
      $rq1=mysqli_query($conn,"select * from tb_client where num_ordre='$numero' ");
	print'<table border="1" class="tab"><tr><th>Numéro d\'ordre</th><th>Nom client</th><th>Contact client</th></tr>';
	
	while($rst=mysqli_fetch_assoc($rq1)){
	         print"<tr>";
	         echo"<td>".$rst['num_ordre']."</td>";
	         echo"<td>".$rst['nom_client']."</td>";
	          echo"<td>".$rst['contact_client']."</td>";
	         print"</tr>";
	}
	print'</table>';
      }
      ?>
<h2>Formulaire d'enregistrement des commandes</h2>
 <form action="" method="POST">
      <fieldset >
      <legend ><b>Commande</b></legend>
      <table>
      <tr><td><b>Numéro d'ordre</b></td><td><input type="number" min="1" name="numero2" value="<?php print $numero2;?>"></td><td></td></tr>
      <tr><td><b>Nom voiture</b></td><td><select name="nomvoit" id="nomvoit"  >
	<option  value="<?php echo $nomvoit; ?>"><?php echo $nomvoit; ?></option>
	      <option  value="STAREX">STAREX</option>
         <option  value="MAZDA">MAZDA</option>
        <option  value="SPRINTER">SPRINTER</option>
     </select></td></tr>
      <tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
      <tr><td><input type="number" min="1" name="id" placeholder="ID commande" value="<?php print $id;?>"></td><td><input type="submit" name="bsupp" value="SUPPRIMER" class="bouton"></td></tr>
      <tr><td></td><td><?php print $mess1;?></td></tr>
      </table>
      </fieldset>
      </form>
      <br>
  <?php 
//affichage de la liste des commandes
print"<h3>Liste des commandes en cours</h3>";
	$rq1=mysqli_query($conn,"select * from tb_action where nature_action='COMMANDE' ");
	print'<table border="1" class="tab"><tr><th>Numéro d\'ordre</th><th>Nom voiture</th><th>Date commande</th><th>ID commande</th></tr>';
	
	while($rst=mysqli_fetch_assoc($rq1)){
	         print"<tr>";
	         echo"<td>".$rst['numero']."</td>";
	         echo"<td>".$rst['nom_voiture']."</td>";
	          echo"<td>".$rst['date_action']."</td>";
	          echo"<td>".$rst['id_action']."</td>";
	         print"</tr>";
	}
	print'</table>';

?>
<?php 
?>
	</div>
</body>
</html>