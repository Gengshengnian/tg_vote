<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
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
      <div class="row">
        
        <div class="control-group span8">
          <label class="control-label">学员姓名：</label>
          <div class="controls">
            <input type="text" class="control-text" name="cname">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">收款人：</label>
          <div class="controls">
            <input type="text" class="control-text" name="name">
          </div>
        </div>


        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>

      </div>
    </form>

   
  </div>
 <div class="search-grid-container">
      <div id="grid"></div>
    </div>

  <div id="content" class="hide">
  <center><h1>山西优逸客收款单据</h1></center>
     <form id ="J_Form" class="form-horizontal" >
      <h3>收款单据</h3>
      <div class="row">

        <div class="control-group span12">
          <label class="control-label"><s>*</s>学员姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span12">
          <label class="control-label"><s>*</s>联系人：</label>
          <div class="controls">
            <input name="fname" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>

        <div class="control-group12 span12">
          <label class="control-label">联系电话：</label>
          <div class="controls">
            <input name="fctel" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="control-group12 span12">
          <label class="control-label">实缴费用：</label>
          <div class="controls">
            <input name="spay" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        <div class="control-group span12">
          <label class="control-label">应缴费用：</label>
          <div class="controls">
            <input name="ypay" type="text" class=" control-text ">
          </div>
        </div>
      </div>
       <div class="row">
      <div class="control-group span12">
          <label class="control-label">备注：</label>
          <div class="controls">
            <input name="note" type="text" class=" control-text ">
          </div>
        </div>
        <div class="control-group12 span12">
          <label class="control-label">收款人：</label>
          <div class="controls">
            <input name="sname" type="text" class="control-text" data-rules="{required:true}">
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
	  var bstatus = {"0":"已缴","1":"欠费"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [

          {title:'学员姓名',dataIndex:'cname',width:200}, 
          {title:'金额',dataIndex:'spay',width:80},
          {title:'收款人',dataIndex:'name',width:200},
          {title:'收款时间',dataIndex:'payee_time',width:200},
         

        ],
       store = Search.createStore('<?php echo U("getData");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : '<?php echo U("add");?>',
            updateUrl : '<?php echo U("edit");?>',
            removeUrl : '<?php echo U("del");?>'
          },
          method : 'POST'
        },
        pageSize : 5,
        //TODO 操作应该先进数据库后页面更新
        
        autoSync : true //保存数据后，自动更新
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [

            //{text : '<i class="icon-plus"></i>记录',btnCls : 'button button-small',handler:addFunction},
            //{text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
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