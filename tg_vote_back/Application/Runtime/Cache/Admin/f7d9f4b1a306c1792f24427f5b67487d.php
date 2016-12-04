<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title> 详情页</title>
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
    <div class="detail-page">
      <div class="detail-section">
        <h3>基本信息</h3>
        <div class="row detail-row">
          <div class="span8">
            <label>姓名：</label><span class="detail-text"><?php echo ($client["name"]); ?></span>
          </div>
          <div class="span8">
            <label>来源途径：</label><span class="detail-text"><?php echo ($client["way"]); ?></span>
          </div>
           <div class="span8">
            <label>意向课程：</label><span class="detail-text"><?php echo ($client["course"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>电话：</label><span class="detail-text"><?php echo ($client["tel"]); ?></span>
          </div>
          <div class="span8">
            <label>QQ：</label><span class="detail-text"><?php echo ($client["qq"]); ?></span>
          </div>
           <div class="span8">
            <label>微信：</label><span class="detail-text"><?php echo ($client["weixin"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>目前状态：</label><span class="detail-text"><?php echo ($client["state"]); ?></span>
          </div>
          <div class="span8">
            <label>性别：</label><span class="detail-text"><?php echo ($client["gender"]); ?></span>
          </div>
           <div class="span8">
            <label>出生日期：</label><span class="detail-text"><?php echo ($client["birthday"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>学历：</label><span class="detail-text"><?php echo ($client["degree"]); ?></span>
          </div>
          <div class="span8">
            <label>录入时间：</label><span class="detail-text"><?php echo ($client["entrytime"]); ?></span>
          </div>
           <div class="span8">
            <label>录入人：</label><span class="detail-text"><?php echo ($client["entrymen"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>下次跟进时间：</label><span class="detail-text"></span>
          </div>
          <div class="span8">
            <label>下次跟进方式：</label><span class="detail-text"></span>
          </div>
           <div class="span8">
            <label>负责人：</label><span class="detail-text"><?php echo ($client["latelyRepName"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>学校：</label><span class="detail-text"><?php echo ($client["school"]); ?></span>
          </div>
          <div class="span8">
            <label>专业：</label><span class="detail-text"><?php echo ($client["major"]); ?></span>
          </div>
          <div class="span8">
            <label>年级：</label><span class="detail-text"><?php echo ($client["grade"]); ?></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>备注：</label><span class="detail-text"><?php echo ($client["comment"]); ?></span>
          </div>
        </div>
      </div>
      <div class="detail-section">
        <h3>报名缴费信息</h3>
        <div class="row detail-row">
          <div class="span8">
            <label>客户分级：</label><span class="detail-text"><?php echo ($client["intention"]); ?></span>
          </div>
          <div class="span8">
            <label>报名情况：</label><span class="detail-text"><?php echo ($client["status"]); ?></span>
          </div>
          <div class="span8">
            <label>预约班级：</label><span class="detail-text"></span>
          </div>
        </div>
        <div class="row detail-row">
          <div class="span8">
            <label>缴费情况：</label><span class="detail-text"><?php echo ($client["ispay"]); ?></span>
          </div>
          <div class="span8">
            <label>付款方式：</label><span class="detail-text"><?php echo ($client["paytype"]); ?></span>
          </div>
          <div class="span8">
            <label>原价：</label><span class="detail-text"><?php echo ($client["price"]); ?></span>
          </div>
        </div>
         <div class="row detail-row">
          <div class="span8">
            <label>缴费金额：</label><span class="detail-text"><?php echo ($client["payment"]); ?></span>
          </div>
          <div class="span8">
            <label>缴费时间：</label><span class="detail-text"><?php echo ($client["entrytime"]); ?></span>
          </div>
          <div class="span8">
            <label>缴费计划：</label><span class="detail-text"><?php echo ($client["payplan"]); ?></span>
          </div>
        </div>
      </div>
      <div class="detail-section">
        <h3>相关联系人</h3>
        <div class="row detail-row">
          <div class="span24">
            <div id="grid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  BUI.use('bui/grid',function (Grid) {
	var state = {"1":"父亲","2":"母亲","3":"兄弟","1":"姐妹"};
    var data = [
                {name:'<?php echo ($client["linkman_one_name"]); ?>',rel:'<?php echo ($client["linkman_one_rel"]); ?>',tel:'<?php echo ($client["linkman_one_tel"]); ?>'},
                {name:'<?php echo ($client["linkman_two_name"]); ?>',rel:'<?php echo ($client["linkman_two_rel"]); ?>',tel:'<?php echo ($client["linkman_two_tel"]); ?>'},
                {name:'<?php echo ($client["linkman_three_name"]); ?>',rel:'<?php echo ($client["linkman_three_rel"]); ?>',tel:'<?php echo ($client["linkman_three_tel"]); ?>'}
               ],
        grid = new Grid.SimpleGrid({
          render : '#grid', //显示Grid到此处
          width : 950,      //设置宽度
          columns : [
            {title:'联系人姓名',dataIndex:'name',width:80},
            {title:'联系人关系',dataIndex:'rel',width:100,renderer:BUI.Grid.Format.enumRenderer(state)},
            {title:'联系人电话',dataIndex:'tel',width:100}
          ]
        });
      grid.render();
      grid.showData(data);
  });
</script>

<body>
</html>