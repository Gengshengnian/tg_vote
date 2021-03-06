<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>企业管理</title>
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
    <div class="row">
      <form id="searchForm" class="form-horizontal span24">
        <div class="row">
          <div class="control-group span7">
            <label class="control-label">名称：</label>
            <div class="controls">
              <input type="text" class="control-text" name="name">
            </div>
          </div>
          <div class="control-group span7">
            <label class="control-label">公司地区：</label>
            <div class="controls">
              <input type="text" class="control-text" name="region">
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
  
  <!-- 新建 -->
  <div id="content" class="hide">
      <form id="J_Form4" class="form-horizontal" action="<<?php echo U('User/doadd');?>>">
        <input type="hidden" name="id">
        <div class="row span20">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>名称</label>
            <div class="controls">
              <input name="name" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
	       <div class="bui-form-group-select span12" data-type="city">
			  <label class="control-label"><s>*</s>公司地区：</label>
			  <select class="input-small" name="region">
			    <option>请选择省</option>
			  </select>
			  <select class="input-small"  name="city"><option>请选择市</option></select>
			  <select data-rules="{required:true}" class="input-small"  name="county"><option>请选择县/区</option></select>
			</div>
          </div>
        <div class="row">
        	<div class="control-group span8">
            <label class="control-label">HR</label>
            <div class="controls">
              <input name="hrname" type="text"  class="input-normal control-text">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">HR联系电话</label>
            <div class="controls">
				<input name="phone" data-rules="{number:true,maxlength:11}" data-remote="<?php echo U('CarrerrCompany/validate');?>" type="text" class="input-normal control-text">
		     </div>
          </div>
        </div>
        <div class="row">
        	<div class="control-group span8">
            <label class="control-label">HR联系邮箱：</label>
            <div class="controls">
				<input name="email"  type="text" class="input-normal control-text">
		     </div>
          </div>
          
        </div>
	    <div class="row">
        	<div class="control-group span8">
           		<label class="control-label">公司性质：</label>
         		<div class="controls">
           			 <input name="nature" type="text"  class="input-normal control-text">
            	</div>
          	</div>
          	<div class="control-group span8">
           		<label class="control-label">来源：</label>
         		<div class="controls">
           			 <input name="source" type="text"  class="input-normal control-text">
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
          {title:'编号',dataIndex:'id',width:80},
          {title:'公司名称',dataIndex:'name',width:100},
          {title:'公司地区',dataIndex:'region',width:100},
          {title:'HR',dataIndex:'hr',width:100},
          {title:'HR联系电话',dataIndex:'phone',width:100},
          {title:'HR联系邮箱',dataIndex:'email',width:120},
          {title:'公司性质',dataIndex:'nature',width:100},
          {title:'来源',dataIndex:'source',width:100},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑企业">编辑</span>',
              delStr = '<span class="grid-command btn-del" title="删除企业">删除</span>';//页面操作不需要使用Search.createLink
              return editStr1 + delStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : "<?php echo U('CarrerrCompany/add');?>",
            updateUrl : "<?php echo U('CarrerrCompany/update');?>",
            removeUrl : "<?php echo U('CarrerrCompany/delete');?>"
          },
          method : 'POST',
        },
        autoSync : true ,//保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
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

 
</script>

<body>
</html>