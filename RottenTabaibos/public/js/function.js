$(document).ready(function() {

  var $target = $('html,body'); 
  
  var nInitialCount = 300; //Intial characters to display
  var moretext = "Read more";
  var lesstext = "Read less";
  var ellipsestext = "...";

  $('.bio-text, .critic-review').each(function() {
    var paraText = $(this).html();
    var sText = paraText.substr(0, nInitialCount);
    var eText = paraText.substr(nInitialCount, paraText.length - nInitialCount);
    
    if (paraText.length > nInitialCount) {

        var newHtml = sText + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="moretext"><span>' + eText + '</span>&nbsp;&nbsp;<a href="" class="link">' + moretext + '</a></span>';
      $(this).html(newHtml);
    }
  });

  $(".link").on('click', function(e) {
    var lnkHTML = $(this).html();

    if (lnkHTML == lesstext) {
        $(this).removeClass("lesstext");
        $(this).html(moretext);
    } 
    else {
        $(this).addClass("lesstext");
        $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();

    return false;
    //e.preventDefault();
  });
  
  var filmes = $(this).find('div.movie_more').length;
  var mostrar = 8;

  $('div.movie_more:gt(7)').hide();
  $('.less').hide();

  $('.more').click(function() {
    $('.less').show();
    mostrar = 16;
    if(mostrar < filmes){
      $('div.movie_more:lt('+ mostrar +')').show(300);
      $target.animate({scrollTop: $target.height()}, 1000);
    }
    else{
      $('div.movie_more:lt('+ filmes +')').show(300);
      $target.animate({scrollTop: $target.height()}, 1000);
    }
    
    $('.more').hide();
  });

  $('.less').click(function () {
    $('div.movie_more').not(':lt(8)').hide(300);
    $('.more').show();
    $('.less').hide();
});

  var criticas = $(this).find('div.review-properties').length;
  var teste = 3;

  $('div.review-properties:gt(2)').hide();
  $('.few').hide();

  $('.all').click(function() {
    $('.few').show();
    if(teste < criticas){
      $('div.review-properties:gt('+ teste +')').show(300);
    }
    else{
      $('div.review-properties:gt('+ criticas +')').show(300);
      
    }
    $('.all').hide();
  });

  $('.few').click(function () {
    $('div.review-properties').not(':lt('+teste+')').hide(300);
    $('.all').show();
    $('.few').hide();
});

var criticas_user = $(this).find('div.user-review-properties').length;
var teste_user = 3;

$('div.user-review-properties:gt(2)').hide();
$('.few_u_rev').hide();

$('.all_u_rev').click(function() {
  teste_user -= 1;
  $('.few_u_rev').show();
  if(teste_user < criticas_user){
    $('div.user-review-properties:gt('+ teste_user +')').show(300);
  }
  else{
    $('div.user-review-properties:gt('+ criticas_user +')').show(300);
    
  }
  $('.all_u_rev').hide();
});

$('.few_u_rev').click(function () {
  teste_user += 1; //
  $('div.user-review-properties').not(':lt('+teste_user +')').hide(300);
  $('.all_u_rev').show();
  $('.few_u_rev').hide();
});

var pessoas = $(this).find('div.people').length;
var numero = 8;

$('div.people:gt(7)').hide();

var slideIndex = 0;
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
  };


  $('.movie-link img').hover(function(){
      $(".edit_img").fadeIn();
      }, function(){
        $('.edit_img').fadeOut();
      });
  $(".edit_img").mouseover(function() {
      $(this).show();
    });

$(document).ready(showSlides);

});