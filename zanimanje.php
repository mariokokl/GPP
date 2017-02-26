<?php

require_once("db_mysqli.php");
include ("funkcije.php");

$rb = $_GET['rb'];
$vrsta = $_GET['vrsta'];
if(empty($_GET['ostalo'])){
 $ostalo='0';
}
else{
$ostalo = $_GET['ostalo'];
}

if (isset($_POST['mehanicar']))
{
	header('Location:kvarovi.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta='.$vrsta.'&zanimanje=1');
}
if (isset($_POST['elektricar']))
{
	header('Location:kvarovi.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta='.$vrsta.'&zanimanje=2');
}
if (isset($_POST['bravar']))
{
	header('Location:kvarovi.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta='.$vrsta.'&zanimanje=3');
}
if (isset($_POST['gumar']))
{
	header('Location:kvarovi.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta='.$vrsta.'&zanimanje=4');
}

if (isset($_POST['back'])) {
	header('Location:nIndex.php');
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
<h1><?php echo getVrsta($vrsta).' Vozila:'; 
 if ($ostalo==0) {
	echo getAutobus($rb); 
} elseif ($ostalo==1) {
	echo getOstalo($rb);
	} 

	elseif($ostalo==2)
	{
		echo getLice3($rb);
		}

		 ?></h1>



<input type="submit" name="mehanicar" style="float:left; width:50%; height:300px; font-size: 300%;" value="MEHANIČAR"/>
<input type="submit" name="elektricar" style="float:left; width:50%; height:300px; font-size: 300%;" value="ELEKTRIČAR"/>
<input type="submit" name="bravar" style="float:left; width:50%; height:300px; font-size: 300%;" value="BRAVAR"/>
<input type="submit" name="gumar" style="float:left; width:50%; height:300px; font-size: 300%;" value="GUMAR"/>

</form>

 </body>
 </html>