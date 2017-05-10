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

function handleButton() {
  ltr()
  var button=document.getElementById('home')
  button.style.display='none'
}
