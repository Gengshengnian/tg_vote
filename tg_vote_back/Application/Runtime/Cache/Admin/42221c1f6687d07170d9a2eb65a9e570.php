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

</head>
<body>
<div id="timer" style="color:red;position:fixed;left:700px;font-size:20px"></div>
<br>
     <?php echo ($sjsm); ?><br>
	<form action="/projects/tg_oa/src/tg_oa_crm/index.php/Admin/DayPaper/add" method="post" name="form1">
	<div class="container">
		<div class="detail-page">
			<h2><?php echo ($dxt); ?></h2>
			<?php if(is_array($single)): $i = 0; $__LIST__ = $single;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?><br>
					  		 <?php echo ($dxda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($tkt); ?></h2><span style="color:green"><?php echo ($tktsm); ?></span></h5>
			<?php if(is_array($completion)): $i = 0; $__LIST__ = $completion;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?><br>
					  		 <?php echo ($tkda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($pdt); ?></h2><span style="color:green"><?php echo ($pdtsm); ?></span></h5>
			<?php if(is_array($check)): $i = 0; $__LIST__ = $check;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?><br>
					  		 <?php echo ($pdda); ?>：<input type="text" name="answer[]" value=""><br><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="detail-page">
			<h2><?php echo ($jdt); ?></h2><?php echo ($jdsmk); ?>
			<?php if(is_array($jianda)): $i = 0; $__LIST__ = $jianda;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="detail-section">  
					<div class="row detail-row">
						<div class="span24">
							<?php echo ($i); ?><input type="hidden" name="tet_id[]" value="<?php echo ($vo["title_id"]); ?>">
							<input type="hidden" name="pager_title_id[]" value="<?php echo ($vo["pager_title_id"]); ?>">
					  		 .<?php echo ($vo["tet_content"]); ?><br>
					  		 <textarea name="answer[]" style="width:300px;height:80px";></textarea><br>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	
	</form>
	  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/config-min.js"></script>
</body>
<script>
function stop(){

return false;

}

document.oncontextmenu=stop;


</script>
</html>