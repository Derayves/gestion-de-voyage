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
$nomprod=@$_POST["nomprod"];
$id=@$_POST["id"];
?>
<?php 
//enregistrer les voyages

?>
<?php
$nb=0;
 $rq=mysqli_query($conn,"select count(*) as nb from tb_action where id_action='$id' ");
 if($rst=mysqli_fetch_assoc($rq)){
   $nb=$rst['nb'];
 }
//affichage de la liste des commandes
print"<h3>Liste des commandes en cours</h3>";
	$rq1=mysqli_query($conn,"select * from tb_action where nature_action='COMMANDE'");
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
//affichage de la liste des commandes
print"<h3>Liste des voyages éffectuées</h3>";
	$rq1=mysqli_query($conn,"select * from tb_action where nature_action='VOYAGE' ");
	print'<table border="1" class="tab"><tr><th>Numéro d\'ordre</th><th>Nom voiture</th><th>Date voyage</th><th>ID voyage</th></tr>';
	
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