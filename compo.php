<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="menuC.css"/>
	<title>Composition du sujet</title>
</head>

	<header>
		<h1>Espace candidat</h1> 
	</header>

<body>
			
			<?php 
				
				if(isset($_GET['ex']))
				{
					$ind=(int)htmlspecialchars($_GET['ex']);
					
				}//on recupere la variable du choix de l'exercice qui correspond au numero de l'exercice
				
				echo '<div id="sav">';
				$cpt=0;
				
				echo '<div id="entete">';
				echo"<br/>";
				for($b=0;$b<$_SESSION['cpt'];$b++)
				{
					if(preg_match("#NUM_EXO#",$_SESSION['contenu'][$b])) 
					{
						$cpt++;//le compteur s'incrementera à chaque fois que NUM_EXO aura été repéré dans une ligne du fichier
						echo "<a id=\"case\" href=\"compo.php?ex=".$cpt."\">Exercice ".$_SESSION['contenu'][$b+1]."</a>";//le candidat choisira l'exercice qu'il veut faire, la variable $_GET aura la valeur du numero de l'exercice
						if($_SESSION['contenu'][$b]=="~")
							break;	
					}				
				}//affiche le nombre d'exercice disponible 
				echo '</div>';
			
				echo "<form method=\"post\" action=\"ficheC.php\">";
				
				for($a=0;$a<$_SESSION['cpt'];$a++)// 1ere boucle: parcours toutes les lignes du fichier
				{	
			
					if($_SESSION['contenu'][$a]=="NUM_EXO: \n")// s'arrete quand la ligne où NUM_EXO est present a été trouvé
					{
						
						for($b=$a+1;$_SESSION['contenu'][$b]!="~";$b++)//2eme boucle: parcours à partier de la ligne d'apres jusqu a la fin du fichier
						{
							if($_SESSION['contenu'][$b]==@$ind and $_SESSION['contenu'][$b-1]=="NUM_EXO: \n") //on verifie que la valeur d'une des lignes du fichier corresponde à $_GET et que la ligne d'avant corresponde à NUM_EXO pour preciser qu'il s'agit du numero de l'exercice
							{							
								echo '<p>Exercice '.$_SESSION['contenu'][$b]."</p><br/>";
								
								for($c=$b+1;$_SESSION['contenu'][$c]!="NUM_EXO: \n";$c++) //3eme boucle: on parcours toutes les données de l'exercice en question
								{
									if($_SESSION['contenu'][$c]=="~") //on s'arrete si on atteint la fin du fichier
										break;
										
									if($_SESSION['contenu'][$c]=="TITRE_EXO: \n")
									{
										echo $_SESSION['contenu'][$c+1].'<br/><br/>'; // on affiche la valeur de TITRE_EXO (le contenu de la ligne qui suit TITRE_EXO)

									}
									
									else if(preg_match("#NUM_Q#",$_SESSION['contenu'][$c]))
									{
										echo $_SESSION['contenu'][$c+1].')<tr/>';  // on affiche la valeur de NUM_Q (le contenu de la ligne qui suit NUM_Q (le numero de la question))
										$cpt2=(int)$_SESSION['contenu'][$c+1];
									}
									
									else if($_SESSION['contenu'][$c]=="BAREME: \n")
									{
										echo "Bareme : ".$_SESSION['contenu'][$c+1].' points<br/><br/>'; // on affiche la valeur du BAREME 

									}
									
									else if(preg_match("#^QUESTION#",$_SESSION['contenu'][$c]))
									{
										
										echo $_SESSION['contenu'][$c+1].'<br/><br/>'; // on affiche la valeur dela question
										echo "<textarea name=\"repEX".$ind."question".$cpt2."\" col=100 row=100></textarea><br/><br/>";
										
									}														
								}
								break;
							}
						}
						
						
						
						
						
						
						
						
						
						echo '<br/><input type="submit" value="Rendre la copie"/>';
				
						echo "</form>";
						
						break;
					}
					 
					
					
					
							
				}
							
				echo '</div>';
			
			?>
		
		
				
		
</body>

</html>
