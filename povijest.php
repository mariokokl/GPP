<?php
require_once("db_mysqli.php");
include("db_mysqli.php");
include ("funkcije.php");
if (isset($_POST['back'])) {
	header('Location:nIndex.php');
}

$rb = $_GET['rb'];
$vrsta = $_GET['vrsta']; 

if(empty($_GET['ostalo'])){
 $ostalo='0';
}
else{
$ostalo = $_GET['ostalo'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="cssdoc.css">	
	<script type="text/javascript">
		function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

	</script>
</head>

<body>
<form action="" method="POST">
	<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
	<br>
	<button style=" float:right width:300%; height:30px; font-size: 150%;"  onclick="printData()">Print</button>
</form>
<h1>Povijest (<?php echo getVrsta($vrsta); ?>)</h1>
	<?php
	if($ostalo==0){
	if($vrsta!='8'){
		$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN autobusi ON evidencijakvarova.vozilo1=autobusi.rb  WHERE vozilo1=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("ii",$rb, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
		

	}
else {
	$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN autobusi ON evidencijakvarova.vozilo1=autobusi.rb  WHERE vozilo1=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
}
}
elseif ($ostalo==1) {
	if($vrsta!='8'){
		$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN ostalavozila ON evidencijakvarova.vozilo2=ostalavozila.rb  WHERE vozilo2=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("ii",$rb, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
		

	}
else {
	$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN ostalavozila ON evidencijakvarova.vozilo2=ostalavozila.rb  WHERE vozilo2=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
}
}

elseif ($ostalo==2) {
	if($vrsta!='8'){
		$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN lice3 ON evidencijakvarova.vozilo3=lice3.rb  WHERE vozilo3=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("ii",$rb, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
		

	}
else {
	$query = "SELECT sifraZaposlenika, zanimanje.zanimanje, nazivKvara, registracija, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN zanimanje ON evidencijakvarova.zanimanje1=zanimanje.rb INNER JOIN lice3 ON evidencijakvarova.vozilo3=ostalavozila.rb  WHERE vozilo3=? ORDER BY evidencijakvarova.datum DESC";
		echo '<b><table border = 2 width="100%" id="printTable"><tbody>';
		echo "<th>Sifra majstora:</th><th>Zanimanje:</th><th>Naziv kvara:</th><th>Registracija vozila:</th><th>Datuma:</th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2,$x3,$x4,$x5);
		while ($stmt->fetch()) {
			
			echo '<tr><td align="center"><font size="5">'.$x1.'</font></td><td align="center"><font size="5">'.$x2.'</font></td><td align="center"><font size="5">'.$x3.'</font></td><td align="center"><font size="5">'.$x4.'</font></td><td align="center"><font size="5">'.$x5.'</font></td></tr>';
			
			
		}
	}
	
	echo '</tbody></table></b>';
}
}

?>

</body>
</html>