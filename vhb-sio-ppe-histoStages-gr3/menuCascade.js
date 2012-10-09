// JavaScript Document
function mouseOver() {
   // pour IE affiche ou masque l'élément <ul> (le 1er) contenu dans l'objet "obj"
   // la propriété all de l'objet Document n'existe que dans IE
   // l'objet "obj" est désigné par this et correspond à l'objet pour lequel la fonction 
   // événementielle mouseOver est déclenchée
if (document.all) {
       UL = this.getElementsByTagName('ul'); // UL tableau regroupant tous les objets ul de l'objet courant
       if (UL.length > 0) {
           sousMenu = UL[0].style;      // sousMenu règles de style du 1er élément ul
           if (sousMenu.display == 'none' || sousMenu.display == '') {
               sousMenu.display = 'block';
           }
       }
   }
}

function mouseOut() {
   // pour IE affiche ou masque l'élément <ul> (le 1er) contenu dans l'objet "obj"
   // la propriété all de l'objet Document n'existe que dans IE
   // l'objet "obj" est désigné par this et correspond à l'objet pour lequel la fonction 
   // événementielle mouseOver est déclenchée
   if (document.all) {
       UL = this.getElementsByTagName('ul');
       if (UL.length > 0) {
           sousMenu = UL[0].style;
           if (sousMenu.display && sousMenu.display != 'none') {
               sousMenu.display = 'none';
           }
       }
   }
}

function setHover() {
   // affecte une fonction (hover) à tous les éléments <li> de la page
   LI = document.getElementById("menulist").getElementsByTagName('li');
   nLI = LI.length;
   for (i=0; i < nLI; i++) {
       LI[i].onmouseover = mouseOver;
       LI[i].onmouseout = mouseOut;
   }
}
