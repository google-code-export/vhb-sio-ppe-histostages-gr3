<?php

include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");

// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival

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
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// COMPAGNIE

$nbOrga = obtenirNbOrganisations($connexion);
echo '
<table width="100%" cellspacing="0" cellpadding="0" align="center" 
class="tabQuadrille">
   <tr class="titreTabQuad">
      <td colspan="3">Liste des organisations (' . $nbOrga . ')</td>
   </tr>
   <tr class="enteteTabQuad">
      <td>Nom</td>
      <td>Adresse</td>
      <td>Nombre stages</td>
   </tr>';
     
   $req=obtenirReqOrganisations();
   $rs=mysql_query($req, $connexion);
   $lg=mysql_fetch_array($rs);
   // BOUCLE SUR LES ORGANISATIONS
   while ($lg!=FALSE)
   {
      $nom=htmlspecialchars($lg['nom']);
      $num=htmlspecialchars($lg['numero']);
      $rue=htmlspecialchars($lg['rue']);
      $cp=htmlspecialchars($lg['cp']);
      $ville=htmlspecialchars($lg['ville']);
      $nbStages=$lg['nbStages'];
      echo '
		<tr class="ligneTabQuad">
         <td><a href="http://localhost/vhb-sio-ppe-histoStages-gr3/accueil.php?page=detailOrganisation&numero='.$num.'">'.$nom.'</a></td>
         <td>'. $rue .' '. $cp . ' '. $ville . '</td>
         <td>'. $nbStages . '</td>
    </tr>';

    $lg=mysql_fetch_array($rs);
   }   
   echo '
</table>';
   mysql_free_result($rs);

?>
