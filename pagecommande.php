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
?>
<?php 
//enregistrer les clients
if(isset($_POST['benrg'])&&!empty($nom)&&!empty($contact)&&!empty($numero)){
$sql=mysqli_query($conn,"insert into tb_client(num_ordre,nom_client,contact_client) values('$numero','$nom','$contact')");
  if($sql){
 $mess1="<b>Enregistrement éffectué avec succès !</b>";
}
else{
 $mess1="<b>Erreur !</b>";
}
}
?>
<?php 
//supprimer un enregistrement de client
if(isset($_POST['bsupp'])&&!empty($numero)){
$sql=mysqli_query($conn,"delete from tb_client where num_ordre='$numero'");
if($sql){
 $mess1="<b>Suppréssion éffectuée avec succès !</b>";
}
else{
 $mess1="<b>Erreur !</b>";
}
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
<a href="commande.php">ENREGISTREMENT DES COMMANDES VOITURES</a><br>
 <h2>Formulaire d'enregistrement des clients</h2>
 <br>
 <form action="" method="POST">
      <fieldset >
      <legend ><b>Client</b></legend>
      <table>
      <tr><td><b>Numéro d'ordre</b></td><td><input type="text" name="numero" value="<?php print $numero;?>"></td><td><input type="submit" name="brech" value="CHERCHER" class="bouton"></td></tr>
      <tr><td><b>Nom client</b></td><td><input type="text" name="nom" value=""></td></tr>
      <tr><td><b>Contact client</b></td><td><input type="text" name="contact" value=""></td></tr>
      <tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
      <tr><td></td><td><input type="submit" name="bsupp" value="SUPPRIMER" class="bouton"></td></tr>
      <tr><td></td><td><?php print $mess1;?></td></tr>
      </table>
      </fieldset>
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
      <br>
      <?php 
//affichage de la liste des clients
print"<h3>Liste des clients</h3>";
	$rq1=mysqli_query($conn,"select * from tb_client ");
	print'<table border="1" class="tab"><tr><th>Numéro d\'ordre</th><th>Nom client</th><th>Contact client</th></tr>';
	
	while($rst=mysqli_fetch_assoc($rq1)){
	         print"<tr>";
	         echo"<td>".$rst['num_ordre']."</td>";
	         echo"<td>".$rst['nom_client']."</td>";
	          echo"<td>".$rst['contact_client']."</td>";
	         print"</tr>";
	}
	print'</table>';

?>
<?php 
?>
</div>
</body>
</html>