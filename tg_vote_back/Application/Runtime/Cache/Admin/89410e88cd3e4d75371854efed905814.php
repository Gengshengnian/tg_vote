<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生日报</title>
	<!-- <link href="/tg_oa_crm_20161008/Public/css/demo.css" rel="stylesheet"> -->
	<!-- <link href="/tg_oa_crm_20161008/Public/public/bui/common/assets/js/jquery-2.0.3.js" rel="stylesheet"> -->

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
							学生姓名：<input type="text" name="name" value="<?php echo ($todayKnowkedges[0]['username']); ?>" readonly />
							<input type="hidden" name="stu_id" value="<?php echo ($todayKnowkedges[0]['student_id']); ?>" />
							班级：<input type="text" name="class" value="<?php echo ($todayKnowkedges[0]['name']); ?>" readonly />
							<input type="hidden" name="class" value="<?php echo ($todayKnowkedges[0]['cid']); ?>"/>　　　
							座右铭：<input type="text" name="motto" value=""/>
						</h4>
					</caption>
				<thead>
					<tr>
						<th width="50">序号</th>
						<th width="250">知识点</th>
						<th width="200">掌握情况</th>
						<th width="150">遇到问题</th>
						<th width="120">其他</th>
					</tr>
				</thead>
				<tbody>
					<tr><td colspan=5>今日总结</td></tr>
					<?php if(is_array($todayKnowkedges)): $i = 0; $__LIST__ = $todayKnowkedges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td ><?php echo ($i); ?></td>
							<td ><input type="hidden" name="kid[]" value="<?php echo ($vo["knid"]); ?>"/><?php echo ($vo["k"]); ?></td>
							<td >
								掌握<input type="radio" checked="checked" name="master_level_<?php echo ($vo["id"]); ?>" value="0" />
		            			一般<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" value="1" />
		            			不理解<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" value="2" />
		            		</td>
		            		<td ><input type="text" name="problem_<?php echo ($vo["id"]); ?>" value="在这里写遇到的问题<?php echo ($i); ?>"></td>
							<td ><input type="text" name="comment_<?php echo ($vo["id"]); ?>" value=""></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr><td colspan=5>明日任务</td></tr>
					<?php if(is_array($tomorroWKnowkedges)): $i = 0; $__LIST__ = $tomorroWKnowkedges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td ><?php echo ($i); ?></td>
							<td colspan=4><?php echo ($vo["k"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr><td colspan=5>心情杂语</td></tr>
					<tr><td colspan=5><textarea name="mood" cols="115" rows="3"></textarea></td></tr>
					<tr><td colspan=5>建议意见</td></tr>
					<tr><td colspan=5><textarea name="advice" cols="115" rows="3"></textarea></td></tr>
					<tr align="right"><td colspan=5><input type="submit" value="提交日报"/></td></tr>
				</tbody>
				<tfoot></tfoot>
			</table>
		</form>
	</center>
</body>
</html>