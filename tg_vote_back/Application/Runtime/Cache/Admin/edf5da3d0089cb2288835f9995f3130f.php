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
						<h4>
							日期：<input type="date" name="date" value="<?php echo date('Y-m-d');?>" readonly />　　　
							学生姓名：<input type="text" name="name" value="<?php echo ($result[0]['student_name']); ?>" readonly />
							班级：<input type="text" name="class" value="<?php echo ($result[0]['class_name']); ?>" readonly />　　　
							座右铭：<input type="text" name="motto" value="<?php echo ($result[0]['motto']); ?>"/>
						</h4>
						<hr>
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
					<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td ><?php echo ($i); ?></td>
							<td ><?php echo ($vo["knowledge_name"]); ?></td>
							<td >
								掌握<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" <?php if($vo['master_level'] == '0'){ echo 'checked' ;} ?>  />
		            			一般<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>"  <?php if($vo['master_level'] == '1'){ echo 'checked' ;} ?>  />
		            			不理解<input type="radio" name="master_level_<?php echo ($vo["id"]); ?>" <?php if($vo['master_level'] == '2'){ echo 'checked' ;} ?> />
		            		</td>
		            		<td ><input type="text" name="problem_<?php echo ($vo["id"]); ?>" value="<?php echo ($vo['problem']); ?>"></td>
							<td ><input type="text" name="comment_<?php echo ($vo["id"]); ?>" value="<?php echo ($vo['comment']); ?>"></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					<tr><td colspan=5>心情杂语</td></tr>
					<tr><td colspan=5><textarea name="mood" cols="115" rows="3"><?php echo $vo['mood']; ?></textarea></td></tr>
					<tr><td colspan=5>建议意见</td></tr>
					<tr><td colspan=5><textarea name="advice" cols="115" rows="3"><?php echo $vo['advice']; ?></textarea></td></tr>
				</tbody>
				<tfoot></tfoot>
			</table>
		</form>
	</center>
</body>
</html>