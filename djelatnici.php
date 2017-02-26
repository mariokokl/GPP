<?php
require_once("db_mysqli.php");

include ("funkcije.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

if (isset($_POST['dodaj']))
{
	header('Location:dodaj.php');
}
if (isset($_POST['obrisi']))
{
		
$kljuc=preg_replace("/[^0-9]/",'',$_POST['obrisi']);


$query="DELETE FROM zaposlenici WHERE Sifra =?";
	
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $kljuc);
$stmt ->execute();
$stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
</head>

<body>
<form method="POST" action="">
<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
<h1>Djelatnici:</h1>
<input type="submit" name="dodaj" style=" width:100%; height:100px; font-size: 300%;" value="DODAJ NOVOG KORISNIKA">

	<?php
	$br=0;
	$query = "SELECT Ime, Prezime, Sifra, zanimanje FROM zaposlenici";
	$result=$mysqli->query($query);
		echo '<table border = 2 width="100%" >';
		echo "</tr><th><h2>Sifra:</h2></th><th><h2>Ime:</h2></th><th><h2>Prezime:</h2></th><th><h2>Zanimanje</h2></th></tr>";
	while($row = $result->fetch_assoc()) { $br++;
		echo "<tr align='center'><td><font size='5'>".$row['Sifra']."</td><td><font size='5'>".$row['Ime']."</td><td><font size='5'>".$row['Prezime']."</font></td><td><font size='5'>".$row['zanimanje']."</font></td><td>
		 
		<input type='submit' name='obrisi'  value='Obriši ".$row['Sifra']."'></td></tr>";
		}	
	
	
		echo '</table>';

?>

</form>

</body>
</html>