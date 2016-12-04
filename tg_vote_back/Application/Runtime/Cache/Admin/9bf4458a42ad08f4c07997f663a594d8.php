<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/projects/tg_oa/src/tg_oa_crm/Public/common/common.css">
	<script src="/projects/tg_oa/src/tg_oa_crm/Public/js/jquery.js"></script>
	<script src="/projects/tg_oa/src/tg_oa_crm/Public/js/table+.js"></script>
	<style>
	.btn-group{
		width: 60px;
	    height: 30px;
	    font-weight: bold;
	    line-height: 30px;
	    border: 1px solid #50BFFC;
	    -moz-box-shadow: inset 2px 1px 5px #50BFFC;
	    -webkit-box-shadow: inset 2px 1px 5px #50BFFC;
	    -o-box-shadow: inset 2px 1px 5px #50BFFC;
	    box-shadow: inset 2px 1px 5px #50BFFC;
	    background: #5FBFF5;
	    border-radius: 3px;
	    color: #fff;
		width:80px;
	}
	</style>

</head>
<body class="content-box">
     
<!-- -----表格部分复制开始--------- -->
    <div class="content">
      	<div class="">CTO评分</div>
      	<div class="header-content">
	      	 <!-- 表格部分 开始-->
	      	 <div class="table-content">
	      	 	<table class="table text-l">
		      	 	<!-- 表头部分 结束-->
		  	 		<tr class="table-header">
						<th data-role="bh">学生学号</th>
						<th data-role="nd">学生姓名</th>
						<th data-role="tm">试卷编号</th>
						<th data-role="zsd">评分</th>
						<th data-role = "zsd">操作</th>
						
					</tr>
			      	 	
					<!-- 表头部分 结束-->
		      	 	
		      	 	<?php if(is_array($student)): $i = 0; $__LIST__ = $student;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i; if(is_array($d)): foreach($d as $key=>$stu): ?><tr>	
								<td><?php echo ($stu["student_number"]); ?></td>
								<td><?php echo ($stu["name"]); ?></td>
									
								<td><?php echo ($stu["tep_code"]); ?></td>
	
								<td id = '<?php echo ($i); ?>'><?php echo ($stu["tes_sub"]); ?></td>
							  
								<td>
								<a href = "javascript:void(0);" onclick = "window.open('/projects/tg_oa/src/tg_oa_crm/index.php/Admin/EvaluateScores/subShow/id/<?php echo ($stu["id"]); ?>/tepid/<?php echo ($stu["tep_id"]); ?>/void/<?php echo ($i); ?>','主观题','width=800px,height=600px,scrollbars=yes')">
								   
									<input type = "submit" class = "btn-group"   style='background-color:#3872f0' value = "查看主观题"/>
									</a>
								</td>
								 
							</tr><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>
				</table>
      	</div>
    </div>
<!-- -----表格部分复制结束--------- -->
      </div>



      <!-- 弹窗 页面-->
      <div class="alert-box header">
      	 <div class="header-title">弹出窗口</div>
      	 <div class="header-content">
      	 	<!--content 在此-->
      	 	<table class="tables text-l">
      	 	<!--内容 js读写-->
			</table>
      	 </div>
      	 <div class="alert-btn">
      	 	<!--
      	 		button 在此
      	 		urls ajax 提交后台地址
      	 	-->
      	 	<input type="button" class="input-button-yes" value="确定">
			<input type="button" class="input-button-no" value="取消">
	
      	 </div>	 
    	</div>
    	
</body>
</html>