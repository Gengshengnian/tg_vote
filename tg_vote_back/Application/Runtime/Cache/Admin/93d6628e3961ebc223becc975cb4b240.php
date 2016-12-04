<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title>主观题显示</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
		
		
		<script src="/projects/tg_oa/src/tg_oa_crm/Public/js/jquery.js"></script>
   <style>
body{
	font-size:12pt;
     background:url(/projects/tg_oa/src/tg_oa_crm/Public/image/demo01.png);
     line-height:4;
}
   


  </style>
	</head>
	<body class="content-box" style = "text-align:left">

		<form action = "/projects/tg_oa/src/tg_oa_crm/index.php/Admin/EvaluateScores/subScores" method = "post">
			<input type="hidden" value="<?php echo ($shunxua); ?>"  id="shunxua">
			<input type="hidden" value="<?php echo ($shunxub); ?>"  id="shunxub">
			
			<span id = "jianda"></span>
			<h1><?php echo ($title1); ?></h1>
			<?php if(is_array($jianda)): $i = 0; $__LIST__ = $jianda;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type = "hidden" name = "tep_id" value = "<?php echo ($vo["pager_id"]); ?>"/>
				<input type = "hidden" name = "studentid" value = "<?php echo ($vo["student_id"]); ?>"/>

				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($i); ?><input type = "hidden" name = "tet_id[]" value = "<?php echo ($vo["title_id"]); ?>" />
				.<?php echo ($vo["tet_content"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;答：<?php echo ($vo["student_anwser"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "正确答案" id = "truanswer" onclick="answer(this)"/><span style="display:none" ><?php echo ($vo["tet_answer"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "解析" id = "analyze" onclick = "analyze(this)"/><span style="display:none"><?php echo ($vo["tet_analyze"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "分值" id = "grade" onclick = "grade(this)"/><span><?php echo ($vo["tet_score"]); ?>分</span>
				<div style = "text-align:right">
					得分：    
					<input type = "text"  class="input-large"  name = "grade[]" style = "width:50px" class = "score"  onblur = "pan(this)" value = "<?php echo ($vo["student_score"]); ?>" /><span style = "display:none"><?php echo ($vo["tet_score"]); ?></span>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>

			<h3><?php echo ($title2); ?></h3>
			<?php if(is_array($paint)): $i = 0; $__LIST__ = $paint;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type = "hidden" name = "tep_id" value = "<?php echo ($vo["pager_id"]); ?>"/>
				<input type = "hidden" name = "studentid" value = "<?php echo ($vo["student_id"]); ?>"/>

				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($i); ?><input type = "hidden" name = "tet_id[]" value = "<?php echo ($vo["title_id"]); ?>" />
				.<?php echo ($vo["tet_content"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;答：<?php echo ($vo["student_anwser"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "正确答案" id = "truanswer" onclick="answer(this)"/><span style="display:none" ><?php echo ($vo["tet_answer"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "解析" id = "analyze" onclick = "analyze(this)"/><span style="display:none"><?php echo ($vo["tet_analyze"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "分值" id = "grade" onclick = "grade(this)"/><span><?php echo ($vo["tet_score"]); ?>分</span>
				<div style = "text-align:right">
					得分：<input type = "text"  class="input-large"  name = "grade[]" style = "width:50px" class = "score"  onblur = "pan(this)" value = "<?php echo ($vo["student_score"]); ?>" /><span style = "display:none"><?php echo ($vo["tet_score"]); ?></span>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>

			<h1><?php echo ($title3); ?></h1>
			<?php if(is_array($process)): $i = 0; $__LIST__ = $process;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type = "hidden" name = "tep_id" value = "<?php echo ($vo["pager_id"]); ?>"/>
				<input type = "hidden" name = "studentid" value = "<?php echo ($vo["student_id"]); ?>"/>

				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($i); ?><input type = "hidden" name = "tet_id[]" value = "<?php echo ($vo["title_id"]); ?>" />
				.<?php echo ($vo["tet_content"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;答：<?php echo ($vo["student_anwser"]); ?><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" class='button button-info' value = "正确答案" id = "truanswer" onclick="answer(this)"/><span style="display:none" ><?php echo ($vo["tet_answer"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" class='button button-info' value = "解析" id = "analyze" onclick = "analyze(this)"/><span style="display:none"><?php echo ($vo["tet_analyze"]); ?></span><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" class='button' value = "分值" id = "grade" onclick = "grade(this)"/><span><?php echo ($vo["tet_score"]); ?>分</span>
				<div style = "text-align:right">
					得分：<input type = "text"  class="input-large"  name = "grade[]" style = "width:50px" class = "score"  onblur = "pan(this)" value = "<?php echo ($vo["student_score"]); ?>" /><span style = "display:none"><?php echo ($vo["tet_score"]); ?></span>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<input type = "submit"  class='button button-primary'value = "提交" id= 'cc' />
		</form>

		<script type="text/javascript">
			//打开主观题评分窗口
			$('#cc').click(
			function grade(){
				var score = $(".score");
				var a = parseInt(0);
				var zf = parseInt(0);
				for(var i=0 ; i<score.length ; i++){
					var a = parseInt(score.eq(i).val());
					zf = zf + a;
					zf = parseInt(zf);
				}
				var p = window.opener;
				var b = $("#shunxua").val();
				var c = $("#shunxub").val();
				
				if(b.length == 0){
					var m = c;
				}else{
					var m = b;
				}
				var pd = p.document.getElementById(m);
				pd.innerHTML = zf;
				//window.close();
			})

			//显示答案
			function answer(obj){

				 $(obj).next().toggle();
				 if($(obj).val() == "正确答案"){
					 $(obj).val("隐藏答案");
				 }else{
					 $(obj).val("正确答案");
				 }

			}

			//显示解析
			function analyze(obj){
				$(obj).next().toggle();
				 if($(obj).val() == "解析"){
					 $(obj).val("隐藏解析");
				 }else{
					 $(obj).val("解析");
				 }
			}

			//判分
			function pan(obj){
				
				//console.dir(obj);
				var a = $(obj).next().html();
				//alert(a);
				var b = $(obj).val();
				//alert(b);
				//alert(b<0);
				if(a<b || b<0){
					alert('您的评分不在分数线内，请重新评分');
				}
				

			}
		</script>
	</body>
</html>