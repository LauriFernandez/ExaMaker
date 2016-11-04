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
		<p> Titre de l'exercice: <input type="text" name="titreExo"/></p>
		<p> Introduction du sujet (modifier si nécessaire) <textarea name="intro" row=100 col=100></textarea></p>
		<input type="submit" value="valider la question"/>
	</form>
	
	<?php 
		if(isset($_POST['numexo']))
		{
			if(!isset($_SESSION['cptexo']))	
					$_SESSION['cptexo']=0;
				
			
			if(!isset($_SESSION['num']) and !isset($_SESSION['titreExo']) and !isset($_SESSION['nbQuestion']))		
			{
				$_SESSION['numexo']=array();
				$_SESSION['titreExo']=array();
				$_SESSION['nbQuestion']=array();
			}
			
			if(!isset($_SESSION['num']) and !isset($_SESSION['titreExo']) and !isset($_SESSION['nbQuestion']))		
			{
				$_SESSION['numexo']=array();
				$_SESSION['titreExo']=array();
				$_SESSION['nbQuestion']=array();
			}
			
			$i=(int)$_POST['numexo'];
			
			if(!isset($_SESSION['nbQuestion'][$i]))			
				$_SESSION['nbQuestion'][$i]=array();	
			
			$_SESSION['ind']=(int)$_POST['numexo'];
			$_SESSION['numexo'][$i]=(int)$_POST['numexo'];
			$_SESSION['titreExo'][$i]=$_POST['titreExo'];
			$_SESSION['intro']=$_POST['intro'];
			if(empty($_SESSION['nbQuestion'][$_POST['numexo']]) )
				$_SESSION['nbQuestion'][$_POST['numexo']]=0;
			
			
		
		
			if(!empty($_SESSION['numexo'][$i]) or $_SESSION['numexo'][$i]!=0)
			{
				echo '<p>Exercice numero '.$_SESSION['numexo'][$i].' séléctionné'.'</p><br/><br/>';
				echo '<p><a href="Creation_sujet.php">'.' Vous pouvez creer les questions en cliquant sur ce lien'.'</a></p><br/>';						
			}

			if($i>$_SESSION['cptexo'] and !isset($_SESSION['ex'.$i]))
				$_SESSION['cptexo']++;
			
		}
		
	?>
		
	</div>


</body>
</html>
