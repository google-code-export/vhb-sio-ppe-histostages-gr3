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
  <form id="frmCriteresStage" action="accueil.php?page=resultatsRechercheStages" method="post">
  <div id="corpsForm">
  <p>
    <label for="dept" accesskey="d">Département : </label>
    <select name="dept" id="dept" size="1">
    <option value="0" selected="selected">Indifférent</option>
<?php
    $req = obtenirReqDepts();
    $rsDept = mysql_query ($req, $connexion);
    $lgDept = mysql_fetch_assoc($rsDept);
    
    while ( $lgDept != false ) {
        $numero = $lgDept['numero'];
        $nom = $lgDept['nom'];
        echo '<option value="' . $numero . '">' . $numero . '-' . $nom . '</option>
        ';
        
        $lgDept = mysql_fetch_assoc($rsDept); 
    
    }
    mysql_free_result($rsDept);
?>
    </select>
  </p>
  <p> 
    <label for="ville" accesskey="v">Ville : </label> 
    <select name="ville" size="1"> 
<!-- Am�lioration du formulaire de recherche (Kadile Dany) -->
    <option value="0" selected="selected">Indifférent</option>
    <?php
    $req = obtenirReqVille();
    $rsVille = mysql_query ($req, $connexion);
    $lgVille = mysql_fetch_assoc($rsVille);
    
    while ( $lgVille != false ) {
        $ville = $lgVille['ville'];
        echo '<option value="' . $ville . '">' . $ville . '</option>
        ';
        $lgVille = mysql_fetch_assoc($rsVille); 
    
    }
    mysql_free_result($rsVille);
?>     
  </p>
  <p> 
    <label for="anneeForm" accesskey="f">Année de formation : </label>
    <select name="anneeForm" id="anneeForm" size="1"> 
      <option selected="selected" value="0">Indifférent</option>
      <option value="1">Première année </option>
      <option value="2">Deuxième année </option>
    </select> 
  </p>
  <p> 
    <label for="anneeScolaire" accesskey="s">Année scolaire : </label>
    <select name="anneeScolaire" id="anneeScolaire" size="1"> 
    <option value="0" selected="selected">Indifférent</option>
<?php
    $req = obtenirReqAnneesScolaires();
    $rsAnnee = mysql_query ($req, $connexion);
    $lgAnnee = mysql_fetch_assoc($rsAnnee);
    
    while ( $lgAnnee != false ) {
        $annee = $lgAnnee['annee'];
        echo '<option value="' . $annee . '">' . $annee . '</option>
        ';
        
        $lgAnnee = mysql_fetch_assoc($rsAnnee); 
    
    }
    mysql_free_result($rsAnnee);
?>
    </select> 
  </p>
  <p> 
    <label for="nomOrga" accesskey="o">Nom organisation : </label>
    <input id="nomOrga" name="nomOrga" maxlength="100" value="" />
  </p>
  <p> 
    <label for="nomEtudiant" accesskey="e" >Nom étudiant : </label>
    <input id="nomEtudiant" name="nomEtudiant" maxlength="50" value="" />
  </p>
   <p> 
    <label for="opt" accesskey="d">Option de formation : </label>
    <select name="opt" id="opt" size="1"> <!-- création d'une liste avec trois choix-->
      <option selected="selected" value="0">Aucune</option>
      <option value="développeur d'applications">Développeur d'applications </option>
      <option value="administrateur de réseaux locaux"> Administrateur de réseaux locaux </option>
    </select> 
    
    
    </div>
    
    
    <div id="piedForm">
  <p>
    <button id="ok" type="submit">OK</button>
    <button id="annuler" type="reset" name="annuler">Effacer</button>
  </p> 
  </div>
    
  </form>
