<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
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
          <label class="control-label">班级名称：</label>
          <div class="controls">
            <select name="campus">
              <option value="">请选择</option>
              <option value="1">php2015-1</option>
              <option value="2">php2015-6</option>
              <option value="3">php2015-12</option>
			  <option value="4">php2016-1</option>
            </select>
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">讲师：</label>
          <div class="controls">
            <select name="campus">
              <option value="">请选择</option>
              <option value="1">王瑞</option>
              <option value="1">王琳</option>
              <option value="1">翟学伟</option>
              <option value="1">范光磊</option>
            </select>
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

  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>编号：</label>
          <div class="controls">
            <input name="id" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
		<div class="control-group span10">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>

      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>课程：</label>
          <div class="controls" >
            <select  name="campus">
              <option value="1">HTML</option>
              <option value="2">Mysql</option>
              <option value="3">PHP初级</option>
              <option value="3">PHP高级</option>
            </select>
          </div>
        </div>
		<div class="control-group span10">
          <label class="control-label"><s>*</s>班级：</label>
          <div class="controls" >
            <select  name="campus">
              <option value="1">php2015-1</option>
              <option value="2">php2015-12</option>
              <option value="3">php2016-1</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>阶段：</label>
          <div class="controls">
            <select name="gender">
              <option value="0">第一阶段</option>
              <option value="1">第二阶段</option>
              <option value="2">第三阶段</option>
          	</select>
          </div>
        </div>
      	<div class="control-group span10">
          <label class="control-label"><s>*</s>开班时间：</label>
          <div class="controls">
            <input name="birthday" type="text" class="calendar" data-rules="{date:true}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>预计结束时间：</label>
          <div class="controls">
            <input name="birthday" type="text" class="calendar" data-rules="{date:true}">
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

	  var enumObj = {"1":"男","0":"女"},
	  	  cam = {"1":"优逸客","2":"硬汉科技","3":"西安"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
		  {title:'编号',dataIndex:'id',width:50},
          {title:'姓名',dataIndex:'yname',width:100},
          {title:'班级',dataIndex:'cname',width:100},
		  {title:'课程',dataIndex:'kname',width:150},
          {title:'开始时间',dataIndex:'start',width:100},
          {title:'预计结束时间',dataIndex:'end',width:100}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<<?php echo U('add');?>>",
              updateUrl : "<<?php echo U('update');?>>",
              removeUrl : "<<?php echo U('delete');?>>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [

          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');

    function addFunction(){
      var newData = {isNew : true}; //标志是新增加的记录
      editing.add(newData,''); //添加记录后，直接编辑
    }

    //删除操作
    function delFunction(){
      var selections = grid.getSelection();
      delItems(selections);
    }

    function delItems(items){
      var ids = [];
      BUI.each(items,function(item){
        ids.push(item.id);
      });

      if(ids.length){
        BUI.Message.Confirm('确认要删除选中的记录么？',function(){
          store.save('remove',{ids : ids});
        },'question');
      }
    }

    //监听事件，删除一条记录
    grid.on('cellclick',function(ev){
      var sender = $(ev.domTarget); //点击的Dom
      if(sender.hasClass('btn-del')){
        var record = ev.record;
        delItems([record]);
      }
    });
  });
</script>
<body>
</html>