<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>活动管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
    #status{
    	text-decoration:none;
    	cursor:pointer;
    }
    </style>
  </head>
  <body>
 
 <!-- 搜索 -->

  <div class="container">
  	
     <form id="searchForm" class="form-horizontal" action="/weixin/web/tg_vote_back/index.php/Admin/VoteActivity/getData" method="post">
      <div class="row">
        <div class="control-group span7">
          <label class="control-label">活动主题：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text">
          </div>
        </div>
        
        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
     </form>   
    </div>
    <div>
    &nbsp;&nbsp;<a class="page-action" href="#" data-href="/weixin/web/tg_vote_back/index.php/Admin/VoteActivity/addInput" title="添加" data-id="test"><button style="width:60px;height:25px;"><i class="icon-plus"></i>添加</button></a>
    </div>
    
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
      
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>

<script type="text/javascript"> 

//表格

BUI.use('common/search',function (Search) {

    editing = new BUI.Grid.Plugins.DialogEditing({
      contentId : 'content', //设置隐藏的Dialog内容
      autoSave : true, //添加数据或者修改数据时，自动保存
      triggerCls : 'btn-edit'
    }),
    columns = [
		{title:'&nbsp; 编号',dataIndex:'id',width:30},
    {title:'&nbsp; 活动主题',dataIndex:'theme_name',width:90},
		{title:'&nbsp;活动规则',dataIndex:'rule_name',width:90},
		{title:'&nbsp;主办方',dataIndex:'zbf',width:80},
		{title:'&nbsp; 赞助方1',dataIndex:'zzf1',width:100},
		{title:'&nbsp; 赞助方2',dataIndex:'zzf2',width:100},
		{title:'&nbsp; 赞助方3',dataIndex:'zzf3',width:100},
		
		{title:'开始时间',dataIndex:'start_time',width:120},
		{title:'结束时间',dataIndex:'end_time',width:120},
      {title:'活动logo',dataIndex:'logo_img',width:100 , renderer : function(value,obj){

      if(value=='' || value== null)
      {
         return '没有图片';
      }

      return "<img width='30px' height='30px' src='../../../"+value+"'>"

    }},
    {title:'活动二维码',dataIndex:'ewm_img',width:100 ,renderer : function(value,obj){

      //value = obj.photo
      if(value=='' || value== null)
      {
         return '没有图片';
      }

      return "<img width='30px' height='30px' src='../../../"+value+"'>"

    }},
    {title:'活动奖品（可挖掘）',dataIndex:'city',width:100},
	{title:'状态',dataIndex:'status',width:100,renderer:function(value,obj){
      if (value==1) {
        return'<span id="sta">启用</span>';
      }else if (value==2) {
        return'<span id="sta">禁用</span>';
      }
    }},
    {title:'操作',dataIndex:'id',width:200,renderer : function(value,obj){
    	
    	if(obj.status == '1')
        {
       	 status = '<span id="btn-status" class="grid-command btn-status" title="点击修改状态" onclick="getStatus('+obj.id+','+obj.status+')">禁用</span>';
      	 }
        else	
        {
       	 status = '<span id="btn-status" class="grid-command btn-status" title="点击修改状态" onclick="getStatus('+obj.id+','+obj.status+')">启用</span>';
        }
    	 var editStrr =  Search.createLink({ //链接使用 此方式
                id : 'edit1' + obj.id,
                title : '排行榜',
                text : '排行榜',
                href : "../Player/index?id="+obj.id
              });
        var editStr =  Search.createLink({ //链接使用 此方式
                id : 'edit' + obj.id,
                title : '编辑',
                text : '编辑',
                href : "/weixin/web/tg_vote_back/index.php/Admin/VoteActivity/updateInput?id="+obj.id
              }),
     	/*   editStr1 = '<span class="grid-command btn-edit" title="修改">修改</span>', */
          delStr = '<span class="grid-command btn-del" title="删除">删除</span>';//页面操作不需要使用Search.createLink
              return status+editStrr+editStr+delStr;
    }} 
    ],
    store = Search.createStore("<?php echo U('getData');?>",{
      proxy : {
        save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
          addUrl : "<?php echo U('add');?>",
          updateUrl : "<?php echo U('update');?>",
          removeUrl : "<?php echo U('delete');?>"
        },
        method : 'POST'
      },
      autoSync : true ,//保存数据后，自动更新
      pageSize:10
    });
    if("<<?php echo ($_SESSION['user']['username']); ?>>"=="admin"){
   var  gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
           
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/weixin/web/tg_vote_back/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

   });
    }else{
  	     var  gridCfg = Search.createGridCfg(columns,{
  	          tbar : {
  	            items : [
                  
  	            ]
  	          },
  	          emptyDataTpl:'<div class="centered"><img alt="Crying" src="/weixin/web/tg_vote_back/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
  	          plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格

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

function getStatus(id,status)
{
	$.ajax({
		   type: "POST",
		   url: "<?php echo U('getStatus');?>",
		   data: "status="+status+"&id="+id,
		   success: function(msg){
			   window.location.reload();
		   }
		});
	
}


</script>
</body>
</html>