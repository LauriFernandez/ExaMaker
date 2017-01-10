<?php session_start() ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="menuC2.css"/>
	<title>Composition du sujet</title>
</head>

	<header>
		<h1>Espace candidat</h1> 
	</header>

<body>
										
												
												
											
			
			<?php 
				
				if(isset($_GET['ex']))
				{
					$_SESSION['ind']=(int)htmlspecialchars($_GET['ex']);
					
					
				}//on recupere la variable du choix de l'exercice qui correspond au numero de l'exercice
				
				echo '<div id="sav">';
				$cpt1=0;
				$cpt2=0;
				$_SESSION['cptExo']=0;
				
				echo '<div id="entete">';
				echo"<br/>";
				for($b=0;$b<$_SESSION['cpt'];$b++)
				{
					if(preg_match("#NUM_EXO#",$_SESSION['contenu'][$b])) 
					{
						$cpt1++;
					}
				}
				$nbExo = $cpt1 / 2;
				echo '<div style=" width: 60%; display: flex; margin-left: 20%;">';	
				for($b=0;$b<$_SESSION['cpt'];$b++)
				{
					//EXERCICE ACTUEL -> id="selectionne"
					if(preg_match("#NUM_EXO#",$_SESSION['contenu'][$b])) 
					{
						$cpt2++;//le compteur s'incrementera à chaque fois que NUM_EXO aura été repéré dans une ligne du fichier
						
						echo '<div class="block" style="width: '.(50/$nbExo).'%;">';
						echo "<a id=\"case\"  href=\"compo.php?ex=".$cpt2."\" ";
						
						echo">Exercice ".$_SESSION['contenu'][$b+1]."</a></div>";//le candidat choisira l'exercice qu'il veut faire, la variable $_GET aura la valeur du numero de l'exercice
						if($_SESSION['contenu'][$b]=="~")
							break;	
						
					}					
					
				}//affiche le nombre d'exercice disponible 
				$_SESSION['cptExo']=$cpt2;
				
				echo '</div>';
				echo "</div>";
			
				echo "<form method=\"post\" action=\"ficheC.php\" name=\"compo\">";
				
				for($a=0;$a<$_SESSION['cpt'];$a++)// 1ere boucle: parcours toutes les lignes du fichier
				{	
			
					if($_SESSION['contenu'][$a]=="NUM_EXO: \n")// s'arrete quand la ligne où NUM_EXO est present a été trouvé
					{
						
						for($b=$a+1;$_SESSION['contenu'][$b]!="~";$b++)//2eme boucle: parcours à partir de la ligne d'apres jusqu a la fin du fichier
						{
							
							if($_SESSION['contenu'][$b]==@$_SESSION['ind'] and $_SESSION['contenu'][$b-1]=="NUM_EXO: \n") //on verifie que la valeur d'une des lignes du fichier corresponde à $_GET et que la ligne d'avant corresponde à NUM_EXO pour preciser qu'il s'agit du numero de l'exercice
							{	
								
								$_SESSION['copieEx'.$_SESSION['ind']]=array();
								$_SESSION['co']=0;
							
								echo '<p style=" text-align: left;font-size: 40px; ">Exercice '.$_SESSION['contenu'][$b]."</p><br/>"; //numero de l'exercice
								
								$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]='Exercice '.$_SESSION['contenu'][$b];//*repere fichier.cop//
								$_SESSION['co']++;
								
								for($c=$b+1;$_SESSION['contenu'][$c]!="NUM_EXO: \n";$c++) //3eme boucle: on parcours toutes les données de l'exercice en question
								{
									if($_SESSION['contenu'][$c]=="~") //on s'arrete si on atteint la fin du fichier
										break;
										
									if($_SESSION['contenu'][$c]=="TITRE_EXO: \n")
									{
										echo '<p style=" text-align: left;font-size: 40px; ">'.$_SESSION['contenu'][$c+1].'<br/><br/></p>'; // on affiche la valeur de TITRE_EXO (le contenu de la ligne qui suit TITRE_EXO)
										$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]=$_SESSION['contenu'][$c+1];//*repere fichier.cop//
										$_SESSION['co']++;
									}
									
									else if(preg_match("#NUM_Q#",$_SESSION['contenu'][$c]))
									{
										echo '<p style=" text-align: left;">'.$_SESSION['contenu'][$c+1].')<tr/>';  // on affiche la valeur de NUM_Q (le contenu de la ligne qui suit NUM_Q (le numero de la question))
										
										$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]=$_SESSION['contenu'][$c+1].')';//*repere fichier.cop//
										$_SESSION['co']++;
										
										$cpt2=(int)$_SESSION['contenu'][$c+1];
										echo '</p>';
									}
									
									else if($_SESSION['contenu'][$c]=="BAREME: \n")
									{
										echo "Bareme : ".$_SESSION['contenu'][$c+1].' points<br/><br/>'; // on affiche la valeur du BAREME 
										$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]="Bareme : ".$_SESSION['contenu'][$c+1];
										$_SESSION['co']++;
									}
									
									else if(preg_match("#^QUESTION#",$_SESSION['contenu'][$c]))
									{
										echo '<p style=" text-align: left;">';
										echo $_SESSION['contenu'][$c+1].'<br/><br/>'; // on affiche le contenu de la question
										
										$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]=$_SESSION['contenu'][$c+1];//*repere fichier.cop//
										$_SESSION['co']++;
										
										echo '</p>';
										echo "<textarea id=\"iddutextarea\" style=\"\" name=\"repEX".$_SESSION['ind']."question".$cpt2."\" col=100 row=100>".@$_SESSION['repEX'.$_SESSION['ind'].'question'.$cpt2]."</textarea><br/><br/>";
										
										$_SESSION['copieEx'.$_SESSION['ind']][$_SESSION['co']]=@$_SESSION['repEX'.$_SESSION['ind'].'question'.$cpt2];//*repere fichier.cop//
										$_SESSION['co']++;
									}														
								}
								break;
							}
						}
						
						
						
						
						
						
						
						
						
						echo '<br/><input type="submit" value="Valider l\'exercice"/>';
				
						echo "</form>";
						
						echo "<br/><a class=\"validation\" href=\"validExam\">Valider l'examen</a></div>";
						
						break;
					}
					 
					
					
					
							
				}
							
				echo '</div>';
			
			?>
		
		
				
		
</body>

</html>
