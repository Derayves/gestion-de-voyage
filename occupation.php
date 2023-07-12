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
$type_place=@$_POST["type_place"];
$id=@$_POST["id"];
$type_moy=@$_POST["type_moy"];
$nom=@$_POST["nom"];
$num_place=@$_POST["num_place"];
$num_im=@$_POST["num_im"];
$mess1='';
?>

<?php 
//enregistrement place
if(isset($_POST['benrg'])&&!empty($id)&&!empty($type_moy)&&!empty($nom)
&&!empty($num_place)){
$sql=mysqli_query($conn,"insert into tb_occupation(proprio_id,proprio_nom,mt_type,mt_matricule,id_place) values('$id','$nom','$type_moy','$num_im','$num_place')");
 
if($sql){
 $mess1="<b>Enregistrement éffectué avec succès !</b>";
 mysqli_query($conn,"update tb_place set disponible='non' where num_place='$num_place'");
}
else{
 $mess1="<b>Erreur !</b>";
}

}

?>
<?php 
if(isset($_POST['blibere'])&&!empty($num_place)){
   $sql=mysqli_query($conn,"update tb_place set disponible='oui' where num_place='$num_place'");
   if($sql){
   mysqli_query($conn,"delete from tb_occupation where id_place='$num_place'");
   $mess1="<b>Place libérée avec succès !</b>";
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
<a href="index.php">ENREGISTREMENT DES PLACES</a><br>
	<h2>Vérifier la disponiblité des places</h2>
	<form action="" method="POST">
	<table><tr><td><select name="type_place" id="type_place"  >
	<option  value="<?php echo $type_place; ?>"><?php echo $type_place; ?></option>
	      <option  value="PLACE VOITURE">PLACE VOITURE</option>
         <option  value="PLACE MOTO">PLACE MOTO</option>
        <option  value="PLACE VELO">PLACE VELO</option>
     </select></td><td><input type="submit" name="bverif" value="VERIFIER" class="bouton"></td></tr></table>
	</form>
	<br>
	<?php 
//Vérifier disponibilité place
if(isset($_POST['bverif'])&&!empty($type_place)){
$rq1=mysqli_query($conn,"select * from tb_place where type_place='$type_place' and disponible='oui' ");
	print'<table border="1" class="tab"><tr><th>Numéro place</th><th>Type place</th></tr>';
	
	while($rst=mysqli_fetch_assoc($rq1)){
	 
	        $num=$rst['num_place'];
	        $type=$rst['type_place'];
	         print"<tr>";
	         echo"<td>$num</td>";
	         echo"<td>$type</td>";
	         print"</tr>";
	}
	print'</table>';
}
?>
<h2>Formulaire d'enregistrement des occupations de places</h2>
<form action="" method="POST">
<fieldset >
<legend >Occupation</legend>
<table>
<tr><td><b>ID propriétaire</b></td><td><input type="text" name="id" value="" placeholder="TEL OU CIN"></td></tr>
<tr><td><b>Nom propriétaire</b></td><td><input type="text" name="nom" value="" ></td></tr>
<tr><td><b>Type moyen de transport</b></td><td><select name="type_moy" id="type_moy"  >
	<option  value="<?php echo $type_moy; ?>"><?php echo $type_moy; ?></option>
	      <option  value="VOITURE">VOITURE</option>
         <option  value="MOTO">MOTO</option>
        <option  value="VELO">VELO</option>
     </select></td></tr>
 <tr><td><b>Numéro place</b></td><td><input type="text" name="num_place" value="<?php print $num_place;?>" ></td></tr>
  <tr><td><b>Numéro d'immatriculation</b></td><td><input type="text" name="num_im" value="" ></td></tr>
<tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
<tr><td></td><td><input type="submit" name="brech" value="CHERCHER" class="bouton"></td></tr>
<tr><td></td><td><input type="submit" name="blibere" value="LIBERER" class="bouton"></td></tr>
<tr><td></td><td><?php print $mess1;?></td></tr>
</table>

</fieldset>
</form>

<?php 
print "<br>";
//recherche d'une place de parking occupée
if(isset($_POST['brech'])&&!empty($num_place)){
	$rq1=mysqli_query($conn,"select * from tb_occupation where id_place='$num_place' ");
	print'<table border="1" class="tab"><tr><th>Numéro place</th><th>Type moyen de transport</th><th>ID propriétaire</th><th>Nom propriétaire</th><th>NUM matricule</th></tr>';
	while($rst=mysqli_fetch_assoc($rq1)){
	 
	        $num=$rst['id_place'];
	        $type=$rst['mt_type'];
	        $id=$rst['proprio_id'];
	        $nom=$rst['proprio_nom'];
	        $im=$rst['mt_matricule'];
	         print"<tr>";
	         echo"<td>$num</td>";
	         echo"<td>$type</td>";
	         echo"<td>$id</td>";
	         echo"<td>$nom</td>";
	          echo"<td>$im</td>";
	         print"</tr>";
	}
	print'</table>';
}
?>
<?php 
print"<h3>Liste des places occupées</h3>";
//affichage des places de parking occupées
	$rq2=mysqli_query($conn,"select * from tb_occupation  ");
	print'<table border="1" class="tab"><tr><th>Numéro place</th><th>Type moyen de transport</th><th>ID propriétaire</th><th>Nom propriétaire</th><th>NUM matricule</th></tr>';
	while($rst=mysqli_fetch_assoc($rq2)){
	 
	        $num=$rst['id_place'];
	        $type=$rst['mt_type'];
	        $id=$rst['proprio_id'];
	        $nom=$rst['proprio_nom'];
	        $im=$rst['mt_matricule'];
	         print"<tr>";
	         echo"<td>$num</td>";
	         echo"<td>$type</td>";
	         echo"<td>$id</td>";
	         echo"<td>$nom</td>";
	          echo"<td>$im</td>";
	         print"</tr>";
	}
	print'</table>';

?>
<?php 
//affichage du nombre de places de parking occupées, par type de moyen de transport
   //nombre voitures
   $req1=mysqli_query($conn,"select count(*) as nbvoitures from tb_occupation where mt_type='VOITURE'  ");
   if($rsu=mysqli_fetch_assoc($req1)){
      $nbvoitures=$rsu['nbvoitures'];
      echo"<b>Le nombre total de places voitures occupées est : $nbvoitures</b><br>";
   }
   //nombre motos
   $req2=mysqli_query($conn,"select count(*) as nbmotos from tb_occupation where mt_type='MOTO'  ");
   if($rsu2=mysqli_fetch_assoc($req2)){
      $nbmotos=$rsu2['nbmotos'];
      echo"<b>Le nombre total de places motos occupées est : $nbmotos</b><br>";
   }
   //nombre vélos
   $req3=mysqli_query($conn,"select count(*) as nbvelos from tb_occupation where mt_type='VELO'  ");
   if($rsu3=mysqli_fetch_assoc($req3)){
      $nbvelos=$rsu3['nbvelos'];
      echo"<b>Le nombre total de places vélos occupées est : $nbvelos</b><br>";
   }

?>
<br>
	</div>
</body>
</html>