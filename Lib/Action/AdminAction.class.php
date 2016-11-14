<?php
class AdminAction extends Action {
  public function _initialize() {
    if(!$_SESSION['admin'] && !$_SESSION['login']){
      $_SESSION['login'] = true;
      redirect('login');
    }
  }
  public function index(){
	   $this->display();
  }
  public function login(){
    $_SESSION['login'] = false;
    $this->display();
  }

}
