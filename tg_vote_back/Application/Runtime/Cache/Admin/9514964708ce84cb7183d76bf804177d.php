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
          <label class="control-label">客户姓名：</label>
          <div class="controls">
            <input type="text" class="control-text" name="cname" >
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">申请人：</label>
          <div class="controls">
            <input type="text" class="control-text" name="rname">
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


  <div id="content" class="hide">
  <center><h1>山西优逸客申请表</h1></center>
     <form id ="J_Form" class="form-horizontal">
      <h3>收款单据</h3>
      <div class="row">
        <div class="control-group span12">
          <label class="control-label">编号：</label>
          <div class="controls">
            <input name="id" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span12">
          <label class="control-label"><s>*</s>客户姓名：</label>
          <div class="controls">
            <input name="cname" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span12">
          <label class="control-label"><s>*</s>申请人：</label>
          <div class="controls">
            <input name="rname" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>

        <div class="control-group12 span12">
          <label class="control-label">建议课程：</label>
          <div class="controls">
            <input name="dname" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="control-group12 span12">
          <label class="control-label">应缴金额：</label>
          <div class="controls">
            <input name="yprice" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
        <div class="control-group span12">
          <label class="control-label">成交金额：</label>
          <div class="controls">
            <input name="sprice" type="text" class=" control-text " data-rules="{required:true}" readonly>
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="control-group span24">
          <label class="control-label">申请理由：</label>
          <div class="controls control-row4">
            <textarea name="reason" class="span15 span-width" readonly></textarea><span>(200字内)</span>
          </div>
        </div>

      </div>

      <div class="row">
      	<div class="control-group span24">
          <label class="control-label">审核意见：</label>
          <div class="controls control-row4">
            <textarea name="comment" class="span15 span-width" readonly></textarea><span>(200字内)</span>
          </div>
        </div>

      </div>

      </br>

      <div class="row">

        <div class="control-group span12">
          <label class="control-label">申请时间：</label>
          <div class="controls">
            <input type="text" class=" calendar" name="addtime" readonly>
          </div>

        </div>
       </div>
        <!-- <div class="row">
        <div class="control-group span12">
          <label class="control-label">审核结果：</label>
          <div class="controls" >
            <select  name="status" class="input-normal">
              <option value="1">不同意</option>
              <option value="2">同意</option>

            </select>
          </div>
        </div>
   		</div> -->



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
          {title:'编号',dataIndex:'id',width:80,renderer:function(v){
            return Search.createLink({
              id : 'detail' + v,
              title : '学生信息',
              text : v,
              href : 'detail/example.html'
            });
          }},
          {title:'客户姓名',dataIndex:'cname',width:200},
          {title:'申请人',dataIndex:'rname',width:200},
          {title:'申请时间',dataIndex:'addtime',width:200},
          {title:'审核意见',dataIndex:'comment',width:200},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="查看学生信息">查看</span>',
              delStr = '<span class="grid-command btn-del" title="删除学生信息">删除</span>';//页面操作不需要使用Search.createLink
            return editStr1;
          }}
        ],
      store = Search.createStore("<?php echo U(getRecordData);?>",{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('doadd');?>",
              updateUrl : "<?php echo U('doedit');?>",
              removeUrl : "<?php echo U('dodel');?>"
          },
          method : 'POST'
        },
        autoSync : true,//保存数据后，自动更新
        pageSize : 5
      }),

      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            //{text : '<i class="icon-plus"></i>添加申请',btnCls : 'button button-small',handler:addFunction},
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