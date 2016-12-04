<?php
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller
{
    /*
     * 进入到每个模块的主界面 包括 searchForm grid Dialog等
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

    public function pageFun($recordcount , $model,$where='')
    {

        $page = new \Think\Page($recordcount, 16);

        $page->lastSuffix = false; // 最后一页是否显示总页数
        $page->rollPage = 4; // 分页栏每页显示的页数

        $page->setConfig('prev', '<input type="button" class="input-button-prev">');
        $page->setConfig('next', '<input type="button" class="input-button-next">');
        $page->setConfig('first', '【首页】');
        $page->setConfig('last', '【末页】');

        $page->setConfig('theme', '共 %TOTAL_ROW% 条记录,当前是 %NOW_PAGE%/%TOTAL_PAGE% %FIRST% %UP_PAGE%  %DOWN_PAGE% %END%');

        $startno = $page->firstRow; // 起始行数
        $pagesize = $page->listRows; // 页面大小

        $list = $model->limit("$startno,$pagesize")->where($where)->select();

        $pagestr = $page->show(); // 组装分页字符串

        $this->assign('pagestr', $pagestr);

        return $list;

    }
}
