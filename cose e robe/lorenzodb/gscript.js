//ridimensiona le slides
window.onload=function() {
   slidesResize()
   showDivs(slideIndex);
}
window.onresize=function() { slidesResize() }

function slidesResize() {
   var windowHeight=window.innerHeight
   var elements=document.getElementsByClassName('mySlides')
   for (var i=0; i<elements.length; i++) {
      elements[i].style.maxHeight=windowHeight+'px'   //ridimensiona le immagini
      elements[i].setAttribute("height", windowHeight+'px');//ridimensiona i video
   }
}

var slideIndex = 1;
function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
   //far sparire tutti i div aggiuntivi e il testo contenuto <--------------------------------------------------------
  var i;
  var x = document.getElementsByClassName("mySlides");   //contenuti
  var dots = document.getElementsByClassName("demo");    //pallucchi e orpelli vari
  if (n > x.length) {slideIndex = 1}   //troppo a destra
  if (n < 1) {slideIndex = x.length}   //troppo a sinistra
  for (i = 0; i < x.length; i++) {     //nasconde tutti i contenuti
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {  //rende tutti i pallucchi trasparenti
     dots[i].className = dots[i].className.replace("w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}
