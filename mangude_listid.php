<!DOCTYPE html>
<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
mb_internal_encoding("UTF-8");
'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
function spordiala($nimi)
{
$jalgpall = array();
$korvpall = array();
$vorkpall = array();

$boonus = array();

$file = "voor_2.txt";
$count_lines = count(file($file)); 

$file = fopen("voor_2.txt", "r");
for ($x=1; $x<=$count_lines; $x++){
	$line = fgets($file);
	if(is_numeric($line[0]) or $line[0] == "B"){
	} else {
	if (substr($line, 0, 8) == "jalgpall"){
	$ala = "jalgpall";
	} elseif (substr($line, 0, 8) == "korvpall"){
	$ala = "korvpall";
	} elseif (substr($line, 0, 8) == "vorkpall"){
	$ala = "vorkpall";
	} elseif (substr($line, 0, 6) == "boonus"){
	$ala = "boonus";
	}
	}
	
	if ($ala == "jalgpall"){
	array_push($jalgpall, $line);
	} elseif ($ala == "korvpall"){
	array_push($korvpall, $line);
	} elseif ($ala == "vorkpall"){
	array_push($vorkpall, $line);
	} elseif ($ala == "boonus"){
	array_push($boonus, $line);
	}
	}
fclose($file);
if ($nimi == "jalgpall"){
return $jalgpall;
} elseif ($nimi == "korvpall"){
return $korvpall;
} elseif ($nimi == "vorkpall"){
return $vorkpall;
} elseif ($nimi == "boonus") {
return $boonus;
}
}
function toimumis_aeg(){
$kuupäevad = array();
$file = "voor_2.txt";
$count_lines = count(file($file)); 

$file = fopen("voor_2.txt", "r");
for ($x=1; $x<=$count_lines; $x++){
	$line = fgets($file);
	$kuupäev = substr($line, -13);
	if (strlen($kuupäev) == 13){
	$kuupäev = substr($kuupäev, 0, -2);
	array_push($kuupäevad, $kuupäev);
	}
	
}
return $kuupäevad;
}
?>
</body>
</html>
