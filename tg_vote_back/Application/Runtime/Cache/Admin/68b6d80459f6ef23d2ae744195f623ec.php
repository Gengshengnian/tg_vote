<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/tg_vote/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_vote/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_vote/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_vote/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
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
          <div class="control-group span7">
            <label class="control-label">名称：</label>
            <div class="controls">
              <input type="text" class="control-text" name="name">
            </div>
          </div>
          <div class="span3 ">
            <button  type="button" id="btnSearch" class="button button-small  button-primary">搜索</button>
          </div>
        </div>
      </form>
    </div>
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>

  </div>
  <div id="content" class="hide">
      <form id="J_Form" class="form-horizontal" action="<<?php echo U('User/add');?>>">
        <input type="hidden" name="id">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>名称</label>
            <div class="controls">
              <input name="name" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
          </div>

        <div class="row">
          <div class="control-group span8">
            <label class="control-label">角色说明</label>
            <div class="controls">
              <textarea name="about" data-rules="{required:true}" class="input-normal control-text"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
       		<div class="control-group span8">
	        	<label class="control-label"><s>*</s>权限</label>
	            <div class="controls">
	            	<input data-rules="{required:true}" type="text" id="show1" name="menuss">
	              	<input name="menus" type="hidden" id="xtrees">
	            </div>
	         </div>
	    </div>
      </form>
    </div>

    <!-- 绑定菜单 -->
    <div id="contentForBindMenu" class="hide">
      <form id="J_Form_Bind_Menu" class="form-horizontal" action="<<?php echo U('User/add');?>>">
        <input type="hidden" name="id">
 		<div class="row">
       		<div class="control-group span8">
	        	<label class="control-label"><s>*</s>权限</label>
	            <div class="controls">
	            	<input data-rules="{required:true}" type="text" id="show2" name="menuss">
	              	<input name="menus" type="hidden" id="xtrees2">
	            </div>
	         </div>
	    </div>
      </form>
    </div>

  <script type="text/javascript" src="/tg_vote/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_vote/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/tg_vote/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/tg_vote/Public/bui/Common/assets/js/prettify.js"></script>
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
      granting = new BUI.Grid.Plugins.DialogEditing({
          contentId : 'contentForBindMenu', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-grant'
        }),

      columns = [
          {title:'编号',dataIndex:'id',width:80},
          {title:'角色名',dataIndex:'name',width:100},
          {title:'权限',dataIndex:'menuss',width:100,visible:false},
          {title:'角色说明',dataIndex:'about',width:100},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
        	  if(obj.name=='超级管理员'&&"<<?php echo ($_SESSION['user']['username']); ?>>"!="admin"){
        		  return '';
              }else{
            	  editStr1 = '<span class="grid-command btn-edit " title="编辑">编辑</span>',
            	  grantStr = '<span class="grid-command btn-grant " title="编辑">绑定菜单</span>',
                  delStr = '<span class="grid-command btn-del" title="删除">删除</span>';//页面操作不需要使用Search.createLink
                return editStr1 + grantStr + delStr;
              }
          }}
        ],
      store = Search.createStore('getdata',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : "<?php echo U('SysRole/add');?>",
            updateUrl : "<?php echo U('SysRole/update');?>",
            removeUrl : "<?php echo U('SysRole/delete');?>"
          },
          method : 'POST',
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
       gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
          ]
        },
        plugins : [editing,granting,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] ,
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_vote/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>'
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
          url : "<?php echo U('SysRole/trees');?>",
          autoLoad : true/**/
        }),
      //由于这个树，不显示根节点，所以可以不指定根节点
      tree = new Tree.TreeList({
        store : store2,
        checkType : 'all',
        dirSelectable : true,//阻止树节点选中
        showLine : true, //显示连接线
      });

    var  picker = new TreePicker({
        trigger : '#show1',
        valueField : '#xtrees', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
        multipleSelect : true,
        selectStatus : 'checked',//设置勾选作为状态改变的事件
        width:150,  //指定宽度
        children : [tree] //配置picker内的列表
      });

    picker.render();

    //数据加载完成后，执行选中操作
    store2.on('load',function(){
      var value = '4';
      picker.setSelectedValue(value);
    });

    tree.on('checkedchange',function(ev){
        var checkedNodes = tree.getCheckedNodes();
        var str = '';
        BUI.each(checkedNodes,function(node){
          str += node.id + ',';
        });
        $('.log').text(str);
      });



  });
  
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
          url : "<?php echo U('SysRole/trees');?>",
          autoLoad : true
        }),
      //由于这个树，不显示根节点，所以可以不指定根节点
      tree = new Tree.TreeList({
        store : store2,
        checkType : 'all',
        dirSelectable : true,//阻止树节点选中
        showLine : true, //显示连接线
      });

    var  picker = new TreePicker({
        trigger : '#show2',
        valueField : '#xtrees2', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
        multipleSelect : true,
        selectStatus : 'checked',//设置勾选作为状态改变的事件
        width:150,  //指定宽度
        children : [tree] //配置picker内的列表
      });

    picker.render();

    //数据加载完成后，执行选中操作
    store2.on('load',function(){
      var value = '4';
      picker.setSelectedValue(value);
    });

    tree.on('checkedchange',function(ev){
        var checkedNodes = tree.getCheckedNodes();
        var str = '';
        BUI.each(checkedNodes,function(node){
          str += node.id + ',';
        });
        $('.log').text(str);
      });
  }); 
  

</script>

<body>
</html>