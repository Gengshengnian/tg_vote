<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   
	<title>程序题</title>
</head>
 <body>
  
  <div class="container">
      <form id="searchForm" class="form-horizontal span24">
        <div class="row">
		<div class="control-group span7">
            <label class="control-label">试卷编号：</label>
            <div class="controls">
              <select name="tep_code">
				  <option value="0">请选择</option>
				  <?php if(is_array($page)): foreach($page as $key=>$v): ?><option value="<?php echo ($v["tep_code"]); ?>"><?php echo ($v["tep_code"]); ?></option><?php endforeach; endif; ?>
			  </select>
            </div>
          </div>
          <div class="control-group span7">
            <label class="control-label">题目ID：</label>
            <div class="controls">
              	<input type="text" class="control-text" name="title_id">	
            </div>
          </div>
          <div class="control-group span7">
            <label class="control-label">题目关键字：</label>
            <div class="controls">
              <input type="text" class="control-text" name="tet_content">
            </div>
          </div>
 
          <div class="span3">
            <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
          </div>
		  </div>
      </form>
    
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script> 
  
  <script type="text/javascript">
  BUI.use(['common/search','bui/overlay'],function (Search,Overlay) {
    
    var enumObj = {"1":"男","0":"女"},
      columns = [
		  {title:'序号',dataIndex:'id',width:70},
          {title:'试卷编号',dataIndex:'tep_code',width:70},
          {title:'题目类型',dataIndex:'tet_category',width:70},
          {title:'题目',dataIndex:'tet_content',width:500},
          {title:'得分率(%)',dataIndex:'avg',width:70},
          {title:'客观题ID',dataIndex:'title_id',width:70},
          {title:'操作',dataIndex:'',width:100,renderer : function(value,obj){
            var editStr =  Search.createLink({ //链接使用 此方式
                id : 'edit' + obj.id,
                title : '点击查看统计图',
                text : '查看统计图',
                href : ''
              }),
              delStr = '<span class="grid-command btn-del" title="删除学生信息"></span>';//页面操作不需要使用Search.createLink
            return editStr + delStr;
          }}
        ],
     store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<<?php echo U('add');?>>",
              updateUrl : "<<?php echo U('update');?>>",
              removeUrl : "<<?php echo U('delete');?>>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:5
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
           
            
          ]
        },
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

</body>
</html>