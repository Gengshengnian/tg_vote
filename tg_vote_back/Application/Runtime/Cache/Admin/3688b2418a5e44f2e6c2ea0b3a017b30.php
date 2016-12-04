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
          <label class="control-label">咨询人：</label>
          <div class="controls">
            <input type="text" class="control-text" name="name">
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
          {title:'编号',dataIndex:'number',width:100},
          {title:'开班时间',dataIndex:'start',width:80},
          {title:'开班班级',dataIndex:'classname',width:80},
          {title:'缴费日期',dataIndex:'payee_time',width:130},
          {title:'咨询老师',dataIndex:'ename',width:60},
          {title:'姓名',dataIndex:'cname',width:60},
          {title:'性别',dataIndex:'gender',width:40,renderer:BUI.Grid.Format.enumRenderer({"1":"男","0":"女"})},
          {title:'校区',dataIndex:'campus',width:150,renderer:BUI.Grid.Format.enumRenderer({"1":"优逸客","2":"硬汉科技","3":"西安"})},
          {title:'专业',dataIndex:'major',width:100},
          {title:'电话',dataIndex:'tel',width:100},
          {title:'课程方向',dataIndex:'direction',width:100},
          {title:'总费用',dataIndex:'ypay',width:100},
          {title:'申请价',dataIndex:'sprice',width:60},
          {title:'申请批复',dataIndex:'applystatus',width:60},
          {title:'缴费方式',dataIndex:'paytype',width:100},
          {title:'贷款金额',dataIndex:'loan',width:100, renderer: function(value,obj){
        	  if(obj.payplan=='0'){
        		  //根据已经支付的费用计算贷款的金额
        		  if(obj.applystatus == 2)
	        	  {
	        		  return obj.sprice-obj.totalspay ;
	        	  }else
	        	  {
	        		  return obj.ypay-obj.totalspay ;
	        	  }
        		//return obj.ypay-obj.totalspay;
        	  }else{
        		  return '未贷款';
        	  }
          }},
          {title:'已交',dataIndex:'totalspay',width:100},
          {title:'还欠',dataIndex:'',width:60,renderer: function(value,obj){
        	//根据批复状态计算还欠多少钱
        	  if(obj.applystatus == '2'){
        		  
        		  return obj.sprice-obj.totalspay ;
        		  
        	  }else{
        		  return obj.ypay-obj.totalspay ;
        	  }
        	  
          }},
          {title:'招生途径',dataIndex:'way',width:100},
          {title:'支付计划',dataIndex:'payplan',width:100,visible:false},             

        ],
       store = Search.createStore('<?php echo U("getinfo");?>',{
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

            {text : '<i class="icon-plus"></i>导出数据',btnCls : 'button button-small',handler: exportFunction},
          	//{text : '<i class="icon-remove"></i>记录',btnCls : 'button button-small',handler : addFunction},
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
    
  	//导出数据
    function exportFunction(){
		location.href="<?php echo U('CrmPay/exportData');?>";
    }
    
    
    /* function addFunction(){
      var newData = {isNew : true}; //标志是新增加的记录
      editing.add(newData,'name'); //添加记录后，直接编辑
    } */
 
    //删除操作
    /* function delFunction(){
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
    } */

    //监听事件，删除一条记录
    /* grid.on('cellclick',function(ev){
      var sender = $(ev.domTarget); //点击的Dom
      if(sender.hasClass('btn-del')){
        var record = ev.record;
        delItems([record]);
      }
    }); */
  });
</script>
<body>
</html>