<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
       <meta charset="utf-8"/>
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
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">班级名称：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">方向：</label>
          <div class="controls"  id="s1">
		    <input type="hidden" id="dire_id" name="dire_id" class="input-normal">
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

  <!-- 分配班级弹出框 -->
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">原就业老师：</label>
          <div class="controls">
            <input name="yteacher_id" type="text" class="input-normal control-text">
          </div>
        </div>
		
        <div class="control-group span8">
          <label class="control-label"><s>*</s>现就业老师：</label>
          <div class="controls"  id="s2">
		    <input type="hidden" id="xteacher_id" name="xteacher_id" class="input-normal">
		  </div>
        </div>
      </div>
      </br>
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

     var editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
          {title:'编号',dataIndex:'id',width:80,renderer:function(v){
            return Search.createLink({
              id : 'test' + v,
              title : '班级学生',
              text : v,
              href : "/projects/tg_oa/src/tg_oa_crm/index.php/Admin/CarrerrStudentAllot/test?id="+v,
            });
          }},
          {title:'班级名称',dataIndex:'name',width:100},
          {title:'方向',dataIndex:'dire_id',width:80},
          {title:'原就业老师',dataIndex:'yteacher_id',width:100},
          {title:'现就业老师',dataIndex:'xteacher_id',width:100},
          {title:'分配者',dataIndex:'allocater_id',width:60},
          {title:'开始负责',dataIndex:'starttime',width:130},
          {title:'结束负责',dataIndex:'endtime',width:130},
          {title:'操作',dataIndex:'',width:100,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="分配班级">分配</span>';
              if(obj.allocater_id && obj.xteacher_id){
            	  return '';
              }else{
            	  return editStr1;
              }
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('CarrerrStudentAllot/CarrerrClass');?>",
              updateUrl : "<?php echo U('CarrerrStudentAllot/CarrerrClass');?>",
              removeUrl : "<?php echo U('CarrerrStudentAllot/CarrerrClass');?>"
          },
          method : 'POST'
        },
        autoSync : true,//保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
				//{text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
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
  
  
  
  BUI.use(['bui/select','bui/data'],function(Select,Data){

	    var store1 = new Data.Store({
	      url : "<?php echo U('input');?>",
	      autoLoad : true
	    }),
	    select = new Select.Select({
	      render:'#s1',
	      valueField:'#dire_id',
	      //multipleSelect : true,
	      store : store1
	    });
	    select.render();

	  });
  BUI.use(['bui/select','bui/data'],function(Select,Data){

	    var store1 = new Data.Store({
	      url : "<?php echo U('addinput');?>",
	      autoLoad : true
	    }),
	    select = new Select.Select({
	      render:'#s2',
	      valueField:'#xteacher_id',
	      //multipleSelect : true,
	      store : store1
	    });
	    select.render();

	  });
</script>
<body>
</html>