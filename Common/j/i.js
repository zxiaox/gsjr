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
  $('.work').hover(function(){
    $(this).children('a').addClass('mouse');
    $(this).find('.subnav_work').show();
  },function(){
    $(this).children('a').removeClass('mouse');
    $(this).find('.subnav_work').hide();
  });
  $('.us_nav li').click(function(){
    $('.us_nav li').removeClass('cur');
    $(this).addClass('cur');
  });
  $('.year a').click(function(){
    $('.year').attr('class','year');
    $('.year').addClass('year201'+ ($(this).index() + 2));
    $('.tyear').attr('class','tyear');
    $('.tyear').addClass('t201'+ ($(this).index() + 2));
    $('.yearbox').hide();
    $('.box201' + ($(this).index() + 2)).show();
    return false;
  });
  // $('.storytitle').click(function(){
  //   $('.storylist table').hide();
  //   if($(this).hasClass('ourstorytitle')){
  //     $('.storylist table.our').show();
  //   }else if ($(this).hasClass('yourstorytitle')){
  //     $('.storylist table.your').show();
  //   }else {
  //     $('.storylist table.my').show();
  //   }
  //   $(this).parent().hide();
  // });
  $('.hr_nav li').click(function(){
    $('.hr_nav li').removeClass('cur');
    $(this).addClass('cur');
    $('.hrs').hide();
    $('.hr' + ($(this).index() + 1)).show();
  });
  $('.description a').click(function(){
    $('.hrs').hide();
    $('.hr' + ($(this).parent().index() + 4)).show();
  });
  $('.videobox').click(function(){
    var o = $(this).attr('data-href');
    if(!~o.indexOf('java')){
      $('.v')
      .html(o)
      .css('top', $(this).offset().top + $(this).height() - $('.video').offset().top + 20)
      .show();
    }
  });
});
