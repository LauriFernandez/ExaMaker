<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Création du sujet</title>
</head>

<body>
	<header>
		<h1>Question</h1> 
	</header>

<br/><br/>	
	
	<div>
	
	<?php $indiceExo=$_SESSION['ind']; ?>
	
	<form method="post" action="Creation_exo.php">
		<p> Numero de la question: <input type="text" name="num"/> </p>
		<p> Question: <input type="text" name="question"/> </p>	
		<p> Reponse: <textarea col="10" row="10" name="reponse"></textarea> </p>
		<p> Bareme: <input name="bareme"/></p>
		
		<input type="submit" value="valider la question"/>
	</form>
	
	</div>


</body>
</html>