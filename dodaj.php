<?php
require_once("db_mysqli.php");
include ("funkcije.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

if (isset($_POST["dodavanje"])) {
	print_r($_POST);

$query = "INSERT INTO zaposlenici (Ime,Prezime,zanimanje) VALUES (?, ?, ?)";
   					$stmt = $mysqli->prepare($query);
					$stmt->bind_param("ssi", ucfirst($_POST["ime"]), ucfirst($_POST["prezime"]), 
									$_POST["zanimanje"]);
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
<h1> Dodavanje novog zaposlenika</h1>
Ime:
<br>
<input type="text" name="ime">
<br>
<br>
Prezime:
<br>
<input type="text" name="prezime">
<br>
<br>
Zanimanje:
<br>
<select name="zanimanje">
  <option value="1">Mehaničar</option>
  <option value="2">Električar</option>
  <option value="3">Bravar</option>
  <option value="4">Gumar</option>
</select>
<br>
<br>

<input type="submit" name="dodavanje" value="DODAJ" style="float:left width:30%; height:30px; font-size: 150%;">

</form>
</body>
</html>