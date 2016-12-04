<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
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
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">姓名：</label>
          <div class="controls">

            <input name="name" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">联系电话：</label>
          <div class="controls">
            <input name="tel" type="text" class="control-text">
          </div>
        </div>
        
      </div>
      <div class="row"> 
        <div class="control-group span8">
          <label class="control-label">登记日期：</label>
          <div class="controls">
            <input name="entrytime" type="text" class="calendar" >
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">负责人：</label>
          <div class="controls">
            <input name="chargename" type="text" class="control-text" >
          </div>
        </div>
        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
    </form>
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>

  <!-- 点击编辑按钮 弹出以下div -->
    <div id="editContent" class="hide">

    <form class="form-horizontal" method="post" >
     <input type="hidden" name='id'>
      <h3>基本信息</h3>
       <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>来源途径：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="way">
              <option value="">请选择</option>
              <option value="熟人介绍">熟人介绍</option>
              <option value="主动上门咨询">主动上门咨询</option>
              <option value="被动电话邀请">被动电话邀请</option>
              <option value="网站咨询">网站咨询</option>
              <option value="QQ咨询">QQ咨询</option>
              <option value="微信公众平台">微信公众平台</option>
              <option value="主动电话咨询">主动电话咨询</option>
              <option value="招聘网站咨询">招聘网站咨询</option>
              <option value="地面推广">地面推广</option>
              <option value="招聘会">招聘会</option>
              <option value="校企合作">校企合作</option>
            </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>意向课程：</label>
          <div class="controls">
            <input name="course" type="text" class="span5 span-width control-text"  data-rules="{required:true}"><br/>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
      </div>

      <div class="row">

         <div class="control-group span8">
          <label class="control-label"><s>*</s>电话：</label>
          <div class="controls">
            <input name="tel" type="text" class="span5 span-width control-text"  data-rules="{required:true,number:true,maxlength:11}"  >
          </div>
        </div>
         <div class="control-group span8">
          <label class="control-label">QQ：</label>
          <div class="controls">
            <input name="qq" type="text" class="span5 span-width control-text" data-rules="{number:true,maxlength:10}">
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">微信：</label>
          <div class="controls">
            <input name="weixin" type="text" class="control-text">
          </div>
        </div>
      </div>

      <div class="row">
      	<div class="control-group span8">
          <label class="control-label">性别：</label>
          <div class="controls">
            <select name="gender">
              <option value="1">男</option>
              <option value="0">女</option>
            </select>
          </div>
        </div>
         <div class="control-group12 span8">
          <label class="control-label">出生日期：</label>
          <div class="controls">
            <input name="birthday" type="text" class="calendar">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>目前状态：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="state">
              <option value="">请选择</option>
              <option value="1">在校学生</option>
              <option value="2">在职人员</option>
              <option value="3">待业人员</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">

         <div class="control-group span8">
          <label class="control-label"><s>*</s>学历：</label>
          <div class="controls">
            <select name="degree">
              <option value="0">请选择</option>
              <option value="初中">初中</option>
	          <option value="高中">高中</option>
	          <option value="专科">专科</option>
	          <option value="本科">本科</option>
            </select>
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">学校：</label>
          <div class="controls">
            <input name="school" type="text" class="span5 span-width control-text">
          </div>
        </div>
		 <div class="control-group span8">
          <label class="control-label">专业：</label>
          <div class="controls">
            <input name="major" type="text" class="control-text">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="control-group span8">
          <label class="control-label">年级：</label>
          <div class="controls">
            <select name=grade>
              <option value="0">请选择</option>
              <option value="1">大一</option>
	          <option value="2">大二</option>
	          <option value="3">大三</option>
	          <option value="4">大四</option>
            </select>
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label"><s>*</s>录入人：</label>
          <div class="controls">
            <input name="entrymen" type="text" value='<<?php echo ($entrymen); ?>>' readonly>
          </div>
        </div>
       	<div class="control-group12 span8">
          <label class="control-label"><s>*</s>录入时间：</label>
          <div class="controls">
			<input name="entrytime" type="text" value='<<?php echo ($entrytime); ?>>' readonly>
          </div>
        </div>

      </div>

      <div class="row">

         <div class="control-group12 span8">
          <label class="control-label"><s>*</s>负责人：</label>
          <div class="controls">
            <input name="responsible" type="text" value='<<?php echo ($entrymen); ?>>' readonly>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>客户分级：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="intention">
              <option value="">请选择</option>
              <option value="A类客户">A类客户</option>
              <option value="B类客户">B类客户</option>
              <option value="C类客户">C类客户</option>
            </select>
          </div>
        </div>
         <div class="control-group span8">
        	<label class="control-label">类型：</label>
        	<div class="controls">
          		<select  name="type" class="input-normal">
                <option value="2">编辑</option>
              </select>
             </div>
        </div>
      </div>


      <div class="row">
        <div class="control-group span24">
          <label class="control-label">备注：</label>
          <div class="controls control-row4">
            <textarea name="comment" class="span8 span-width"></textarea><span>(200字内)</span>
          </div>
        </div>
      </div>
      <hr/>

      <h3>相关联系人</h3>
        <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名1：</label>
            <div class="controls">
              <input name="linkman_one_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系1：</label>
            <div class="controls">
              <select  name="linkman_one_rel" class="input-normal">
                <option value="0">请选择</option>
                <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话1：</label>
            <div class="controls">
              <input name="linkman_one_tel" type="text" data-rules="{number:true ,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>


      </div>
      <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名2：</label>
            <div class="controls">
              <input name="linkman_two_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系2：</label>
            <div class="controls">
              <select  name="linkman_two_rel" class="input-normal">
                <option value="0">请选择</option>
                <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话2：</label>
            <div class="controls">
              <input name="linkman_two_tel" type="text" data-rules="{number:true,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>


      </div>
      <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名3：</label>
            <div class="controls">
              <input name="linkman_three_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系3：</label>
            <div class="controls">
              <select  name="linkman_three_rel" class="input-normal">
                <option value="0">请选择</option>
               <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话3：</label>
            <div class="controls">
              <input name="linkman_three_tel" type="text" data-rules="{number:true,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>


      </div>

     </form>
  </div>


	<!-- 点击申请调价 弹出以下div 其中显示一个表单 主要包括原价格 调价 原因 -->
    <div id="applyContent" class="hide">
     <form id ="J_Form_apply" class="form-horizontal" action="<<?php echo U('CrmClient/getData');?>>" >
      <input name="tci_id" type="hidden" class="control-text">
      <div class="row">
        <div class="control-group span16">
        	<label class="control-label">类型：</label>
        	<div class="controls">
          		<select  name="type" class="input-normal">
                <option value="0">申请调价</option>
              </select>
             </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span16">
          <label class="control-label">原价：</label>
          <div class="controls">
            <input name="y" type="text" class="control-text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span16">
          <label class="control-label"><s>*</s>申请价：</label>
           <div class="controls">
            <input name="apply_price" type="text" class="control-text">
          </div>
        </div>
      </div>
   	  <div class="row">
        <div class="control-group span16">
          <label class="control-label">调价原因：</label>
          <div class="controls control-row4">
            <textarea name="reason" class="span8 span-width"></textarea><span>(200字内)</span>
          </div>
        </div>
      </div>
    </form>

  </div>


  <!-- 点击退费 弹出以下div 写明退费原因 -->
    <div id="repealContent" class="hide">
    <form id ="J_Form_repeal" class="form-horizontal" >
      <input name="tci_id" type="hidden" class="control-text">
       <div class="row">
        <div class="control-group span16">
        	<label class="control-label">类型：</label>
        	<div class="controls">
          		<select  name="type" class="input-normal">
                <option value="1">退费</option>
              </select>
             </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span16">
          <label class="control-label">原价：</label>
          <div class="controls">
            <input name="y" type="text" class="control-text">
          </div>
        </div>
      </div>
   	  <div class="row">
        <div class="control-group span16">
          <label class="control-label">退费原因：</label>
          <div class="controls control-row4">
            <textarea name="reason" class="span8 span-width"></textarea>
          </div>
        </div>
      </div>
    </form>

  </div>

  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>
<script type="text/javascript">
  BUI.use('common/search',function (Search) {

	  var state = {"1":"在校学生","2":"在职人员","3":"待业人员"},//2待业，1在职，0在读
	  	  status = {"1":"<font color='red'>未报名</font>","2":"<font color='orange'>报名</font>","3":"<font color='green'>缴费</font>","4":"开班","5":"退费"},
	  	intention_client = {"1":"A级客户","2":"B级客户","3":"C级客户"},
  	 edit = new BUI.Grid.Plugins.DialogEditing({
         contentId : 'editContent', //设置隐藏的Dialog内容
         autoSave : true, //添加数据或者修改数据时，自动保存
         triggerCls : 'btn-edit'
       }),

	  apply = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'applyContent', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-add'
      }),
      repeal = new BUI.Grid.Plugins.DialogEditing({
          contentId : 'repealContent', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-repeal'
      }),
      columns = [
		 {title:'客户编号',dataIndex:'number',width:100,renderer:function(v){
             return Search.createLink({
                 id : 'detail' + v,
                 title : '客户详情',
                 text : v,
                 href : '<?php echo U("detail");?>'+'?id='+v
               });
          }},
          {title:'姓名',dataIndex:'name',width:80},
          {title:'联系电话',dataIndex:'tel'},
          {title:'意向课程',dataIndex:'cname',width:68},
          {title:'目前状态',dataIndex:'state',width:60,renderer:BUI.Grid.Format.enumRenderer(state)},
          {title:'客户意向',dataIndex:'intention_client',width:60,renderer:BUI.Grid.Format.enumRenderer(intention_client)},
          {title:'负责人',dataIndex:'chargename',width:60},
          {title:'登记时间',dataIndex:'entrytime',width:80},
          {title:'开始时间',dataIndex:'starttime',width:70},
          {title:'截止时间',dataIndex:'endtime',width:70},
          //{title:'下次跟进',dataIndex:'trailtime',width:80},
          {title:'原价',dataIndex:'y',width:60},
          {title:'申请价',dataIndex:'sprice',width:60},
          {title:'已付',dataIndex:'spay',width:60},
          {title:'报名情况',dataIndex:'status',width:60,renderer:BUI.Grid.Format.enumRenderer(status)},

        ],
      store = Search.createStore('getData',{
        proxy : {
          save :
          { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : "<<?php echo U('Apply/add');?>>",
            updateUrl : "<<?php echo U('Client/edit');?>>"
          },
          method : 'POST',
        },
        autoSync : true, //保存数据后，自动更新
        pageSize :8
      }),

      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
			{text : '<i class="icon-plus"></i>导出数据',btnCls : 'button button-small',handler:exportFunction},
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [edit,apply,repeal,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');

    //导出数据
    function exportFunction(){
    	location.href="<?php echo U('CrmClient/exportClientData');?>";
    }


  });
</script>

<body>
</html>