<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbvoyageurs";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Erreur connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<?php 
$villedep=@$_POST['villedep'];
$villedest=@$_POST['villedest'];
$nbp=@$_POST['nbp'];
$annee=@$_POST['annee'];
$mois=@$_POST['mois'];
$jour=@$_POST['jour'];
$mess='';

//insertion

if(isset($_POST['badd'])&&!empty($nbp)){
$sql=mysqli_query($conn,"insert into voyage(villedep,villedest,nbpassagers,annee,mois,jour) 
values('$villedep','$villedest','$nbp','$annee','$mois','$jour')");
if($sql){
$mess="<br><b class='succes'>Insertion réussie !</b>";
}
else
$mess="<br><b class='erreur'>Erreur d'insertion !</b>";
}

?>
<?php 
//suppression
$idvoy=@$_POST['idvoy'];
if(isset($_POST['bsup'])&&!empty($idvoy)){
$sql=mysqli_query($conn,"delete from voyage where idvoy='$idvoy'");
if($sql){
$mess="<br><b class='succes'> réussie !</b>";
}
else
$mess="<br><b class='erreur'>Impossible de supprimer !</b>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<link rel="stylesheet" type="text/css" href="cssfil.css">
	<meta charset="utf8">
</head>

<body>
	<div align="center">
	<nav>
          <ul>
               <li><a href="requetes.php">VOYAGES</a></li>
               <li><a href="../parking_gestion/occupation.php">OCCUPATION DES PLACES</a></li>
          </ul>
     </nav>
          <h2 >Enregistrement des voyages</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
     <fieldset >
	<table >
	<tr><td><?php print $mess;?></td></tr>
	<tr><td><b>Ville départ :</b></td></tr>
	<tr><td><select name="villedep" id="villedep"  >
         <option  value="Antananarivo">Antananarivo</option>
        <option  value="Majunga">Majunga</option>
         <option  value="Fianaratsoa">Fianaratsoa</option>
          <option  value="Diego">Diego</option>
           <option  value="Tulear">Tulear</option>
           <option  value="Tamatave">Tamatave</option>
     </select></td></tr>
	
	<tr><td><b>Ville destination :</b></td></tr>
	<tr><td><select name="villedest" id="villedest"  >
     <option  value="Antananarivo">Antananarivo</option>
        <option  value="Majunga">Majunga</option>
         <option  value="Fianaratsoa">Fianaratsoa</option>
          <option  value="Diego">Diego</option>
           <option  value="Tulear">Tulear</option>
           <option  value="Tamatave">Tamatave</option>
     </select></td></tr>
	<tr><td><b>Nombre passagers :</b></td></tr>
		<tr><td><input type="number" name="nbp" min="1"></td></tr>
	
     <tr><td><b>Année :</b></td></tr>
		<tr><td><input type="number" name="annee" min="2023"value="2030"></td></tr>
     <tr><td><b>Mois :</b></td></tr>
	<tr><td><select name="mois" id="mois"  >
         <option  value="1">Janvier</option>
        <option  value="2">Fevrier</option>
        <option  value="3">Mars</option>
        <option  value="4">Avril</option>
        <option  value="5">Mai</option>
        <option  value="6">Juin</option>
        <option  value="7">Juillet</option>
        <option  value="8">Aout</option>
        <option  value="9">Septembre</option>
        <option  value="10">Octobre</option>
        <option  value="11">Novembre</option>
        <option  value="12">Decembre</option>
     </select></td></tr>
     <tr><td><b>Jour :</b></td></tr>
	<tr><td><select name="jour" id="jour"  >
         <option  value="1">1</option>
        <option  value="2">2</option>
        <option  value="3">3</option>
        <option  value="4">4</option>
        <option  value="5">5</option>
        <option  value="6">6</option>
        <option  value="7">7</option>
        <option  value="8">8</option>
        <option  value="9">9</option>
        <option  value="10">10</option>
        <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
        <option  value="19">19</option>
        <option  value="20">20</option>
        <option  value="21">21</option>
        <option  value="22">22</option>
        <option  value="23">23</option>
        <option  value="24">24</option>
        <option  value="25">25</option>
        <option  value="26">26</option>
        <option  value="27">27</option>
        <option  value="28">28</option>
        <option  value="29">29</option>
        <option  value="30">30</option>
        <option  value="31">31</option>
     </select></td></tr>
	<tr><td><input type="submit" name="badd" value="Enregistrer" ></td></tr>
	<tr><td><input type="number" name="idvoy" min="1" placeholder="ID voyage"></td>
	<td><input type="submit" name="bsup" value="Supprimer" ></td></tr>

	</table>
     </fieldset >
	</form>
	<br>
		<?php 

	//l'affichage de la liste des voyages éffectués
	     $rq=mysqli_query($conn,"select * from voyage order by idvoy desc");
	print'<table border="1" class="tab"><tr><th>ID voyage</th><th>Départ</th>
	<th>Destination</th><th>Nombre passagers</th><th>Année</th><th>Mois</th><th>Jour</th></tr>';
	     while($rst=mysqli_fetch_assoc($rq)){
	     
	        $idvoy=$rst['idvoy'];
	        $villedep=$rst['villedep'];
	        $villedest=$rst['villedest'];
	        $nbpassagers=$rst['nbpassagers'];
	        $annee=$rst['annee'];
	        $mois=$rst['mois'];
	        $jour=$rst['jour'];
	         print"<tr>";
	         echo"<td>$idvoy</td>";
	         echo"<td>$villedep</td>";
	         echo"<td>$villedest</td>";
	         echo"<td>$nbpassagers</td>";
	         echo"<td>$annee</td>";
	         echo"<td>$mois</td>";
	         echo"<td>$jour</td>";
	        
	         print"</tr>";
	         
	     }
	   print'</table>';
	?>
	
	</div>
</body>
</html>