<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Site intranet de la section STS IG-SIO</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="styles.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="entete">
		<!--      <img src="img/logo.jpg" class="logo" alt="logo" /> -->
		<h1>Site intranet de la section STS IG-SIO</h1>
	</div>

	<div id="menugauche">
		<ul id="menulist">
			<li class="smenu"><a href="#" accesskey="c">Compétences IG</a>
				<ul>
					<li><a href="?page=competencesSavoirsDA"
						title="Liste des compétences DA">Compétences DA</a></li>
					<li><a href="?page=competencesSavoirsAR"
						title="Liste des compétences AR">Compétences AR</a></li>
				</ul></li>
			<li class="smenu"><a href="#" accesskey="a">Activités SIO</a>
				<ul>
					<li><a href="?page=activitesP1"
						title="Liste des activités du processus P1">Activités P1</a></li>
					<li><a href="?page=activitesP2"
						title="Liste des activités du processus P2">Activités P2</a></li>
					<li><a href="?page=activitesP3"
						title="Liste des activités du processus P3">Activités P3</a></li>
					<li><a href="?page=activitesP4"
						title="Liste des activités du processus P4">Activités P4</a></li>
					<li><a href="?page=activitesP5"
						title="Liste des activités du processus P5">Activités P5</a></li>
				</ul></li>
			<li class="smenu"><a href="#" accesskey="h">Historique stages</a>
				<ul>
					<li><a href="?page=listeOrganisations"
						title="Liste des organisations ayant accueilli un stagiaire">Liste
							entreprises</a></li>
					<li><a href="?page=rechercheStagesCriteres"
						title="Rechercher un stage sur critères">Recherche stages</a></li>
				</ul></li>
			<li class="smenu"><a href="?page=adressesSites" accesskey="L">Liens
					sites stages</a></li>

		</ul>
	</div>


	<div id="contenu">
		<?php if ( isset($_GET["page"]) ) { 
			$page = $_GET["page"]; include('./Appli-HistoStages-V1.0/'.$page.'.php');
} ?>
		<form action="">
			<b>Ajouter un contact d'une organisation</b>
			<br />
			<br />
			<br />

			<label for="civilite" accesskey="c">Civilit�*: </label>
			<select name="civilite" id="civilite" size="1">
				<option selected="selected" value="0"></option>
				<option value="homme">Homme</option>
				<option value="femme">Femme</option>
			</select>
			<p>
				<label for="nom" accesskey="n"> Nom* : </label> <input type="text"
					id="nom" name="nom" maxlength="50" value="" style="height: 21px;" required" />
			</p>
			<p>
				<label for="prenom" accesskey="p"> Pr�nom* :</label> <input
					type="text" id="nom" name="nom" maxlength="50" value=""
					style="height: 21px;" required" />
			</p>

			<p>
				<label for="fonction" accesskey="f"> Fonction :</label> <input
					type="text" id="fonction" name="fonction" maxlength="50" value=""
					style="height: 21px;" required" />
			</p>

			<p>
				<label for="telephone" accesskey="t"> Telephone :</label> <input
					type="text" id="telephone" name="telephone" maxlength="50" value=""
					style="height: 21px;" required"/>
			</p>

			<p>
				<label for="email" accesskey="e"> Email :</label> <input type="text"
					id="email" name="email" maxlength="50" value=""
					style="height: 21px;" required" />
			</p>

			<a href="msgConfirmation.php"><input type="button" value="Ajouter">
			
			</a>

			<input type="submit" name="retour" value="Retour" />
			</br>
			</br>
			</br> * : champs obligatoires

		</form>

	</div>

	<!-- Division pour le pied de page -->
	<div id="pied">
		<p id="logoValidW3c">
			<a href="http://validator.w3.org/check?uri=referer"><img
				src="http://www.w3.org/Icons/valid-xhtml10"
				alt="Valid XHTML 1.0 Strict" height="31" width="88" /> </a>
		</p>
		<p id="libValidW3c">Cette page est conforme aux standards du Web</p>
	</div>


</body>
</html>
