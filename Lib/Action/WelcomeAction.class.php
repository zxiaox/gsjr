<?php
class WelcomeAction extends Action {
  public function index(){
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
    $this->assign('news', 'cur');
  	$this->display();
  }
  public function us(){
    $this->assign('us', 'cur');
  	$this->display();
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
