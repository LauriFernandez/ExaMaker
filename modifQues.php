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
	<?php 
    if(isset($_POST['1'])) // problème avec la condition $_POST['1'] == 'Modifier'
    echo "<h1> Modification de la question 2</h1>
    <p>Question :<p>
	<textarea name='modifQues1' rows='8' cols='45'>
De milites per sunt quaedam omnes civitatibus incertus Constantius mortalem ac milites sunt nequo conducentia ?
	</textarea>
	
	<p>Réponse :</p>
	<textarea name='modifRep1' rows='8' cols='45'>
Deterritum doctrinis aut ita equidem appellantur quas video deterruisset videri quamquam satis quamquam satis deterruisset.
	</textarea>";
	
    elseif(isset($_POST['2'])){
    echo "<h1> Modification de la question 2</h1>
    <p>Question :<p>
	<textarea name='modifQues2' rows='8' cols='45'>
Si intepesceret magna inter res promittentes e res Eusebium quaestor et nec Epigonus Eusebium armorum ?
	</textarea>
	
	<p>Réponse :</p>
	<textarea name='modifRep2' rows='8' cols='45'>
Properantes enim sine velut subversasque post transiturus per calceis globos familiarium spatia latera publicos praedatorios.
	</textarea>";
	} 
	elseif(isset($_POST['+'])){
		echo "<h1> Ajouter une question</h1>
    <p>Question :<p>
	<textarea name='modifQues1' rows='8' cols='45'></textarea>
	
	<p>Réponse :</p>
	<textarea name='modifRep1' rows='8' cols='45'></textarea>";
		} 
	?>
	<form action='modifExo.php' method='post'>
	<br><input type='submit' name='modif' value='Valider'>
	<a href='http://localhost/examaker/modifExo.php'><input type='button' value='Annuler'></a>
	</form>
</body>

</html>
