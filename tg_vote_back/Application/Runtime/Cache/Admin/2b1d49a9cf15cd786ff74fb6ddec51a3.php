<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title> 表单</title>
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
    <div class="row">
      <form id="searchForm" class="form-horizontal span24">
        <div class="row">
          
          <div class="control-group span8">
            <label class="control-label">教师姓名：</label>
            <div class="controls">
              <input type="text" class="control-text" name="name">
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="control-group span9">
            <label class="control-label">时间：</label>
            <div class="controls">
              <input type="text" class=" calendar" name="date">
            </div>
          </div>
          <div class="span3 offset2">
            <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
          </div>
        </div>
      </form>
    </div>
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>

  </div>
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row">
        
      </div>
       <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>教师姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        </div>
        <div class="row">
	        <div class="control-group span10">
	          <label class="control-label"><s>*</s>时间：</label>
	          <div class="controls" >
	            <input name="date" type="text" class="calendar" data-rules="{required:true}">
	          </div>
	        </div>
        </div>
		<div class="row">
	        <div class="control-group span10">
	         <label class="control-label">实训内容：</label>
            <div class="controls" >
              	 <input name="content" type="text" class="calendar" data-rules="{required:true}">
            </div>
	        </div>
        </div>
    
    </div>  
    </form>
  </div>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/prettify.js"></script>
    <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script> 
<script type="text/javascript">
  BUI.use('common/search',function (Search) {
    
    var enumObj = {"1":"男","0":"女"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
          {title:'ID',dataIndex:'tid',width:80,renderer:function(v,obj){
        	  return Search.createLink({
                  id : 'detail' + obj.tid,
                  title : '学生信息',
                  text : v,
                  /* href : '/tg_oa_crm_20161008/index.php/Admin/TeacherReport/teacherinfo/id/'+obj.tid */
                });
          }},
         
          {title:'教师姓名',dataIndex:'name',width:100},
          {title:'时间',dataIndex:'date',width:100},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
            var editStr =  Search.createLink({ //链接使用 此方式
                id : 'edit' + obj.tid,
                title : '日报详情',
                text : '日报信息',
                href : '/tg_oa_crm_20161008/index.php/Admin/TeacherReport/teacherdetails/id/'+obj.tid
              }),
			 
              delStr = '<span class="grid-command btn-del" title="删除学生信息"></span>';//页面操作不需要使用Search.createLink
            return editStr + delStr;
          }}
        ],
      store = Search.createStore('getdata',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : '../data/add.json',
            updateUrl : '../data/edit.json',
            removeUrl : '../data/del.php'
          },
          method : 'POST',
        },
        autoSync : true ,//保存数据后，自动更新
        pageSize : 5
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
			
          ]
        },
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
</script>

<body>
</html>