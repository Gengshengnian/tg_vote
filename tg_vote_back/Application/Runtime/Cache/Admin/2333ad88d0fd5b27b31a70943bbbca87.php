<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>奖品列表</title>
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
   </style>
   <script>
		/*$(function(){
			$('#did').change(function(){
				dirval=$(this).val();
				for({})
				$('#ypay').html("<option value='"++"'>"++"</option>");
			});
		});*/
   </script>
 </head>
 <body>


  <div class="container">
<!-- 实现搜索 -->
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">商品名：</label>
          <div class="controls">
            <input type="text" class="control-text" name="prize_name">
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

    <div id="content" class="hide">
      <form id="J_Form" class="form-horizontal" action="<?php echo U('VotePrize/add');?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id">

        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>商品名</label>
            <div class="controls">
              <input name="prize_name" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
          </div>

        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>图片</label>
            <div class="controls">
              <input name="img" type="file" class="input-normal control-text" data-rules="{required:true}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span8">
            <label class="control-label">备注</label>
              <div class="controls">
                <input type="text" name="comment" class="input-normal control-text">
              </div>
          </div>
        </div>
         
      </form>
    </div>
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
 
BUI.use('common/search',function (Search) {

    // editing = new BUI.Grid.Plugins.DialogEditing({
    //   contentId : 'content', //设置隐藏的Dialog内容
    //   autoSave : true, //添加数据或者修改数据时，自动保存
    //   triggerCls : 'btn-edit'
    // }),

    editing = new BUI.Grid.Plugins.DialogEditing({

        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit',
        editor: {
        buttons:[
          { text:'添加',
            elCls : 'button button-primary',
            handler : function(){
            $('#J_Form').submit();
          }
          },
          { text:'关闭', elCls : 'button', handler : function(){ this.hide(); } }
        ]
      },
    }),
      columns = [
          {title:'奖品id',dataIndex:'id',width:100,renderer:function(v){
            return Search.createLink({
              id : 'detail' + v,
              title : '奖品信息',
              text : v,
              href : ''
            });
          }},
          {title:'奖品名',dataIndex:'prize_name',width:100},
          {title:'图片',dataIndex:'img',width:100},
          {title:'备注',dataIndex:'comment',width:100},
          {title:'操作',dataIndex:'',width:100,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑奖品">编辑</span>',
              delStr = '<span class="grid-command btn-del" title="删除奖品">删除</span>';//页面操作不需要使用Search.createLink
            return editStr1 + delStr;
          }}
        ],
      store = Search.createStore('<?php echo U("indexPrize");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('VotePrize/add');?>",
              updateUrl : "<?php echo U('VotePrize/update');?>",
              removeUrl : "<?php echo U('VotePrize/delete');?>"
          },
          method : 'POST'
        },
		//top.topManager.reloadPage(); 
        autoSync : true,//保存数据后，自动更新
        pageSize:10	 //每页五条
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
			{text : '<i class="icon-plus"></i>新建',btnCls : 'button button-small',handler:addFunction},
      {text : '<i class="icon-remove"></i>批量删除',btnCls : 'button button-small',handler : delFunction}
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/weixin/web/tg_vote_back/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
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