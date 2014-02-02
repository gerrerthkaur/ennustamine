<!DOCTYPE html>
<html>
<body>

<form action="salvesta_tulemused.php" method="post">

<?php

include "mangude_listid.php";

$nimed = array("jalgpall","vorkpall", "korvpall", "boonus");

$n = 1;
for ($j = 0; $j <= sizeof($nimed)-1; $j++){
	$ala_nimetus = $nimed[$j];
	$ala_list = spordiala($ala_nimetus);
	for ($i = 1; $i <=sizeof($ala_list)-1; $i++) {
	if ($ala_nimetus == "jalgpall"){
		echo $ala_list[$i]. "<br>";
		echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='x'/>x<input name='tulemus$n' type='radio' value='2'/>2<br />";
    } elseif ($ala_nimetus == "boonus"){
		echo $ala_list[$i]. "<br>";
        echo "<input name='tulemus$n' type='text'><br />";
	} elseif ($ala_nimetus == "korvpall") {
		echo $ala_list[$i]. "<br>";
        echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='2'/>2<br />";
	} elseif ($ala_nimetus == "vorkpall") {
		echo $ala_list[$i]. "<br>";
        echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='2'/>2<br />";
	}
	$n += 1;
	}
}

?>
<input type="submit">
</form>

</body>
</html>
