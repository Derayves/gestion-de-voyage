<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 

?>
<?php 
$num_place=@$_POST["num_place"];
$type_place=@$_POST["type_place"];
$mess1='';
?>
<?php 
//supprimer une place
if(isset($_POST['bsupp'])&&!empty($num_place)){
 $sql=mysqli_query($conn,"delete from tb_place where num_place='$num_place'");
 if($sql){
   $mess1="<b>Suppréssion éffectuée avec succès !</b>";
 }
}

?>

<?php 
//enregistrement place
if(isset($_POST['benrg']) && !empty($num_place) && !empty($type_place)){
$sql=mysqli_query($conn,"insert into tb_place(num_place,type_place,disponible) values('$num_place','$type_place','oui')");
 
if($sql){
 $mess1="<b>Enregistrement éffectué avec succès !</b>";
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
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<meta charset="utf8">
</head>

<body>
<div align="center">
<br>
<a href="pageoccupation.php"><font color= 'red'>OCCUPATION DES PLACES </font></a><br><br>
<h2> FORMULAIRES DES OCCUPATIONS </h2>
<form action="" method="POST">
<fieldset >
<legende> place </legende>
<table>

<tr><td><b>Type place</b></td><td><select name="type_place" id="type_place"  >
	<option  value="<?php echo $type_place; ?>"><?php echo $type_place; ?></option>
	      <option  value="PLACE VOITURE">PLACE VOITURE</option>
         <option  value="PLACE MOTO">PLACE MOTO</option>
        <option  value="PLACE VELO">PLACE VELO</option>
     </select></td></tr>
	 <tr><td><b>Numéro place</b></td><td><input type="text" name="num_place" value=""></td></tr>
<tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
<tr><td></td><td><input type="submit" name="bsupp" value="SUPPRIMER" class="bouton"></td></tr>
<tr><td></td><td><?php echo $mess1;?></td></tr>
</table>

</fieldset>
</form>
<br><br>
<?php 
//affichage des place de parking enregistrées
	$rq1=mysqli_query($conn,"select * from tb_place ");
	echo'<table border="1" class="tab"><tr><th>Numéro place</th><th>Type place</th></tr>';
	
	while($rst=mysqli_fetch_assoc($rq1)){
	 
	        $num=$rst['num_place'];
	        $type=$rst['type_place'];
	         print"<tr>";
	         echo"<td>$num</td>";
	         echo"<td>$type</td>";
	         print"</tr>";
	}
	echo'</table>';

?>
</div>
</body>
</html>