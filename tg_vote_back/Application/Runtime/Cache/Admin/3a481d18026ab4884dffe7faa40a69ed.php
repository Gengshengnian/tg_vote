<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
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
            <label class="control-label">试卷编号：</label>
            <div class="controls">
              <input type="text" class="control-text" name="tep_code">
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="control-group span7">
            <label class="control-label">建议考试时间：</label>
            <div class="controls" >
             <input type="text"  name="tep_timelong">
            </div>
          </div>
          <div class="control-group span9">
            <label class="control-label">添加日期：</label>
            <div class="controls" >
				 <input type="text" class=" calendar" name="tep_addtime">
            </div>
            <div class="span3 offset2">
		           	<button  type="button" id="btnSearch" class="button button-primary">搜索</button>
		         </div>
          </div>
        </div>
      </form>
    </div>
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>
  
  <div id="content" class="hide">
      <form id="J_Form" class="form-horizontal" action="../data/edit.php?a=1">
        <input type="hidden" name="a" value="3">
          <div class="row">
	          <div class="control-group span8">
	            <label class="control-label"><s>*</s>试卷编号：</label>
	            <div class="controls">
	              <input type="text" class="control-text" name="tep_code">
	            </div>
	          </div>
	          
        </div>
        <div class="row">
	          <div class="control-group span7">
	            <label class="control-label"><s>*</s>建议考试时间：</label>
	            <div class="controls" >
	             <input type="text"  name="tep_timelong">
	            </div>
	          </div>
	          <div class="control-group span9">
	            <label class="control-label"><s>*</s>添加日期：</label>
	            <div class="controls" >
					 <input type="text" class=" calendar" name="tep_addtime">
	            </div> 
	          </div>
        </div>
        <div class="row">
	          <div class="control-group span7">
	            <label class="control-label"><s>*</s>状态：</label>
	            <div class="controls" >
	             <input type="radio"  name="tep_status" value = 1>启用
	             <input type="radio"  name="tep_status" value = 0>禁用
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
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="../assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script> 
<script type="text/javascript">
  BUI.use('common/search',function (Search) {
    
    var enumObj = {"0":"未做","1":"已做","2":"<font color=red>已阅</font>"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
          {title:'试卷ID',dataIndex:'id',width:80},
          {title:'试卷编号',dataIndex:'tep_code',width:160},
          
          {title:'考试班级',dataIndex:'cname',width:100},
          {title:'添加日期',dataIndex:'tep_addtime',width:160},
          {title:'状态',dataIndex:'tep_status',width:100,renderer:BUI.Grid.Format.enumRenderer(enumObj)},
          {title:'建议考试时间',dataIndex:'tep_timelong',width:100},
          {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
              var editStr ='<span class="page-action grid-command" title="信息"><a href="getpage?id='+obj.id+'">查看试卷</a></span>'
          
            return editStr; //+  editStr1 + delStr;
          }}
        ],
      store = Search.createStore('<?php echo U("getData");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            addUrl : '<?php echo U("add");?>',
            updateUrl : '<?php echo U("up");?>',
            removeUrl : '<?php echo U("del");?>'
          },
          method : 'POST'
        },
        autoSync : true ,//保存数据后，自动更新
        pageSize:10	
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            //{text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
            //{text : '<i class="icon-edit"></i>编辑',btnCls : 'button button-small',handler:function(){alert('编辑')}},
            //{text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
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