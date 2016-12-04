<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    
    public function loginInput()
    {

        // $obj = new MenuController();

        // $obj = A('Menu');
        // $obj ->lists();
        // R('Menu/lists');
        $this->display();
    }

    public function verifyCodeImg()
    {
        $config = array(
            'imageW' => 120,
            'imageH' => 40,
            'fontSize' => 15,
            'length' => 4,
            'fontttf' => '4.ttf'
        );
        $obj = new \Think\Verify($config);
        $obj->entry();
    }

    public function login()
    {
        $obj = new \Think\Verify();
        // if ($obj->check(I('post.captcha', '', 'trim'))) {
        if (1) {
            $data['username'] = I('post.username');
            $data['password'] = md5(I('post.password'));

            $row = M('privilege_user')->where($data)->find();
			
           //echo  M('privilege_user')->getLastSql();exit;
            if ($row) {
                session('loginedUser', $row);
				
                         $emp=M('organization_employee');
							$emps = $emp->query("select id,position_id from tg_organization_employee where user_id = {$row['id']}");

							//var_dump($staffs);exit;
							if($emps){//如果这个用户对应能找到员工 那么将员工的id 员工部门id放到session中
								// $positionid = $emp[0]['position_id'];
								 //$empid = $emp[0]['id'];
								 //dump($emp);
								  //dump($empid);
								// exit;
								 session('positionid',$emps[0]['position_id']);
								 session('empId',$emps[0]['id']);
							}
							//dump(session());exit;
                //$this->redirect('Login/main');
                $this->redirect('Login/index');
            } else {
                $this->error('用户名或密码错误', U('loginInput'), 3);
            }
        } else {
            $this->error('验证码错误', U('loginInput'), 3);
        }

//         $this->redirect('Login/main');
        $this->redirect('Login/index');
    }


    public function main()
    {
        $id = session('loginedUser')['id'];
        $username= M('privilege_user')->where('id='.$id)->field('username')->select();

        if($username[0]['username'] == 'admin')
        {
            $sql = "select name , id , target_href , parent_id from tg_privilege_menu";
        }else
        {
            $sql = "select  DISTINCT t5.name as name , t5.id as id ,t5.target_href as target_href ,t5.parent_id as parent_id
                    from tg_privilege_user t1
                    LEFT JOIN tg_privilege_user_role t2 on t1.id=t2.user_id
                    LEFT JOIN tg_privilege_role t3 on t2.role_id=t3.id
                    LEFT JOIN tg_privilege_role_menu t4 on t3.id=t4.role_id
                    LEFT JOIN tg_privilege_menu t5 on t4.menu_id=t5.id
                    where t1.id = '{$id}'";
        }


        $menus=M("privilege_menu")->query($sql);

        //dump($menus);exit;

        $this->assign('menus',$menus);
        $this->assign('subMenus',$menus);
        $this->assign('subSubMenus',$menus);

        $this->assign('username',$username);
        
        $this->display();
    }

    public function header()
    {
        $this->display();
    }

    public function nav()
    {
        $id = session('loginedUser')['id'];

        $userModel = M('User');

        $sql = "select DISTINCT t5.name as name ,t5.target_href as target_href
        from t_user t1
        LEFT JOIN t_user_role t2 on t1.id=t2.user_id
        LEFT JOIN t_role t3 on t2.role_id=t3.id
        LEFT JOIN t_role_menu t4 on t3.id=t4.role_id
        LEFT JOIN t_menu t5 on t4.menu_id=t5.id
        where t1.id = '{$id}'";

        $menus = $userModel->query($sql);

        //var_dump($menus);exit;

        $this->assign('menus', $menus);
        $this->display();
    }

    public function welcome()
    {
        $this->display();
    }

    public function logout()
    {
        session(null); // 清空当前的session
        session('destroy'); // 销毁session 服务器回收sesion空间

        $this->redirect('Login/loginInput');
    }

    // 获取菜单
    public function getMenus()
    {

        // 当前登录用户
        $user = session('loginedUser');

        if ($user['username'] == 'admin') {
            $powerModel = M('privilege_menu');
            $ps = $powerModel->field('id , name as text,target_href href, parent_id as pid')
            ->order('id asc')
            ->select();
        } else {
            $ru = M('privilege_user_role');
            // 根据当前登录用户的角色获取所有动态菜单,去重复
            $ps = $ru->alias('tru')
            ->distinct('name')
            ->field('tp.id id,name text,target_href href,tp.parent_id pid')
            ->join('tg_privilege_role_menu tpr ON tpr.role_id=tru.role_id', 'left')
            ->join('tg_privilege_menu tp ON tp.id=tpr.menu_id', 'left')
            ->where("tru.user_id={$user['id']}")
            ->order('tp.id asc')
            ->select();
        }

        //         var_dump($ps);exit;

        $trees = array();
        foreach ($ps as $k => $fv) {
            //var_dump($fv['pid']);exit;
            $tree = array();
            if ($fv['pid'] == null) {
                $tree['id'] = $fv['id'];
                if ($fv['id'] == 1) {
                    $tree['homePage'] = '3';
                }
                $tree['menu'] = null;
                foreach ($ps as $k => $v) {
                    if ($v['pid'] == $fv['id']) {
                        $t['text'] = $v['text'];
                        $t['items'] = null;
                        foreach ($ps as $k => $va) {
                            if ($va['pid'] == $v['id']) {
                                // echo $v['id'];
                                $val['id'] = $va['id'];
                                $val['text'] = $va['text'];
                                $val['href'] = U($va['href']);
                                $t['items'][] = $val;
                            }
                        }
                        $tree['menu'][] = $t;
                    }
                }
                $trees[] = $tree;
            }
        }


        $trees = json_encode($trees);

        header("Content-type: application/json");

        echo $trees;
    }

    // 首页显示
    public function index()
    {
        $login = session('loginedUser');
        if($login){
            $id = I('id', 1);
            // 当前登录用户
            $user = session('loginedUser');
            
            if ($user['username'] == 'admin') {
                $powerModel = M('privilege_menu');
                $ps = $powerModel->field('id , name as text')
                ->where('parent_id is null')
                ->order('id asc')
                ->select();
            } else {
                $ru = M('privilege_user_role');
                // 根据当前登录用户的角色获取所有动态菜单,去重复
                $ps = $ru->alias('tru')
                ->distinct('name')
                ->field('tp.id id,name text')
                ->join('tg_privilege_role_menu tpr ON tpr.role_id=tru.role_id', 'left')
                ->join('tg_privilege_menu tp ON tp.id=tpr.menu_id', 'left')
                ->where("user_id={$user['id']} and parent_id is null")
                ->order('id asc')
                ->select();
            }
            
            //         var_dump($ps);exit;
            
            $this->assign('p', $ps);
            $this->display();
        }else{
            $this->redirect('Login/Logininput', array(), 3, '请先登录！');
            exit();
        }
        
    }
}