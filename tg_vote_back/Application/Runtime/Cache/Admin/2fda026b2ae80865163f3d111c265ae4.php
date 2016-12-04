<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
 
 </head>
 <body>
  
  <div class="container">
 
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">日期：</label>
          <div class="controls" >
            <input class="calendar bui-form-field-date bui-form-field" type="text" data-rules="{date:true}" name="date" aria-disabled="false" aria-pressed="false">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">部门：</label>
          <div class="controls" >
            <input class="" type="text" " name="name" aria-disabled="false" aria-pressed="false">
          </div>
        </div>
        <div class="control-group span8">
          <label class="">员工姓名：</label>
          <div class="controls" >
            <input class="calendar bui-form-field-date bui-form-field" type="text" " name="date" aria-disabled="false" aria-pressed="false">
          </div>
        </div>
        <div class="span3 offset2">
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
    </form>
    <div class="search-grid-container">
    	<form action="<?php echo U('importExcel');?>" method="post" enctype="multipart/form-data" >
			<table>
				<tr>
				<input type="file" name="excel"/>
				</tr>
				<tr>
				<input type="submit" value="导入"/>
				</tr>
			</table>
		</form>
    	<div  style="font-size:20px">
	 		<p id = 'cc' style="font-size:20px"></p>
	 	</div>
      <div id="grid"></div>
    </div>
  </div>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
	<script>
		/*var date = new Date(),
		year = date.getFullYear(),
		mouth = date.getMonth()+1;
		
		$('#cc').html('山西硬汉科技'+mouth+'月份考勤记录');*/
	</script>
<script type="text/javascript">
  BUI.use(['common/search','common/page'],function (Search) {
    
    
	  var columns = [
          {title:'员工工号号',dataIndex:'id',width:60},
          {title:'员工姓名',dataIndex:'name',width:300},
          {title:'部门',dataIndex:'bname',width:300},
          {title:'录入时间',dataIndex:'date',width:400,},
          
        ],
      store = Search.createStore('getdata',{
    	  proxy : {

              method : 'POST'
            },
    	  autoSync : true ,//保存数据后，自动更新
          pageSize:8	
      }),
      gridCfg = Search.createGridCfg(columns,{
        plugins : [BUI.Grid.Plugins.CheckSelection] // 插件形式引入多选表格
      });
 
    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');
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
          $.ajax({
            url : '../data/del.php',
            dataType : 'json',
            data : {ids : ids},
            success : function(data){
              if(data.success){ //删除成功
                search.load();
              }else{ //删除失败
                BUI.Message.Alert('删除失败！');
              }
            }
        });
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