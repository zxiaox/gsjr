<?php
class WelcomeAction extends Action {
  public function index(){
    $newsdata1 = M('news')->where("hide = 0 and type_id = 1")->order('setorder asc,created_time desc')->limit(3)->select();
    $newsdata2 = M('news')->where("hide = 0 and type_id = 2")->order('setorder asc,created_time desc')->limit(3)->select();
    $newsdata3 = M('news')->where("hide = 0 and type_id = 3")->order('setorder asc,created_time desc')->limit(3)->select();

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
    $newstype = array('1'=> '公司动态','2'=> '党建工作','3'=> '行业资讯','4'=> '下载中心');
    if($get['src'] == 'all'){
      $where = '';
      if($get['type']){
        $where = ' and type_id = '.$get['type'];
      }
      import('ORG.Util.Page');// 导入分页类
      $count      = M('news')->where('hide=0'.$where)->count();// 查询满足要求的总记录数
      $Page       = new Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
      $list = M('news')->where("hide = 0".$where)->order('setorder asc,created_time desc')->limit($Page->firstRow, $Page->listRows)->select();
      $newlist = M('news')->where("hide = 0")->order('setorder asc,created_time desc')->limit(20)->select();
      $this->assign('list',$list);// 赋值数据集
      $this->assign('list1',$newlist);// 赋值数据集
      $this->assign('list2',$newlist);// 赋值数据集
      $this->assign('page',$show);// 赋值分页输出

      $this->assign('newstype', $newstype);
      $this->display('allnews');
      return;
    }
    $type = 1;
    if($get['type']){
      $type = (int)$get['type'];
    }

    $newsdata = M('news')->where("hide = 0 and type_id = $type")->order('setorder asc,created_time desc')->limit(10)->select();
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
      if($get['type'] == 7) {
        $storys = M('storys');
        $story1 = $storys->where("hide = 0 and type_id = 1")->order('setorder asc,updated_time desc')->limit(3)->select();
        $story2 = $storys->where("hide = 0 and type_id = 2")->order('setorder asc,updated_time desc')->limit(3)->select();
        $story3 = $storys->where("hide = 0 and type_id = 3")->order('setorder asc,updated_time desc')->limit(3)->select();
        $this->assign('story1', $story1);
        $this->assign('story2', $story2);
        $this->assign('story3', $story3);
      }
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

      $ms = $s->where('type_id = '.$type.' and hide = "0"')->order('setorder asc,updated_time desc')->limit($Page1->firstRow, $Page1->listRows)->select();
      //$ys = $s->where('type_id = 2 and hide = "0"')->limit($Page2->firstRow, $Page2->listRows)->select();
      //$os = $s->where('type_id = 3 and hide = "0"')->limit($Page3->firstRow, $Page3->listRows)->select();

      $this->assign('ms', $ms);
      $this->assign('type', $type);
      //$this->assign('ys', $ys);
      //$this->assign('os', $os);
    }
    $this->display();
  }
}
