<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Projet</title>

	
	
	
	
</head>
<body>
<?php
	$num_exo = [1];
	$nb_questions = [1];
	$num_question = [1];
	$enonce = ["b,troibrjzirb,rom,bsflb,gfsingfilfnifnfhnsfiunbsuibnsuibuisjbi"];
	$question = ["fqvhndhjbdqhqkdqvuyqdfvhdqyu ?"];
	$reponse = ["jgjbbgjbjbfgjbjfbkfkf"];
	$bareme = [2];
	
	
	
	
	
	
	?>
	<form method="get" action="test.php">
   		<label>Chemin de destination</label> : <input type="text" name="cd" /></br>
   		<label>Nom du fichier</label> : <input type="text" name="nom" /></br>
   		<input type="submit" value="Sauvegarder"/>
	</form>
	
	<?php
	if(isset($_GET['cd']) and trim($_GET['cd']) != '' and isset($_GET['nom']) and trim($_GET['nom']) != '')
		$fich = $_GET['cd'].$_GET['nom'].'.exam';
	if(isset($_GET['cd']) and trim($_GET['cd']) != '' and isset($_GET['nom']) and trim($_GET['nom']) != '')
	{
		$monfich = fopen($fich, 'x');
		if($monfich == false)
			echo "Erreur lors de la creation du fichier !";
		else
		{
		for($i=0; $i<count($num_exo); $i++)
			{
				fputs($monfich, 'NE');
				fputs($monfich, $num_exo[$i]);
				for($j=0; $j<$nb_questions[$i]; $j++)
				{
					fputs($monfich, 'NQU');
					fputs($monfich, $num_question[$j]);
					fputs($monfich, 'EN');
					fputs($monfich, $enonce[$j]);
					fputs($monfich, 'QU');
					fputs($monfich, $question[$j]);
					fputs($monfich, 'RE');
					fputs($monfich, $reponse[$j]);
					fputs($monfich, 'BA');
					fputs($monfich, $bareme[$j]);
				}
				fclose($monfich);
			}
		}
	}
	
	?>
	</body>
</html>
