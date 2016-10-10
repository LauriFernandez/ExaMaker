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
			echo $_SESSION['cptexo'];
			if(isset($_SESSION['ex'.$_SESSION['ind']]['bareme']) and isset($_SESSION['ex'.$_SESSION['ind']]['num']) and isset($_SESSION['ex'.$_SESSION['ind']]['question']) and isset($_SESSION['ex'.$_SESSION['ind']]['reponse']))
			{
				for($a=1;$a<=$_SESSION['cptexo'];$a++)
					{
						
						echo '<strong>'."Exercice numero: ".$a.'</strong>'.'<br/><br/>';
						
						for($b=1;$b<5;$b++)
						{
							echo "Question numero: ".$_SESSION['ex'.$a]['num'][$b].'<br/>';	
							echo "Question: ".$_SESSION['ex'.$a]['question'][$b].'<br/>';
							echo "Reponse: ".$_SESSION['ex'.$a]['reponse'][$b].'<br>';
							echo "bareme: ".$_SESSION['ex'.$a]['bareme'][$b].'<br/><br/>';
						}
					}	
			}
			else
				echo "Aucun exercice";					
			
		?>	
		
		<a href="Creation_sujet.php"><button> retour </button></a>
		
	</div>


</body>
</html>
