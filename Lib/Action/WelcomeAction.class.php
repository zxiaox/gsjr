<?php
class WelcomeAction extends Action {
  public function index(){
    $newsdata1 = M('news')->where("hide = 0 and type_id = 1")->order('created_time desc')->limit(5)->select();
    $newsdata2 = M('news')->where("hide = 0 and type_id = 2")->order('created_time desc')->limit(5)->select();
    $newsdata3 = M('news')->where("hide = 0 and type_id = 3")->order('created_time desc')->limit(5)->select();

    $this->assign('newsdata1', $newsdata1);
    $this->assign('newsdata2', $newsdata2);
    $this->assign('newsdata3', $newsdata3);
  	$this->display();
  }
  public function work(){
    $get = $this->_get();
    $tpl = 'p1';
    if($get['type']){
      $tpl = 'p'.$get['type'];
    }
    $this->assign('work', 'cur');
  	$this->display($tpl);
  }
  public function news(){
    $get = $this->_get();
    $type = 1;
    if($get['type']){
      $type = (int)$get['type'];
    }
    $newstype = array('1'=> '集团动态','2'=> '党建工作','3'=> '行业资讯','4'=> '下载中心');
    $newsdata = M('news')->where("hide = 0 and type_id = $type")->order('created_time desc')->limit(10)->select();
    if($get['id']){
      $id = (int)$get['id'];
      $anew = M('news')->find($id);
    }else{
      $anew = $newsdata[0];
    }
    $this->assign('anew', $anew);
    $this->assign('type', $type);
    $this->assign('newstype', $newstype[$type]);
    $this->assign('newsdata1', $newsdata);
    $this->assign('newsdata2', $newsdata);
    $this->assign('news', 'cur');
  	$this->display();
  }
  public function us(){
    $get = $this->_get();
    $tpl = 'us';
    if($get['type']){
      $tpl = 'us'.$get['type'];
    }
    $this->assign('us', 'cur');
  	$this->display($tpl);
  }
  public function hr(){
    $this->assign('hr', 'cur');
  	$this->display();
  }
  public function news_preview($id=1){
    $one = M('news')->find($id);
    $this->assign('news', 'cur');
    $this->assign('one', $one);
  	$this->display();
  }
}
