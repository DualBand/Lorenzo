window.onload=function() {
  frameResize()
  penguinRefactor()
  comicRefactor('w')
}

window.onresize=function() {
  frameResize()
  penguinRefactor()
  comicRefactor('w')
}

function frameResize() {
  var curtain_height=window.innerHeight
  var elements=document.getElementsByClassName('resizable')
    for (var i=0; i<elements.length; i++)
      elements[i].style.height=curtain_height+'px'
  var winwidth=window.innerWidth
  var winheight=window.innerHeight
  if((winwidth/winheight)>(7/3) || winwidth/winheight<(5/3)) {     //fare qualcosa di più intelligente
    alert("Piantala di ridimensionare questa finestra, le cose a schermo intero sono bellissime!");
  }
  else {    //ridimensiona dinamicamente
    var curtain_height=winheight
    var elements=document.getElementsByClassName('resizable')
      for (var i=0; i<elements.length; i++)
        elements[i].style.height=curtain_height+'px'
  }
}

function penguinRefactor() {
  var penguin_height=window.innerHeight/2
  var penguin=document.getElementsByClassName('penguin')
  for (var i=0; i<penguin.length; i++)
    penguin[i].style.height=penguin_height+'px'
}

function comicRefactor(menu_id) {
  var comic=document.getElementsByClassName('comic')
  var coordinates=findPos(document.getElementById(menu_id))
  for (var i=0; i<comic.length; i++) {
    comic[i].style.left=coordinates.X+'px'
    comic[i].style.top=coordinates.Y+document.getElementById(menu_id).height+'px'
  }
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
