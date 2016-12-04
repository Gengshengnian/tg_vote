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
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
          		<input type="text" name="name">
          </div>
        </div>
      	
      <!-- </div>
      <div class="row">
         -->
        <div class="control-group span10">
          <label class="control-label"><s>*</s>部门：</label>
          <div class="controls" >
          		<input type="text" name="department">
          </div>
        </div>
      </div>
    	<div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>班级：</label>
          <div class="controls" >
        	<input type="text" name="grade" data-rules="{required:true}">
            
          </div>
        </div>
      <!-- </div>
      <div class="row"> -->
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>电话：</label>
          <div class="controls" >
          	<input type="text" name="tel">
            
          </div>
        </div>
      </div>
     	<div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>申请时间：</label>
          <div class="controls" >
          	<input type="text" name="time" class="calendar calendar-time" data-rules="{required:true}">
            
          </div>
        </div>
     <!--  </div>
      <div class="row"> -->
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>请假开始时间：</label>
          <div class="controls" >
          	<input type="text" name="start_time" class="calendar calendar-time" data-rules="{required:true}">
            
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>请假结束时间：</label>
          <div class="controls" >
          	<input type="text" name="end_time" class="calendar calendar-time" data-rules="{required:true}">
            
          </div>
        </div>
     <!--  </div>
      <div class="row"> -->
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>请假天数：</label>
          <div class="controls" >
          	<input type="text" name="daytime">
            
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="control-group span10">
          <label class="control-label"><s>*</s>请假原因：</label>
          <div class="controls" >
          	<input type="text" name="reason">
            
          </div>
        </div>
     <!--  </div>
     
          <div class="row"> -->
          <div class="control-group span10">
          <label class="control-label"><s>*</s>请假方式：</label>
          <div class="controls">
             <select name="way">
             <option value=''>请选择</option>
             <option value="1">及时写的假条</option>
             <option value="0">补得</option>                
             </select>
          </div>
          </div>
       </div>
                 
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>是否补假条：</label>
          <div class="controls">
           <select name="remedy">
           	 <option value=''>请选择</option>
             <option value='1'>是</option>
             <option value='0'>否</option>                
             </select>
          </div>
        </div>
         <div class="control-group span8">
          <label class="control-label"><s>*</s>是否提交：</label>
          <div class="controls">
           <select name="status">
           	 <option value=''>请选择</option>
             <option value='1'>提交</option>
             <option value='0'>未提交</option>                
             </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>是否销假：</label>
          <div class="controls">
           <select name="disapper">
           	 <option value=''>请选择</option>
             <option value='1'>销假</option>
             <option value='0'>未销假</option>                
             </select>
          </div>
        </div> 
       </div>
     
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
	  disapper = {"0":"销假","1":""},
	 
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
          {title:'电话',dataIndex:'tel',width:50},
          {title:'申请时间',dataIndex:'time',width:80},
          {title:'请假开始时间',dataIndex:'start_time',width:100},
          {title:'请假结束时间',dataIndex:'end_time',width:100},
          {title:'请假天数',dataIndex:'daytime',width:70},
          {title:'是否销假',dataIndex:'disapper',width:70,visible:false},
          {title:'请假原因',dataIndex:'reason',width:70},       
          {title:'请假方式',dataIndex:'way',width:70,renderer:BUI.Grid.Format.enumRenderer(way)},         
          {title:'是否补假条',dataIndex:'remedy',width:80,renderer:BUI.Grid.Format.enumRenderer(remedy)},                             
          {title:'是否提交',dataIndex:'status',width:80,renderer:BUI.Grid.Format.enumRenderer(status)},
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
        	  if(obj.disapper==0){
        		  editStr1 = '<span class="grid-command btn-edit" title="销假">销假</span>';
        	  }else{
        		  editStr1 = '已销假';
        	  }
            	return editStr1; 
          }}
          
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('add');?>",
              updateUrl : "<?php echo U('disapper');?>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            //{text : '<a href="Application/Admin/View/Applyleavestudent/add.html"> 添加 　</a>'},
            //{text : '<i class="icon-plus"></i>添加',btnCls : 'button button-small',handler:addFunction},
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