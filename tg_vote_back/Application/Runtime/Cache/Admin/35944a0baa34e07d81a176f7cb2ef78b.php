<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>


  <div class="container">
   <form action="/projects/tg_oa/src/tg_oa_crm/index.php/Admin/MenuRecover/upload" enctype="multipart/form-data" method="post">
        <input type='file' name='file' style='width:300px;height:30px;'>
		<input type='submit' value='上传'  style='width:300px;height:30px;'>
   </form>

  </div>
  <br>
  <br>
  <br>
  <br>
  <a href='/projects/tg_oa/src/tg_oa_crm/index.php/Admin/MenuRecover/recovery'  style="display:inline-block;width:200px;height:30px;border:1px solid black;text-align:center;background:url('/projects/tg_oa/src/tg_oa_crm/Public/image/huifu.png');line-height:30px;
  color:20px;">开始恢复</a>
  <br>
  <br>
  <br>
  <div><span></span></div>
   <a href='/projects/tg_oa/src/tg_oa_crm/index.php/Admin/MenuRecover/recovery'  style="display:inline-block;width:200px;height:30px;border:1px solid black;text-align:center;background:url('/projects/tg_oa/src/tg_oa_crm/Public/image/huifu.png');line-height:30px;
  color:20px;">数据库恢复</a>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>
<script type="text/javascript">
 
</script>

<body>
</html>