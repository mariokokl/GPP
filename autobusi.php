<?php

require_once("db_mysqli.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

$query = "SELECT * FROM autobusi";
$result = $mysqli->query($query);

if (isset($_POST['dodaja']))
{
	header('Location:dodaja.php');
}

if (isset($_POST['obrisi']))
{
		
$kljuc=preg_replace("/[^0-9]/",'',$_POST['obrisi']);

print_r($kljuc);

$query="DELETE FROM evidencijakvarova WHERE vozilo1=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $kljuc);
$stmt ->execute();
$stmt->close();

$query="DELETE FROM autobusi WHERE rb =?";	
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $kljuc);
$stmt ->execute();
$stmt->close();

header('Location:autobusi.php');
}

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
	<br>

	<input type="submit" name="dodaja" style=" width:30%; height:40px; font-size: 150%;" value="DODAJ NOVI AUTOBUS">

<b>
<div style="float:left; width:100%;">

<table border = "2" width="100%">

	<tr>
	<!--<th><h2>REDNI BROJ</h2></th>-->
	<th><h2>GARAŽNI BROJ</h2></th>
	<th><h2>REGISTRACIJA VOZILA</h2></th>
	</tr>
	<?php while($row = mysqli_fetch_object($result)) { ?>
	<tr align='center'>
	<!--<td><font size="6"><a href="vrsta.php?rb=<?php //echo $row->rb ?>"><?php //echo $row->rb ?><!--</a></td>-->
	<td><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>"><?php echo $row->garazniBr ?></a></td>
	<td><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>"><?php echo $row->registracija ?></a></font></td><td><input type="submit" name="obrisi" value="OBRIŠI <?php echo $row->rb?>"</td>
	</tr>

	<?php } ?>
</table>
</div>
</b>
</form>
</body>
</html>