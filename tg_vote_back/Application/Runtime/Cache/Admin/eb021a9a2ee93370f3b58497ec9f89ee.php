<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<div>
  <a href="<?php echo U('CrmClient/downloads');?>">下载模板</a>
  <hr>
  <form action="<?php echo U('CrmClient/importFile');?>" method="post" enctype="multipart/form-data">
		<input type="file" name='file'/>
		<input type="submit" value='导入'/>
  </form>
  </div>
</body>
</html>