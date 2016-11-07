<?php
/*
 * modifExo.php
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
if(isset($params['Valider'])){
	$params['Modifier'] = $params['Valider'];
unset($params['Valider']);
	}




$exos = $bdd->query('SELECT Nom FROM exercices WHERE ID='.$params['Modifier']);
$exoQuestions= $bdd->query('SELECT ID,Question,Points FROM questions WHERE ExerciceID='.$params['Modifier'].';');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<link rel="stylesheet" href="Style.css" />
	<title>ExaMaker - Modification</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	<h1>
    Modification de l'exercice : <?php while($nom = $exos->fetch()){echo $nom['Nom'];} ?> 
    <br/><br/>
    <h2>Question(s) :</h2>
    
   <?php
/*if(isset($_POST['modifQues'])){
		$questMod = htmlspecialchars($_POST['modifQues']);
		$sql = 'UPDATE questions SET Question = "'.$questMod.'" WHERE ID = '.$params['Modifier'].' ;';
		$modif=$bdd->exec($sql);
		//header("location : http://localhost/examaker/modifExo.php");
		
		
		
		}*/

for($n=1;$question = $exoQuestions->fetch();$n++){
	echo '<p><strong>- Question '.$n.': </strong><br><br>'
	.$question['Question'].' </p>
	<form action=\'modifQues.php\' method=\'post\'>
	<input style="background-color: #3bb39d" type="submit" name=\''.$question['ID'].'\' value="Modifier">
	</form>
	<form action=\'validerQues.php\' method=\'post\'>
	<br><input style="background-color: #e2574c" type="submit" name=\''.$question['ID'].'\' value="Supprimer">
	</form>
	';
	
	}
	echo '<form action=\'modifQues.php\' method=\'post\'>
	<br><br><input style="color: #3bb39d" type="submit" name=\''.$params['Modifier'].'\' value="Ajouter"><br><br>
	</form>';
?> 
	
	
	
	
	
	<a href='http://localhost/examaker/modifExa.php'><input style="color: #e2574c" type='button' value='Retour'></a>
</body>

</html>
