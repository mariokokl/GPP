<?php
require_once("db_mysqli.php");
include ("funkcije.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

if (isset($_POST["dodavanje"])) {
	print_r($_POST);

$query = "INSERT INTO autobusi (garazniBr,registracija) VALUES (?, ?)";
   					$stmt = $mysqli->prepare($query);
					$stmt->bind_param("ss", ucfirst($_POST["garazniBr"]), ucfirst($_POST["registracija"]) );
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
</head>

<body>
<form method="POST" action="">
<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
<h1> Dodavanje novog autobusa</h1>
Garažni Broj:
<br>
<input type="text" name="garazniBr" value="A">
<br>
<br>
Registracija:
<br>
<input type="text" name="registracija" value="OS-">
<br>


<input type="submit" name="dodavanje" value="DODAJ" style="float:left width:30%; height:30px; font-size: 150%;">

</form>
</body>
</html>