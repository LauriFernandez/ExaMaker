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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fr">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<title>ExaMaker - Modification</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	<h1>
    Modification d'un Examen<br/><br/>
    <h2>Exercice(s) :</h2>
    
	<p>- Exercice 1 : Thème A (barème)</p>
	<form action='modifExo.php' method='post'>
	<input type="submit" name='1' value="Modifier">
	<input type="submit" name='1' value="Supprimer">
	</form>
	
	<p>- Exercice 2 : Thème B (barème)</p>
	<form action='modifExo.php' method='post'>
	<input type="submit" name='2' value="Modifier">
	<input type="submit" name='2' value="Supprimer">
	</form>
	
	<p>- Exercice 3 : Thème C (barème)</p>
	<form action='modifExo.php' method='post'>
	<input type="submit" name='3' value="Modifier">
	<input type="submit" name='3' value="Supprimer">
	</form>
	
	<p>- Exercice 4 : Thème D (barème)</p>
	<form action='modifExo.php' method='post'>
	<input type="submit" name='4' value="Modifier">
	<input type="submit" name='4' value="Supprimer">
	</form>
</body>

</html>
