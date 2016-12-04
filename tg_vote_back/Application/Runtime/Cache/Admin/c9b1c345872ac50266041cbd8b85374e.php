<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
  
  

   
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   .control-group{
	margin-top:10px;
   	
   }
   .button{
	 margin-top:10px;
   	
   }
   .table{
	
   }
  
   </style>
 </head>
 <body>
 
  <div id="content">
    
     <div class="detail-section"> 
          <center>
                   <h1><?php echo $cname;?> 课程表</h1>
                                                 
          </center> 
        <hr>
        <div class="detail-row">
          <table cellspacing="0" class="table table-head-bordered">
            <thead>
              <tr>
                <th>日期</th>
                <th>课程</th>
                <th>讲师</th>
              </tr>
            </thead>
            
            <tbody>
             
              <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["date"]); ?></td>
                    <td><?php echo ($vo["course_days_id"]); ?></td>
                    <td><?php echo ($vo["teacher_id"]); ?></td>
                 </tr><?php endforeach; endif; ?>

            </tbody>
          </table>           
        </div>
      </div>
  </div>
 

<body>
</html>