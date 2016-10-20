<?php

$extention = array('.exam');
$extensions = strrchr($_FILES['fichier']['name'], '.');
$dossier = 'upload/';
     $fichier = basename($_FILES['fichier']['name']);
     if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
?>

