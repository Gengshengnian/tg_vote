<?php
namespace Admin\Controller;
use Think\Controller;
// +----------------------------------------------------------------
// | 奖品等级管理
// +----------------------------------------------------------------
// | 功能：实现奖品等级的增删改查
// +----------------------------------------------------------------
// | Author: joker-Lee
// +----------------------------------------------------------------
// | Date：2016年10月28日
// +----------------------------------------------------------------


class VotePrizeLevelController extends Controller
{
	public function index()
	{
		$this->display('vote/VotePrizeLevel');
	}
	
	public function getData(){
        
        $page = M("vote_prize_level");
        $offSet = I('start');
        $pageSize = I('limit');
        $where = array();
        $data = I('post.');
        
        
        if(!empty($data['prize_level_name'])){
            $where['prize_level_name'] = array('like','%'.$data['prize_level_name'].'%');
        }
        if(!empty($data['proportion'])){
             
            $where['proportion'] = array('like','%'.$data['proportion'].'%');
        }
        
        // var_dump($data);exit;
        $arr_page = $page->where($where)
                  ->limit("{$offSet},{$pageSize}")
                  ->order('proportion desc')->select();
        //var_dump($arr_page);
        // $arr_page= $page->query($sql);
        
        $count = $page->where($where)->count();
        $arr =  array();
        $arr['rows'] = $arr_page;
        $arr['results'] = $count;
		//var_dump($arr);
        echo json_encode($arr);    
    }

    public function delete(){
        $course = M('vote_prize_level');
        $id = I('ids');
        $idd=implode(',', $id);       
        $course->where('id in('.$idd.')')->delete();
        $this->getdata();   
    }

    public function update(){
        $m = M('vote_prize_level');
        $data=I('post.');
        // dump($data);exit;
        $result= $m->save($data);
            if($result){
            $this->success('修改成功',U('index'));
            }else{
                $this->error('修改失败');
            }
    }

    public function add(){
         $data=I('post.'); 
        //dump($data);exit;
         
         $user_id = $_SESSION['loginedUser']['id'];

         $data['status'] = 1;

         $empl = M("vote_prize_level"); 
        // dump($data);exit;
    
      
        $result = $empl->add($data);
            if($result){
            $this->success('申请成功',U('index'));
            }else{
                $this->error('申请失败');
            }
        } 


}