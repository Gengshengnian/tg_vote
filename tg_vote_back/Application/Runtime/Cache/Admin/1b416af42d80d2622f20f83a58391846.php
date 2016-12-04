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
          <label class="control-label">班主任姓名：</label>
          <div class="controls">
            <select name="banzhurenname">
	          	<option value="">请选择班主任</option>
	          	<?php if(is_array($pnames)): foreach($pnames as $key=>$val): ?><option value="<?php echo ($val['name']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
	          </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">班级名字：</label>
          <div class="controls">
            <select name="banjiname">
	          	<option value="">请选择班级名字</option>
	          	<?php if(is_array($class)): foreach($class as $key=>$val): ?><option value="<?php echo ($val['name']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
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
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>

<script type="text/javascript">
  BUI.use('common/search',function (Search) {

	  var enumObj = {"1":"男","0":"女"},
	  	  cam = {"1":"优逸客","2":"硬汉科技","3":"西安"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
		  {title:'姓名',dataIndex:'tutorname',width:100},        
		  {title:'班级',dataIndex:'classname',width:100},
          {title:'课程类型',dataIndex:'carename',width:150},
          {title:'课程方向',dataIndex:'dirname',width:100},        
		  {title:'所占教室',dataIndex:'roomname',width:100},
          {title:'开始时间',dataIndex:'start',width:150},
          {title:'结束时间',dataIndex:'end',width:150},
        ],
      store = Search.createStore('<?php echo U("recorddata");?>',{
        proxy : {
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:1
      }),
      gridCfg = Search.createGridCfg(columns,{
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');
  });
</script>
<body>
</html>