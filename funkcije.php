<?php

function getAutobus ($rb)
{
	include("db_mysqli.php");
	$query = "SELECT garazniBr, registracija FROM autobusi WHERE rb=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2);
		$stmt->fetch();
		$bus = $x1.' '.$x2;
		$stmt->close();
		return $bus;
	}
}

function getVrsta ($rb)
{
	include("db_mysqli.php");
	$query = "SELECT naziv FROM vrsta WHERE rb=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1);
		$stmt->fetch();
		$vrsta = $x1;
		$stmt->close();
		return $vrsta;
	}
}

function getZanimanje ($rb)
{
	include("db_mysqli.php");
	$query = "SELECT zanimanje FROM zanimanje WHERE rb=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1);
		$stmt->fetch();
		$zanimanje = $x1;
		$stmt->close();
		return $zanimanje;
	}
}

function getKvar($rb)
{
	include("db_mysqli.php");
	$br=0;
	$query = "SELECT rb,nazivKvara,datum FROM vrstakvara WHERE zanimanje=? AND prikaz='Y' ORDER BY datum DESC";
	echo '<div class="scrollt2">';
	
	echo '<table border = 2 width="100%">';
	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x2,$x1,$x3);
		while ($stmt->fetch()) {
			
			echo "<tr><td align='center'><font size='6'> <input type = 'checkbox' name = ".$x2." value = ".$x1." />  ".$x1." </font></td><td>&nbsp<input type='submit' style='width:50%' name='obrisi' value='OBRIŠI ".$x2."'  /></td></tr>";
			
		}
	}
	
	echo '</table >';
	echo '</div>';
	
}

function getPovijest ($rb,$zanimanje,$vrsta)
{
	include("db_mysqli.php");
	$query = "SELECT sifraZaposlenika, kilometri, nazivKvara, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN vrsta ON evidencijakvarova.vrsta=vrsta.rb  WHERE vozilo1=? AND zanimanje1=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo "<h1>Povijest:</h1>";
		echo '<div class="scrollt">';
		
		echo '<b><table border = 2 width="100%">';
		
		echo "<th><h2>Sifra majstora:</h2></th><th><h2>Naziv kvara:</h2></th><th><h2>Kilometri:</h2></th><th><h2>Datuma:</h2></th>";	
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("iii",$rb, $zanimanje, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1, $x2, $x3,$x4);
		while ($stmt->fetch()) {
			$x5 = date("d-m-Y", strtotime($x4));
			
			echo '<tr><td align="center"><font size="6"> '.$x1.'</td><td align="center"><font size="6"> '.$x3.'</td><td align="center"><font size="6"> '.$x2.'</font></td><td align="center"><font size="6"> '.$x5.'</font></td></tr>';
			
			
			
		}
	}
	
	echo '</table></b>';
	
	echo '</div>';
}

function getRbz ($zanimanje, $c)
{
	include("db_mysqli.php");
	$query = "SELECT rb FROM vrstakvara WHERE zanimanje=? AND nazivKvara=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("is", $zanimanje, $c);
		$stmt->execute();
		$stmt->bind_result($x1);
		$stmt->fetch();
		$zanimanje = $x1;
		$stmt->close();
		return $zanimanje;
	}
}

function getOstalo ($rb)
{
	include("db_mysqli.php");
	$query = "SELECT garazniBr, registracija FROM ostalavozila WHERE rb=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2);
		$stmt->fetch();
		$bus = $x1.' '.$x2;
		$stmt->close();
		return $bus;
	}
}

function getPovijesto ($rb,$zanimanje,$vrsta)
{
	include("db_mysqli.php");
	$query = "SELECT sifraZaposlenika, nazivKvara, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN vrsta ON evidencijakvarova.vrsta=vrsta.rb  WHERE vozilo2=? AND zanimanje1=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo "<h2>Povijest:</h2>";
		echo '<div class="scrollt2">';
		echo '<b><table border = 2 width="100%" >';
		
		echo "<th><h2>Sifra majstora:</h2></th><th><h2>Naziv kvara:</h2></th><th><h2>Kilometri:</h2></th><th><h2>Datuma:</h2></th>";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("iii",$rb, $zanimanje, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1,$x3,$x4);
		while ($stmt->fetch()) {
			$x5 = date("d-m-Y", strtotime($x4));
			echo '<tr><td align="center"><font size="6">'.$x1.'</td><td align="center"><font size="6">'.$x3.'</td><td align="center"><font size="6">'.$x5.'</font></td></tr>';
			
			echo '<tr></tr>';
			
		}
	}
	echo '</table></b>';
	echo '</div>';
}


function getLice3 ($rb)
{
	include("db_mysqli.php");
	$query = "SELECT model, registracija FROM lice3 WHERE rb=?";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("i",$rb);
		$stmt->execute();
		$stmt->bind_result($x1,$x2);
		$stmt->fetch();
		$bus = $x1.' '.$x2;
		$stmt->close();
		return $bus;

		
	}
}

function getPovijest3 ($rb,$zanimanje,$vrsta)
{
	include("db_mysqli.php");
	$query = "SELECT sifraZaposlenika, nazivKvara, evidencijakvarova.datum  FROM evidencijakvarova INNER JOIN vrstakvara ON evidencijakvarova.rbKvara=vrstakvara.rb INNER JOIN vrsta ON evidencijakvarova.vrsta=vrsta.rb  WHERE vozilo3=? AND zanimanje1=? AND vrsta=? ORDER BY evidencijakvarova.datum DESC";
		echo "<h2>Povijest:</h2>";
		echo '<div class="scrollt2">';
		echo '<b><table border = 2 width="100%" >';
		
		echo "<th><h2>Sifra majstora:</h2></th><th><h2>Naziv kvara:</h2></th><th><h2>Kilometri:</h2></th><th><h2>Datuma:</h2></th>";
	if ($stmt = $mysqli->prepare($query))
	{
		$stmt->bind_param("iii",$rb, $zanimanje, $vrsta);
		$stmt->execute();
		$stmt->bind_result($x1,$x3,$x4);
		while ($stmt->fetch()) {
			$x5 = date("d-m-Y", strtotime($x4));
			echo '<tr><td align="center"><font size="6">'.$x1.'</td><td align="center"><font size="6">'.$x3.'</td><td align="center"><font size="6">'.$x5.'</font></td></tr>';
			
			echo '<tr></tr>';
			
		}
	}
	echo '</table></b>';
	echo '</div>';
}
?>


