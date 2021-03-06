window.onload=function() { dostuff() }
window.onresize=function() { dostuff() }

function dostuff() {
  curtainResize()
  var body=document.getElementsByTagName('body')
  if (body[0].classList.contains('index')) {}
  else if(body[0].classList.contains('bio')) {
    comicRefactor('w')
    penguinRefactor()
  }
  else if(body[0].classList.contains('contact')) {
    comicRefactor('c')
    penguinRefactor()
  }
  else if(body[0].classList.contains('projects')) iframeRefactor()
}

function curtainResize() {
  var curtain_height=window.innerHeight
  var elements=document.getElementsByClassName('resizable')
    for (var i=0; i<elements.length; i++)
      elements[i].style.height=curtain_height+'px'
  var winwidth=window.innerWidth
  var winheight=window.innerHeight
  /*if((winwidth/winheight)>(7/3) || winwidth/winheight<(5/3)) {     //fare qualcosa di più intelligente
    alert("Piantala di ridimensionare questa finestra, le cose a schermo intero sono bellissime!");
  }
  else {  */  //ridimensiona dinamicamente
    var curtain_height=winheight
    var elements=document.getElementsByClassName('resizable')
      for (var i=0; i<elements.length; i++)
        elements[i].style.height=curtain_height+'px'
  //}
}

function penguinRefactor() {
  var penguin_height=window.innerHeight/2
  var penguin=document.getElementsByClassName('penguin')
  for (var i=0; i<penguin.length; i++)
    penguin[i].style.height=penguin_height+'px'
}

function comicRefactor(menu_id) {
  var comic=document.getElementsByClassName('comic')
  var ccoordinates=findPos(document.getElementById(menu_id))
  for (var i=0; i<comic.length; i++) {
    comic[i].style.left=ccoordinates.X+'px'
    comic[i].style.top=ccoordinates.Y+document.getElementById(menu_id).height+'px'
  }
  var triangle=document.getElementById('tri')
  //la x varia in funzione del fumetto appena spostato
  triangle.style.marginLeft=ccoordinates.X-200+'px'
  //la y varia in funzione dell'altezza della testa del pinguino
}

function iframeRefactor() {
  /*determina la larghezza dell'iframe (pag. Progetti)*/
  var dx=document.getElementById('dx')
  var frame=document.getElementById('frame')
  frame.style.width=window.innerWidth-2*dx.width+'px'
}


function findPos(obj){  //restituisce le coordinate X, Y di un oggetto
   var left = 0
   var top = 0
   if (obj.offsetParent) {
      do {
         left += obj.offsetLeft
         top += obj.offsetTop
      } while (obj = obj.offsetParent)

      return {X:left,Y:top}
   }
}
