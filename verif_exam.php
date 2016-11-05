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
	$balise = 0;
	$chaine = "";
	$fich = @fopen($_FILES['fichier']['name'], 'r');
	if($fich)
	{
		$ct = array();
		while(false !== ($char = fgetc($fich))) // tant qu on a pas atteint la fin du fichier
		{
			$ct[] = $char; // recupere tout le fichier et le met dans un tableau
		}
		print_r($ct);
		
			// test de tout un exo :
			do
			{
				for($i=0; $ct[$i]!=']'; $i++);
				implode($chaine,array_slice($ct,0,$i));
				while($chaine !== $tab_test[2])
				{
					if($chaine === $tab_test[$balise]) $tab_verif[0] = 0;
					else $tab_verif[0] = 1; //changer balise pour pas qu'elles puissent etrent presentes dans l'enoncé

					for($i; $ct[$i] != '['; $i++); // Avancer jusqu'a la prochaine balise
					if($ct[$i] === '¿') $balise = 2;
									
					$balise++;
					$j = $i;
					for($i; $ct[$i]!=']'; $i++) // prochaine balise a tester
					implode($chaine,array_slice($ct,$j,$i-$j));
				}
				// pas sur que cette boucle serve
				/*
				do
				{
					for($i; $ct[$i] != '['; $i++) // Avancer jusqu'a la prochaine balise
					$balise++;
					for($i; $ct[$i]!=']'; $i++) $chaine[] = $ct[$i]; // prochaine balise a tester

				}
				while($chaine !== '¿'); // tant qu on tombe pas sur marqueur fin questions 
				*/
			}
			while($ct[$i] != '¶'); //Marqueur fin exo, a mettre dans fichier exa(script)
			
			if(verif_tab($tab_verif)) return true;
			else return false;
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
			if(test_exam()) echo "Upload reussie"; // teste si l'interieur du .exam est correct
			else echo "Le contenue du fichier ne corresspond pas";
	
	}
	else echo 'Extension incorrecte';
}
else echo 'Erreur lors du transfert';


     
?>

