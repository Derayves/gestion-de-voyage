<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbvoyageurs";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="cssfil.css">
</head>

<body>
<div align="center">
<a href="index.php">requetes</a><br>
<?php 

	//Total passagers par mois et par ville de départ
	     $rq=mysqli_query($conn,"select mois,annee,villedep,sum(nbpassagers) as snbpassagers from voyage group by mois,villedep");
	      print'<h2>Total passagers par mois et par ville départ</h2>';
	print'<table border="1" class="tab"><tr><th>Mois</th><th>Année</th>
	<th>Ville départ</th><th>Total passagers</th></tr>';
	    
	     while($rst=mysqli_fetch_assoc($rq)){
	      $mois=$rst['mois'];
	       $annee=$rst['annee'];
	        $villedep=$rst['villedep'];
	        $nbpassagers=$rst['snbpassagers'];
	         print"<tr>";
	         echo"<td>$mois</td>";
	         echo"<td>$annee</td>";
	         echo"<td>$villedep</td>";
	         echo"<td>$nbpassagers</td>";
	         print"</tr>";
	         
	     }
	   print'</table>';
	?>
	<?php 

	//Total passagers par mois et par ville de départ
	     $rq=mysqli_query($conn,"select mois,annee,villedest,sum(nbpassagers) as snbpassagers from voyage group by mois,villedest");
	      print'<h2>Total passagers par mois et par ville de destination</h2>';
	print'<table border="1" class="tab"><tr><th>Mois</th><th>Année</th>
	<th>Ville de destination</th><th>Total passagers</th></tr>';
	    
	     while($rst=mysqli_fetch_assoc($rq)){
	      $mois=$rst['mois'];
	       $annee=$rst['annee'];
	        $villedest=$rst['villedest'];
	        $nbpassagers=$rst['snbpassagers'];
	         print"<tr>";
	         echo"<td>$mois</td>";
	         echo"<td>$annee</td>";
	         echo"<td>$villedest</td>";
	         echo"<td>$nbpassagers</td>";
	         print"</tr>";
	         
	     }
	   print'</table>';
	?>
</div>
</body>
</html>