<?php
require_once("db_mysqli.php");
include ("funkcije.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

if (isset($_POST["dodavanje"])) {
	print_r($_POST);

$query = "INSERT INTO lice3 (model,registracija) VALUES (?, ?)";
   					$stmt = $mysqli->prepare($query);
					$stmt->bind_param("ss", ucfirst($_POST["model"]), ucfirst($_POST["registracija"]) );
					$stmt ->execute();
					$stmt->close();
					header('Location:3lice.php');
}

$query2 = "SELECT * FROM lice3 ORDER BY datum DESC";
$result = $mysqli->query($query2);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="cssdoc.css">
</head>

<body>
<form method="POST" action="">
<div style="width: 100%;">
   <div style="float:left; width: 40%">
   
<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
<h1> Dodavanje novog vozila (3. Lice)</h1>
Model vozila:
<br>
<input type="text" name="model" value="">
<br>
<br>
Registracija:
<br>
<input type="text" name="registracija" value="OS-">
<br>


<input type="submit" name="dodavanje" value="DODAJ" style="float:left width:30%; height:30px; font-size: 150%;">

</div>
   <div style="float:left; width: 60%">

<div class="scrollt">
   <table border = "2"  width="100%">
	<tr>
	
	<th><h2>REGISTRACIJA VOZILA</h2></th>
	<th><h2>MODEL</h2></th>
	</tr>
	<?php while($row = mysqli_fetch_object($result)) { ?>
	<tr align='center'>
	<td align="center"><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>&ostalo=2"><?php echo $row->registracija ?></a></td>
	<td align="center"><font size="6"><a href="vrsta.php?rb=<?php echo $row->rb ?>&ostalo=2"><?php echo $row->model ?></a></font></td>
	<?php } ?>
</table>
</div>

   </div>
</div>
<div style="clear:both"></div>

</form>
</body>
</html>