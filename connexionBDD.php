<html>
<head>  
  <meta charset="utf-8"/>
</head>

<body>

<?php 

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=examaker;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}

?>

</body>

</html>
