<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    /*
     * 进入到首页
     */
    public function index()
    {
        $this->display();
    }

    public function __construct()
    {
        parent::__construct();
        $loginedUser = session('loginedUser');
        if(empty($loginedUser)){
            $this->redirect('Login/Logininput', array(), 3, '请先登录！');
            exit();
        }
    }
}
