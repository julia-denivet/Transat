$(function(){
    setInterval(function(){ 
       $(".slideshow ul").animate({marginLeft:-1145},800,function()
       {
          $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first")); 
       })
    }, 3500);
    
    
 });

 //On vérifie que la fonctin est bien chargé prends en paramètre une fonction anonyme et le délai en millisecondes 
 //je selectionne l'element ul je deplace l'element avec une animation vers la gauche avec une marge négative en 0,8s et je vais y recuperer mes elements li find() retourne aun objet jQuery puis je leur met un style particulier 
 //animate() est une fonction callback qui permet de retouner "complete" lorsque l'animation est terminée 
 // l"élément this représente chacune des .slideshow ul on lui supprime le margin left, puis on recupère le dernier li a l'aide de la fonction find() et ensuite on utilise la fonction after() pour recuperer le premier elements de la liste. s
