function start(){
  var a = document.getElementsByClassName("l");
  for(var i = 0;i<2;++i)
    a[i].setAttribute("onclick","f1(event)");

}
function f1(event){
  var a = document.getElementsByClassName("l");
  for(var i=0;i<2;++i){
    a[i].style.backgroundColor="grey";
  }
  event.target = event.target || srcElement;
  event.target.style.backgroundColor="white";
  im.src=(event.target.innerHTML+".php");
}
