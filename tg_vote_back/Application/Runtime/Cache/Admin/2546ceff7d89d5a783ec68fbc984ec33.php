<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>每日测试</title>
       <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
<style>
 input {
	 border-left: 0;
	 border-right: 0;
	 border-top: 0;
	 border-bottom: 1px solid #000000;
}
code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
</style>
<script language=JavaScript> 
window.onload= function(){
	
	maxtime = document.getElementById("tep_timelong").value * 60;
	if(maxtime==0){
		maxtime=1800;
	}
}  
//var maxtime = 1800 //一个小时，按秒计算，自己调整!   
function CountDown(){   
	if(maxtime>=0){   
	minutes = Math.floor(maxtime/60);   
	seconds = Math.floor(maxtime%60);   
	msg = "距离考试结束还有"+minutes+"分"+seconds+"秒";   
	document.all["timer"].innerHTML=msg;   
	--maxtime;   
	}   
	else{   
	clearInterval(timer);
	alert('时间到，请确认提交......');   
	setTimeout("document.form1.submit()",1000);  
	}   
}   
timer = setInterval("CountDown()",1000);  
 
</script>
</head>
<body>
<input type='hidden' id='tep_timelong' value="<?php echo ($row['tep_timelong']); ?>">
<div id="timer" style="color:red;position:fixed;left:700px;font-size:20px"></div>
<br>
     <?php echo ($sjsm); ?><br>
	<form action="/projects/tg_oa/src/tg_oa_crm/index.php/Admin/EvaluateDaily/add" method="post" name="form1">
	<input type='hidden' name='pager_id' value="<?php echo ($row['id']); ?>">
	<input type="hidden" name="student_id" value="<?php echo ($student_id); ?>"/>
	<input type="hidden" name="class_id" value="<?php echo ($_SESSION['loginedUser']['class_id']); ?>"/>
	<div class="container">
		<div class="detail-page">
			<h2><?php echo ($dxt); ?></h2>
			<?php if(is_array($single)): $i = 0; $__LIST__ = $single;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <?php echo ($dxda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($tkt); ?></h2><span style="color:green"><?php echo ($tktsm); ?></span>
			<?php if(is_array($completion)): $i = 0; $__LIST__ = $completion;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <?php echo ($tkda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($pdt); ?></h2><span style="color:green"><?php echo ($pdtsm); ?></span>
			<?php if(is_array($check)): $i = 0; $__LIST__ = $check;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <?php echo ($pdda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($cxt); ?></h2>
			<?php if(is_array($process)): $i = 0; $__LIST__ = $process;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <textarea name="answer[]" style="width:300px;height:80px";></textarea><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($jdt); ?></h2>
			<?php if(is_array($jianda)): $i = 0; $__LIST__ = $jianda;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <?php echo ($dxda); ?>：
					  		 <textarea name="answer[]" style="width:300px;height:80px";></textarea><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($htt); ?></h2>
			<?php if(is_array($paint)): $i = 0; $__LIST__ = $paint;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?> (<?php echo ($vo["tet_score"]); ?>分)<br>
					  		 <?php echo ($htta); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<input type="submit" value="提交">
	</form>
	  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/config-min.js"></script>
</body>

</html>