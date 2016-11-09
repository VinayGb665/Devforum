function start(){
  var a = document.getElementsByClassName('q');
  for(var i=0;i<a.length;++i){
    a[i].addEventListener("click",(function(e){
      e.target=e.target||srcElement;
      var b = e.target.querySelector('span').innerHTML;
      window.open("/q_rack.php?qid="+b);
    }),true);
  }
}
