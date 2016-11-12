<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="creebis.css"/>
	<title>Connexion</title>
</head>

	<header>
		<h1>Espace Enseignant</h1> 
	</header>

<body>
	
	<?php
		require('connexionBDD.php');

		if(isset($_POST['login']) and isset($_POST['mdp']) and !empty($_POST['login']) and !empty($_POST['mdp']))
		{
			try
			{
				$requete=$db->prepare("select * from users where Login = :l and Password = :m");	
				$requete->bindValue(':l',$_POST['login']);	
				$requete->bindValue(':m',$_POST['mdp']);		
				$requete->execute();
				$tab=$requete->fetch();			
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
					
			if($tab['Login']!=$_POST['login'] or $tab['Password']!= $_POST['mdp'])
			{
				echo "<h1 class=\"notif\"> Erreur d'authentification </h1>";
				echo "<a href=\"connexionP.html\"> <h1 class=\"notif\"> Cliquez sur ce message pour reesayer de vous connecter </h1> </a>";
				exit;
			}
			
			echo "<a href=\"Creation_sujet.php\"> <h1 class=\"notif\"> Cliquez sur ce message pour creer votre sujet</h1> </a>";
			$_SESSION['prenomP']=$tab['Login'];
			$_SESSION['nomP']=$tab['Password'];
			
			echo "<p class='notif'>Connecté en tant que: ".$_SESSION['prenomP']." ".$_SESSION['nomP']."</p>";
		}
		else
		{
				echo "<h1 class=\"notif\"> vous n'avez pas rempli tous les champs </h1>";
				echo "<a href=\"connexionP.html\"> <h1 class=\"notif\"> Cliquez sur ce message pour reesayer de vous connecter</h1> </a>";
				exit;
		}
	

	?>
	
	<div id="connex">
		<form method="post" action="Creation_sujet.php">
			<p>Login:	<input type="text" name="login"/></p>
			<p>Mot de passe:	<input type="password" name="mdp"/></p><br/>
			
			<input class="validation" type="submit" value="connexion"/>
		</form>
		<br/> <a href="index.html"> <button class="validation"> retour à l'accueil </button> </a>
	</div>

</body>
</html>

