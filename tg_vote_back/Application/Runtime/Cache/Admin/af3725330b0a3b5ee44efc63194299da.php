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
          <label class="control-label">班级名称：</label>
          <div class="controls">
            <select name="cname">
              <option value="">请选择</option>
              <?php if(is_array($arr)): foreach($arr as $key=>$a): ?><option value="<?php echo ($a['id']); ?>"><?php echo ($a['name']); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">姓名：</label>
          <div class="controls">
           <input type='text' name='yname'>
          </div>
        </div>
         <!-- <div class="control-group span8">
          <label class="control-label">状态：</label>
          <div class="controls">
            <select name="status">
              <option value="1">空闲</option>
              <option value="0">忙碌</option>
          	</select>
          </div>
        </div> -->
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

	  
      columns = [
		  {title:'编号',dataIndex:'id',width:50},
          {title:'姓名',dataIndex:'yname',width:100},
          {title:'班级',dataIndex:'cname',width:100},
		  {title:'课程',dataIndex:'kname',width:150},
          {title:'开始时间',dataIndex:'start',width:100},
          {title:'预计结束时间',dataIndex:'end',width:100},
		  /* {title:'状态',dataIndex:'status',width:100},  */
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
        	  viewCouTableStr =  Search.createLink({ //链接使用 此方式
                  id : 'edit' + obj.id,
				  cname:'edit' +obj.cname,
				  start:'edit' +obj.start,
                  title : '查看课程表',
                  text : '查看课程表',
                  href : '<?php echo U("coursetable");?>'+"?id="+obj.id +"&cname="+obj.cname+"&start="+obj.start
                });
            return viewCouTableStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        //plugins : [BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
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