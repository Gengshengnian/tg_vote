<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>我的学生</title>
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
 
 <!-- 搜索 -->
 
  <div class="container">
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span7">
          <label class="control-label">学生姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label">方向：</label>
          <div class="controls" >
            <select name="direction">
              <option value="">请选择</option>
              <option value="1">php</option>
              <option value="2">ui</option>
              <option value="3">前端</option>
            </select>
          </div>
        </div>
			<div class="control-group span7">
          <label class="control-label">意向城市：</label>
          <div class="controls">
            <input name="name" type="city" class="control-text">
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
  
<!-- 新建 -->

  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
		<div class="row">
	      	<div class="control-group span10">
	          <label class="control-label"><s>*</s>编号：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="number" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>学生姓名：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="name" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
		</div>
		<div class="row">
			<div class="control-group span10">
	          <label class="control-label"><s>*</s>联系电话：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="name" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
	        <div class="control-group span10">
          <label class="control-label">方向：</label>
          <div class="controls" >
            <select name="direction">
              <option value="">请选择</option>
              <option value="1">php</option>
              <option value="2">ui</option>
              <option value="3">前端</option>
            </select>
          </div>
        </div>
	    </div>
      	<div class="row">
      		<div class="control-group span10">
	          <label class="control-label"><s>*</s>意向城市：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="city" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>开始时间：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="start_time" type="text" class="calendar" data-rules="{date:true}">
	          </div>
	         </div>
	    </div>
	    <div class="row">
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>结束时间：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="over_time" type="text" class="calendar" data-rules="{date:true}">
	          </div>
	        </div>
	        <div class="control-group span10">
		        	<label class="control-label"><s>*</s>状态</label>
		            <div class="controls">
		              	<select  data-rules="{required:true}"  name="state" class="input-normal">
			                <option value="">请选择</option>
			                <option value="0">禁用</option>
			                <option value="1">正常</option>
		              	</select>
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

//表格

BUI.use('common/search',function (Search) {

    editing = new BUI.Grid.Plugins.DialogEditing({
      contentId : 'content', //设置隐藏的Dialog内容
      autoSave : true, //添加数据或者修改数据时，自动保存
      triggerCls : 'btn-edit'
    }),
    columns = [
		{title:'&nbsp; 编号',dataIndex:'number',width:90},
		{title:'&nbsp; 班级',dataIndex:'class',width:90},
		{title:'学生姓名',dataIndex:'name',width:90},
		{title:'联系电话',dataIndex:'phone',width:100},
		{title:'&nbsp; 方向',dataIndex:'direction',width:100},
		{title:'意向城市',dataIndex:'city',width:100},
		{title:'开始时间',dataIndex:'start_time',width:100},
		{title:'结束时间',dataIndex:'over_time',width:100},
		{title:'状态',dataIndex:'state',width:100},
        {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
          	  editStr1 = '<span class="grid-command btn-edit " title="制定跟进计划">制定跟进计划</span>',
                delStr = '<span class="grid-command btn-del" title="删除">删除</span>';//页面操作不需要使用Search.createLink
              return editStr1;
        }}
      ],
    store = Search.createStore('getData',{
      proxy : {
        save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
          addUrl : "<?php echo U('add');?>",
          updateUrl : "<?php echo U('update');?>",
          removeUrl : "<?php echo U('delete');?>"
        },
        method : 'POST'
      },
      autoSync : true ,//保存数据后，自动更新
      pageSize:10
    });
    if("<<?php echo ($_SESSION['user']['username']); ?>>"=="admin"){
   var  gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

   });
    }else{
  	     var  gridCfg = Search.createGridCfg(columns,{
  	          tbar : {
  	            items : [
  	            ]
  	          },
  	          emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
  	          plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

  	     });
    }
  var  search = new Search({
      store : store,
      gridCfg : gridCfg
    }),
    grid = search.get('grid');

  function addFunction(){
    var newData = {isNew : true}; //标志是新增加的记录
    editing.add(newData,'name'); //添加记录后，直接编辑
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
</body>
</html>