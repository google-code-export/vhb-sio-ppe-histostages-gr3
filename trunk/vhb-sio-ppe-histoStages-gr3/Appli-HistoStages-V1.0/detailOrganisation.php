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

if ( !isset($_GET['numero']) )
{
	ajouterErreur($tabErreurs, "Absence de numéro pour l'organisation à détailler");
	afficherErreurs($tabErreurs);
}
else
{

	$numero=$_GET['numero'];

	// OBTENIR LE DÉTAIL DE L'ORGANISATION SÉLECTIONNÉE

	$lg=obtenirDetailOrganisation($connexion, $numero);

	$nom=htmlspecialchars($lg['nom']);
	$rue=htmlspecialchars($lg['rue']);
	$cp=htmlspecialchars($lg['cp']);
	$ville=htmlspecialchars($lg['ville']);
	$tel=htmlspecialchars($lg['tel']);
	$email=htmlspecialchars($lg['email']);
	$urlSiteWeb= htmlspecialchars($lg['urlSiteWeb']);
	$libelleCat=htmlspecialchars($lg['libelle']);

	echo '
	<table width="80%" cellspacing="0" cellpadding="0" align="center"
	class="tabNonQuadrille">
	 
	<tr class="enteteTabNonQuad">
	<td colspan="2">'.$nom.'</td>
	</tr>
	<tr class="ligneTabNonQuad">
	<td class="intitule" width="20%"> Adresse: </td>
	<td class="valeur">' .$rue.'<br />'
	.$cp . '&nbsp;' . $ville . '
	</td>
	</tr>
	<tr class="ligneTabNonQuad">
	<td class="intitule"> Libellé catégorie:</td>
	<td class="valeur">'.$libelleCat.'</td>
	</tr>
	<tr class="ligneTabNonQuad">
	<td class="intitule"> Téléphone: </td>
	<td class="valeur">'.$tel.'</td>
	</tr>
	<tr class="ligneTabNonQuad">
	<td class="intitule"> Email:</td>
	<td class="valeur">'.$email.'</td>
	</tr>
	<tr class="ligneTabNonQuad">
	<td class="intitule"> Site Web: </td>
	<td class="valeur">';
	if (!empty($urlSiteWeb)) {
		echo  '<a href="http://'.$urlSiteWeb.'">'. $urlSiteWeb . '</a>';
	}
	echo '</td>
	</tr>
	</table>
	<p class="liensFinPage">
	<a href="AjoutContact.php"> Ajouter un contact </a> </br>
	<a href="accueil.php?page=listeOrganisations">Retour</a>
	</p>';
}
?>
