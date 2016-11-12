<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="cree.css" />
	<title>Choix des questions</title>
</head>

<body>
	<header>
		<h1>Choix des questions</h1> 

	</header>

<br/><br/>	
	
	<div>
		
		<?php
			
			
			
			if(isset($_POST['num']) and isset($_POST['question']) and isset($_POST['bareme']) and isset($_POST['énoncé']))
			{	
				$i=(int)$_POST['num'];
				if($i==@$_SESSION['ex'.$_SESSION['ind']]['num'][$i])
				{
					echo '<div id="deEx">';
						echo '<div id="Button">';
						echo '<p class="notif">'."Vous avez deja traité cette question, vous pouvez la modifier dans l'onglet \"modifier\" de la page principale".'</p><br/>';
						echo '<p><a href="index.html">Revenir à la page principale</a></p><br>';
						echo '<p><a href="Question.php">Revoir la question</a></p><br>';
						echo '<p><a href="Creation_sujet.php">Revenir à la création du sujet</a></p><br>';
						echo '</div>';
					echo '</div>';
					exit();
	
				}
				echo '<p>'."Voulez vous ajouter les elements suivants à l'exercice numero: ".$_SESSION['ind'].' ?'.'</p><br/>';
			
				$_SESSION['nbQuestion'][$_SESSION['ind']]++;
				
				if(!isset($_SESSION['ex'.$_SESSION['ind']]['énoncé']) and !isset($_SESSION['ex'.$_SESSION['ind']]['bareme']) and !isset($_SESSION['ex'.$_SESSION['ind']]['num']) and !isset($_SESSION['ex'.$_SESSION['ind']]['question']) and !isset($_SESSION['ex'.$_SESSION['ind']]['reponse']))
				{
					
					$_SESSION['ex'.$_SESSION['ind']]['num'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['énoncé'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['question'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['reponse'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['bareme']=array();					
				}			
				
				
				
				$_SESSION['ex'.$_SESSION['ind']]['num'][$i]=$_POST['num'];	
				$_SESSION['ex'.$_SESSION['ind']]['question'][$i]=$_POST['question'];
				$_SESSION['ex'.$_SESSION['ind']]['énoncé'][$i]=$_POST['énoncé'];
				$_SESSION['ex'.$_SESSION['ind']]['bareme'][$i]=$_POST['bareme'];									
					
						echo '</p>'."Question numero: ".$_SESSION['ex'.$_SESSION['ind']]['num'][$i].'</p><br/>';
						echo '</p>'."énoncé: ".$_SESSION['ex'.$_SESSION['ind']]['question'][$i].'</p><br/>';
						echo '</p>'."Question: ".$_SESSION['ex'.$_SESSION['ind']]['question'][$i].'</p><br/>';
						echo '</p>'."bareme: ".$_SESSION['ex'.$_SESSION['ind']]['bareme'][$i].'</p><br/><br/>';
					
												
			}
		?>
		
		<div id="Button">
		<a href="Creation_sujet.php">valider</a> <tr/> <a href="Question.php"<>modifier</a>
		</div>
		
		<br/><br/>
	
	</div>


</body>
</html>
