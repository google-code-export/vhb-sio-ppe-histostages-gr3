<?php

include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");

// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES Hynos

$tabErreurs = array();

$connexion=connect();
if (!$connexion)
{
   ajouterErreur($tabErreurs, "Echec de la connexion au serveur MySql");
   afficherErreurs($tabErreurs);
   exit();
}
if (!selectBase($connexion))
{
   ajouterErreur($tabErreurs, "La base de données stsig est inexistante ou non accessible");
   afficherErreurs($tabErreurs);
   exit();
}

if ( !isset($_GET['id']) ) 
{
   ajouterErreur($tabErreurs, "Absence d'identifiant pour le stage à détailler");
   afficherErreurs($tabErreurs);
}
else
{

$id=$_GET['id'];  

// OBTENIR LE DÉTAIL DU STAGE SÉLECTIONNÉ

$lg=obtenirDetailOrgaStage($connexion, $id);

$nomOrga=htmlspecialchars($lg['nom']);
$rue=htmlspecialchars($lg['rue']);
$cp=htmlspecialchars($lg['cp']);
$ville=htmlspecialchars($lg['ville']);
$tel=htmlspecialchars($lg['tel']);
$email=htmlspecialchars($lg['email']);
$urlSiteWeb= htmlspecialchars($lg['urlSiteWeb']);
$libelleCat=htmlspecialchars($lg['libelleCategorie']);

$lg=obtenirDetailRespStage($connexion, $id);
$identiteRespStage=htmlspecialchars($lg['identite']);
$fonctionRespStage=htmlspecialchars($lg['fonction']);
$telRespStage=htmlspecialchars($lg['tel']);
$emailRespStage=htmlspecialchars($lg['email']);

$lg=obtenirDetailMaitreStage($connexion, $id);
$identiteMaitreStage=htmlspecialchars($lg['identite']);
$fonctionMaitreStage=htmlspecialchars($lg['fonction']);
$telMaitreStage=htmlspecialchars($lg['tel']);
$emailMaitreStage=htmlspecialchars($lg['email']);

$lg=obtenirDetailEtudStage($connexion, $id);
$nomEtud=htmlspecialchars($lg['nomEtud']);
$prenomEtud=htmlspecialchars($lg['prenomEtud']);
$anneeStage=htmlspecialchars($lg['anneeStage']);
$libelle=htmlspecialchars($lg['libelle']);
$motsCles=htmlspecialchars($lg['motsCles']);

// amelioration 10:Consultation stages et organisations - Rendre cliquables les adresses mail (corentin barre)
echo '
<table width="90%" cellspacing="0" cellpadding="0" class="tabNonQuadrille">
   
   <tr class="enteteTabNonQuad">
      <td colspan="2">Stage effectué par '.$prenomEtud. ' ' . $nomEtud . ' (' . $anneeStage . ') - ' . $nomOrga.'</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Adresse organisation: </td>
      <td>'.$rue.'<br />'.$cp . '&nbsp;' . $ville .'
      </td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Libellé catégorie:</td>
      <td>'.$libelleCat.'</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Téléphone: </td>
      <td>'.$tel.'</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Email:</td>
      
 
 
      <td><a href="mailto:'.$email.'">'.$email.'</a></td>
   </tr> 
   <tr class="ligneTabNonQuad">
      <td> Site Web: </td>
      <td>';
    if (!empty($urlSiteWeb)) {
      echo  '<a href="http://'.$urlSiteWeb.'">'. $urlSiteWeb . '</a>';
    }
    echo '</td>
   </tr>
   <tr class="enteteTabNonQuad">
      <td colspan="2">Suivi de stage </td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Responsable de stage: </td>
      <td>' . $identiteRespStage . ' - '. $fonctionRespStage . ' - '. $telRespStage . ' - ' . $emailRespStage .'</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Maître de stage: </td>
      <td>' . $identiteMaitreStage .' - '. $fonctionMaitreStage . ' - '. $telMaitreStage . ' - ' . $emailMaitreStage . '</td>
   </tr>
   <tr class="enteteTabNonQuad">
      <td colspan="2">Sujet de stage</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Libellé: </td>
      <td>' . $libelle .'</td>
   </tr>
   <tr class="ligneTabNonQuad">
      <td> Mots-cles: </td>
      <td>' . $motsCles .'</td>
   </tr>
</table>
<p class="liensFinPage">
		<a href="AjoutContact.php"> Ajouter un contact </a> </br>
      <a href="accueil.php?page=rechercheStagesCriteres">Retour</a>
</p>';
}
?>
