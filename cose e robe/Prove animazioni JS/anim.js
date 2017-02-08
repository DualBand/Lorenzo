window.onload=function() {
  frameResize()
}

window.onresize=function() {
  frameResize()
}

function ltr() {
  var position=0
  function frame() {
    position++
    document.getElementById('sipario').style.left=position+'px'
    if (position==2000)
      clearInterval(id)
  }
  var id=setInterval(frame, 10)
}

function frameResize() {
  var curtain_height=window.innerHeight
  var els=document.getElementsByClassName('resizable')
    for (var i=0; i<els.length; i++)
      els[i].style.height=curtain_height+'px'
}
