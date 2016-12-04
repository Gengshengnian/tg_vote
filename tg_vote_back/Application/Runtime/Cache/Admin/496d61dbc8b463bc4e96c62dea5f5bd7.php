<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
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
    <form id="searchForm" class="form-horizontal">
      <div class="row">
       <div class="control-group span8">
          <label class="control-label">所属班级：</label>
          <div class="controls">
                   <select  name="grade" >
 
		          		<option value="">请选择</option>
		                <?php if(is_array($class)): foreach($class as $k=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
		          
		      </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">姓名：</label>
          <div class="controls">
            <input type="text" name="name"/>
               
            </select>
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
     <form id ="J_Form" class="form-horizontal" >
       <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>布道：</label>
          <div class="controls">
          		<input type="text" name="agreetop">
          </div>
        </div>
      	
      </div>
      <div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>班主任：</label>
          <div class="controls" >
          		<input type="text" name="agreetoptop">
          </div>
        </div>
      </div>
    	<div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>总监：</label>
          <div class="controls" >
          	<input type="text" name="agreetoptoptop">
            
          </div>
        </div>
      </div>
     
       <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>是否销假：</label>
          <div class="controls">
            	<select name="disapper">
             <option value=''>请选择</option>
             <option value='是'>是</option>
             <option value='否'>否</option>                
                </select>
          </div>
        
        </div>
       </div>
         <!-- <div class="row">
	     <div class="control-group span10">
	          <label class="control-label">是否提前申请：</label>
	          <div class="controls">
	           	<select name="beforeapply">
             <option value=''>请选择</option>
             <option value='1'>是</option>
             <option value='0'>否</option>                
                </select>

	          </div>
	        </div>
	      </div> -->
	   
    </form>
  </div>
   <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/jquery.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/table+.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>


<script type="text/javascript">
  BUI.use('common/search',function (Search) {
	  var status = {"0":"已提交","1":"未提交"},
	  remedy = {"0":"补假条","1":"不补假条"},
	  way = {"0":"及时写的假条","1":"补假条"},
	  disapper = {"0":"未销假","1":"已销假"},
	 
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
          {title:'id',dataIndex:'id',width:30},
          {title:'姓名',dataIndex:'name',width:50},
          {title:'部门',dataIndex:'department',width:50},
          {title:'班级',dataIndex:'grade',width:50},
          {title:'申请时间',dataIndex:'time',width:80},
          {title:'请假开始时间',dataIndex:'start_time',width:100},
          {title:'请假结束时间',dataIndex:'end_time',width:100},
          {title:'请假天数',dataIndex:'daytime',width:70},
          {title:'请假原因',dataIndex:'reason',width:70},
          {title:'布道',dataIndex:'agreetop',width:50},
          {title:'老师',dataIndex:'agreetoptop',width:50},
          {title:'总监',dataIndex:'agreetoptoptop',width:50},
          {title:'请假方式',dataIndex:'way',width:70,renderer:BUI.Grid.Format.enumRenderer(way)},         
          {title:'是否补假条',dataIndex:'remedy',width:80,renderer:BUI.Grid.Format.enumRenderer(remedy)},         
          {title:'是否销假',dataIndex:'disapper',width:70,renderer:BUI.Grid.Format.enumRenderer(disapper)},         
         // {title:'是否提前申请',dataIndex:'beforeapply',width:80},               
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑职员信息">布道　</span>',
              editStr2 = '<span class="grid-command btn-edit" title="编辑职员信息">班主任　</span>',
              editStr3 = '<span class="grid-command btn-edit" title="编辑职员信息">总监</span>';
             
            return editStr1 + editStr2 + editStr3;
          }}
        ],
      store = Search.createStore('<?php echo U("getRecordData");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('add');?>",
              updateUrl : "<?php echo U('update');?>",
              removeUrl : "<?php echo U('delete');?>",
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            //{text : '<i class="icon-plus"></i>是否同意',btnCls : 'button button-small',handler:addFunction},
            //{text : '<i class="icon-plus"></i>多条删除',btnCls : 'button button-small',handler:delFunction}
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');

    function addFunction(){
      var newData = {isNew : true}; //标志是新增加的记录
      editing.add(newData,''); //添加记录后，直接编辑
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