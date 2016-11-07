<?php
/*
 * modifQues.php
 * 
 * Copyright 2016 Yanis Kacher <kacher.yanis@gmail.com>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
 require 'includes.php';
//print_r($_POST);
$params=array_flip($_POST);
//print_r($params);

if(isset($params['Modifier'])){
	$exoQuestions= $bdd->query('SELECT Question,Points,ID FROM questions WHERE ID='.$params['Modifier'].';');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<link rel="stylesheet" href="Style.css" />
	<title>ExaMaker - Modification</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	<?php 
	if(isset($params['Modifier'])){
	
	
	for($n=1;$question = $exoQuestions->fetch();$n++){
	echo '<h1> Modification de la question</h1><br>
	<p><strong>Question :</strong><br>
	<form action=\'validerQues.php\' method=\'post\'>
	<br><textarea name=\'modifQues\' rows=\'16\' cols=\'80\'>'
	.$question['Question'].
	'</textarea>
	<br><br>'."<input style='background-color: #3bb39d' type='submit' name='".$question['ID']."' value='Valider'><br><br>
	</form>";
	 
	}
}




		
	if(isset($params['Ajouter'])){
		echo "<h1> Ajouter une question</h1>
    <p>Question :<p>
    <form action='validerQues.php' method='post'>
	<textarea name='quesAjouter' rows='16' cols='80'></textarea>
	<br><p>Barème : </p><input id='bareme'  type='text' name='Points'><br><br><input style='background-color: #3bb39d' type='submit' name='".$params['Ajouter']."' value='Valider'>
	
	</form>";
		} 
	
	?>
	<form action='modifQues.php' method='post'>
		<br>
	<a href='http://localhost/examaker/modifExa.php'><input style="background-color: #e2574c" type='button' value='Annuler'></a>
	</form>
</body>

</html>
