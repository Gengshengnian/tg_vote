<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
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

  <form id="searchForm" class="form-horizontal">
  <div class=row>
  	<div class="control-group span8">
          <label class="control-label">校区：</label>
          <div class="controls" >
             <select  name="campus">
 
		          		<option value="0">请选择</option>
		          		<option value="1">硬汉</option>
		          		<option value="2">优逸客</option>
		          		<option value="3">西安</option>
		               
		          
		      </select>
          </div>
     </div>
     <div class="control-group span8">
          <label class="control-label">位置：</label>
          <div class="controls">
               <input type="text" class="control-text" name="place">       
          </div>
     </div>
    </div>
     <div class=row>
        <div class="control-group span8">
          <label class="control-label">价格：</label>
          <div class="controls" >
            <input type="text" class="control-text" name="price">
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">评价：</label>
          <div class="controls" >
            <input type="text" class="control-text" name="evaluate">
          </div>
        </div>
       
        
	 </div>
	  <div class="row">
        <div class="control-group span10">
          <label class="control-label">户型：</label>
          <div class="controls">
            <select  name="housetype">
		          		<option value="0">请选择</option>
		          		<option value="1">一室</option>
		          		<option value="2">二室</option>
		          		<option value="3">三室</option>
		       </select>
          </div>
        </div>
        <div>
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
      	</div>
      </div>
  
      
       
  
    </form>
   <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>
  
  
  
  
  
  
<!--添加修改  -->   
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
               <div class="row">
	         <div class="control-group span10">
          <label class="control-label"><s>*</s>校区：</label>
          <div class="controls">
          	     <select  name="campus">
 
		          		<option value="0">请选择</option>
		          		<option value="1">硬汉</option>
		          		<option value="2">优逸客</option>
		          		<option value="3">西安</option>
		       </select>
          </div>
        </div>
      	
      </div>
      
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>房东：</label>
          <div class="controls">
            <input name="land" type="text" id="course" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>电话：</label>
          <div class="controls">
            <input name="phone" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        
      </div>
      
      <div class="row">
        <div class="control-group span20">
          <label class="control-label"><s>*</s>位置：</label>
          <div class="controls">
            <input name="address" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>价格：</label>
          <div class="controls">
            <input name="price" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>户型：</label>
          <div class="controls">
            <select  name="housetype">
		          		<option value="0">请选择</option>
		          		<option value="1">一室</option>
		          		<option value="2">二室</option>
		          		<option value="3">三室</option>
		       </select>
          </div>
        </div>
      </div>
        <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>离校区距离：</label>
          <div class="controls">
            <input name="distance" type="text" class="control-text" data-rules="{required:true}">
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
  BUI.use('common/search',function (Search) { 
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
			{title:'ID',dataIndex:'id',width:80},
			{title:'校区',dataIndex:'campus',width:80},
			{title:'房东',dataIndex:'land',width:100},
			{title:'电话',dataIndex:'phone',width:120},
			{title:'位置',dataIndex:'address',width:200},
			{title:'价格',dataIndex:'price',width:100},
			{title:'户型',dataIndex:'housetype',width:100},
			{title:'离校区距离',dataIndex:'distance',width:150},
			
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑信息">编辑</span>',
             delStr = '<span class="grid-command btn-del" title="删除信息">删除</span>';//页面操作不需要使用Search.createLink
            return editStr1 + delStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : '<?php echo U("add");?>',
              updateUrl : '<?php echo U("update");?>',
              removeUrl : '<?php echo U("delete");?>'
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>添加',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-plus"></i>删除',btnCls : 'button button-small',handler:delFunction}
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/projects/tg_oa/src/tg_oa_crm/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
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