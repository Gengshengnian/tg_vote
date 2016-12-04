<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_vote_back/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_vote_back/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_vote_back/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/tg_vote_back/Public/bui/Common/assets/js/config-min.js"></script>


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
            <label class="control-label">名称：</label>
            <div class="controls">
              <input type="text" class="control-text" name="username">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">状态：</label>
            <div class="controls">
              <select name="status" class="control-text">
              	<option value="0">请选择</option>
                <option value="1">正常</option>
                <option value="2">禁用</option>
              </select>
            </div>
          </div>
          <div class="span3 offset2">
            <button  type="button" id="btnSearch" class="button button-small button-primary">搜索</button>
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
            <label class="control-label"><s>*</s>姓名</label>
            <div class="controls">
              <input name="username" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
          </div>
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>密码</label>
            <div class="controls">
              <input name="password" type="password" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
        </div>
       <div class="row">
	        	<div class="control-group span8">
		        	<label class="control-label"><s>*</s>用户状态</label>
		            <div class="controls">
		              	<select  data-rules="{required:true}"  name="status" class="input-normal">
			                <option value="">请选择</option>
			                <option value="0">禁用</option>
			                <option value="1">正常</option>
		              	</select>
		            </div>
	            </div>
        </div>
       <!--  <div class="row">
        		<div class="control-group span8">
		        	<label class="control-label"><s>*</s>角色</label>
		            <div class="controls"  id="s1">
		            <input data-rules="{required:true}" type="hidden" id="roles" name="roles" class="input-normal">
		            </div>
	            </div>
        </div> -->
      </form>
    </div>
    
	<!-- 绑定角色 id="J_Form_Bind_Role" class="form-horizontal" action="<<?php echo U('User/bindRoles');?>>" -->
    <div id="contentForBindRole" class="hide">
      <form id="J_Form_Bind_Role" class="form-horizontal">
        <input type="hidden" name="id">
        <?php if(is_array($roles)): foreach($roles as $key=>$role): ?><input type="checkbox" name="roles[]" value="<?php echo ($role["id"]); ?>" checked />  <?php echo ($role["name"]); ?><br><?php endforeach; endif; ?>
      </form>
    </div>

  <script type="text/javascript">
    BUI.use('common/page');
  </script>

<script type="text/javascript">
  BUI.use('common/search',function (Search) {

      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),

      BUI.Editor.DialogEditor

      granting = new BUI.Grid.Plugins.DialogEditing({

          contentId : 'contentForBindRole', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-grant',
          editor: {
        	  		buttons:[
                            { text:'点击绑定',
                              elCls : 'button button-primary',
                              handler : function(){

                            	  //console.log(this.__attrVals.editValue.id);
                            	  //alert($("input:checked").size());

                            	  var user_id = this.__attrVals.editValue.id;
								  var role_ids = "";

                            	  $("input:checked").each(function(){
                            		  role_ids += "," + $(this).val()  ;
                            	  });

                            	  $.post("bind_Roles", { user_id: user_id, role_ids: role_ids },
                            			   function(data){
                            			     alert("绑定成功! ");
                            			     //this.hide();
                            	  });

                           	  }

                            },
                            { text:'关闭', elCls : 'button', handler : function(){ this.hide(); } }
                           ]
      			  },
        }),

      columns = [
          {title:'编号',dataIndex:'id',width:80},
          {title:'姓名',dataIndex:'username',width:100},
          {title:'密码',dataIndex:'password',width:100,visible:false},
          {title:'角色',dataIndex:'roles',width:100,visible:false},
          {title:'状态',dataIndex:'status',width:100,renderer : function(value,obj){
        	  if(value==1){
        		  return '正常';
        	  }else{
        		  return '禁用';
        	  }
            }},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
        	  //console.log(obj);
        	  if(obj.username=='admin'&&"<<?php echo ($_SESSION['user']['username']); ?>>"!="admin"){
        		  return '';
              }else{
            	  editStr1 = '<span class="grid-command btn-edit" title="编辑">编辑</span>',
            	  grantStr = '<span class="grid-command btn-grant" title="授权">绑定角色</span>',
                  delStr = '<span class="grid-command btn-del" title="删除">删除</span>';//页面操作不需要使用Search.createLink
                return editStr1 + grantStr + delStr;
              }
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : "<?php echo U('SysUser/add');?>",
            updateUrl : "<?php echo U('SysUser/update');?>",
            bindRolesUrl : "<?php echo U('SysUser/bindRoles');?>",
            grantUrl : "<?php echo U('SysUser/grant');?>",
            removeUrl : "<?php echo U('SysUser/delete');?>"
          },
          method : 'POST',
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
          emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_vote_back/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
          plugins : [editing,granting,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

     });
      }else{
    	     var  gridCfg = Search.createGridCfg(columns,{
    	          tbar : {
    	            items : [
    	              {text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
    	              {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
    	            ]
    	          },
    	          emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_vote_back/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
    	          plugins : [editing,granting,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

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

  BUI.use(['bui/select','bui/data'],function(Select,Data){

	    var store1 = new Data.Store({
	      url : "<?php echo U('SysUser/addInput');?>",
	      autoLoad : true
	    }),

	    select = new Select.Select({
	      render:'#s1',
	      valueField:'#roles',
	      multipleSelect : true,
	      store : store1
	    });
	    select.render();

	    select1 = new Select.Select({
		      render:'#s2',
		      valueField:'#roles',
		      multipleSelect : true,
		      store : store1
		    });
		    select1.render();

	  });

</script>
</body>
<script type="text/javascript">
   $(function(){
	   $("#ceshi").css("visibility","hidden");

   });

   </script>
</html>