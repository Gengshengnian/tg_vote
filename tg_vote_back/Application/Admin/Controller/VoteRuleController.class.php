<?php
namespace Admin\Controller;

class VoteRuleController extends AdminController
{

    // 在tp3.2以后，M（）和D()是一样的，在3.2之前版本中
    // M()     类似于是  new Model();
    // D('goods')  类似于 new GoodsModel():
    public function index()
    {
        $this->display('VoteRule/index');
    }

    public function getData(){
        $m = M ('vote_rule');
        $offSet = I('start');
        $pageSize = I('limit');
        $where = array();
        $data = I('post.');
   
        if(!empty($data['rule_name'])){
            $where['rule_name']=array('like','%'.$data['rule_name'].'%');
        }
        if(!empty($data['rule_content'])){
            $where['rule_content']=array('like','%'.$data['rule_content'].'%');
        }
        $offset = $page*$rows;
        $powers = $m->where($where)->limit($offset,$rows)->select();



        $total = $m->where($where)->count();
        $json = json_encode($powers);
        $json =  '{"rows":'.$json.',"results":' .$total.'}';
        echo $json;
    }

   
    public function add()
    {
        $data=I('post.');
        $m=M('vote_rule');
        $results=$m->add($data);
        if($results){
            $this->success('添加成功！', 'getDate', 2);
        }else{
            $this->error('添加错误！', 'getDate', 2);
        }
    }

    /**
     *数据更新
     *@access public
     *@return 返回更新结果
     */
    public function update()
    {
        $data = I('post.');
        
       $m=M('vote_rule');
       
            $results = $m->save($data);

        if($results){
            $this->success('修改成功！', 'getDate', 2);
        }else{
            $this->error('修改错误！', 'getDate', 2);
        }
    }

    public function delete()
    {
        $data = I('post.');
        // dump($data);exit;
        $m = M('vote_rule');
        $idss = implode($data['ids'], ',');
        // var_dump($idss);exit;
        $results=$m->where("id in ($idss)")->delete();
       
            if($results){
                $this->success('删除成功！', 'getDate', 2);
            }else{
                $this->error('删除错误！', 'getDate', 2);
            }

    }

    public function _empty()
    {
        echo '请求的操作不存在!';
    }
}