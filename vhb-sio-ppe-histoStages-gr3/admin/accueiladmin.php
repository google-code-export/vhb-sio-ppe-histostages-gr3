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
<!--      <img src="img/logo.jpg" class="logo" alt="logo" /> -->
      <h1>Site intranet de la section STS IG-SIO</h1>
    </div>
    <?php
    $user=$_SERVER['REMOTE_USER'];
    $addr=$_SERVER['REMOTE_ADDR'];
    echo $user;
    ?>

	<div id="menugauche">
	  <ul id="menulist">
       	 <li class="smenu"><a href="#" accesskey="c">CompÃ©tences IG</a>
          <ul>
            <li>
              <a href="?page=competencesSavoirsDA" title="Liste des compÃ©tences DA">CompÃ©tences DA</a>
            </li>
            <li>
              <a href="?page=competencesSavoirsAR" title="Liste des compÃ©tences AR">CompÃ©tences AR</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="a">ActivitÃ©s SIO</a>
          <ul>
            <li>
              <a href="?page=activitesP1" title="Liste des activitÃ©s du processus P1">ActivitÃ©s P1</a>
            </li>
            <li>
              <a href="?page=activitesP2" title="Liste des activitÃ©s du processus P2">ActivitÃ©s P2</a>
            </li>
            <li>
              <a href="?page=activitesP3" title="Liste des activitÃ©s du processus P3">ActivitÃ©s P3</a>
            </li>
            <li>
              <a href="?page=activitesP4" title="Liste des activitÃ©s du processus P4">ActivitÃ©s P4</a>
            </li>
            <li>
              <a href="?page=activitesP5" title="Liste des activitÃ©s du processus P5">ActivitÃ©s P5</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="#" accesskey="h">Historique stages</a>
          <ul >
            <li>
              <a href="?page=listeOrganisations" title="Liste des organisations ayant accueilli un stagiaire">Liste entreprises</a>
            </li>
            <li>
              <a href="?page=rechercheStagesCriteres" title="Rechercher un stage sur critÃ¨res">Recherche stages</a>
            </li>
          </ul> 
         </li>
       	 <li class="smenu"><a href="?page=adressesSites" accesskey="L">Liens sites stages</a>
       	 </li>
       	 
       	
       	
       	<li class="smenu"><a href="./accueiladmin.php" accesskey="c">Administration</a>
          <ul>
             <li class="smenu"><a href="./ajoutEtudiant.php" title="Ajout edutiant">Ajout etudiant</a>
       	 </li>
            <li class="smenu"><a href="./ajoutPeriode.php" title="Ajout periode">Ajout periode</a>
            </li>
            <li class="smenu"><a href="?page=listeOrganisations" title="Ajout periode">Ajout Contact</a>
            </li>
            
            <li class="smenu"><a href="../accueil.php" title="Accueil">Se déconnecter</a>
            </li>
          </ul>  
          
     
       	
       	 
       	 
        
  </ul>
 </div> 
		  
	
	 <div id="contenu">
  <?php if ( isset($_GET["page"]) ) { $page = $_GET["page"]; include('../Appli-HistoStages-V1.0/'.$page.'.php');} ?>
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
