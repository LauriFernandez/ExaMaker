<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="creebis.css"/>
	<title>Connexion</title>
</head>

	<header>
		<h1>Espace candidat</h1> 
	</header>

<body>
		
		
		<div>
		
			<?php 
				echo "<p>Prenom du candidat: ".$_SESSION['nomC'].'</p>'; 
			
			?>
		
		
				
		</div>
</body>

</html>
