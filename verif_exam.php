<?php
$extensions_val = array('.exam');
$extensions_up = strrchr($_FILES['fichier']['name'], '.'); // recuperer chaine apres le point
$tab_test = array('[NUM_EXO]','[TITRE_EXO]','[NUM_QUESTION]','[QUESTION]','[BAREME]');
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

function exam_session()
{
	global $tab_test;
	global $tab_verif;
	global $dossier;
	global $fichier;

	$fich = @fopen($dossier.$fichier, 'r');
	if($fich)
	{
		while(false !== ($char = fgetc($fich))) // tant qu'on a pas atteint la fin du fichier
		{
			$ct[] = $char; // recupere tout le fichier et le met dans un tableau
		}
			// test de tout un exo :
			do
			{
				for($i; $ct[$i]!=']' and $ct[$i] != '~' and $i<count($ct)-1; $i++); // 3eme condition = s'arrete au cas ou il n'y aurais pas de marqueur de fin
				$i++;
				$chaine = implode(array_slice($ct,$j,$i-$j));
				//echo $chaine;
				
				if($balise < 4) $balise++;
				else $balise = 0;
							
				for($i; $ct[$i]!='[' and $ct[$i] != '~' and $i<count($ct)-1; $i++) // Avancer jusqu'a la prochaine balise
				{
					if(isset($_SESSION[$chaine])
						$_SESSION[$chaine].$ct[$i]; // probleme
					else
						$_SESSION[$chaine] = $ct[$i];
					//echo $ct[$i];
					if(isset($ct[$i]))
					{
						if($ct[$i] == '#') $balise = 2;
					}	
				}
				$j = $i; 
				echo '['.$chaine.'] = '.$_SESSION[$chaine].' ';
			}
			while($ct[$i] != '~' and $i<count($ct)-1); // 2eme condition = s'arrete au cas ou il n'y aurais pas de marqueur de fin
			if(fclose($fich));
			else echo "Erreur lors de la fermeture du fichier !"; //apres balise bareme mettre a 0
	}
	else
	{
		echo "<p>Erreur lors de la lecture du fichier : chemin incorrect ou droits inexistants</p>";
	}
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
	$fich = @fopen($_FILES['fichier']['tmp_name'], 'r');
	if($fich)
	{
		while(false !== ($char = fgetc($fich))) // tant qu'on a pas atteint la fin du fichier
		{
			$ct[] = $char; // recupere tout le fichier et le met dans un tableau
		}
			// test de tout un exo :
			do
			{
				for($i; $ct[$i]!=']' and $ct[$i] != '~' and $i<count($ct)-1; $i++); // 3eme condition = s'arrete au cas ou il n'y aurais pas de marqueur de fin
				$i++;
				$chaine = implode(array_slice($ct,$j,$i-$j));
				//echo $chaine;
				if(isset($tab_test[$balise]))
				{
					if($chaine == $tab_test[$balise]) $tab_verif[$k] = 0;
					else $tab_verif[$k] = 1;
				}
				
				if($balise < 4) $balise++;
				else $balise = 0;
							
				for($i; $ct[$i]!='[' and $ct[$i] != '~' and $i<count($ct)-1; $i++) // Avancer jusqu'a la prochaine balise
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

$dossier = 'upload/';
$fichier = basename($_FILES['fichier']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['fichier']['tmp_name']);

if(!in_array($extensions_up, $extensions_val)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type exam';
}
if($taille>$taille_maxi) // Si taille fichier trop gros
{
     $erreur = 'Le fichier est trop gros...';
}
if(!test_exam()) // Si la syntaxe du fichier n'est pas celui d'un .exam
{
	$erreur = 'Le contenut du fichier ne correspond pas';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
	 //On formate le nom du fichier(pour gerer erreurs accent etc..)
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$fichier))
     {
     	echo 'Upload effectué avec succès !';
		exam_session();
     }
     else
     {
     	echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
} 
?>
