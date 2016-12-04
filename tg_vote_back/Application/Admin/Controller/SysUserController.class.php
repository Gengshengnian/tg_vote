<?php
namespace Admin\Controller;

class SysUserController extends AdminController
{
    protected  $user;

    public function __construct(){
        parent::__construct();
        $this->user=M('privilege_user');
    }

    public function index()
    {

        $roleModel = M("privilege_role");

        $roles = $roleModel->field("id,name")->select();

        $bindRoles = $roleModel->query('SELECT t1.id,t1.username,GROUP_CONCAT(t2.role_id) as role_ids from tg_privilege_user t1
	LEFT JOIN tg_privilege_user_role t2 on t1.id = t2.user_id
	 GROUP BY t1.id');

        //dump($bindRoles);exit;

        $this->assign('roles', $roles);
        $this->display('SystemManage/User/index');
    }

    /**
     * 数据查询
     * @access public
     * @return json文件（echo输出）
     */
    public function getData(){
        //分页数据
        $page = I('pageIndex',0);
        $rows = I('limit',10);

        //搜索框数据
        $search['username']=I('username','');
        $search['status']=I('status','');

        $condition=array();//where条件接收
        /*
         * 条件判断
         * 1、判断username是否有输入
         * 2、判断状态是否有输入
         */
        if(!empty($search['username'])){
            $condition['username']=array('like','%'.$search['username'].'%');
        }
        if(!empty($search['status'])){
            $condition['status']=($search['status']==1) ? 1:0;

        } 
        //分页
        $offset = $page*$rows;

        $users = $this->user->alias('user')->field('user.*,tr.id roles')
        ->join('left join tg_privilege_user_role tur ON tur.user_id=user.id')
        ->join('left join tg_privilege_role tr ON tr.id=tur.role_id')
        ->where($condition)->limit($offset,$rows)->select();
        
        
        /*
         * 获取到每一个用户的所有角色
         *   */
        
        /* $roles = $this->user->alias('user')->field('user.*,tr.id roles')
        ->join('left join tg_privilege_user_role tur ON tur.user_id=user.id')
        ->join('left join tg_privilege_role tr ON tr.id=tur.role_id')
        ->select();
        
        $arr_role = array(); */
        //遍历所有数据，使所有uid相同的数据进行追加到同一个字符串中
        /* foreach ($roles as $k=>$v){
            $str='';
            foreach ($roles as $ks=>$vs){
                if($v['id']==$vs['id']){
                    $str.=$vs['roles'].',';
                }
            }
            $str=trim($str,',');
            $arr_role[$v['id']]=$str;
        }
        dump($arr_role);exit; */
        //将所得到的数组放到查询到的users中，然后encode以后从页面拿值
        
        /* foreach ($users as $k=>$v){
            foreach($arr_role as $ks=>$vs){
                if($v['id']==$ks){
                    $roles[$k]['roles']=$vs;
                }
            }
        }
        */
        //dump($users);exit; 
        
        $total = $this->user->where($condition)->count();

        $json = json_encode($users);
        $json =  '{"rows":'.$json.',"results":' .$total.'}';
        echo $json;
    }

    public function addinput(){
        $users = M('privilege_role');

        $roles = $users->field('name text,id value')->select();

        $json = json_encode($roles);

        echo $json;
    }
   
    /**
     * 数据插入
     *@access public
     *@return 插入结果
     */
    public function add()
    {
        $data = I('post.');
        // 1 先增加user
        $userModel = M('privilege_user');
       // $userRoleModel = M('privilege_user_role');
        $userModel->startTrans();
        $data['password'] = md5($data['password']);
        if ($userModel->create($data)) {
            $userId = $userModel->add();

        }
        // 2 给用户分配角色
        /* $role = array();
        $role['user_id'] = $userId;
        $roles = explode(',',$data['roles']);
        $del = $userRoleModel->where($role)->delete();
        foreach ($roles as $value) {
            $role['role_id'] = $value;
            if($userRoleModel->create($role)){
                $result = $userRoleModel->add();
            }
        } */
        if($userId){
            $userModel->commit();
            $this->success('用户添加成功！', 'getDate', 2);
        }else{
            $userModel->rollback();
            $this->error('用户添加错误！', 'getDate', 2);
        }
    }


    /**
     * 给用户绑定角色
     *@access public
     *
     */
    public function bind_roles()
    {
        $data = I('post.');
        //var_dump($data);exit;

        $userRoleModel = M('privilege_user_role');

        //把原来给用户绑定的角色 解除掉(或者可以借助 抛出异常之后捕获 之后 continue)
        $role = array();
        $role['user_id'] = $data['user_id'];
        $del = $userRoleModel->where($role)->delete();


        $roles = explode(',',$data['role_ids']);

        unset($roles[0]);

        foreach ($roles as $value) {
            $role['role_id'] = $value;
            if($userRoleModel->create($role)){
                $result = $userRoleModel->add();
            }
        }

        if($result){
            $this->success('绑定 角色成功！', 'getDate', 2);
        }else{
            $this->error('绑定 角色错误！', 'getDate', 2);
        }
    }


    /**
     * 数据更新
     *@access public
     *@return 更新结果
     */
    public function update()
    {
        $data = I('post.');
        $userModel = M('privilege_user');
        /* $userRoleModel = M('privilege_user_role');
        $employee = M('organization_employee'); */ 
        $userModel->startTrans();
        $usersel['id'] = $data['id'];
        $sel = $userModel->where($usersel)->find();
        if($sel['password'] == $data['password']){
            $data['password'] = $data['password'];
        }else{
            $data['password'] = md5($data['password']);
        }
        //dump($data);
        if ($userModel->create($data)) {
            $userId = $userModel->save();

        }
        if($userId){
            $userModel->commit();
            $this->success('用户修改成功！', 'getDate', 2);
        }else {
            $userModel->rollback();
            $this->error('用户修改错误！', 'getDate', 2);
        }
       /*  $empsel['user_id'] = $data['id'];
        $empdata = $employee->where($empsel)->find();
        if($empdata){
            $empdata['status'] = $data['status'];
            $empsave = $employee->where($empsel)->save($empdata);
            if($empsave){
                // 2 给用户分配角色
                $role = array();
                $role['user_id'] = $data['id'];
                $roles = explode(',',$data['roles']);
                $rol = $userRoleModel->where($role)->select();
                if($rol && $userId){
                    $del = $userRoleModel->where($role)->delete();
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($empsave && $userId && $result && $del){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }elseif ($rol && !$userId){
                    $del = $userRoleModel->where($role)->delete();
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($empsave && $result && $del){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }elseif(!$rol && $userId){
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($empsave && $userId && $result){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }else{
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($empsave && $result){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }
            }else{
                // 2 给用户分配角色
                $role = array();
                $role['user_id'] = $data['id'];
                $roles = explode(',',$data['roles']);
                $rol = $userRoleModel->where($role)->select();
                if($rol && $userId){
                    $del = $userRoleModel->where($role)->delete();
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($userId && $result && $del){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }elseif ($rol && !$userId){
                    $del = $userRoleModel->where($role)->delete();
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($result && $del){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }elseif(!$rol && $userId){
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($userId && $result){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }else{
                    foreach ($roles as $value) {
                        $role['role_id'] = $value;
                        if($userRoleModel->create($role)){
                            $result = $userRoleModel->add();
                        }
                    }
                    if($result){
                        $userModel->commit();
                        $this->success('用户修改成功！', 'getDate', 2);
                    }else{
                        $userModel->rollback();
                        $this->error('用户修改错误！', 'getDate', 2);
                    }
                }
            }

        }else{
            // 2 给用户分配角色
            $role = array();
            $role['user_id'] = $data['id'];
            $roles = explode(',',$data['roles']);
            $rol = $userRoleModel->where($role)->select();
            if($rol && $userId){
                $del = $userRoleModel->where($role)->delete();
                foreach ($roles as $value) {
                    $role['role_id'] = $value;
                    if($userRoleModel->create($role)){
                        $result = $userRoleModel->add();
                    }
                }
                if($userId && $result && $del){
                    $userModel->commit();
                    $this->success('用户修改成功！', 'getDate', 2);
                }else{
                    $userModel->rollback();
                    $this->error('用户修改错误！', 'getDate', 2);
                }
            }elseif ($rol && !$userId){
                $del = $userRoleModel->where($role)->delete();
                foreach ($roles as $value) {
                    $role['role_id'] = $value;
                    if($userRoleModel->create($role)){
                        $result = $userRoleModel->add();
                    }
                }
                if($result && $del){
                    $userModel->commit();
                    $this->success('用户修改成功！', 'getDate', 2);
                }else{
                    $userModel->rollback();
                    $this->error('用户修改错误！', 'getDate', 2);
                }
            }elseif(!$rol && $userId){
                foreach ($roles as $value) {
                    $role['role_id'] = $value;
                    if($userRoleModel->create($role)){
                        $result = $userRoleModel->add();
                    }
                }
                if($userId && $result){
                    $userModel->commit();
                    $this->success('用户修改成功！', 'getDate', 2);
                }else{
                    $userModel->rollback();
                    $this->error('用户修改错误！', 'getDate', 2);
                }
            }else{
                foreach ($roles as $value) {
                    $role['role_id'] = $value;
                    if($userRoleModel->create($role)){
                        $result = $userRoleModel->add();
                    }
                }
                if($result){
                    $userModel->commit();
                    $this->success('用户修改成功！', 'getDate', 2);
                }else{
                    $userModel->rollback();
                    $this->error('用户修改错误！', 'getDate', 2);
                }
            }
        } */
    }

    public function delete()
    {
        $data = I('post.');
        //dump($data);exit;
        $userModel = M('privilege_user');
        $userRoleModel = M('privilege_user_role');
        $employee = M('organization_employee');
        $userModel->startTrans();
        $userdata = $data['ids'];
        $datauser = $data['ids'];
        //var_dump($data);exit;
        $select =array();
        foreach($datauser as $value){
            $role['user_id'] = $value;
            $select[] = $userRoleModel->where($role)->select();
        }
       // var_dump($select);exit;
        
      //判断用户是否有角色
      foreach ($select as $k=>$v){
         
         //判断用户是否有角色
          if($v){
           //dump('s');exit;
           
           //解除用户角色表的关系
           foreach ($datauser as $val){
               $role['user_id'] = $val;
               $delete = $userRoleModel->where($role)->delete();
           }
           //var_dump($datauser);exit;
              
           //将用户为职员的状态改为0
           foreach ($userdata as $valu){
              //首先进行判断用户是否是职员
              $data['user_id'] = $valu;
              $empsel = $employee->where($data)->find();
              //dump($empsel);exit;
              if($empsel){
                 //dump($empsel['status']);exit;
                 $empsel['status'] = '0';
                 $emp = $employee->where($data)->save($empsel);
                 //dump($emp);exit;
              }
           }
              
           //将普通用户的状态修改为0
           foreach ($userdata as $v){
             $data['id'] = $v;
             $usersel['id'] = $data['id'];
             $data['status'] = '0';
             $sel = $userModel->where($usersel)->find();
             if($sel['password'] == $data['password']){
               $data['password'] = $data['password'];
             }else{
               $data['password'] = md5($data['password']);
             }
             if ($userModel->create($data)) {
                $userId = $userModel->save($data);
             }
           }
           if($emp || $userId){
              
              $userModel->commit();
              $this->success('用户删除成功！', 'getDate', 2);
           }else{
              $userModel->rollback();
              echo 123;
              $this->error('用户删除错误！', 'getDate', 2);
            }
        }else{
            
            foreach($userdata as $valu){
              $data['user_id'] = $valu;
              $empsel = $employee->where($data)->find();
              $empsel['status'] = '0';
              $emp = $employee->where($data)->save($empsel);
              //var_dump($emp);exit;
              
            }
        //将普通用户的状态修改为0
           foreach ($userdata as $v){
             $data['id'] = $v;
             $usersel['id'] = $data['id'];
             $data['status'] = '0';
             $sel = $userModel->where($usersel)->find();
             if($sel['password'] == $data['password']){
               $data['password'] = $data['password'];
             }else{
               $data['password'] = md5($data['password']);
             }
             if ($userModel->create($data)) {
                $userId = $userModel->save($data);
             }
             //dump($userId);exit;
           } 
           
             if($emp || $userId){
                 echo '111';
                 $userModel->commit();
                 $this->success('用户删除成功！', 'getDate', 2);
             }else{
                 $userModel->rollback();
                 $this->error('用户删除错误！', 'getDate', 2);
             }
         }
          
      }
    
   }



    public function _empty()
    {
        echo '请求的操作不存在!';
    }
}