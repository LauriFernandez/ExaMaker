<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cree.css" />
	<title>Numero de l'exercice</title>
</head>

<body>
	<header>
		<h1>Introduction</h1> 
	</header>

<br/><br/>	
	
	<div id="ajQ">
	<form method="post" action="intro.php">
		<div class="Barre">
		<p class="info"> Numero de l'exercice:</p> <p class="rep"> <input type="text" name="numexo"/></p>
		<br/><br/><br/>
		<p class="info"> Titre de l'exercice:</p> <p class="rep"> <input type="text" name="titreExo"/></p>
		<br/><br/><br/>
		<p class="info"> Introduction du sujet (modifier si nécessaire) </p> <p class="rep"> <textarea name="intro" row=100 col=100></textarea></p>
		</div>
		<input class="validation" type="submit" value="Valider"/>
	</form>
	
	<?php
	
		if(isset($_GET['re']) and @$_GET['re']==true)
		{
			$_GET['re']=false;
			session_destroy();
			echo '<br/><a href="Creation_sujet.php" class="notif">'.' Vous avez decidé de commencer un nouveau sujet'.'</p><br/>';
		}
		
		
	
		if(isset($_POST['numexo']))
		{
			if(!isset($_SESSION['cptexo']))	
					$_SESSION['cptexo']=0;
				
			
			if(!isset($_SESSION['numexo']) and !isset($_SESSION['titreExo']) and !isset($_SESSION['nbQuestion']))		
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
				echo '<div class="notif">';
				echo '<p>Exercice numero '.$_SESSION['numexo'][$i].' séléctionné'.'</p><br/><br/>';
				echo '<a href="Question.php" class="notif">'.' Vous pouvez creer les questions en cliquant sur ce message'.'</p><br/>';
				echo '</div>';
			}

			if($i>$_SESSION['cptexo'] and !isset($_SESSION['ex'.$i]))
				$_SESSION['cptexo']++;
			
			
		}
		
	?>
		


</body>
</html>
