<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8"/>


</head>
<body>
<script>
alert('您客观题得分为：'+<?php echo ($objscore); ?>);
</script>
<span>您客观题的分：</span>
<span style="color:red;"><?php echo ($objscore); ?></span><br/>
<span>您主观题得分：</span>
<span style="color:orange;">正在批阅中</span>
</body>

</html>