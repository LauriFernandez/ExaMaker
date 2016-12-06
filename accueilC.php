<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cree.css"/>
	<title>Connexion</title>
</head>

	<header>
		<h1>Espace candidat</h1> 
	</header>

<body>
		
		
		<div>
		
			<?php 
			
				echo "<div id=\"status\">";
				echo "<p class='notif'>Connecté en tant que: ".$_SESSION['infoCandidat']['prenom']." ".$_SESSION['infoCandidat']['nom']."</p>";
				echo "</div>";
			
				echo "<div id=\"menu\">";
				echo "<tr/><a href=\"\"><button class=\"validation\">notes</button></a> <tr/> <tr/><a href=\"\"><button class=\"validation\">messages</button></a> <br/><br/>";
				echo "</div>";
				//affiche le nom et prenom de l'utilisateur
				
				echo "<p>Prenom du candidat: ".@$_SESSION['infoCandidat']['prenom'].'</p><br/><br/>';
				
				
				
				if(@$_SESSION['startExam']==true)
				{
					echo 'Examen: '.$_SESSION['nomExam'].' ouvert';
					echo "<p>Veuillez cliquer sur un boutton correspondant à l'examen en question pour debuter: </p>";
					
					echo "<tr/><a href=\"compo.php\"><button class=\"validation\">"."Commencer l'examen ".$_SESSION['nomExam']."</button></a> <tr/><a href=\"index.html\"><button class=\"validation\"> revenir à la page d'accueil </button></a>";

					
				}
				else
				{
					echo "aucun examen<br/><br/>";
					echo "<tr/><a href=\"index.html\"><button class=\"validation\"> revenir à la page d'accueil </button></a>";
				}	
				
			
			?>
		
		
				
		</div>
</body>

</html>
