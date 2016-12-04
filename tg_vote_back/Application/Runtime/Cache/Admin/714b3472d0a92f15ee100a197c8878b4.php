<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教师日报</title>
	<!-- <link href="/projects/tg_oa/src/tg_oa_crm/Public/css/demo.css" rel="stylesheet"> -->
	<!-- <link href="/projects/tg_oa/src/tg_oa_crm/Public/public/bui/common/assets/js/jquery-2.0.3.js" rel="stylesheet"> -->

	<style>
		div{
			margin-top:20px;
		}
	</style>
</head>
<body>
	<center>
		<form action="<?php echo U('add');?>" method="POST">
			<table width="800" border="1" cellpadding="0" cellspacing="0">
				<caption>
						<h3>
							工作日报
						</h3>
						<hr>
						<h4>
							日期：<input type="date" name="date" value="<?php echo date('Y-m-d');?>" readonly />　
							教师姓名：<input type="text" name="name" value="<?php echo ($todayKnowkedges[0]['tname']); ?>" readonly />
							<input type="hidden" name="teacher_id" value="<?php echo ($todayKnowkedges[0]['teacher_id']); ?>" />
							<input type="hidden" name="class" value="<?php echo ($todayKnowkedges[0]['cid']); ?>"/>　　　
							座右铭：<input type="text" name="motto" value=""/>
						</h4>
					</caption>
				<thead>
					<tr>
						<th width="50">序号</th>
						<th width="250">今日内容</th>
						<th width="50">工时</th>
						<th width="200">工作完成情况</th>
						<th width="150">遇到问题</th>
						<th width="150">其他</th>
					</tr>
				</thead>
				<tbody>
					<tr><td colspan=6>今日总结</td></tr>
					<?php if(is_array($todayKnowkedges)): $i = 0; $__LIST__ = $todayKnowkedges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td ><?php echo ($i); ?></td>
							<td ><input type="hidden" name="kid[]" value="<?php echo ($vo["knid"]); ?>"/><?php echo ($vo["k"]); ?></td>
							<td ><input type="text" name="hour"/></td>
							<td >
								详细<input type="radio" checked="checked" name="master_level_<?php echo ($vo["id"]); ?>" value="0" />
		            			一般<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" value="1" />
		            			未讲<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" value="2" />
		            		</td>
		            		<td ><input type="text" name="problem_<?php echo ($vo["id"]); ?>" value="在这里写遇到的问题<?php echo ($i); ?>"></td>
							<td ><input type="text" name="comment_<?php echo ($vo["id"]); ?>" value=""></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr><td colspan=6>明日安排</td></tr>
					<?php if(is_array($tomorroWKnowkedges)): $i = 0; $__LIST__ = $tomorroWKnowkedges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td ><?php echo ($i); ?></td>
							<td colspan=5><?php echo ($vo["k"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr><td colspan=6>心情杂语</td></tr>
					<tr><td colspan=6><textarea name="mood" cols="115" rows="3"></textarea></td></tr>
					<tr><td colspan=6>建议意见</td></tr>
					<tr><td colspan=6><textarea name="advice" cols="115" rows="3"></textarea></td></tr>
					<tr align="right"><td colspan=6><input type="submit" value="提交日报"/></td></tr>
				</tbody>
				<tfoot></tfoot>
			</table>
		</form>
	</center>
</body>
</html>