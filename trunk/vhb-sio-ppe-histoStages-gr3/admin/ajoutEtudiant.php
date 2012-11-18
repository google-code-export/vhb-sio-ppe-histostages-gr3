<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Site intranet de la section STS IG-SIO</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../styles.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
  
 


    <div id="entete">
<!--      <img src="../img/logo.jpg" class="logo" alt="logo" /> -->
      <h1>Site intranet de la section STS IG-SIO</h1>
    </div>

	<div id="menugauche">
	  <ul id="menulist">
       	 <li class="smenu"><a href="#" accesskey="c">CompÃ©tences IG</a>
          <ul>
            <li>
              <a href="../?page=competencesSavoirsDA" title="Liste des compÃ©tences DA">CompÃ©tences DA</a>
            </li>
            <li>
              <a href="../?page=competencesSavoirsAR" title="Liste des compÃ©tences AR">CompÃ©tences AR</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="a">ActivitÃ©s SIO</a>
          <ul>
            <li>
              <a href="../?page=activitesP1" title="Liste des activitÃ©s du processus P1">ActivitÃ©s P1</a>
            </li>
            <li>
              <a href="../?page=activitesP2" title="Liste des activitÃ©s du processus P2">ActivitÃ©s P2</a>
            </li>
            <li>
              <a href="../?page=activitesP3" title="Liste des activitÃ©s du processus P3">ActivitÃ©s P3</a>
            </li>
            <li>
              <a href="../?page=activitesP4" title="Liste des activitÃ©s du processus P4">ActivitÃ©s P4</a>
            </li>
            <li>
              <a href="../?page=activitesP5" title="Liste des activitÃ©s du processus P5">ActivitÃ©s P5</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="h">Historique stages</a>
          <ul >
            <li>
              <a href="../?page=listeOrganisations" title="Liste des organisations ayant accueilli un stagiaire">Liste entreprises</a>
            </li>
            <li>
              <a href="../?page=rechercheStagesCriteres" title="Rechercher un stage sur critÃ¨res">Recherche stages</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="../?page=adressesSites" accesskey="L">Liens sites stages</a>
       	 </li>
       	 
       	
       	
       	<li class="smenu"><a href="#" accesskey="c">Administration</a>
          <ul>
             <li class="smenu"><a href="./admin/ajoutEtudiant.php" title="Ajout edutiant">Ajout etudiant</a>
       	 </li>
            <li class="smenu"><a href="../?page=ajoutPeriode" title="Ajout periode">Ajout periode</a>
            </li>
            <li class="smenu"><a href="../?page=listeOrganisations" title="Ajout periode">Ajout Contact</a>
            </li>
            
            <li class="smenu"><a href="../accueil.php" title="Accueil">Se deconecter</a>
            </li>
          </ul>  
          
     
       	
       	 
       	 
        
  </ul>
 </div> 
		  
	
	 <div id="contenu">
  
  

	<div id="corpsForm">
		<p>
			
		<fieldset class="invisiblefieldset">
			
			<form enctype="multipart/form-data" method="post">
				<p>
				<input type="file" name="Upload" id="Upload" /></br>
				<input type="submit" id="valider" value="Valider" />
				</p>
			</form>
			




		</fieldset>
		
		
<?php

include("../Appli-HistoStages-V1.0/_gestionBase.inc.php");
include("../Appli-HistoStages-V1.0/_controlesEtGestionErreurs.inc.php");


// Programme principal
// Teste le rapatriement du fichier
if ( isset($_FILES['Upload']) ) {
  if ( $_FILES['Upload']['error'] != UPLOAD_ERR_OK ) {
    echo '<p>échec du depot</p>';
}
else {
    echo '<p>dépot réussi</p>
    	<ul>
			<li>Fichier local sur le serveur : ' . $_FILES['Upload']['tmp_name'] . '</li>
            <li>Nom : ' . $_FILES['Upload']['name'] . '</li>
            <li>Taille : ' . $_FILES['Upload']['size'] . '</li>
            <li>Type : ' . $_FILES['Upload']['type'] . '</li>
          </ul>
          ' ;
    
    
    // Déplacer le fichier chargé
    $repTemporaire = 'depot/' . basename($_FILES['Upload']['name']);
    if (move_uploaded_file($_FILES['Upload']['tmp_name'], $repTemporaire))
    {
    	 echo '<p>dichier deplacé</p>';
    } else
    {
    	echo '<p>deplacement impossible</p>';
    }
    
    
    
    //execution du fichier pour ajout dans sql
    
    
    
    //Le chemin d'acces a ton fichier sur le serveur
    $fichier = fopen("depot/".$_FILES['Upload']['name'], "r");
    
    //tant qu'on est pas a la fin du fichier :
    while (!feof($fichier))
    {
    	// On recupere toute la ligne
    	$uneLigne = addslashes(fgets($fichier));
    	//On met dans un tableau les differentes valeurs trouvés (ici séparées par un ';')
    	$tableauValeurs = explode(';', $uneLigne);
    	// On crée la requete pour inserer les donner (ici il y a 4 champs donc de [0] a [4])
    	$sql="INSERT etudiant INTO histostages VALUES ('".$tableauValeurs[0]."', '".$tableauValeurs[1]."', '".$tableauValeurs[2]."', '".$tableauValeurs[3]."', '".$tableauValeurs[4]."')";
    
    	$req=mysql_query($sql)or die (mysql_error());
    	// la ligne est finie donc on passe a la ligne suivante (boucle)
    }
    //vérification et envoi d'une réponse à l'utilisateur
    if ($req)
    {
    	echo "<h2>Ajout dans la base de données effectué avec succès</h2>";
    }
    else
    {
    	echo "Echec dans l'ajout dans la base de données";
    }
    
    
    
    
    
    //supression du fichier apres ajout SQL
    
    //unlink($_FILES['Upload']['name']);
    
 } 
}
?>

		</p>


		
	</div>



  
  
	 </div>
	
  <!-- Division pour le pied de page -->
  <div id="pied">
    <p id="logoValidW3c">
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
    </p>
  <p id="libValidW3c">Cette page est conforme aux standards du Web</p>
  </div>

  </body>
</html>

