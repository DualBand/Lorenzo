window.onload=function() {
  playbillsRefactor()
}

window.onresize=function() {
  playbillsRefactor()
}

function playbillsRefactor() {
  var img_height=window.innerHeight-50+'px';
  var containers=document.getElementsByClassName('container')
  var playbills=document.getElementsByClassName('pb')
  for (var i=0; i<containers.length; i++) {
    containers[i].style.height=img_height
    playbills[i].style.height=img_height
  }
  var framebody=document.getElementById('bo')
  framebody.style.width=(containers.length)*(playbills[0].width+9)+'px'
}
