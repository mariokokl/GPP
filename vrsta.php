<?php

require_once("db_mysqli.php");
include ("funkcije.php");

$rb = $_GET['rb'];
if(empty($_GET['ostalo'])){
 $ostalo='0';
}
else{
$ostalo = $_GET['ostalo'];
}
if (isset($_POST['dnevniPregled']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=1');
}
if (isset($_POST['gTehnicki']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=2');
}
if (isset($_POST['pTehnicki']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=3');

}
if (isset($_POST['udesi']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=5');
}
if (isset($_POST['intervencije']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=6');
}
if (isset($_POST['iTehnicki']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=7');

}
if (isset($_POST['klima']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=11');

}
if (isset($_POST['mjenjac']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=9');

}
if (isset($_POST['diferencijal']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=10');

}
if (isset($_POST['motor']))
{
	header('Location:zanimanje.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=8');

}


if (isset($_POST['povijest']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=8');
}


if (isset($_POST['dnevniPregledp']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=1');
}
if (isset($_POST['gTehnickip']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=2');
}
if (isset($_POST['pTehnickip']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=3');

}

if (isset($_POST['udesip']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=5');
}
if (isset($_POST['intervencijep']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=6');
}
if (isset($_POST['iTehnickip']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=7');

}
if (isset($_POST['klimap']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=11');

}
if (isset($_POST['mjenjacp']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=9');

}
if (isset($_POST['diferencijalp']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=10');

}
if (isset($_POST['motorp']))
{
	header('Location:povijest.php?rb='.$rb.'&ostalo='.$ostalo.'&vrsta=8');

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
 	<script type="text/javascript" src="jsdoc.js"></script>
 </head>
 <body>
<form method="POST" action="">

	<input type="submit" name="back" style=" float:right width:300%; height:30px; font-size: 150%;" value="POČETAK">
<h1> Vozilo: <?php if ($ostalo==0) {
	echo getAutobus($rb); 
} elseif ($ostalo==1) {
	echo getOstalo($rb);
	} 

	elseif($ostalo==2)
	{
		echo getLice3($rb);
		}

		?>
		
	</h1>



<table width="100%" border="2">
<tr><td >
<input type="submit" name="dnevniPregled" style="float:left; width:100%; height:200px; font-size: 300%;" value="DNEVNI PREGLED"/></td><td width="50%">
<input type="button" name="pokteh" id="pokaz" onclick="showBut()" style="display:block; float:left; width:100%; height:200px; font-size: 300%;" value="TEHNIČKI"/>
<div id="pokTeh"  style="display:none;" >
<input type="submit" name="gTehnicki"  style=" float:left; width:50%; height:66px; font-size: 300%;" value="GODIŠNJI"/>
<input type="submit" name="pTehnicki" style=" float:left; width:50%; height:66px; font-size: 300%;" value="PERIODIČNI"/>
<input type="submit" name="iTehnicki" style=" float:left; width:50%; height:68px; font-size: 300%;" value="IZVANREDNI"/>
</div>
</td>
</tr>
<tr><td><h1 align="center">SERVISI</h1>
<input type="submit" name="motor" style="float:left; width:50%; height:50px; font-size: 200%;" value="MOTOR"/>
<input type="submit" name="mjenjac"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="MJENJAC"/>

<input type="submit" name="diferencijal" style=" float:left; width:50%; height:50px; font-size: 200%;" value="DIFERENCIJAL"/>
<input type="submit" name="klima"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="KLIMA"/></td>
<td>
<input type="submit" name="udesi" style="float:left; width:100%; height:200px; font-size: 300%;" value="UDESI"/></td></tr><tr><td>
<input type="submit" name="intervencije" style="float:left; width:100%; height:200px; font-size: 300%;" value="INTERVENCIJE"/></td>
<td>
<input type="button" name="povijest" id="povijest" onclick="showBut2()" style="display:block; float:left; width:100%; height:200px; font-size: 300%;" value="POVIJEST"/>
<div id="pokPov"  style="display:none;" >
<input type="submit" name="dnevniPregledp" style="float:left; width:50%; height:50px; font-size: 200%;" value="DNEVNI PREGLED"/>
<input type="submit" name="gTehnickip" align="center" style=" float:left; width:50%; height:50px; font-size: 200%; " value="GODIŠNJI TEHNIČKI"/>
<input type="submit" name="pTehnickip"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="PERIODIČNI TEHNIČKI"/>
<input type="submit" name="iTehnickip"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="IZVANREDNI TEHNIČKI"/>
<input type="submit" name="udesip"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="UDESI"/>
<input type="submit" name="intervencijep"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="INTERVENCIJE"/>
<input type="submit" name="motorp" style="float:left; width:50%; height:50px; font-size: 200%;" value="MOTOR"/>
<input type="submit" name="mjenjacp"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="MJENJAČ"/>
<input type="submit" name="diferencijalp"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="DIFERENCIJAL"/>
<input type="submit" name="klimap"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="KLIMA"/>
<input type="submit" name="povijest"  style=" float:left; width:50%; height:50px; font-size: 200%;" value="SVE"/>

</div>



</td></tr>
</table>

</form>

 </body>
 </html>