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
  })
})
