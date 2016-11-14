$(function(){
  var servicesH = $('.services').height();
  $('.service').height(servicesH - 2);
  $('.service.cur').height(servicesH - 4);
  $('.service').hover(function(){
    $('.service').removeClass('cur');
    $(this).addClass('cur');
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
})
