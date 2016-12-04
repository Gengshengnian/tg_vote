<?php
namespace Admin\Controller;
use Think\Controller;

class PlayerController extends Controller
{
	
	public function index()
	{
    $activity_id = I('get.id');
		//dump($activity_id);
    $this->assign('activity_id',$activity_id);
		$this->display('Player/playerLists');
	}

	public function getData()
	{
		$offSet = I('start');//偏移量
    $pageSize = I('limit');//一页有多少个
        //$seach['tg_organization_employee.id'] = $sql[0]['id'];

       	// $class_id = I('post.class','');

       	// $student_name = I('post.student_name','');
        // $date = I('post.date','');
        // if(!empty($date)){
        //     $seach['tg_daily_student.date'] = $date;
        // }
        // if(!empty($class_id)){
        //     $seach['tg_acdemic_class.id'] = $class_id;
        // }
        // if(!empty($student_name)){
        //     $seach['tg_acdemic_students.name'] = array('like','%'.$student_name.'%');
        // }
        $activity_id = I('get.activity_id');
        //dump($activity_id);
        $seach['t1.activity_id '] = $activity_id;
       	$players = M('vote_activity_player');
       	$player = $players->alias('t1')
       		->join('tg_fans_player as t2 on t1.player_id = t2.id','left')
       		->join('tg_vote_voterecord as t3 on t3.activity_player_id = t1.id','left')
       		->field('t2.*,count(t3.fans_id) as num')
          ->group('t2.id')
       		->where($seach)
       		->limit("{$offSet},{$pageSize}")
       		->select();
       //echo $players->getLastSql();
       $count = count($player);       
        $arr　 =  array();
         
        $arr['rows'] = $player;//做分布josn格式
        $arr['results'] = $count;//这个表的条数
         
         
        echo json_encode($arr);//转化成json格式
	}
	public function playerAddInput()
	{
    $activity_id = I('get.activity_id');
    //dump($activity_id);
    $this->assign('activity_id',$activity_id);
		$this->display('Player/playerAddInput');
	}
  public function add()
  {
    $data = I('post.');
    //dump($data);
    //dump(I('get.'));
    $config = array(
            'maxSize'    =>  3145728,                             // 设置附件上传大小，默认3M
            'exts'       =>  array('jpg', 'gif', 'png', 'jpeg'),  // 设置附件上传类型
            'rootPath'   =>  './',                                // 设置根路径
            'savePath'   =>  './Public/Uploads/'                  // 设置附件上传目录
        );
    $upload = new \Think\Upload($config);// 实例化上传类
        
    $info   =   $upload->uploadOne($_FILES['head_img']);
    $info1  =   $upload->uploadOne($_FILES['production_img']); 
    if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }
    if(!$info1) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }

        $player = D('fans_player');

    if($player->create($data)) {
        $data['head_img'] =  substr($info['savepath'] . $info['savename'] , 8);
        $data['production_img'] =  substr($info1['savepath'] . $info1['savename'] , 8);
        $result = $player->add($data);
            if($result) {
               $this->success('数据添加成功！');
              }else{
                  $this->error('数据添加错误！');
                }
          }else{
            $Form->rollback();
              $this->error($Form->getError());
        }
        $acpl = M('vote_activity_player');

        $flog = $acpl->execute("insert into tg_vote_activity_player(player_id,activity_id) values(".$result.",".$data['activity_id'].")");

  }
}

