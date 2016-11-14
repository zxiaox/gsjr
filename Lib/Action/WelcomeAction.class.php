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
  	$this->display();
  }
  public function hr(){
  	$this->display();
  }
}
