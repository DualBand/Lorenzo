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
}
