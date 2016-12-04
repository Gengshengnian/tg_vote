<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>学生信息详情页</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   
    <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
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
    <div class="detail-page">
      <h2>学生信息</h2>
      <div class="detail-section">  
        <h3>基本信息</h3>
        <div class="row detail-row">
          <div class="span5">
            <label>姓名：</label><span class="detail-text"><?php echo ($info['name']); ?></span>
          </div>
          <div class="span5">
            <label>编号：</label><span class="detail-text"><?php echo ($info['student_number']); ?></span>
          </div>
           <div class="span4">
            <label>性别：</label><span class="detail-text">
            	<?php if(($info['gender'] == 1)): ?>男<?php else: ?> 女<?php endif; ?></span>
          </div>
          <div class="span5">
            <label>身份证号码：</label><span class="detail-text"><?php echo ($info['idcard']); ?></span>
          </div>
          <div class="span5">
            <label>民族：</label><span class="detail-text"><?php echo ($info['nation']); ?></span>
          </div>
        </div>
        
        <div class="row detail-row">
          <div class="span6">
            <label>生日：</label><span class="detail-text"><?php echo ($info['birthday']); ?></span>
          </div>
          <div class="span6">
            <label>婚否：</label><span class="detail-text">
            <?php if(($info['married'] == 0)): ?>未婚
            	<?php elseif(($info['married'] == 1)): ?>已婚
            	<?php else: ?> 丧偶<?php endif; ?></span>
            </span>
          </div>
           <div class="span6">
            <label>政治面貌：</label><span class="detail-text">
            	<?php if(($info['politics_status'] == 0)): ?>群众
            	<?php elseif(($info['gender'] == 1)): ?>团员
            	<?php else: ?> 党员<?php endif; ?></span>
          </div>
          <div class="span6">
            <label>祖籍：</label><span class="detail-text"><?php echo ($info['cen_register']); ?></span>
          </div>
          
        </div>
        <div class="row detail-row">
          <div class="span6">
            <label>座机：</label><span class="detail-text"><?php echo ($info['f_tel']); ?></span>
          </div>
          <div class="span6">
            <label>手机号：</label><span class="detail-text"><?php echo ($info['phone']); ?></span>
          </div>
           <div class="span6">
            <label>QQ：</label><span class="detail-text">
            <?php echo ($info['qq']); ?>
            </span>
          </div>
          <div class="span6">
            <label>Email：</label><span class="detail-text"><?php echo ($info['email']); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span6">
            <label>紧急联系人：</label><span class="detail-text"><?php echo ($info['relation']); ?></span>
          </div>
          <div class="span6">
            <label>关系：</label><span class="detail-text"><?php echo ($info['phone']); ?></span>
          </div>
 
          <div class="span6">
            <label>联系电话：</label><span class="detail-text"><?php echo ($info['u_tel']); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span6">
            <label>班级：</label><span class="detail-text"><?php echo ($info['cname']); ?></span>
          </div>
          <div class="span6">
            <label>方向：</label><span class="detail-text"><?php echo ($info['dname']); ?></span>
          </div>
           <div class="span6">
            <label>地址：</label><span class="detail-text"><?php echo ($info['address']); ?></span>
          </div>
           
        </div>
        
      </div>
      <div class="detail-section"> 
        <h3>学校信息</h3>
        <div class="row detail-row">
        <div class="span6">
            <label>入学日期：</label><span class="detail-text"><?php echo ($info['gradution_time']); ?></span>
          </div>
          <div class="span6">
            <label>学校：</label><span class="detail-text"><?php echo ($info['school']); ?></span>
          </div>
          <div class="span6">
            <label>专业：</label><span class="detail-text"><?php echo ($info['major']); ?></span>
          </div>
          <div class="span6">
            <label>学历：</label><span class="detail-text"><?php echo ($info['education']); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>工作经历：</label><span class="detail-text"><?php echo ($info['work_exception']); ?></span>
          </div>
          
        </div>
      </div> 
      
    </div>
  </div>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/config-min.js"></script>
<body>
</html>