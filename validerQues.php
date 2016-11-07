<?php
/*
 * validerQues.php
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
$params=array_flip($_POST);
//print_r($_POST);
//print_r($params);
if(isset($params['Valider'])){
	$params['Modifier'] = $params['Valider'];
unset($params['Valider']);
	}
if(isset($_POST['modifQues'])){
		$questMod = htmlspecialchars($_POST['modifQues']);
		$sql = 'UPDATE questions SET Question = "'.$questMod.'" WHERE ID = '.$params['Modifier'].' ;';
		$modif=$bdd->exec($sql);
		echo '<h2><strong>'.$modif.' question modifié avec succès.</strong></h2>';
		echo "<br> ".'<form action=\'modifExa.php\' method=\'post\'><input style="color: #e2574c" type=\'submit\' name=\''.'Retour'."' value='Retour'>
	</form>";
	}
		
elseif(isset($params['Supprimer'])){
		$sql = 'DELETE FROM questions WHERE ID ='.$params['Supprimer'].' ;';
		$suppr=$bdd->exec($sql);
		echo '<h2><strong>'.$suppr.' question supprimé avec succès.</strong></h2>';
		echo "<br> ".'<form action=\'modifExa.php\' method=\'post\'><input style="color: #e2574c" type=\'submit\' name=\''.'Retour'."' value='Retour'>
	</form>";
		
		
		
		}
		
		
if(isset($_POST['quesAjouter'])){
		$questMod = htmlspecialchars($_POST['quesAjouter']);
		$sql = 'INSERT questions SET Question = "'.$questMod.'", ExerciceID ='.$params['Modifier'].', Points = '.$_POST['Points'].' ;';
		$ajout=$bdd->exec($sql);
		echo '<h2><strong>'.$ajout.' question(s) ajouter avec succès.</strong></h2>';
		echo "<br> ".'<form action=\'modifExa.php\' method=\'post\'><input style="color: #e2574c" type=\'submit\' name=\''.'Retour'."' value='Retour'></form>";
		
		
		
		}		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<link rel="stylesheet" href="Style.css" />
	<title>ExaMaker</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.28" />
</head>

<body>
	
</body>

</html>
