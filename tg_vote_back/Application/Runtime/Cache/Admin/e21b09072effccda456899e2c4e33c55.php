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
 /*   #submit{
	position:absolute;
   	top:3px;
   	
   } */
  
   </style>
 </head>
 <body>
  <div class="content">
     <form id ="1form"  action='<?php echo U("course");?>' method='post' >
      <div class="row">
         <div class="control-group span8">
          <label class="control-label">班级：</label>
			<select  name="class_id" id='a'>
			 <option value="0">请选择</option>
			<?php if(is_array($res)): foreach($res as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
           </select>
        </div>
       <div class="control-group span8 ">
	       	<div class="">
	             <label>开班日期：</label><input type="text" id='date' readOnly="true" name='date' />
	       </div>
      </div>
     <div class="control-group span8 " id='submit'>
      	<div class="">
        <p><button class="button button-primary">确定生成</button></p>
        <p name='start'></p>
        </div>
     </div>
    </div>
    
</form>
    
<div class="detail-section"> 
        <center>
              <hr>
              <?php if(is_array($arr)): foreach($arr as $key=>$vo): echo ($vo["name1"]); endforeach; endif; ?> 
             <?php echo $cname;?>    课程表</h1> 
          </center> 
        <hr>
        <div class="detail-row">
          <table cellspacing="0" class="table table-head-bordered">
            <thead>
            <tr>
              <th>日期</th>
              <th>课程</th>
              <th>星期</th>
            </tr>
            </thead>
        <tbody>
         
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><tr>
              <td><?php echo ($vo["date"]); ?></td>
              <td><?php echo ($vo["name"]); ?></td>
              <td><?php echo ($vo["week"]); ?></td>
           </tr><?php endforeach; endif; ?>
         
            </tbody>
          </table>           
        </div>
      </div>
  </div>
  
  
  <script src="/tg_oa_crm_20161008/Public/js/jquery-1.4.4.min.js"></script>
 <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
  <script src="http://g.alicdn.com/bui/bui/1.1.21/config.js"></script>
 
<!-- script start --> 


<script>
$(document).ready(function(){
	$("#a").live("change",function(){
		 
		$.post('<?php echo U("date");?>',{class_id:$('#a').val()},
		  function(data){
			  if(data){
				  
				  //alert(data[0]['start']);
			    $('#date').val(data[0]['start']); 
			    
			  }
		 }		
		
		);
	});	
});

</script>

<body>
</html>