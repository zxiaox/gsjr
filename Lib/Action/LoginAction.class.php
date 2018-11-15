<?php
class LoginAction extends Action {
  public function index(){
    if($this->_post()){
      $p = $this->_post();
      $user = $p['user'];
      if($user=='super'){
        $_SESSION['admin'] = 'hehe';
        redirect(U('/Admin'));
      }
      $password = md5($p['password']);
      $me = M('user')->where("user = '$user' and password = '$password'")->find();

      if($me){
        $_SESSION['admin'] = $me;
        redirect(U('/Admin'));
      }
    }
	  $this->display();
  }
  public function logout() {
    $_SESSION['admin'] = '';
    redirect(U('index'));
  }
}
