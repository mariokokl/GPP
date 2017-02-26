<?php

require_once("db_mysqli.php");
include ("funkcije.php");

$rb = $_GET['rb'];
$vrsta = $_GET['vrsta'];
$zanimanje = $_GET['zanimanje'];

if(empty($_GET['ostalo'])){
   $ostalo='0';
}
else{
    $ostalo = $_GET['ostalo'];
}

if (isset($_POST['back'])) {
    header('Location:nIndex.php');
}

if (isset($_POST['spremiKvar'])){
   include("db_mysqli.php");

   $a = array();
   $a = $_POST;


   unset($a['spremiKvar']);	

   $b=$a['sifraZaposlenika'];
   unset($a['sifraZaposlenika']);
   $km=$a['kilometri'];
   unset($a['kilometri']);
   $a=(array_filter($a));

   if (!isset($a["nkvar"])) {
    $a["nkvar"]="";
}


if ($ostalo==0) {  

    

        foreach ($a as $key => $value) {
            include("db_mysqli.php");	
            $query = "INSERT INTO evidencijakvarova (sifraZaposlenika,rbKvara,vozilo1,zanimanje1, vrsta, kilometri) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("iiiiii", $b, $key, $rb, $zanimanje, $vrsta, $km);
            $stmt ->execute();
            $stmt->close();
       
}
}

elseif($ostalo==1) { 
    if (empty($c)) {

        foreach ($a as $key => $value) {
            include("db_mysqli.php");   
            $query = "INSERT INTO evidencijakvarova (sifraZaposlenika,rbKvara,vozilo2,zanimanje1, vrsta, kilometri) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("iiiiii", $b, $key, $rb, $zanimanje, $vrsta, $km);
            $stmt ->execute();
            $stmt->close();
        } 
    }


}
elseif($ostalo==2) { 
   

        foreach ($a as $key => $value) {
            include("db_mysqli.php");   
            $query = "INSERT INTO evidencijakvarova (sifraZaposlenika,rbKvara,vozilo3,zanimanje1, vrsta, kilometri) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("iiiiii", $b, $key, $rb, $zanimanje, $vrsta, $km);
            $stmt ->execute();
            $stmt->close();
         
    }


}
}

if (isset($_POST['spremiNKvar'])){
    $c=$_POST['nkvar'];
include("db_mysqli.php");    
        $query = "INSERT INTO vrstakvara (zanimanje,nazivKvara) VALUES (?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("is", $zanimanje, $c);
        $stmt ->execute();
        $stmt->close();

}

if (isset($_POST['obrisi']))
{
        
$kljuc=preg_replace("/[^0-9]/",'',$_POST['obrisi']);


$query="UPDATE vrstakvara SET prikaz='N' WHERE rb=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $kljuc);
$stmt ->execute();
$stmt->close();


}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="cssdoc.css">
    <style type="text/css">

input[type="checkbox"] {
  transform:scale(2, 2);
}


    </style>

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
</form>

    <h1><?php echo getVrsta($vrsta).' '.getZanimanje($zanimanje).' '; 
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
        <div style="float:left; width:50%;">
            <h3>Kvar:</h3>

            <form method="POST" action="">
                <div style="float:left; width:30%;">
               <font size="5">Kilometri:</font><br>
                        <input type="text" name="kilometri" value="" required="unesite kilometre vozila">km
                        </div>
                         <div style="float:left;">
                        <font size="5">Šifra zaposlenika:</font><br>
                        <input type="text" name="sifraZaposlenika" value="" required="unesite vašu šifru"><br>
                        </div>



                <b>
                    <?php getKvar($zanimanje); ?>
                   
                    <br>
                    
                    <div style="float:left; width:70%;">
                        <input type="submit" name="spremiKvar" value = "SPREMI" style="float:left; width:70%; height:100px; font-size: 200%;">
                    </div>
</form>

<form action="" method="POST">

<div style="float:left; width:30%;">
                        <font size="5">Novi Kvar:</font><br>
                        <input type = "text" name = "nkvar" value=""/>
                     <input type="submit" name="spremiNKvar" value = "DODAJ" style="float:left; width:73%; height:70px; font-size: 200%;">
                    </div>
</form>

            </b>

        
    </div>

        <div style="float:left; width:50%;">

            <div id="printTable">
            <?php if ($ostalo==0) {
    echo getPovijest($rb,$zanimanje, $vrsta);
} elseif ($ostalo==1) {
    echo getPovijesto($rb,$zanimanje, $vrsta);
    } 

    elseif($ostalo==2)
    {
        echo getPovijest3($rb,$zanimanje, $vrsta);
        }

        ?>
        </div>
        <button style=" float:right width:300%; height:30px; font-size: 150%;"  onclick="printData()">Print</button>
        </div>

    </body>
    </html>

   