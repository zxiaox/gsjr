<?php
class AdminAction extends Action {
  public function _initialize() {
    if(!$_SESSION['admin']){
      redirect(U('/Login'));
    }
  }
  public function index(){
    if($_GET['hide']){
      $hide = 1;
    }else{
      $hide = 0;
    }
    $news = M('news')->query('select gs_news.*,(SELECT user from gs_user where id = gs_news.created_by) as created_name, (SELECT user from gs_user where id = gs_news.updated_by) as updated_name from gs_news where hide = '. $hide .' order by created_time desc');

    $newstype = M('newstype')->getField('type',true);
    $this->assign('news',$news);
    $this->assign('newstype',$newstype);
    $this->assign('hide',$hide);
    $this->display();
  }

  public function news(){
    if($this->_post()){
      $p = $this->_post();
      $data = array();
      $data["title"] = $p['title'];
      $data["content"] = $p['content'];
      $data["type_id"] = $p['newstype'];
      $data["theme"] = $p['theme'];

      if($p['id']){
        $data["updated_by"] = $_SESSION['admin']['id'];
        $data["updated_time"] = date("Y-m-d H:i:s");
        $add = M('news')->where('id = '.$p['id'])->save($data);
        $this->success('更新成功');
      }else{
        $data["created_by"] = $_SESSION['admin']['id'];
        $add = M('news')->add($data);
        $this->success('发布成功');
      }
      return;
    }
    if($this->_get()){
      $p = (int)$_GET['id'];
      $edit = M('news')->find($p);
      if($edit){
        $this->assign('edit', $edit);
      }
    }
	  $this->display();
  }

  public function destroy($id = 1){
    $p = (int)$_GET['id'];
    $data = array();
    if($_GET['hide'] === '0'){
      $data["hide"] = 0;
    }else{
      $data["hide"] = 1;
    }
    $edit = M('news')->where('id = '.$p)->save($data);
    $this->success('操作成功');
  }

}
