<?php
/*
 * modifExa.php
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<link rel="stylesheet" href="Style.css" />
	<title>ExaMaker - Modification</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<h1>
    Modification d'un Examen
    </h1>
    <br/><br/>
</head>

<body>
	
    <h2>Exercice(s) :</h2>
    <div id="Examen">
<?php

$exams = $bdd->query('SELECT ID,Nom,Points FROM exercices');

for($n=1;$exos = $exams->fetch();$n++){
	echo '<div id="Exercice"> <p>- Exercice '.$n.': '.$exos['Nom'].' ('.$exos['Points'].' points)</p>
	<form action=\'modifExo.php\' method=\'post\'>
	<div id="Button">
	<input style="background-color: #3bb39d" type="submit" name=\''.$exos['ID'].'\' value="Modifier">
	<input style="background-color: #e2574c" type="submit" name=\''.$exos['ID'].'\' value="Supprimer">
	</div>
	</form>
	</div>';
	}
?>
	
	
	</form>
	</div>
</body>

</html>
