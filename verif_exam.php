<?php
$extensions_val = array('.exam');
$extensions_up = strrchr($_FILES['fichier']['name'], '.'); // recuperer chaine apres le point
$tab_test = array('[NUM_EXO]','[TITRE_EXO]','[NUM_QUESTION]','[QUESTION]','[ENONCE]','[REPONSE]','[BAREME]');
$tab_verif = array();
$tab_verif_plus = array(0); // indice 0 test ~

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
	global $tab_verif_plus;
	$balise = 0;
	$i = 0;
	$j = 0;
	$k = 0;
	$count_fin = 0;
	$fich = @fopen($_FILES['fichier']['name'], 'r');
	if($fich)
	{
		while(false !== ($char = fgetc($fich))) // tant qu on a pas atteint la fin du fichier
		{
			$ct[] = $char; // recupere tout le fichier et le met dans un tableau
		}
		//print_r($ct);
		//echo count($ct);
		
			// test de tout un exo :
			do
			{
				for($i; $ct[$i]!=']' and $ct[$i] != '~'; $i++); // 2eme condition = s'arrete au cas ou il n'y aurais pas de marqueur de fin
				$i++;
				$chaine = implode(array_slice($ct,$j,$i-$j));
				//echo $chaine;
				if(isset($tab_test[$balise]))
				{
					if($chaine == $tab_test[$balise]) $tab_verif[$k] = 0;
					else $tab_verif[$k] = 1;
				}
				
				if($balise < 6) $balise++;
				else $balise = 0;
							
				for($i; $ct[$i]!='[' and $ct[$i] != '~'; $i++) // Avancer jusqu'a la prochaine balise
				{
					//echo $ct[$i];
					if(isset($ct[$i]))
					{
						if($ct[$i] == '#') $balise = 2;
						if(isset($ct[$i+1]))
							if($ct[$i+1] == '~') $count_fin++;
							
							if($count_fin == 1) $tab_verif_plus[0] = 0;
							else $tab_verif_plus[0] = 1;
						
					}
					
				}
				
				$j = $i;
				$k++;	 
			}
			while($ct[$i] != '~' and $i<count($ct)-1); // 2eme condition = s'arrete au cas ou il n'y aurais pas de marqueur de fin
			if(fclose($fich));
			else echo "Erreur lors de la fermeture du fichier !"; //apres balise bareme mettre a 0
			
			if(verif_tab($tab_verif) && verif_tab($tab_verif_plus)) return true;
			else return false;
	}
	else
	{
		echo "<p>Erreur lors de la lecture du fichier : chemin incorrect ou droits inexistants</p>";
	}
}

if ($_FILES['fichier']['error'] == 0) 
{
	if (in_array($extensions_up,$extensions_val)) // teste si extension valide
	{	
		
			if(test_exam())
			{
				//print_r($tab_verif);
				echo "Upload reussie"; // teste si l'interieur du .exam est correct
			}
			else 
			{
				echo "Le contenut du fichier ne correspond pas";
				//print_r($tab_verif);
			}
	
	}
	else echo 'Extension incorrecte';
}
else echo 'Erreur lors du transfert';  
?>
