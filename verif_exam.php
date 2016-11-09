<?php
$extensions_val = array('.exam');
$extensions_up = strrchr($_FILES['fichier']['name'], '.'); // recuperer chaine apres le point

$tab_test = array('[NUM_EXO]','[TITRE_EXO]','[NUM_QUESTION]','[QUESTION]','[ENONCE]','[REPONSE]','[BAREME]');
$tab_verif = array();

function verif_tab($t)
{
	$res = 0;
	for($i=0; $i<count($t); $i++)
		$res += $t[$i];	
	
	if($res == 0) return true;
	else return false;
}

function test_exam()
{
	global $tab_test;
	global $tab_verif;
	$balise = 0;
	$i = 0;
	$j = 0;
	$k = 0;
	$count_fin = 0; // compte le nombre de marqeur de fin (qui ne dervait pas exceder 1)
	$chaine;
	$fich = @fopen($_FILES['fichier']['name'], 'r');
	if($fich)
	{
		$ct = array();
		while(false !== ($char = fgetc($fich))) // tant qu on a pas atteint la fin du fichier
		{
			$ct[] = $char; // recupere tout le fichier et le met dans un tableau
		}
		//print_r($ct);
		//echo count($ct);
		
			// test de tout un exo :
			do
			{
				for($i; $ct[$i]!=']'; $i++);
				$i++;
				$chaine = implode(array_slice($ct,$j,$i-$j));
				echo $chaine;

				if(isset($tab_test[$balise]))
				{
					if($chaine == $tab_test[$balise]) $tab_verif[$k] = 0;
					else $tab_verif[$k] = 1;
				}
				
				if($balise < 6) $balise++;
				else $balise = 0;
							
				for($i; $ct[$i]!='[' /*and $ct[$i] != '~'*/; $i++) // Avancer jusqu'a la prochaine balise
				{
					//echo $ct[$i];
					if(isset($ct[$i]))
					{
						if($ct[$i] == '#') $balise = 2;
						if($ct[$i+1] == '~') $count_fin++;
						//echo $count_fin;
					}
					
				}
				
				$j = $i;
				$k++;
				//echo "I".$i; 
			}
			while($ct[$i+1] != '~');
			
			if(fclose($fich));
			else echo "Erreur lors de la fermeture du fichier !"; //apres balise bareme mettre a 0
			
			if(verif_tab($tab_verif)) return true;
			else return false;
			//print_r($tab_verif);
	}
	else
	{
		echo "<p>Erreur lors de la lecture du fichier : Chemin incorrect ou droits inexistants</p>";
	}
}

if ($_FILES['fichier']['error'] == 0) 
{
	if (in_array($extensions_up,$extensions_val)) // teste si extension valide
	{	
		
			if(test_exam())
			{
				//echo "aa";
				print_r($tab_verif);
				echo "Upload reussie"; // teste si l'interieur du .exam est correct
			}
			else 
			{
				echo "Le contenut du fichier ne correspond pas";
				print_r($tab_verif);
			}
	
	}
	else echo 'Extension incorrecte';
}
else echo 'Erreur lors du transfert';  
?>
