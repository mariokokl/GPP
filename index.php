<?php

require_once("db_mysqli.php");

if (isset($_POST['autobusi']))
{
	header('Location:autobusi.php');
}
if (isset($_POST['ostalo']))
{
	header('Location:ostalaVozila.php');
}
if (isset($_POST['lice3']))
{
	header('Location:3lice.php');
}
if (isset($_POST['djelatnici']))
{
	header('Location:djelatnici.php');
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
<form method="POST" action="">

<input type="submit" name="autobusi" style="float:left; width:50%; height:300px; font-size: 300%;" value="AUTOBUSI"/>
<input type="submit" name="ostalo" style="float:left; width:50%; height:300px; font-size: 300%;" value="OSTALA VOZILA"/>


<input type="submit" name="lice3" style="float:left; width:50%; height:300px; font-size: 300%;" value="3. LICE"/>
<input type="submit" name="djelatnici" style="float:left; width:50%; height:300px; font-size: 300%;" value="DJELATNICI"/>

</form>

 </body>
 </html>
