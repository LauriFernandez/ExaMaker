<html>
<head>  
<title> <?php echo 'Premiers pas en PHP'; ?> </title>
  <meta charset="utf-8"/>
</head>

<body>


<form > <!-- permet au créateur de faire le choix entre modifier ou sauvegarder le sujet-->

<input type="submit" name="choix" value="m">
<input type="submit" name="choix" value="S">
</form>
<?php 
if(isset($_GET['choix']))
{
if($_GET['choix']=='s')
{
header(' Location : http://localhost/~11503023/php/exo1.php');
exit();
}

else{
header('Location: http://localhost/~11503023/projetS3/sauvegarde.php');
exit();
}
}
?>
</html>
