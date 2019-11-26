$(document).ready(function() {

  var nInitialCount = 300; //Intial characters to display
  var moretext = "Read more";
  var lesstext = "Read less";
  var ellipsestext = "...";

  $('.bio-text').each(function() {
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

  var filmes = $(this).find('div.movie_recommended').length;
  var mostrar = 8;

  $('div.movie_recommended:gt(7)').hide();
  $('.less').hide();

  $('.more').click(function() {
    $('.less').show();
    mostrar = 16;
    if(mostrar < filmes){
      $('div.movie_recommended:lt('+ mostrar +')').show(300);
    }
    else{
      $('div.movie_recommended:lt('+ filmes +')').show(300);
      
    }
    $('.more').hide();
  });

  $('.less').click(function () {
    $('div.movie_recommended').not(':lt(8)').hide(300);
    $('.more').show();
    $('.less').hide();
});

});