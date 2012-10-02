// JavaScript Document
function mouseOver() {
   // pour IE affiche ou masque l'�l�ment <ul> (le 1er) contenu dans l'objet "obj"
   // la propri�t� all de l'objet Document n'existe que dans IE
   // l'objet "obj" est d�sign� par this et correspond � l'objet pour lequel la fonction 
   // �v�nementielle mouseOver est d�clench�e
if (document.all) {
       UL = this.getElementsByTagName('ul'); // UL tableau regroupant tous les objets ul de l'objet courant
       if (UL.length > 0) {
           sousMenu = UL[0].style;      // sousMenu r�gles de style du 1er �l�ment ul
           if (sousMenu.display == 'none' || sousMenu.display == '') {
               sousMenu.display = 'block';
           }
       }
   }
}

function mouseOut() {
   // pour IE affiche ou masque l'�l�ment <ul> (le 1er) contenu dans l'objet "obj"
   // la propri�t� all de l'objet Document n'existe que dans IE
   // l'objet "obj" est d�sign� par this et correspond � l'objet pour lequel la fonction 
   // �v�nementielle mouseOver est d�clench�e
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
   // affecte une fonction (hover) � tous les �l�ments <li> de la page
   LI = document.getElementById("menulist").getElementsByTagName('li');
   nLI = LI.length;
   for (i=0; i < nLI; i++) {
       LI[i].onmouseover = mouseOver;
       LI[i].onmouseout = mouseOut;
   }
}
