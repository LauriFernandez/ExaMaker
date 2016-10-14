<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Projet</title>
</head>
<body>
<?php
	$num_exo = [1,2];
	$nb_question = [2,1];	
	$num_question = [1,2,1];
	$enonce = ["aaaa","yyyyyy","zzzz"];
	$question = ["bbbb?","xxxx ?","ppppp"];
	$reponse = ["ccccc","ddddd","mmmm"];
	$bareme = [4,2];
	
	?>
	<form method="get" action="sauvegarde.php">
   		<label>Chemin de destination</label> : <input type="text" name="cd" />
   		<input type="submit" value="Sauvegarder"/>
	</form>
	
	<?php
	$j = 0;
	$tmp = 0;
	if(isset($_GET['cd']) and trim($_GET['cd']) != '')
		$fich = $_GET['cd'];
	if(isset($_GET['cd']) and trim($_GET['cd']) != '')
	{
		$monfich = fopen($fich.'.exam', 'w+');
		if($monfich == false)
			echo "Erreur lors de la creation du fichier !";
		else
		{
		for($i=0; $i<count($num_exo); $i++)
			{
				fputs($monfich, 'NE');
				fputs($monfich, $num_exo[$i]);
				 while($j<$nb_question[$i])
				{
					fputs($monfich, 'NQU');
					fputs($monfich, $num_question[$tmp]);
					fputs($monfich, 'EN');
					fputs($monfich, $enonce[$tmp]);
					fputs($monfich, 'QU');
					fputs($monfich, $question[$tmp]);
					fputs($monfich, 'RE');
					fputs($monfich, $reponse[$tmp]);
					$j++;
					$tmp++;
				}
				fputs($monfich, 'BA');
				fputs($monfich, $bareme[$i]);
				$tmp = $j;
				$j = 0;
			}
			fclose($monfich);
		}
	}
	?>
	</body>
</html>
