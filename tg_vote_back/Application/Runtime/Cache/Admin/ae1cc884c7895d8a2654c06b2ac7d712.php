<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="/tg_oa_crm_20161008/Public/js/jquery.js"></script>
</head>
<body>

	
	
	<br/>
	<br/>
	<span  style="color:red;">配置试题难度时候，易中难之和要为10哦</span><br><br>
	<span>试题班级：<?php echo ($className); ?>班级</span><br><br>

	<form action="/tg_oa_crm_20161008/index.php/Admin/AutoGeneratePaper/index/action/generatepaper" method = 'post'>
        
        <table border=1 width="60%" cellpadding="0" cellspacing="0">
			<thead></thead>
			<tbody>
				<tr>
					<td>题目数量</td>
					<td>
						单选<input type="text" name="" size="3" value="8"> 
						多选<input type="text" name="" size="3" value="0">
						填空<input type="text" name="" size="3" value="5">
						判断<input type="text" name="" size="3" value="5">
						简答<input type="text" name="" size="3" value="2">
						画图<input type="text" name="" size="3" value="1">
						程序<input type="text" name="" size="3" value="1">
					</td>
				</tr>
				<tr>
					<td>难度配比</td>
					<td>
						简单<input type="" name="one" size="3" value="3"> 
						中等<input type="" name="two" size="3" value="5">
						难<input type="" name="three" size="3" value="2">
					</td>
				</tr>
				<tr>
					<td>试卷类型</td>
					<td>
						每日试卷<input type="radio" name="papercate" size="3" value="day" checked=""> 
						课程试卷<input type="radio" name="papercate" size="3" value="course">
						阶段试卷<input type="radio" name="papercate" size="3" value="stage">
					</td>
				</tr>
			</tbody>
			<tfoot></tfoot>
		</table>
        	
       	<input type="submit" value="组卷"/>		

	</form>

</body>
</html>