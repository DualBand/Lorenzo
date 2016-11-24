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
  var id=setInterval(frame, 5)
}

function frameResize() {
  var curtain_height=window.innerHeight
  document.getElementById('sx').style.height=curtain_height+'px'
  document.getElementById('dx').style.height=curtain_height+'px'
}
