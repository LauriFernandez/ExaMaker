<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="cree.css" />
	<title>Création des questions</title>
</head>

<body>
	<header>
		<h1>Question</h1> 
	</header>

<br/><br/>	
	
	<div id="ajQ">
	<div class="Barre">
	<form method="post" action="Creation_exo.php">
		<p class="info"> Numero de la question:</p> <p class="rep"> <input type="text" name="num"/> </p>
		<br/><br/>
		<p class="info"> Enoncé: </p> <p class="rep"><textarea col="300" row="300" name="énoncé"></textarea> </p>
		<br/><br/>
		<p class="info"> Question: </p> <p class="rep"> <textarea col="300" row="300" name="question"></textarea> </p>
		<br/><br/>
		<p class="info"> Bareme: </p> <p class="rep"> <input name="bareme"/></p>
		
		<input class="validation" type="submit" value="Valider"/>
	</form>
	
	</div>


</body>
</html>