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
?>
<form id="ajoutEtud"

	<div id="corpsForm">
		<p>
			
			<fieldset class="invisiblefieldset">
			<p>fichier contenant la liste des étudiants</p>
				<input type="hidden" value="uploadfile" name="action">
				<input type="file" alt="newfile" name="newfile" size="50">
				<br>
				<input type="submit" value="Déposer ce fichier" name="save">
			</fieldset>
		</p>
		
	</div>


</form>
