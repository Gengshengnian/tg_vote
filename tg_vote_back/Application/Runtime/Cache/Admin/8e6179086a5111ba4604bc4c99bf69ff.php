<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>跟进历史</title>
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
        <div class="control-group span7">
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
            <input name="city" type="text" class="control-text">
          </div>
        </div>
        </div>
	  <div class="row">
        <div class="control-group span7">
          <label class="control-label">负责人：</label>
          <div class="controls">
            <input name="principal" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span7">
	          <label class="control-label">是否处理：</label>
	          <div class="controls" >
	            <select name="if_dispose">
	              <option value="">请选择</option>
	              <option value="1">已处理</option>
	              <option value="2">未处理</option>
	            </select>
	          </div>
        	</div>
        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
        
      </div>
    </form>
    <div class="search-grid-container">
      <div id="grid"></div>
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
	            <input data-rules="{required:true}" name="phone" type="text" class="control-text" data-rules="{required:true}">
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
	          <label class="control-label"><s>*</s>最近跟进：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="recently_follow-up" type="text" class="calendar" data-rules="{date:true}">
	          </div>
	         </div>
	    </div>
	    <div class="row">
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>下次跟进：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="next_follow-up" type="text" class="calendar" data-rules="{date:true}">
	          </div>
	        </div>
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>跟进结果：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="result" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
		</div>
		<div class="row">
			<div class="control-group span10">
		        	<label class="control-label"><s>*</s>是否处理：</label>
		            <div class="controls">
		              	<select  data-rules="{required:true}"  name="if_dispose" class="input-normal">
			                <option value="">请选择</option>
			                <option value="0">已处理</option>
			                <option value="1">未处理</option>
		              	</select>
		            </div>
	            </div>
			<div class="control-group span10">
	          <label class="control-label"><s>*</s>负责人：</label>
	          <div class="controls">
	            <input data-rules="{required:true}" name="principal" type="text" class="control-text" data-rules="{required:true}">
	          </div>
	        </div>
		</div>
      </form>
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

//表格

BUI.use('common/search',function (Search) {

	var status = {"1":"<font color='green'>已处理</font>","2":"<font color='red'>未处理</font>"},
    editing = new BUI.Grid.Plugins.DialogEditing({
      contentId : 'content', //设置隐藏的Dialog内容
      autoSave : true, //添加数据或者修改数据时，自动保存
      triggerCls : 'btn-edit'
    }),
    columns = [
		{title:'&nbsp; 编号',dataIndex:'number',width:90},
		{title:'学生姓名',dataIndex:'name',width:90},
		{title:'联系电话',dataIndex:'phone',width:100},
		{title:'&nbsp; 方向',dataIndex:'direction',width:100},
		{title:'意向城市',dataIndex:'city',width:100},
		{title:'最近跟进',dataIndex:'recently_follow-up',width:100},
		{title:'下次跟进',dataIndex:'next_follow-up',width:100},
		{title:'跟进结果',dataIndex:'result',width:100},
		{title:'是否处理',dataIndex:'if_dispose',width:100,renderer:BUI.Grid.Format.enumRenderer(status)},
		{title:'负责人',dataIndex:'principal',width:100}
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
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/projects/tg_oa/src/tg_oa_crm/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

   });
    }else{
  	     var  gridCfg = Search.createGridCfg(columns,{
  	          tbar : {
  	            items : [
  	            ]
  	          },
  	          emptyDataTpl:'<div class="centered"><img alt="Crying" src="/projects/tg_oa/src/tg_oa_crm/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
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