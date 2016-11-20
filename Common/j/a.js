$(function(){
  $('.addnew').click(function(){
    var title = $('input[name="title"]').val();
    if(title.trim().length == 0){
      alert('请输入标题！');
      return false;
    }
  })
})
