<?php require_once( 'auth.php' ); ?>
<html>
<head>
	<title> ENNUSTAMINE </title>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="menu">
		<ul>
			<li ><a href="ennusta_disain.php">Ennusta</a></li>
			<li ><a href="">Tulemused</a></li>
			<li ><a href="reeglid.php">Reeglid</a></li>
			<li ><a href="">Meelelahutus</a></li>
		</ul>
	</div>
	<div id="pealkiri">
		<div id="quote">
			<h1><?php echo $profile['name'] ?></h1>
			<a href="logout.php">Logi välja</a>
			<h1><a href="#"> ENNUSTAMINE </a></h1>
			<p> <i> "Some people believe betting is a matter of life and death, </p>
			<p> I am very disappointed with that attitude. I can assure you </p> 
			<p> it is much, much more important than that."</i> </p>
			<p> - Bill Shankly </p>
		</div>
	</div>
	<div id="peamine">
		<div id="sisu">
			<h2 class="tiitel"><a href="#"> Ennusta </a></h2>
			<div >
				<form action="salvesta_tulemused.php" method="post">
				<?php

				include "mangude_listid.php";
				$nimed = array("jalgpall","vorkpall", "korvpall", "boonus");
				$n = 1;
				$m = 0;

				$aeg_live = date('d.m H.i');
				$aeg_live[7] = (int)$aeg_live[7] + 1;

				for ($j = 0; $j <= sizeof($nimed)-1; $j++){
					$ala_nimetus = $nimed[$j];
					$ala_list = spordiala($ala_nimetus);
					for ($i = 1; $i <=sizeof($ala_list)-1; $i++) {
					if ($ala_nimetus == "jalgpall"){
						echo $ala_list[$i]. "<br>";
						if (toimumis_aeg()[$m] < $aeg_live){
							echo "Mäng on alanud või läbi". '<br>';
							
						} else {
							echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='x'/>x<input name='tulemus$n' type='radio' value='2'/>2<br />";
						}
					} elseif ($ala_nimetus == "boonus"){
						echo $ala_list[$i]. "<br>";
						if (toimumis_aeg()[$m] < $aeg_live){
							echo "Mäng on alanud või läbi". '<br>';
						} else {
							echo "<input name='tulemus$n' type='text' ><br />";
						}
					} elseif ($ala_nimetus == "korvpall") {
						echo $ala_list[$i]. "<br>";
						if (toimumis_aeg()[$m] < $aeg_live){
							echo "Mäng on alanud või läbi". '<br>';
						} else {
							echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='2'/>2<br />";
						}
					} elseif ($ala_nimetus == "vorkpall") {
						echo $ala_list[$i]. "<br>";
						if (toimumis_aeg()[$m] < $aeg_live){
							echo "Mäng on alanud või läbi". '<br>';
						} else {
							echo "<input name='tulemus$n' type='radio' value='1'/>1<input name='tulemus$n' type='radio' value='2'/>2<br />";
						}
					}
					$n += 1;
					$m += 1;
					}
				}
				?>
				<input type="submit">
				</form>
			</div>
		</div>
				
		<div id="tulemustetabel">
			<ul>
				<h2 style ='color: #323030;'> Hetkeseis </h2>
			</ul>
		</div>
		<div style="clear: both;"></div>
	</div>
	<div id="all">
	<p> developed by Vuks & Gerru | 2014 </p>
	</div>
</body>
</html>
