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
       	 <li class="smenu"><a href="#" accesskey="c">Compétences IG</a>
          <ul>
            <li>
              <a href="../?page=competencesSavoirsDA" title="Liste des compétences DA">Compétences DA</a>
            </li>
            <li>
              <a href="../?page=competencesSavoirsAR" title="Liste des compétences AR">Compétences AR</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="a">Activités SIO</a>
          <ul>
            <li>
              <a href="../?page=activitesP1" title="Liste des activités du processus P1">Activités P1</a>
            </li>
            <li>
              <a href="../?page=activitesP2" title="Liste des activités du processus P2">Activités P2</a>
            </li>
            <li>
              <a href="../?page=activitesP3" title="Liste des activités du processus P3">Activités P3</a>
            </li>
            <li>
              <a href="../?page=activitesP4" title="Liste des activités du processus P4">Activités P4</a>
            </li>
            <li>
              <a href="../?page=activitesP5" title="Liste des activités du processus P5">Activités P5</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="h">Historique stages</a>
          <ul >
            <li>
              <a href="../?page=listeOrganisations" title="Liste des organisations ayant accueilli un stagiaire">Liste entreprises</a>
            </li>
            <li>
              <a href="../?page=rechercheStagesCriteres" title="Rechercher un stage sur critères">Recherche stages</a>
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
// Programme principal
// Teste le rapatriement du fichier
if ( isset($_FILES['Upload']) ) {
  if ( $_FILES['Upload']['error'] != UPLOAD_ERR_OK ) {
    echo '<p>�chec du depot</p>';
}
else {
    echo '<p>d�pot r�ussi</p>
    	<ul>
			<li>Fichier local sur le serveur : ' . $_FILES['Upload']['tmp_name'] . '</li>
            <li>Nom : ' . $_FILES['Upload']['name'] . '</li>
            <li>Taille : ' . $_FILES['Upload']['size'] . '</li>
            <li>Type : ' . $_FILES['Upload']['type'] . '</li>
          </ul>
          ' ;
    
    
    // D�placer le fichier charg�
    $repTemporaire = 'depot/' . basename($_FILES['Upload']['name']);
    if (move_uploaded_file($_FILES['Upload']['tmp_name'], $repTemporaire))
    {
    	 echo '<p>dichier deplac�</p>';
    } else
    {
    	echo '<p>demplacement impossible</p>';'
    }
    
    
        
    
    
    
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

