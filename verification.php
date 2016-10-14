<html>
<head>  
<title> <?php echo 'Premiers pas en PHP'; ?> </title>
  <meta charset="utf-8"/>
</head>

<body>


<form > <!-- permet au créateur de faire le choix entre modifier ou sauvegarder le sujet-->

<input type="submit" name="choix" value="Modifier">
<input type="submit" name="choix" value="Sauvegarder">
</form>
<?php 
if(isset($_GET['choix']))
{
if($_GET['choix']=='Sauvegarder')
{
header(' Location : http://sauvegarde.php');
exit();
}

else{
header('Location: http://modif.php');
exit();
}
}
?>
</html>
