<?php

$mysqli = new mysqli("localhost","root", "", "GPP");
mysqli_set_charset($mysqli,"utf8");

if ($mysqli->connect_error)
{
	die("Neuspješno spajanje na bazu!");
}

?>