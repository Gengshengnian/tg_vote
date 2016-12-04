<?php
namespace Admin\Controller;


class SysRoleController extends AdminController
{
    public function index()
    {
        $this->display('SystemManage/Role/index');
    }

    /**
     * 数据查询
     *@access public
     *@return json文件
     */
    public function getdata(){
        $page = I('pageIndex',0);
        $rows = I('limit',10);

        $search['name']=I('name','');
        $condition=array();
        if(!empty($search['name'])){
            $condition['name']=array('like','%'.$search['name'].'%');
        }
        $role=M('privilege_role');
        $offset = $page*$rows;
        $roles = $role->where($condition)->limit($offset,$rows)->select();
        
        
        /*
         * 获取到每一个角色的所有菜单
         *   */
        
        $menus = $role->alias('role')->field('role.id,tpm.name menuss')
        ->join('left join tg_privilege_role_menu tprm ON tprm.role_id=role.id')
        ->join('left join tg_privilege_menu tpm ON tpm.id=tprm.menu_id')
        ->select();
        
        $arr_menu = array();
        //遍历所有数据，使所有rid相同的数据进行追加到同一个字符串中
        foreach ($menus as $k=>$v){
            $str='';
            foreach ($menus as $ks=>$vs){
                if($v['id']==$vs['id']){
                    $str.=$vs['menuss'].',';
                }
            }
            $str=trim($str,',');
            $arr_menu[$v['id']]=$str;
        }
        //dump($arr_menu);exit;
        
        
        //将所得到的数组放到查询到的role中，然后encode以后从页面拿值
        /*  $roles[]['menuss']=$arr_menu; */
        
        foreach ($roles as $k=>$v){
            foreach($arr_menu as $ks=>$vs){
                if($v['id']==$ks){
                    $roles[$k]['menuss']=$vs;
                }
            }
        }
        
        $total = $role->where($condition)->count();
        $json = json_encode($roles);
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
                $trees[$i]['checked'] = true;
                $trees[$i]['children']=null;
                $j=0;
                foreach ($ps as $k=>$v){
                    if($v['parent_id']==$fv['id']){
                        $trees[$i]['children'][$j]['text']=$v['name'];
                        $trees[$i]['children'][$j]['id']=$v['id'];
                        $trees[$i]['children'][$j]['checked']=true;
                        $y=0;
                        foreach ($ps as $k=>$va){
                            if($va['parent_id']==$v['id']){
                                $trees[$i]['children'][$j]['children'][$y]['text']=$va['name'];
                                $trees[$i]['children'][$j]['children'][$y]['id']=$va['id'];
                                $trees[$i]['children'][$j]['children'][$y]['checked']=true;
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
     * 数据插入
     *@access public
     *@return 返回插入结果（插入后的ID）
     */
    public function add(){
        $data = I('post.');
        $roleModel = M('privilege_role');
        $roleMenuModel = M('privilege_role_menu');
        $roleModel->startTrans();
        if ($roleModel->create($data)) {
            $roleId = $roleModel->add();
        }
        $menu = array();
        $menu['role_id'] = $roleId;
        $menus = explode(',',$data['menus']);
        $i=0;
        foreach ($menus as $val){
            $id = $val;
            $menuss[$i] = $this->menusel($id);
            $i++;
        }
        $array = array_pop($menuss);
        $arr = array_unique($array);
        //var_dump($menuss);
        //var_dump($array);
        //var_dump($arr);
        //var_dump($menus);
        //exit;
        foreach ($arr as $value) {
            $menu['menu_id'] = $value;
            if($roleMenuModel->create($menu)){
                $result = $roleMenuModel->add();
            }
        }
        if($roleId && $result){
            $roleModel->commit();
            $this->success('角色添加成功！', 'getDate', 2);
        }else{
            $roleModel->rollback();
            $this->error('角色添加错误！', 'getDate', 2);
        }
    }

    public function menusel($id){
        $menu = M('privilege_menu');
        $menus['id'] = $id;
        static $menuss = array();
        $menuone = $menu->where($menus)->find();
        //var_dump($menuone);
        if($menuone['parent_id']){
            //echo 123;
            $this->menusel($menuone['parent_id']);
            $menuss[] = $menuone['id'];
            //var_dump($menuss);
            return $menuss;
        }else{
            $menuss[] = $menuone['id'];
            return $menuss;
        }
    }
    
    /**
     * 数据更新 
     *@access public
     *@return 返回更新结构
     */
    public function update()
    {
        $data = I('post.');
        //var_dump($data);exit;
        $roleModel = M('privilege_role');
        $roleMenuModel = M('privilege_role_menu');
        $roleModel->startTrans();
        if ($roleModel->create($data)) {
            $roleId = $roleModel->save();
        }
        $menu = array();
        $menu['role_id'] = $data['id'];
        $menus = explode(',',$data['menus']);
        $i=0;
        foreach ($menus as $val){
            $id = $val;
            $menuss[$i] = $this->menusel($id);
            $i++;
        }
        $array = array_pop($menuss);
        $arr = array_unique($array);
        $men = $roleMenuModel->where($menu)->select();
        if($men && $roleId){
            $del = $roleMenuModel->where($menu)->delete();
            foreach ($arr as $value) {
                $menu['menu_id'] = $value;
                    $result = $roleMenuModel->add($menu);
            }
            if($result && $del){
                $roleModel->commit();
                $this->success('角色修改成功！', 'getDate', 2);
            }else{
                $roleModel->rollback();
                $this->error('角色修改错误！', 'getDate', 2);
            }
        }elseif ($men && !$roleId){
            $del = $roleMenuModel->where($menu)->delete();
            foreach ($arr as $value) {
                $menu['menu_id'] = $value;
                $result = $roleMenuModel->add($menu);
            }
            if($del){
                $roleModel->commit();
                $this->success('角色修改成功！', 'getDate', 2);
            }else{
                $roleModel->rollback();
                $this->error('角色修改错误！', 'getDate', 2);
            }
        }else{
            foreach ($arr as $value) {
                $menu['menu_id'] = $value;
                if($roleMenuModel->create($menu)){
                    $result = $roleMenuModel->add();
                }
            }
            if($result){
                $roleModel->commit();
                $this->success('角色修改成功！', 'getDate', 2);
            }else{
                $roleModel->rollback();
                $this->error('角色修改错误！', 'getDate', 2);
            }
        }
    }

    public function delete(){
        $data = I('post.');
        $roleModel = M('privilege_role');
        $roleMenuModel = M('privilege_role_menu');
        $userRoleModel = M('privilege_user_role');
        $roleModel->startTrans();
        $roledata = $data['ids'];
        //dump($roledata);exit;
        
        //找到角色对应的用户id
       /*  $select =array();
        $sel = array(); */
        foreach($roledata as $value){
            $role['role_id'] = $value;
            $select = $userRoleModel->where($role)->select();
            $sel = $roleMenuModel->where($role)->select();
            
            //判断该角色是否拥有菜单和用户
            if($select && $sel){
                foreach ($roledata as $val){
                    $role['role_id'] = $val;
                    //首先进行中间表的删除
                    $delete = $userRoleModel->where($role)->delete();
                    $del = $roleMenuModel->where($role)->delete();
                    //dump($del);exit;
                }
                foreach ($roledata as $v){
                    $data['id'] = $v;
                    if($roleModel->create($data)){
                        $dele = $roleModel->where($data)->delete();
                    }
                    //dump($dele);exit;
                }
                if($delete && $del && dele){
                    $roleModel->commit();
                    $this->success('用户删除成功！', 'getDate', 2);
                }else{
                    $roleModel->rollback();
                    $this->error('用户删除错误！', 'getDate', 2);
                }
            }else if($select){
                foreach ($roledata as $val){
                    $role['role_id'] = $val;
                    $delete = $userRoleModel->where($role)->delete();
                }
                foreach ($roledata as $v){
                    $data['id'] = $v;
                    if($roleModel->create($data)){
                        $del = $roleModel->where($data)->delete();
                    }
                }
                if($delete && $del){
                    $roleModel->commit();
                    $this->success('角色删除成功！', 'getDate', 2);
                }else{
                    $roleModel->rollback();
                    $this->error('角色删除错误！', 'getDate', 2);
                }
            }elseif ($sel){
                foreach ($roledata as $val){
                    $role['role_id'] = $val;
                    $delete = $roleMenuModel->where($role)->delete();
                }
                foreach ($roledata as $v){
                    $data['id'] = $v;
                    if($roleModel->create($data)){
                        $del = $roleModel->where($data)->delete();
                    }
                }
                if($delete && $del){
                    $roleModel->commit();
                    $this->success('用户删除成功！', 'getDate', 2);
                }else{
                    $roleModel->rollback();
                    $this->error('用户删除错误！', 'getDate', 2);
                }
            }else {
                //dump('111');exit;
                foreach ($roledata as $v){
                    $data['id'] = $v;
                    if($roleModel->create($data)){
                        $del = $roleModel->where($data)->delete();
                    }
                    dump($del);exit;
                }
                if($del){
                    $roleModel->commit();
                    $this->success('用户删除成功！', 'getDate', 2);
                }else{
                    $roleModel->rollback();
                    $this->error('用户删除错误！', 'getDate', 2);
                }
            }
            
        }
        
        //dump($select);exit;
        //dump($sel);exit;
       
        
        
    }
}