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
      elements[i].setAttribute("height", windowHeight+'px')   //ridimensiona i video
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
  var i;
  var x = document.getElementsByClassName("mySlides");   //contenuti
  var texts=document.getElementsByClassName("text");     //testi
  var dots = document.getElementsByClassName("demo");    //pallucchi
  if (n > x.length) {slideIndex = 1}   //troppo a destra
  if (n < 1) {slideIndex = x.length}   //troppo a sinistra
  for (i = 0; i < x.length; i++) {     //nasconde tutti i contenuti
     x[i].style.display = "none";
     texts[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {  //rende tutti i pallucchi trasparenti
     dots[i].className = dots[i].className.replace("w3-white", "");
  }
  texts[slideIndex-1].style.display="block";
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}

document.onkeydown = function(e) {  //gestione frecce tastiera
    e = e || window.event
    if (e.keyCode == 37) {
      slideIndex--
      showDivs(slideIndex)   //scorre a sinistra
      e.preventDefault()
    }
    if (e.keyCode == 39) {
      slideIndex++
      showDivs(slideIndex)   //scorre a destra
      e.preventDefault()
    }
}

function chDescVisibility() {
   var descrs=document.getElementsByClassName("desc")
   for (i = 0; i < descrs.length; i++) {
      if (descrs[i].style.display=="none") descrs[i].style.display="block"
      else (descrs[i].style.display=="none")
   }
}
