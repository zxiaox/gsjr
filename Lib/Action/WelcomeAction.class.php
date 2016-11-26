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
      if($anew['hide'] == 1){
        $this->assign('anew', array('title'=>'内容已不存在'));
      }else{
        $this->assign('anew', $anew);
      }
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
  public function story() {
    $id = (int)$_GET['id'];
    $story = M('storys')->find($id);
    if($story['hide'] == 1){
      $this->assign('story', array('title'=>'已不存在','author'=>'匿名'));
    }else{
      $this->assign('story', $story);
    }
    $this->assign('us', 'cur');

  	$this->display();
  }
  public function news_preview($id=1){
    $one = M('news')->find($id);
    $this->assign('news', 'cur');
    $this->assign('one', $one);
  	$this->display();
  }

  public function select_story($type=1){
    if($type == 1 || $type == 2 || $type == 3){
      import('ORG.Util.Page');// 导入分页类
      $s = M('storys');
      $count1      = $s->where('type_id = '.$type.' and hide = "0"')->count();// 查询满足要求的总记录数
      //$count2      = $s->where('type_id = 2 and hide = "0"')->count();// 查询满足要求的总记录数
      //$count3      = $s->where('type_id = 3 and hide = "0"')->count();// 查询满足要求的总记录数
      $Page1       = new Page($count1, 20);// 实例化分页类 传入总记录数和每页显示的记录数
      //$Page2       = new Page($count2, 1);// 实例化分页类 传入总记录数和每页显示的记录数
      //$Page3       = new Page($count3, 1);// 实例化分页类 传入总记录数和每页显示的记录数
      $show1       = $Page1->show();// 分页显示输出
      //$this->assign('list',$list);// 赋值数据集
      $this->assign('page1',$show1);// 赋值分页输出
      //$this->assign('page2',$show2);// 赋值分页输出
      //$this->assign('page3',$show3);// 赋值分页输出

      $ms = $s->where('type_id = 1 and hide = "0"')->limit($Page1->firstRow, $Page1->listRows)->select();
      //$ys = $s->where('type_id = 2 and hide = "0"')->limit($Page2->firstRow, $Page2->listRows)->select();
      //$os = $s->where('type_id = 3 and hide = "0"')->limit($Page3->firstRow, $Page3->listRows)->select();

      $this->assign('ms', $ms);
      //$this->assign('ys', $ys);
      //$this->assign('os', $os);
    }
    $this->display();
  }
}
