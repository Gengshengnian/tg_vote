<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>员工</title>
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
   <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/jquery-3.0.0.min.js"></script>
   
 </head>
 <body>
 
 <!-- 搜索 -->
 
  <div class="container">
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span7">
          <label class="control-label">姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span7">
				<label class="control-label"><s>*</s>职位：</label>
				<div class="controls" id="s1">
					<input type="text" id="show" name="position_id" class="input-normal control-text">
					<input type="hidden" id="hide"  name="hide">
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
     <form id ="J_Form" class="form-horizontal" method="post" enctype="multipart/form-data" action="/tg_oa_crm_20161008/index.php/Admin/HrEmployee/add" >
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input data-rules="{required:true}" name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>入职时间：</label>
          <div class="controls">
            <input data-rules="{required:true}" name="hiredate" type="text" class="calendar" data-rules="{date:true}">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="control-group span8">
				<label class="control-label"><s>*</s>部门：</label>
				<div class="controls" id="s1">
					<input type="text" id="show3" name="department_id" data-rules="{required:true}" class="input-normal control-text">
					<input type="hidden" id="hide3"  name="hide">
				</div>
			</div>
      	 <div class="control-group span8">
				<label class="control-label"><s>*</s>职位：</label>
				<div class="controls" id="s2">
					<input type="text" id="show2" name="position_id" data-rules="{required:true}" class="input-normal control-text">
					<input type="hidden" id="hide2"  name="hide">
				</div>
			</div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>相片：</label>
          <div class="controls">
            <input data-rules="{required:true}" name="photo" type="file" data-rules="{required:true}">
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

<script type="text/javascript"> 

//表格

BUI.use('common/search',function (Search) {

    // editing = new BUI.Grid.Plugins.DialogEditing({
    //   contentId : 'content', //设置隐藏的Dialog内容
    //   autoSave : true, //添加数据或者修改数据时，自动保存
    //   triggerCls : 'btn-edit'
    // }),

    editing = new BUI.Grid.Plugins.DialogEditing({

          contentId : 'content', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-edit',
          editor: {
                buttons:[
                            { text:'添加',
                              elCls : 'button button-primary',
                              handler : function(){

                                $('#J_Form').submit();
                              }

                            },
                            { text:'关闭', elCls : 'button', handler : function(){ this.hide(); } }
                           ]
              },
        }),


    columns = [
		{title:'&nbsp; 姓名',dataIndex:'name',width:90},
		{title:'入职时间',dataIndex:'hiredate',width:100},
		{title:'&nbsp; 部门',dataIndex:'department_id',width:100},
		{title:'&nbsp; 职位',dataIndex:'position_id',width:100},
    {title:'&nbsp; 照片',dataIndex:'photo',width:100 , renderer : function(value,obj){

      //value = obj.photo
      if(value=='' || value== null)
      {
         return '没有图片';
      }

      return "<img width='30px' height='30px' src='/tg_oa_crm_20161008/Public"+value+"'>"

    }},
        {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
          	  editStr1 = '<span class="grid-command btn-edit " title="编辑">编辑</span>',
                delStr = '<span class="grid-command btn-del" title="删除">删除</span>';//页面操作不需要使用Search.createLink
              return editStr1 + delStr;
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
            {text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

   });
    }else{
  	     var  gridCfg = Search.createGridCfg(columns,{
  	          tbar : {
  	            items : [
  	              {text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
  	              {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
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

//搜索职位结构查询

BUI.use(['bui/extensions/treepicker','bui/tree','bui/data'],function(TreePicker,Tree,Data){

    //树节点数据，
    //text : 文本，
    //id : 节点的id,
    //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
    //expanded ： 是否默认展开
    var store2 = new Data.TreeStore({
        root : {
          id : '0',
          text : '0'
        },
        url : "<?php echo U('HrEmployee/trees');?>",
        autoLoad : true/**/
      }),
    //由于这个树，不显示根节点，所以可以不指定根节点
    tree = new Tree.TreeList({
      store : store2,
      //dirSelectable : false,//阻止树节点选中
      showLine : true, //显示连接线
      //deepCascade : true
    });

  var  picker = new TreePicker({
      trigger : '#show',
      valueField : '#hide', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
      width:150,  //指定宽度
      children : [tree] //配置picker内的列表
    });

  picker.render();

  //数据加载完成后，执行选中操作
  store2.on('load',function(){
    var value = '4';
    picker.setSelectedValue(value);
  });
});

//新建职位结构查询

BUI.use(['bui/extensions/treepicker','bui/tree','bui/data'],function(TreePicker,Tree,Data){

    //树节点数据，
    //text : 文本，
    //id : 节点的id,
    //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
    //expanded ： 是否默认展开
    var store2 = new Data.TreeStore({
        root : {
          id : '0',
          text : '0'
        },
        url : "<?php echo U('HrEmployee/trees');?>",
        autoLoad : true/**/
      }),
    //由于这个树，不显示根节点，所以可以不指定根节点
    tree = new Tree.TreeList({
      store : store2,
      //dirSelectable : false,//阻止树节点选中
      showLine : true //显示连接线
    });

  var  picker = new TreePicker({
      trigger : '#show2',
      valueField : '#hide2', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
      width:150,  //指定宽度
      children : [tree] //配置picker内的列表
    });

  picker.render();

  //数据加载完成后，执行选中操作
  store2.on('load',function(){
    var value = '4';
    picker.setSelectedValue(value);
  });
});

//新建部门结构查询

BUI.use(['bui/extensions/treepicker','bui/tree','bui/data'],function(TreePicker,Tree,Data){

    //树节点数据，
    //text : 文本，
    //id : 节点的id,
    //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
    //expanded ： 是否默认展开
    var store2 = new Data.TreeStore({
        root : {
          id : '0',
          text : '0'
        },
        url : "<?php echo U('HrEmployee/tree');?>",
        autoLoad : true/**/
      }),
    //由于这个树，不显示根节点，所以可以不指定根节点
    tree = new Tree.TreeList({
      store : store2,
      //dirSelectable : false,//阻止树节点选中
      showLine : true //显示连接线
    });

  var  picker = new TreePicker({
      trigger : '#show3',
      valueField : '#hide3', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
      width:150,  //指定宽度
      children : [tree] //配置picker内的列表
    });

  picker.render();

  //数据加载完成后，执行选中操作
  store2.on('load',function(){
    var value = '4';
    picker.setSelectedValue(value);
  });
});
</script>
</body>
</html>