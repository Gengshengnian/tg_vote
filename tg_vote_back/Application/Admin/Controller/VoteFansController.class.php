<?php
namespace Admin\Controller;

use Think\Controller;

class VoteFansController extends Controller
{
    
    public function FansIndex()
    {

        $this->display();
    }
    public function getData()
    {
      $fans = M ('fans_fans');
      $page = I('pageIndex',0);
      $rows = I('limit',10);
      $offset = $page*$rows;
      $search['fans_name'] = I('post.fans_name','');
      $search['register_time'] = I('post.register_time','');
      $wheres = array();
      if(!empty($search['fans_name'])){            //搜索
          $wheres['fans_name'] = array('like' ,'%'.$search['fans_name'].'%' );
      }
      if(!empty($search['register_time'])){
          $wheres['register_time'] = array('like' ,'%'.$search['register_time'].'%' );
      }
      $list=$fans->where($wheres)->select();
     // echo $fans ->getLastSql();exit;
      $count =  $fans->count();
      $jsonStr=json_encode($list);       
      $json='{"rows":'.$jsonStr.',"results":'.$count.'}';     
      echo $json;      
    }
     public function add(){
       $data = I('post.');
       // var_dump($data);exit;
       $fans=M('fans_fans');
      if($fans->create($data)){
            $list=$fans->add();
        }
        // echo $fans ->getLastSql();exit;
       if ($list) {
            $this->success('添加成功！');        
       }else{
            $this->error('添加错误！');
       }
     }
     public function delete()
     {
      $data = I('post.ids');
     // var_dump($data);exit;
      $id=$data[0];
      $fans=M('fans_fans');
     // var_dump($id);exit;
      $list=$fans->where('id='.$id)->delete();
        // echo $fans->_sql();exit;
        // echo $fans ->getLastSql();exit;
       if ($list) {
            $this->success('添加成功！');         
       }else{
            $this->error('添加错误！');
       }
     }
     public function update()
     {
      $data=I('post');
      $fans=M('fans_fans');
      if($fans->create($data)){
            $list = $fans->save();
      }
      if($list){
          $this->success('修改成功！');
      }else{
          $this->error('修改错误！');
      }
    }
    function exportClientData(){
      import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        import("Org.Util.PHPExcel.Writer.Excel5.php");
        //import("Org.Util.PHPExcel_Shared_Date");

        //1 把要导出的内容放到表格
        //新建
        $resultPHPExcel = new \PHPExcel();
        //设置参数
        //设值
        $resultPHPExcel->getActiveSheet()->setCellValue('A1', '编号');
        $resultPHPExcel->getActiveSheet()->setCellValue('B1', '粉丝姓名');
        $resultPHPExcel->getActiveSheet()->setCellValue('C1', '联系电话');
        $resultPHPExcel->getActiveSheet()->setCellValue('D1', '注册时间');
        $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'open_id');
        $resultPHPExcel->getActiveSheet()->setCellValue('F1', '所投参赛者');      
        $client = M('fans_fans');
        $data = $client->alias('t1')
             ->join('RIGHT JOIN tg_vote_voterecord t2 on t2.fans_id=t1.id')
             ->join('LEFT JOIN tg_vote_activity_player t3 on t3.id=t2.activity_player_id')
             ->join('LEFT JOIN tg_fans_player t4 on t4.id=t3.player_id')
                        
            ->field('t1.id,
                      t1.open_id,
                      t1.qq,
                      t1.tel,
                      t1.register_time,
                      t1.fans_name,
                      t4.player_name')
            /* ->where($where) */
            ->group('t1.id')
            ->select(); 
           // echo $client->_sql();exit; 
        $i = 2;
        foreach($data as $item){
            $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['id']);
            $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['fans_name']);
            $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['tel']);
            $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['register_time']);
            $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['open_id']);
            $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['player_name']);            
            $i ++;
        }

        //2 设置导出参数
        //设置导出文件名
        $outputFileName = '粉丝信息.xls';
        $xlsWriter = new \PHPExcel_Writer_Excel5($resultPHPExcel);
        //ob_start(); ob_flush();
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$outputFileName.'"');
        header("Content-Transfer-Encoding: binary");
        // header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $xlsWriter->save( "php://output" );
     }     
}
