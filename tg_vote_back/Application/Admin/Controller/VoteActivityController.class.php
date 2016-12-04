<?php
// +----------------------------------------------------------------------
// | 就业模块 今日跟进
// +----------------------------------------------------------------------
// | 功能：实现用户对今日所负责学生的就业情况进行跟进
// +----------------------------------------------------------------------
// | 权限：
// +----------------------------------------------------------------------
// | Author: php1607 李泽杰/耿生年
// +----------------------------------------------------------------------
// | Date：2016年10月15日
// +----------------------------------------------------------------------
namespace Admin\Controller;


class VoteActivityController extends AdminController
{
    public function index()
    {
        $this->display('VoteActivity/index');
    }

    public function addInput()
    {
        $theme = M('vote_theme');
        $rule = M('vote_rule');

        $rules = $rule->select();
        $themes = $theme->select();

        $this->assign('rules',$rules);
        $this->assign('themes',$themes);
        $this->display('VoteActivity/addInput');
    }

    public function add()
    {
        $theme = M('vote_activity');
        $data = I('post.');
		
        $config = array(   
            'maxSize'    =>    3145728,  
            'rootPath'   =>    './',
            'savePath'   =>    './Public/Uploads/Activity/',     
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),   
            'autoSub'    =>    false,    
        );

        $upload1 = new \Think\Upload($config);// 实例化上传类
        $upload2 = new \Think\Upload($config);// 实例化上传类
        $upload1->savename = 'time';
        $upload2->savename = 'time';
        $info1 = $upload1->uploadOne($_FILES['logo_img']);
        $info2 = $upload2->uploadOne($_FILES['ewm_img']);
        if(!$info2)
        {
            $this->error($upload->getError());
        }

        $data['logo_img'] = $info1['savepath'].$info1['savename'];    
        $data['ewm_img'] = $info2['savepath'].$info2['savename'];  
        if(empty($data['tag']))
        {
        	$info = $theme->add($data);
        }
        else 
        {
        	$info = $theme->where('id ='.$data['tag'])->save($data);
        }
       
        if($info)
        {
            $this->success('添加成功');
        }
        else
        {
            $this->error($info->getError());
        }

    }

    public function getData()
    {	
    	$name = I('post.name');
    	$pageIndex = I('post.pageIndex');
    	$limit = I('post.limit');
    	$offset = $pageIndex*$limit;
    	
    	if(!empty($name))
    	{
    		$where['theme_name'] =  array('like','%'.$name.'%');
    	}
    	
        $theme = M('vote_activity');
        $data = $theme->alias('va')
        			  ->join('tg_vote_theme vt on va.theme_id = vt.id')
        			  ->join('tg_vote_rule vr on va.rule_id = vr.id')
        			  ->where($where)
        			  ->field(array("va.*","vt.theme_name"=>"theme_name","vr.rule_name"=>"rule_name"))
        			  ->limit($offset,$limit)
        			  ->select();
        $count = $theme->alias('va')
        			  ->join('tg_vote_theme vt on va.theme_id = vt.id')
        			  ->join('tg_vote_rule vr on va.rule_id = vr.id')
        			  ->where($where)
        			  ->field(array("va.*","vt.theme_name"=>"theme_name","vr.rule_name"=>"rule_name"))
        			  ->limit($offset,$limit)
        			  ->count();
    
      	$datas['rows'] = $data;
      	$datas['count'] = $count;
		
      	$json = json_encode($datas);
      	echo $json;
    }
    
    public function getStatus()
    {
    	$activity = M('vote_activity');
    	$status = I('post.status');
    	$id = I('post.id');
    
    	if($status == 2)
    	{
    		$status['status'] = 2;
    		$info = $activity->execute('UPDATE
										tg_vote_activity
									SET STATUS = 2
									    		');
    		
    		$info = $activity->where('id ='.$id)->setField('status', 1);
    		
    	}
    	else if($status == 1)
    	{
    		$info = $activity->where('id ='.$id)->setField('status', 2);
    		echo $activity->getLastSql();
    	}
    	
    	if($info)
    	{
    		echo 1;
    	}
    	
    }
    
   	public function delete()
   	{
   		$id = I('post.ids');
   		$id = implode(',',$id);
   		
   		$activity = M('vote_activity');
   		$info = $activity->where('id in ('.$id.')')->delete();
   		
   		if($info)
   		{
   			$this->getData();
   		}
   		else
   		{
   			echo '删除失败';
   		}
   		
   	}
   	
   	public function updateInput()
   	{
   		$id = I('get.id');
   		$activity = M('vote_activity');
   		$theme = M('vote_theme');
   		$rule = M('vote_rule');
   		
   		$rules = $rule->select();
   		$themes = $theme->select();
   		$activity = $activity->where('id ='.$id)->select();
   	
   		$this->assign('activity' , $activity[0]);
   		$this->assign('rules' , $rules);
   		$this->assign('themes' , $themes);
   		
   		$this->display('VoteActivity/addInput');
   		
   	}
   	

} 