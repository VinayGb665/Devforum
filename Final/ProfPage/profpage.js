function start(){
  var a = document.getElementsByClassName("l");
  for(var i = 0;i<3;++i)
    a[i].setAttribute("onclick","f1(event)");
  var b = document.querySelector('table div');
  b.setAttribute("onclick","edit(event)");
  b = document.querySelector('table select');
  b.setAttribute("onchange","sc(event)");
  b = document.getElementsByClassName('u');
  b[0].setAttribute('onclick',"imgup(event)");
  b = document.querySelector('#fil');
  b.addEventListener( 'change', function( e ){
    e.target=e.target||srcElement;
    var lab = document.querySelector("label");
    var n = e.target.value.split( '\\' ).pop();
    if(n!==''){lab.innerHTML=n;}
  });
}
function f1(event){
  var a = document.getElementsByClassName("l");
  for(var i=0;i<3;++i){
    a[i].style.backgroundColor="grey";
  }
  event.target = event.target || srcElement;
  event.target.style.backgroundColor="white";
  im.src=(event.target.innerHTML+".php");
}

function edit(event){
  var q=0;
  event.target = event.target || srcElement;
  var t = event.target.innerHTML;
  var s = document.getElementById("choices");
  var tags=document.querySelectorAll('table li');
  if(t=="edit"){
    event.target.innerHTML="save";
    s.style.display="block";
    for(q=0;q<tags.length;++q)
      tags[q].setAttribute("onclick","arange(event)");
  }
  else{
    var ls='';
    event.target.innerHTML="edit";
    s.style.display="none";
    for(q=0;q<tags.length;++q){
      ls=ls+tags[q].innerHTML+',';
      tags[q].removeAttribute("onclick");
    }
    //alert(ls);
    var xyz = document.querySelector('#ti');
    xyz.value=ls;
    document.querySelector('#tags').submit();
    //alert(xyz);
  }
}

function sc(event){
  event.target = event.target || srcElement;
  var l=document.createElement("li");
  l.setAttribute("onclick","arange(event)");
  if(event.target.options[event.target.selectedIndex].value!="SelectTag")
    l.innerHTML=event.target.options[event.target.selectedIndex].value;
  event.target.removeChild(event.target.options[event.target.selectedIndex]);
  var u=document.querySelector("table ul");
  u.appendChild(l);
}

function arange(e){
  e.target = e.target || srcElement;
  e.target.parentNode.removeChild(e.target);
  var o = document.createElement("option");
  o.innerHTML=e.target.innerHTML;
  var s = document.getElementById("choices").appendChild(o);
}

function imgup(event) {
  event.target=event.target||srcElement;
  var a=document.querySelector('label');
  if(event.target.innerHTML=='update'){
    a.style.display="inline-block";
    event.target.innerHTML='upload';
  }
  else{
    var b = document.getElementById('iu');
    iu.submit();
    a.style.display="none";
    event.target.innerHTML='update';
  }
}
