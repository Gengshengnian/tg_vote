<?php
namespace Admin\Controller;

use Think\Controller;

class VotePrizeController extends Controller
{
	public function prizeIndex(){
        $this->display();
    }

    public function indexPrize(){
    	$prize = M('vote_prize');
    	$page = I('pageIndex',0);
        $rows = I('limit',10);
       
        // dump($pageSize);exit;
        
        $data = I('post.');// 获取搜索的条件
         // var_dump($data);exit;
        
        $data['prize_name'] = trim(I('prize_name', ''));
        // 搜索框
        $condition = array();
         $offset = $page*$rows;
        
        if (! empty($data['prize_name'])) {
            $condition['prize_name'] = array('like','%' . $data['prize_name'] . '%');
        }
        $count=$prize->count();
        $datas = $prize->alias('t1')
        	->field('t1.id,t1.prize_name,t1.img,t1.comment')
            ->limit("{$offSet},{$pageSize}")
            ->where($condition)
            ->limit($offset,$rows)
            ->select();
             // echo $prize->_sql();exit;       
        // $count =count($num);
        // 分页
        $arr = array();
        $arr['rows'] = $datas;
        $arr['results'] = $count;       
        echo json_encode($arr);
    }

    public function add(){
        $data = I('post.');
        $prizeModel = M('vote_prize');
        $prizeModel->startTrans();//开启事务
        

        $config = array(
            'savePath' => './Uploads/prizeimg/',
            'maxSize' => 3145728,
            'exts' => array('jpg', 'gif', 'png', 'jpeg')
        );           
        $upload = new \Think\Upload($config);//实例化上传类
        // 上传文件
        $info = $upload->uploadOne($_FILES['img']); // html页面的表单
        $filename = $info['savepath'] . $info['savename'];

        $data['img'] = $filename ;

        if ($prizeModel->create($data)) {
            $prizeId = $prizeModel->add();
        }
              
        if($prizeId & $info){
            $prizeModel->commit();
            $this -> redirect('VotePrize/prizeIndex') ;
        }else{
            $prizeModel->rollback();
            $this->error('奖品添加错误！', 'prizeIndex', 2);
        }
    }

    public function update(){
        // echo "ff";exit;
        $data = I('post.');
        $prizeModel = M('vote_prize');
        $prizeModel->startTrans();//开启事务
        $prizesel['id'] = $data['id'];
        $sel = $prizeModel->where($prizesel)->find();
        if ($prizeModel->create($data)) {
            $prizeId = $prizeModel->save();
        }
        if($prizeId){
            $prizeModel->commit();
            $this->success('奖品修改成功！', 'indexPrize', 2);
        }else {
            $prizeModel->rollback();
            $this->error('奖品修改错误！', 'indexPrize', 2);
        }
        // $this->display('VotePrize/prizeIndex');
    }

    public function delete(){
        $data = I('post.');
        // dump($data);exit;
        $prizeModel = M('vote_prize');
        $prizeModel->startTrans();//开启事务
        if ($prizeModel->create($data)) {
            $prizeId = $prizeModel->where($data)->delete();
        }
        if($prizeId){
            $prizeModel->commit();
            $this->success('奖品删除成功！', 'indexPrize', 2);
        }else{
            $prizeModel->rollback();
            $this->error('奖品删除错误！', 'indexPrize', 2);
        }
        // $this->display('VotePrize/prizeIndex');
    }
}