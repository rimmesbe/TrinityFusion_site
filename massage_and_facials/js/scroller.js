$(document).ready(function(){
  $('a.scroll').click(function(e){
    var $target = $(e.target);
    var locale = $target[0]['hash'];
    $('html, body').animate({
      scrollTop: $(locale).offset().top -100
    }, 2000);
  });
});