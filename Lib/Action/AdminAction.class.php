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

    import('ORG.Util.Page');// 导入分页类
    $count      = M('news')->where('hide='.$hide)->count();// 查询满足要求的总记录数
    $Page       = new Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
    $show       = $Page->show();// 分页显示输出
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出

    $news = M('news')->query('select gs_news.*,(SELECT user from gs_user where id = gs_news.created_by) as created_name, (SELECT user from gs_user where id = gs_news.updated_by) as updated_name from gs_news where hide = '. $hide .' order by created_time desc limit '.$Page->firstRow.',' .$Page->listRows);

    //$newstype = M('newstype')->getField('type',true);
    $newstype = array('0'=> '集团动态','1'=> '党建工作','2'=> '行业资讯','3'=> '下载中心');
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
        $data["created_time"] = date("Y-m-d H:i:s");
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

  public function destroy($id = 1,$type){
    if(M($type)){
      $p = (int)$_GET['id'];
      $data = array();
      if($_GET['hide'] === '0'){
        $data["hide"] = 0;
      }else{
        $data["hide"] = 1;
      }
      $edit = M($type)->where('id = '.$p)->save($data);
      $this->success('操作成功');
    }else{
      $this->success('操作失败，无效链接');
    }
  }

  public function storys(){
    if($_GET['hide']){
      $hide = 1;
    }else{
      $hide = 0;
    }
    import('ORG.Util.Page');// 导入分页类
    $count      = M('storys')->where('hide='.$hide)->count();// 查询满足要求的总记录数
    $Page       = new Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
    $show       = $Page->show();// 分页显示输出
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出

    $storys = M('storys')->query('select gs_storys.*,(SELECT user from gs_user where id = gs_storys.created_by) as created_name, (SELECT user from gs_user where id = gs_storys.updated_by) as updated_name from gs_storys where hide = '. $hide .' order by created_time desc limit '.$Page->firstRow.',' .$Page->listRows);

    $storystype = array('0'=> 'My story','1'=> 'Your story','2'=> 'Our story');
    $this->assign('storys',$storys);
    $this->assign('storystype',$storystype);
    $this->assign('hide',$hide);
    $this->display();
  }
  public function addstory(){
    if($this->_post()){
      $p = $this->_post();
      $data = array();
      $data["title"] = $p['title'];
      $data["content"] = $p['content'];
      $data["type_id"] = $p['newstype'];
      $data["theme"] = $p['theme'];
      $data["author"] = $p['author'];

      if($p['id']){
        $data["updated_by"] = $_SESSION['admin']['id'];
        $data["updated_time"] = date("Y-m-d H:i:s");
        $add = M('storys')->where('id = '.$p['id'])->save($data);
        $this->success('更新成功');
      }else{
        $data["created_by"] = $_SESSION['admin']['id'];
        $data["created_time"] = date("Y-m-d H:i:s");
        $add = M('storys')->add($data);
        $this->success('发布成功');
      }
      return;
    }
    if($this->_get()){
      $p = (int)$_GET['id'];
      $edit = M('storys')->find($p);
      if($edit){
        $this->assign('edit', $edit);
      }
    }
	  $this->display();
  }
}
