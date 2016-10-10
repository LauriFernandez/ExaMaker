<html>
<head>

</head>
<body>

<form> //permet au créateur de faire le choix entre modifier ou sauvegarder le sujet
<input type="radio" name="choix" value="Modifier un exercice ">
<input type="radio" name="choix" value="Sauvegarder">
  <input type="submit" value="Valider mon choix">
</form>

<?php
if($_GET['choix']=='modifier')
{
header(' Location : http://localhost/~11503023/php/exo1.php');
exit();
};
else {
header('Location: http://localhost/~11503023/projetS3/sauvegarde.php');
exit();
};

?>
</html>
