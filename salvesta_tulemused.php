<html>
<body>

<?php

$tulemus = array();
for ($x=1; $x<=30; $x++)
  {
  array_push($tulemus, $_POST["tulemus$x"]);
  } 

$toimunud = file('toimunud.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$kontroll = array();
for($x=0;$x <=29 ; $x++){
	if($tulemus[$x] == $toimunud[$x]){
	array_push($kontroll, 1);
	} else {
	array_push($kontroll, 0);
	}
}

$summa = 0;
foreach($kontroll as $el){
	if($el == 1){
	$summa += 1;
	}
} 
echo $summa;

?>
</body>
</html>
