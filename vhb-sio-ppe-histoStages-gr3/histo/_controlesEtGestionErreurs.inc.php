<?php

// FONCTIONS DE CONTRÔLE DE SAISIE

// Si $codePostal a une longueur de 5 caractères et est de type entier, on 
// considère qu'il s'agit d'un code postal
function estUnCp($codePostal)
{
   // Le code postal doit comporter 5 chiffres
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

// Si la valeur transmise ne contient pas d'autres caractères que des chiffres, 
// la fonction retourne vrai
function estEntier($valeur)
{
   return !ereg("[^0-9]", $valeur);
}

// Si la valeur transmise ne contient pas d'autres caractères que des chiffres  
// et des lettres non accentuées, la fonction retourne vrai
function estChiffresOuEtLettres($valeur)
{
   return !ereg("[^a-zA-Z0-9]", $valeur);
}

// Fonction qui vérifie la saisie lors de la modification d'une compagnie 
// Pour chaque champ non valide, un message est ajouté à la liste des erreurs
function verifierDonneesCompM($connexion, $code, $nom, $adresse, $tel, $regisseur, &$tabErreurs)
{
   if ($nom=="" || $adresse=="" || $tel=="" || $regisseur=="" )
   {
      ajouterErreur($tabErreurs, "Chaque champ suivi du caractère * est obligatoire");
   }
   if ($nom!="" && estUnNomCompagnie($connexion, 'M', $code, $nom))
   {
      ajouterErreur($tabErreurs, "La compagnie " . $nom . " existe déjà");
   }
}

// Fonction qui vérifie la saisie lors de la création d'un établissement. 
// Pour chaque champ non valide, un message est ajouté à la liste des erreurs
function verifierDonneesCompC($connexion, $code, $nom, $adresse, $tel, $regisseur, &$tabErreurs)
{
   if ($code=="" || $nom=="" || $adresse=="" || $tel=="" || $regisseur=="" )
   {
      ajouterErreur($tabErreurs,"Chaque champ suivi du caractère * est obligatoire");
   }
   if($code!="")
   {
      // Si le code est constitué d'autres caractères que de lettres non accentuées 
      // et de chiffres, une erreur est générée
      if (!estChiffresOuEtLettres($code))
      {
         ajouterErreur
         ($tabErreurs,"Le code doit comporter uniquement des lettres non accentuées et des chiffres");
      }
      else
      {
         if (estUnCodeCompagnie($connexion, $code))
         {
            ajouterErreur($tabErreurs, "La compagnie " . $code . " existe déjà");
         }
      }
   }
   if ($nom!="" && estUnNomCompagnie($connexion, 'C', $code, $nom))
   {
      ajouterErreur($tabErreurs, "La compagnie " . $nom . " existe déjà");
   }
}

// FONCTIONS DE GESTION DES ERREURS

function ajouterErreur(&$tabErr,$msg)
{
//   if (! isset($_GET['erreurs']))
//      $_GET['erreurs']=array();
   $tabErr[count($tabErr)]=$msg;
}

function nbErreurs($tabErr)
{
   return count($tabErr);
}
 
function afficherErreurs($tabErr)
{
   echo '<div class="msgErreur">';
   echo '<ul>';
   foreach($tabErr as $erreur)
	{
      echo "<li>$erreur</li>";
	}
   echo '</ul>';
   echo '</div>';
} 

function convFormatDate($dBigEndian)
{
    $libJour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    $libMois = array("Janvier", "Févrir", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
   $timestamp = strtotime($dBigEndian);
   $tab = getdate($timestamp);
   $res = $libJour[$tab["wday"]] . " " . $tab["mday"] . " " . $libMois[$tab["mon"]] . " " . $tab["year"];
   return $res;     
}
function convFormatHeure($heure)
{
   $timestamp = strtotime($heure);
   $tab = getdate($timestamp);
   $res = $tab["hours"] . "h" . $tab["minutes"];
   return $res;     
}
?>
