window.onload=function() {
  frameResize()
}

window.onresize=function() {
  frameResize()
}

function frameResize() {
  var curtain_height=window.innerHeight
  var elements=document.getElementsByClassName('resizable')
    for (var i=0; i<elements.length; i++)
      elements[i].style.height=curtain_height+'px'
  var winwidth=window.innerWidth;
  var winheight=window.innerHeight;
  if((winwidth/winheight)>(21/9)) {     //not working yet
    alert("Piantala di ridimensionare questa finestra, le cose a schermo intero sono bellissime!"); 
  }
  else {    //resize dinamically
    var curtain_height=winheight
    var elements=document.getElementsByClassName('resizable')
      for (var i=0; i<elements.length; i++)
        elements[i].style.height=curtain_height+'px'
  }
}
