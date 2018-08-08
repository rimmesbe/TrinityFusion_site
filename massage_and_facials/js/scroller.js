$(document).ready(function(){
  var mq = window.matchMedia('(max-width: 40.0624em)');
  var boundry = 100;
  if(mq.matches){boundry = 350}

  $('a.scroll').click(function(e){
    var $target = $(e.target);
    var locale = $target[0]['hash'];
    $('html, body').animate({
      scrollTop: $(locale).offset().top - boundry
    }, 2000);
  });
});