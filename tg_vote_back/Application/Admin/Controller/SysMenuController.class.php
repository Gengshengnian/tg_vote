<?php
namespace Admin\Controller;

//use Model\MenuModel;
class SysMenuController extends AdminController
{

    // 在tp3.2以后，M（）和D()是一样的，在3.2之前版本中
    // M()     类似于是  new Model();
    // D('goods')  类似于 new GoodsModel():
    public function index()
    {
        $this->display('SystemManage/Menu/index');
    }

    /**
     * 获取资源数据（包括筛选及分页）
     *@access public
     *@return json文件
     */
    public function getData(){
        $page = I('pageIndex',0);
        $rows = I('limit',10);

        $search['name']=I('name','');
        $search['url']=I('url','');
        $search['status']=I('status','');
        $condition=array();
        if(!empty($search['name'])){
            $condition['name']=array('like','%'.$search['name'].'%');
        }
        if(!empty($search['url'])){
            $condition['url']=array('like','%'.$search['url'].'%');
        }
        $power=M('privilege_menu');
        $offset = $page*$rows;
        $powers = $power->where($condition)->limit($offset,$rows)->select();

        foreach ($powers as $k=>$v){
            if($v['parent_id']){
                $power_name=$power->find($v['parent_id']);
                $powers[$k]['parent_id']=$power_name['name'];
            }else{
                $powers[$k]['parent_id']='';
            }
        }

        $total = $power->where($condition)->count();
        $json = json_encode($powers);
        $json =  '{"rows":'.$json.',"results":' .$total.'}';
        echo $json;
    }

    /**
     * 权限结构查询
     *@access public
     *@return json文件
     */
    public function trees(){
        $power=M('privilege_menu');
        $ps=$power->order('id asc')->select();
        
        $trees = array();
        $i=0;
        foreach ($ps as $k=>$fv){
            if($fv['parent_id']==0){
                $trees[$i]['text']=$fv['name'];
                $trees[$i]['id']=$fv['id'];
                $trees[$i]['children']=null;
                
                $j=0;
                foreach ($ps as $k=>$v){
                    if($v['parent_id']==$fv['id']){
                        $trees[$i]['children'][$j]['text']=$v['name'];
                        $trees[$i]['children'][$j]['id']=$v['id'];
                        $y=0;
                        foreach ($ps as $k=>$va){
                            if($va['parent_id']==$v['id']){
                                $trees[$i]['children'][$j]['children'][$y]['text']=$va['name'];
                                $trees[$i]['children'][$j]['children'][$y]['id']=$va['id'];
                                $y++;
                            }
                        }
                        $j++;
                    }
                }
                $i++;
            }
            
        }
        
        
        $trees= json_encode($trees);
        echo $trees;
    }

    /**
     *数据插入
     *@access public
     *@return 插入结果
     */
    public function add()
    {
        $data = I('post.');
        $menuModel = M('privilege_menu');
        if($data['parent_id'] == '根目录'){
            $data['parent_id'] = 0;
        }else{
            $p['name'] = $data['parent_id'];
            $parent = $menuModel->where($p)->select();
            $data['parent_id'] = $parent[0]['id'];
        }
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }
        //$data['target_href']=$data['url'];
        if($menuModel->create($data)){
            $menu = $menuModel->add();
        }
        
        if($menu){
            $this->success('权限添加成功！', 'getDate', 2);
        }else{
            $this->error('权限添加错误！', 'getDate', 2);
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
        
        $menuModel = M('privilege_menu');
        if($data['parent_id'] == '根目录'){
            $data['parent_id'] = 0;
        }else{
            $p['name'] = $data['parent_id'];
            $parent = $menuModel->where($p)->select();
            $data['parent_id'] = $parent[0]['id'];
        }
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }
        //$data['target_href']=$data['url'];
        if($menuModel->create($data)){
            $menu = $menuModel->save();
        }
        if($menu){
            $this->success('权限修改成功！', 'getDate', 2);
        }else{
            $this->error('权限修改错误！', 'getDate', 2);
        }
    }

    public function delete()
    {
        $data = I('post.');
        $menu = M('privilege_menu');
        $rm = M('privilege_role_menu');
        $menu->startTrans();
        $menudata = $data['ids'];
        $datamenu = $data['ids'];
        foreach($datamenu as $value){
            $role['menu_id'] = $value;
            $select = $rm->where($role)->select();
        }
        if($select){
            foreach ($datamenu as $val){
                $role['menu_id'] = $val;
                $delete = $rm->where($role)->delete();
            }
            foreach ($menudata as $v){
                $data['id'] = $v;
                if($menu->create($data)){
                    $del = $menu->where($data)->delete();
                }
            }
            if($delete && $del){
                $menu->commit();
                $this->success('权限删除成功！', 'getDate', 2);
            }else{
                $menu->rollback();
                $this->error('权限删除错误！', 'getDate', 2);
            }
        }else{
            foreach ($menudata as $v){
                $data['id'] = $v;
                if($menu->create($data)){
                    $del = $menu->where($data)->delete();
                }
            }
            if($del){
                $menu->commit();
                $this->success('用户删除成功！', 'getDate', 2);
            }else{
                $menu->rollback();
                $this->error('用户删除错误！', 'getDate', 2);
            }
        }

    }

    public function _empty()
    {
        echo '请求的操作不存在!';
    }
}