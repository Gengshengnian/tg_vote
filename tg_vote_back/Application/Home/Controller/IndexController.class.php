<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        
     $activityModel = M('vote_activity') ;
     
     $data = $activityModel -> where('status=1') -> select() ;
     
     $this -> assign('data' , $data) ;
      
	 $this -> display() ;
    }
    
    public function theme()
    {
        $activityModel = M('vote_activity') ;
        
        $data = $activityModel
        
                ->query('SELECT
                            t1.* ,
                            t2.rule_content
                            FROM
                            	tg_vote_activity t1
                            LEFT JOIN tg_vote_rule t2 ON t1.rule_id = t2.id
                            where t1.status = 1' ) ;
        
        $this -> assign('data' , $data) ;
        
        $this -> display('index/theme') ;
    }
    
    public function award()
    {
        $activityModel = M('vote_activity') ;
        
   
       
        
        $this -> assign('data' , $data) ;
        
        $this -> display('index/award') ;
    }



}