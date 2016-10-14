<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Projet</title>
</head>
<body>
	<form method="get" action="sauvegarde.php">
   		<label>Chemin de destination</label> : <input type="text" name="cd" />
   		<input type="submit" value="Sauvegarder"/>
	</form>
	
	<?php
	if(isset($_GET['cd']) and trim($_GET['cd']) != '')
		$fich = $_GET['cd'];
	if(isset($_GET['cd']) and trim($_GET['cd']) != '')
	{
		$monfich = @fopen($fich.'.exam', 'w+');
		if($monfich == true)
		{
		for($a=1;$a<=$_SESSION['cptexo'];$a++)
					{						
						fputs($monfich,"[NUM_EXO]".$a.'[TITRE_EXO]'.$_SESSION['titreExo'][$a]);
						
						for($b=1;$b<=$_SESSION['nbQuestion'][$a];$b++)
						{
							fputs($monfich,"[NUM_QUESTION]".$_SESSION['ex'.$a]['num'][$b]);	
							fputs($monfich,"[QUESTION]".$_SESSION['ex'.$a]['question'][$b]);
							fputs($monfich,"[ENONCE]".$_SESSION['ex'.$a]['énoncé'][$b]);
							fputs($monfich,"[REPONSE]".$_SESSION['ex'.$a]['reponse'][$b]);
							fputs($monfich,"[BAREME]".$_SESSION['ex'.$a]['bareme'][$b]);
						}
					}
			fclose($monfich);
		}
		else
		{
			echo "<p>Erreur lors de la creation du fichier : Chemin incorrect ou droits inexistants</p>";
		}
	}
	?>
	</body>
</html>
