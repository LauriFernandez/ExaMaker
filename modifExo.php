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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<link rel="icon" href="images/exaMaker.png">
	<title>ExaMaker - Modification</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	<h1>
    Modification de l'exercice 
    <?php 
    if(isset($_POST['1']))
		echo '1';
	elseif(isset($_POST['2']))
		echo '2';
	elseif(isset($_POST['3']))
		echo '3';
	elseif(isset($_POST['4']))
		echo '4';
    ?><br/><br/>
    <h2>Question(s) :</h2>
    
    
	<p><strong>- Question 1 :</strong><br>
	De milites per sunt quaedam omnes civitatibus incertus Constantius mortalem ac milites sunt nequo conducentia ?<br></p>
	<p><strong>Reponse 1 :</strong><br>
	Deterritum doctrinis aut ita equidem appellantur quas video deterruisset videri quamquam satis quamquam satis deterruisset.
	</p>
	<form action='modifQues.php' method='post'>
	<input type="submit" name='1' value="Modifier">
	<input type="submit" name='1' value="Supprimer">
	</form>
	
	
	<p><strong>- Question 2 :</strong><br>
	Si intepesceret magna inter res promittentes e res Eusebium quaestor et nec Epigonus Eusebium armorum ?<br>
	<p><strong>Reponse 2 :</strong><br>
	Properantes enim sine velut subversasque post transiturus per calceis globos familiarium spatia latera publicos praedatorios.
	</p> 
	<form action='modifQues.php' method='post'>
	<input type="submit" name='2' value="Modifier">
	<input type="submit" name='2' value="Supprimer">
	</form>
	
	
	
	<form action='modifQues.php' method='post'>
	<br><br><input type="submit" name='+' value="Ajouter"><br><br>
	</form>
	<a href='http://localhost/examaker/modifExa.php'><input type='button' value='Retour'></a>
	<?php //print_r($_POST); ?>
</body>

</html>
