<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Choix des questions</title>
</head>

<body>
	<header>
		<h1>Choix des questions</h1> 

	</header>

<br/><br/>	
	
	<div>
		
		<?php
			
			echo "Voulez vous ajouter les elements suivants à l'exercice numero: ".$_SESSION['ind'].' ?'.'<br/>';
			
			if(isset($_POST['num']) and isset($_POST['question']) and isset($_POST['reponse']) and isset($_POST['bareme']) and isset($_POST['énoncé']))
			{	
				$_SESSION['nbQuestion'][$_SESSION['ind']]++;
				
				if(!isset($_SESSION['ex'.$_SESSION['ind']]['énoncé']) and !isset($_SESSION['ex'.$_SESSION['ind']]['bareme']) and !isset($_SESSION['ex'.$_SESSION['ind']]['num']) and !isset($_SESSION['ex'.$_SESSION['ind']]['question']) and !isset($_SESSION['ex'.$_SESSION['ind']]['reponse']))
				{
					
					$_SESSION['ex'.$_SESSION['ind']]['num'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['énoncé'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['question'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['reponse'] = array();
					$_SESSION['ex'.$_SESSION['ind']]['bareme']=array();					
				}			
				
				$i=(int)$_POST['num'];
				
				$_SESSION['ex'.$_SESSION['ind']]['num'][$i]=$_POST['num'];	
				$_SESSION['ex'.$_SESSION['ind']]['question'][$i]=$_POST['question'];
				$_SESSION['ex'.$_SESSION['ind']]['énoncé'][$i]=$_POST['énoncé'];
				$_SESSION['ex'.$_SESSION['ind']]['reponse'][$i]=$_POST['reponse'];
				$_SESSION['ex'.$_SESSION['ind']]['bareme'][$i]=$_POST['bareme'];									
					
						echo "Question numero: ".$_SESSION['ex'.$_SESSION['ind']]['num'][$i].'<br/>';
						echo "énoncé: ".$_SESSION['ex'.$_SESSION['ind']]['question'][$i].'<br/>';
						echo "Question: ".$_SESSION['ex'.$_SESSION['ind']]['question'][$i].'<br/>';
						echo "Reponse: ".$_SESSION['ex'.$_SESSION['ind']]['reponse'][$i].'<br/>';
						echo "bareme: ".$_SESSION['ex'.$_SESSION['ind']]['bareme'][$i].'<br/><br/>';
					
												
			}
		?>
		
		<a href="Creation_sujet.php"><button>valider</button></a> <tr/> <a href="Question.php"><button>modifier</button></a>
		
		<br/><br/>
	
	</div>


</body>
</html>
