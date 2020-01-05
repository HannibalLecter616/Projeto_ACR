$(document).ready(function() {
  
  if (window.location.pathname == '/search/popular/1'|| window.location.pathname == '/search/popular/2'
   || window.location.pathname == '/search/popular/3'|| window.location.pathname == '/search/popular/4'
   || window.location.pathname == '/search/popular/5'|| window.location.pathname == '/search/popular/6'
   || window.location.pathname == '/search/popular/7'|| window.location.pathname == '/search/popular/8'
   || window.location.pathname == '/search/popular/9'|| window.location.pathname == '/search/popular/10') {
    $(".pagination_popular").show();
    $(".procura-principal").hide();
  }

  if (window.location.pathname == '/search/top/1'|| window.location.pathname == '/search/top/2'
   || window.location.pathname == '/search/top/3'|| window.location.pathname == '/search/top/4'
   || window.location.pathname == '/search/top/5'|| window.location.pathname == '/search/top/6'
   || window.location.pathname == '/search/top/7'|| window.location.pathname == '/search/top/8'
   || window.location.pathname == '/search/top/9'|| window.location.pathname == '/search/top/10') {
    $(".pagination_top").show();
    $(".procura-principal").hide();
  }

  if (window.location.pathname == '/search/recent/1'|| window.location.pathname == '/search/recent/2'
   || window.location.pathname == '/search/recent/3'|| window.location.pathname == '/search/recent/4'
   || window.location.pathname == '/search/recent/5'|| window.location.pathname == '/search/recent/6'
   || window.location.pathname == '/search/recent/7'|| window.location.pathname == '/search/recent/8'
   || window.location.pathname == '/search/recent/9'|| window.location.pathname == '/search/recent/10') {
    $(".pagination_recent").show();
    $(".procura-principal").hide();
  }
  
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
      teste -= 1;
      $('div.review-properties:gt('+ teste +')').show(300);
    }
    else{
      $('div.review-properties:gt('+ criticas +')').show(300);
      
    }
    $('.all').hide();
  });

  $('.few').click(function () {
    teste += 1;
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


  $('.newpost').hide();
  $('.post-cancel-btn').hide();

  $('.input-post-read, .post-btn, .post-create-btn').on('click', function(){
    $('.newpost').fadeIn();

    $('.post-create-btn').hide();
    $('.post-cancel-btn').show();
  });

  $('.post-cancel-btn').on('click', function(){
    $('.newpost').hide();
    $('.post-create-btn').show();
    $('.post-cancel-btn').hide();
  })
  
  $('.new_reply').hide();

  $(document).on('click','.post-reply', function(){
    var closestDiv = $(this).closest('div');
    
    $('.new_reply').not(closestDiv.next('.new_reply')).hide();
    closestDiv.next('.new_reply').fadeToggle(100);

  })



  $(".post-like").click(function (e) {

      var post_id = $(this).attr('post_id');  // Get attribute post_id from element with class post_like (this)
      var like_type = $(this).attr('like_type');

      $.ajax({
          type: 'get', // Type get
          url: '/post/like/', // Ajax url
          dataType: 'json', 
          data: { // Send data to ajax
              '_token': '<?php echo csrf_token() ?>',
              'like_type': like_type,
              'post_id': post_id,
          },
          success: function (data) {

            $(".num_likes1[post_id = " + post_id + "]").text(data[1]); // Changes the text with the number of Likes
            $(".num_likes0[post_id = " + post_id + "]").text(data[0]); // Dislikes

          }
      });

  });




  $(".submit-bttn").click(function (e) {
e.preventDefault();

var movie_id = $("#input_movie_id").val();
var body = $("#input_body").val();
var rating = $("input[name=rating]:checked").val();

$.ajax({
    type: 'get', // Type get
    url: '/comment/add/', // Ajax url
    dataType: 'json', 
    data: { // Send data to ajax
        '_token': '<?php echo csrf_token() ?>',  
        'movie_id': movie_id,
        'body': body,
        'rating': rating,
    },
    success: function (data) {

      var info = '<div class="user-review-properties">Reviewed by <span class="review-author"><strong>' + data[3] + ' ' + data[4] + '</strong></span>';
                
      for (var i = 0; i < rating; i++) {
          info += '<span class="icon-star"></span>';
      }


      if (data[1] == data[6]) {

                              info += '<form action="/remove/comments/' + data[7] + '" method="POST">\
                                <input type="hidden" name="_token" value="' + data[8] + '">\
            <input type="hidden" name="movie_comment" value="' + movie_id + '">\
                                <input type="hidden" name="comment_id" value="' + data[7] + '">\
                                <input type="submit"class="fas fa-trash"/>\
                            </form>';

      }
                    
      info += '<article>\
        <p>' + data[0].substring(0, 200) + '</p>\
         </article>\
        <div class="line"></div>\
        <br>\
        </div>';

          var criticas_user = $('.user-review-properties').length;

          if (criticas_user == 0) {
      $("#user_reviews").append(info);
      $("#no_reviews_yet").hide();
          } else {
      $(".user-review-properties:last").append(info);
          }

          $("#input_body").val("");

  if (criticas_user > 3) {
  $('div.user-review-properties:gt(2)').hide();
}
    }
});


  });



  $(document).ready(showSlides);



});