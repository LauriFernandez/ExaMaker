<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cree.css"/>
	<title>Détail</title>
</head>

<body>
	<header>
		<h1>Détail du sujet</h1> 

	</header>

<br/><br/>	
	
	<div>
	
		<?php
			echo @$_SESSION['intro'].'<br/>';
		
			if(@isset($_SESSION['numexo']) and isset($_SESSION['titreExo']) and isset($_SESSION['nbQuestion']))
			{
				for($a=1;$a<=$_SESSION['cptexo'];$a++)
					{				
						
						echo '<p><strong>'."Exercice numero: ".$a.'</p><br/><br/>';
						echo '<p><strong>'."Titre exercice: ".$_SESSION['titreExo'][$a].'</strong>'.'</p><br/><br/>';
						
						for($b=1;$b<=$_SESSION['nbQuestion'][$a];$b++)
						{
							
							echo "<p>Question numero: ".@$_SESSION['ex'.$a]['num'][$b].'</p><br/>';								
							echo "<p>Question: ".@$_SESSION['ex'.$a]['question'][$b].'</p><br/>';
							echo "<p>Enoncé: ".@$_SESSION['ex'.$a]['énoncé'][$b].'</p><br/>';
							echo "<p>bareme: ".@$_SESSION['ex'.$a]['bareme'][$b].'</p><br/><br/>';
							
						}					
					
					}	
			}
			else
				echo '<p>'."Aucun exercice".'</p></br>';					
			
		?>	
		
		
	</div>


</body>
</html>
