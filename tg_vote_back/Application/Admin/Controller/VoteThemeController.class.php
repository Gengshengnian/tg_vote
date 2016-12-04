<?php
namespace Admin\Controller;

use Think\Controller;

class VoteThemeController extends Controller
{
	public function index()
    {
        $this->display('1/index');
    }
    public function getData(){
    	$page = I('pageIndex',0);
        $rows = I('limit',10);
        $search['theme_name']=I('theme_name','');
        $condition=array();
        if(!empty($search['theme_name'])){
            $condition['theme_name']=array('like','%'.$search['theme_name'].'%');
        }
    	$theme = M('vote_theme');
    	$offset = $page*$rows;
    	$th = $theme->where($condition)->limit($offset,$rows)->select();
    	$total = $theme->where($condition)->count();
        $json = json_encode($th);
        $json =  '{"rows":'.$json.',"results":' .$total.'}';
        echo $json;
    }
    public function add(){
    	$data = I('post.');
    	$theme = M('vote_theme');
    	$th = $theme->add($data);
    	if($th){
            $this->success('', 'getDate', 2);
        }else{
            $this->error('', 'getDate', 2);
        }
    }
    public function update(){
    	$data = I('post.');
    	$theme = M('vote_theme');
    	$th = $theme->save($data);
    	if($th){
            $this->success('', 'getDate', 2);
        }else{
            $this->error('', 'getDate', 2);
        }
    }
    public function del(){
    	$data = I('post.');
    	$theme = M('vote_theme');
    	$ids = implode($data['ids'],',');
    	$res = $theme->where("id in ($ids)")->delete();
    	if($res){
            $this->success('', 'getDate', 2);
        }else{
            $this->error('', 'getDate', 2);
        }
    }
}
?>