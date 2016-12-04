<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>
  
  <!--转班信息栏隐藏页面-->
  <div id="changeContent">
     <form id ="J_Form" class="form-horizontal"  action='/projects/tg_oa/src/tg_oa_crm/index.php/Admin/StudentsChange/add' method='post'>
	 <input name="stu_id" type="hidden" class="control-text" value='<?php echo ($res["id"]); ?>'>
	  <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="username" type="text" class="control-text" value='<?php echo ($res["name"]); ?>' readonly>
          </div>
        </div>
      </div>
	   <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>现在班级：</label>
          <div class="controls">
		   <input  type="text" class="control-text" value='<?php echo ($res["class_name"]); ?>' readonly>
          	 <input name="xclass_id" type="hidden" class="control-text" value='<?php echo ($res["class_id"]); ?>' readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
		 
          <label class="control-label"><s>*</s>转向班级：</label>
          <div class="controls">
          	<select name="wclass_id" id="class">
              <option value="0">请选择</option>
			  <?php if(is_array($class)): foreach($class as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
			</select>
          </div>
		  <div class="control-group span10">
          <label class="control-label"><s>*</s>分配项目组</label>
          <div class="controls">
			 <select name="teamid" id="team">
              <option value="0">请选择</option>
			 
			  </select>
          </div>
        </div>
		
      </div>
       
     
     </div>
	   <div class="row">
        <div class="control-group span10">
         
          <div class="controls">
           <input type='submit' value='修改提交'>
          
          </div>
        </div>
      </div>
      
    </form>
  </div>



  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
       $(document).ready(function(){
        $('#class').change(function(){
		     //alert($('#class').val());
			var classid = $('#class').val();
			console.log(classid);
			$.ajax({ 
			type:'POST',
			url: "/projects/tg_oa/src/tg_oa_crm/index.php/Admin/StudentsChange/getTeam", 
			data: 'id='+classid, 
			success: function(e){
               console.dir(e);
			   var len = e.length;
			   for(var i=0;i < len; i++ )
			{   
			   $('#team').append("<option value='"+e[i].id+"'>"+e[i].name+"</option>")
			  }
         }});
		})
});
  </script>

<script type="text/javascript"> 
  
  
</script>
<body>
</html>