<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Numero de l'exercice</title>
</head>

<body>
	<header>
		<h1>Introduction</h1> 
	</header>

<br/><br/>	
	
	<div>
	
	<form method="post" action="intro.php">
		<p> Numero de l'exercice: <input type="text" name="numexo"/></p>
		<input type="submit" value="valider la question"/>
	</form>
	
	<?php 
		if(isset($_POST['numexo']))
		{
			if(!isset($_SESSION['cptexo']))
				$_SESSION['cptexo']=0;

			$_SESSION['numexo']=array();
			$i=(int)$_POST['numexo'];
			$_SESSION['ind']=(int)$_POST['numexo'];
			$_SESSION['numexo'][$i]=(int)$_POST['numexo'];
		
		
			if(!empty($_SESSION['numexo'][$i]) or $_SESSION['numexo'][$i]!=0)
			{
				echo 'Exercice '.$_SESSION['numexo'][$i].' créé'.'<br/>';
				echo '<a href="Creation_exo.php">'.'Creer les questions'.'</a>';
						
			}

			if($i>$_SESSION['cptexo'] and !isset($_SESSION['ex'.$i]))
				$_SESSION['cptexo']++;

			echo "Vous avez créé ".$_SESSION['cptexo']." exercices";
		}
		
	?>
		
	</div>


</body>
</html>
