<?php

require_once("db_mysqli.php");

if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}
if (isset($_POST['dodajo']))
{
	header('Location:dodajo.php');
}


if (isset($_POST['obrisi']))
{
	echo "hello0";
		
$kljuc=preg_replace("/[^0-9]/",'',$_POST['obrisi']);

print_r($kljuc);

$query="DELETE FROM evidencijakvarova WHERE vozilo2=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $kljuc);
$stmt ->execute();
$stmt->close();

$query="DELETE FROM ostalavozila WHERE rb =?";	
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $kljuc);
$stmt ->execute();
$stmt->close();

header('Location:ostalaVozila.php');
}

$query = "SELECT * FROM ostalavozila";
$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="cssdoc.css">
</head>
<body>
<form action="" method="POST">
	<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
	</br>
	<input type="submit" name="dodajo" style=" width:30%; height:40px; font-size: 150%;" value="DODAJ NOVO VOZILO">


<table border = "2"  width="100%">
	<tr>
	
	<th><h2>GARAŽNI BROJ</h2></th>
	<th><h2>REGISTRACIJA VOZILA</h2></th>
	</tr>
	<?php while($row = mysqli_fetch_object($result)) { ?>
	<tr align='center'>
	<td><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>&ostalo=1"><?php echo $row->garazniBr ?></a></td>
	<td><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>&ostalo=1"><?php echo $row->registracija ?></a></font></td>
	<td><input type="submit" name="obrisi" value="OBRIŠI <?php echo $row->rb ?>"</td>
	</tr>
	<?php } ?>
</table>

</form>
</body>
</html>