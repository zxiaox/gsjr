$(function(){
  var servicesH = $('.services').height();
  $('.service').height(servicesH - 2);
  $('.service.cur').height(servicesH - 4);
  $('.service').hover(function(){
    $('.service').removeClass('cur');
    $(this).addClass('cur');
    $('.service .title > img').attr('src','/Common/i/s1.png');
    $('.service.cur .title > img').attr('src','/Common/i/s1bg.png');
  });
  $('.left').click(function(){
    $('.we .clearfix').css('left', '0');
  });
  $('.right').click(function(){
    $('.we .clearfix').css('left', '-298px');
  });
  $('#nav li>a').hover(function(){
    $(this).addClass('mouse');
  },function(){
    $(this).removeClass('mouse');
  });
  $('.work').hover(function(){
    //$('.subnav_work').css('left', ($(this).offset().left));
    $('.subnav_work').show();
  },function(){
    $('.subnav_work').hide();
  });
  $('.us_nav li').click(function(){
    $('.us_nav li').removeClass('cur');
    $(this).addClass('cur');
  });
});
