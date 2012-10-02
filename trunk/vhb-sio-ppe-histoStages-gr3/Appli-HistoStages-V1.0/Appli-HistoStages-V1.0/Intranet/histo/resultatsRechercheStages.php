<?php

include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");

// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES stsig

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

// AFFICHER L'ENSEMBLE DES organisations
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR STAGE

$dept = (isset($_POST['dept'])) ? $_POST['dept'] : '';
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : '';
$anneeForm = (isset($_POST['anneeForm'])) ? $_POST['anneeForm'] : '';
$anneeScolaire = (isset($_POST['anneeScolaire'])) ? $_POST['anneeScolaire'] : '';
$nomOrga = (isset($_POST['nomOrga'])) ? $_POST['nomOrga'] : '';
$nomEtudiant = (isset($_POST['nomEtudiant'])) ? $_POST['nomEtudiant'] : '';
$opt=(isset($_POST['opt'])) ? $_POST['opt'] : "";//obtenir l'option


$tabConditions = array(); // initialisation tableau vide

if ( $dept != '' && $dept !='0' ) {
  $tabConditions [] = "o.numeroDept=" . intval($dept);
}
if ( $ville != '' ) {
  $tabConditions [] = "o.ville like '%" . filtreChaineBD($ville) . "%'";
}
if ( $anneeForm != ''  && $anneeForm !='0' ) {
  $tabConditions [] = 'p.numAnneeForm=' . intval($anneeForm);
}
if ( $anneeScolaire != ''  && $anneeScolaire !='0' ) {
  $tabConditions [] = 's.annee=' . intval($anneeScolaire);
}
if ( $nomOrga != '' ) {
  $tabConditions [] = "o.nom like '%" . filtreChaineBD($nomOrga) . "%'";
}
if ( $nomEtudiant != '' ) {
  $tabConditions [] = "e.nom like '%" . filtreChaineBD($nomEtudiant) . "%'";
}
if ($opt !='' && $opt!='0'){//vérifie si option n'est pas value=vide ou value=0
  $tabConditions [] = "e.libelleOption='".filtreChaineBD($opt)."'";//ajoute la condition de l'option dans le where
}


/*assemblage de toutes les conditions dans une seule relié par l'opérateur and*/
$reqConditions = '';
foreach ($tabConditions as $condition) {
  $reqConditions .= ($condition . ' and ' ); 
}

$reqConditions = substr($reqConditions, 0, -5); // suppression du dernier and 
//echo '***' . $reqConditions . '***<br />';

$reqPrincipale = obtenirReqStages();
if ( $reqConditions != '' ) {
  $reqConditions = ' where ' . $reqConditions ;
}
$reqComplete = $reqPrincipale . $reqConditions . " order by anneeStage desc";
 //echo '***' . $reqComplete . '***<br />';

$rs=mysql_query($reqComplete, $connexion);
$nbStages = mysql_num_rows($rs);
if ( $nbStages < 1 ) {
  echo 'Aucun stage répondant aux critères demandés';
}
else {

  echo '
<table width="100%" cellspacing="0" cellpadding="0" align="center" 
class="tabQuadrille">
   <tr class="titreTabQuad">
      <td colspan="4">Liste des stages (' . $nbStages . ')</td>
   </tr>
   <tr class="enteteTabQuad">
      <td>Organisation</td>
      <td>Etudiant</td>
      <td>Période</td>
   </tr>';
     
   $lg=mysql_fetch_array($rs);
   // BOUCLE SUR LES ORGANISATIONS
   while ($lg!=FALSE)
   {
      $nomOrga=htmlspecialchars($lg['nomOrga']);
      $idStage=htmlspecialchars($lg['idStage']);
      $nomEtud=htmlspecialchars($lg['nomEtud']);
      $prenomEtud=htmlspecialchars($lg['prenomEtud']);
      $anneeStage=htmlspecialchars($lg['anneeStage']);
      echo '
		<tr class="ligneTabQuad">
         <td><a href="accueil.php?page=detailStage&amp;id='.$idStage.'">'.$nomOrga.'</a></td>
         <td>'. $nomEtud .' '. $prenomEtud . '</td>
         <td>'. $anneeStage . '</td>
    </tr>';

    $lg=mysql_fetch_array($rs);
   }   
   echo '
</table>';
}
   mysql_free_result($rs);

?>
