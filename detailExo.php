<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Détail</title>
</head>

<body>
	<header>
		<h1>Détail du sujet</h1> 

	</header>

<br/><br/>	
	
	<div>
	
		<?php
			echo $_SESSION['intro'].'<br/>';
		
			if(isset($_SESSION['ex'.$_SESSION['ind']]['bareme']) and isset($_SESSION['ex'.$_SESSION['ind']]['num']) and isset($_SESSION['ex'.$_SESSION['ind']]['question']) and isset($_SESSION['ex'.$_SESSION['ind']]['reponse']))
			{
				for($a=1;$a<=$_SESSION['cptexo'];$a++)
					{						
						echo '<p><strong>'."Exercice numero: ".$a.'('.$_SESSION['titreExo'][$a].')'.'</strong>'.'</p><br/><br/>';
						
						for($b=1;$b<=$_SESSION['nbQuestion'][$a];$b++)
						{
							echo '</p>'."Question numero: ".@$_SESSION['ex'.$a]['num'][$b].'</p><br/>';	
							echo '</p>'."Question: ".@$_SESSION['ex'.$a]['question'][$b].'</p><br/>';
							echo '</p>'."énoncé: ".@$_SESSION['ex'.$a]['énoncé'][$b].'</p><br/>';
							echo '</p>'."Reponse: ".@$_SESSION['ex'.$a]['reponse'][$b].'</p><br>';
							echo '</p>'."bareme: ".@$_SESSION['ex'.$a]['bareme'][$b].'</p><br/><br/>';
						}
					}	
			}
			else
				echo '<p>'."Aucun exercice".'</p></br>';					
			
		?>	
		
		<a href="Creation_sujet.php"><button> retour au sujet </button></a>
		
	</div>


</body>
</html>
