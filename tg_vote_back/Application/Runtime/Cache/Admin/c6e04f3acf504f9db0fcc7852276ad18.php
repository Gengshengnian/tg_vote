<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript">
			function getStages(obj,firstLevelName,secondLevelName)
			{
				
				$.ajax({
					type:"post",
					url:"/tg_oa_crm_20161008/index.php/Admin/HisScores/getSecondLevelResourses",
					data:"id="+obj.value+"&"+"firstLevelName="+firstLevelName+"&"+"secondLevelName="+secondLevelName,
					success:function(msg)
					{
						var len = msg.length;
						$("#"+secondLevelName).empty();
						$("#"+secondLevelName).append("<option value='0'>请选择班级</option>");
						for(var i=0;i<len;i++)
							{
								var id = msg[i].id;
								var name = msg[i].name;
								
								$("#"+secondLevelName).append("<option value='"+id+"'>"+name+"</option>");
								
							}
					}
				});
			}
			//ajex提交过滤条件到导出方法，导出相应记录
			/* function getExport(){
				var direction = $("#directionId option:selected").val();
				var classid = $("#class option:selected").val();
				var sname = $("#sname").val();
				var fha = $("#fha option :selected").val();
				var sum = $("#sum").val();
				$.ajex({
					type:"post",
					url:"/tg_oa_crm_20161008/index.php/Admin/HisScores/search",
					data="directionId="+direction+"&"+"classId="+classid+"&"+"sname"+sname+"&"+"fha"+fha+"&"+"sum"+sum,
					$(.table-content).html();
				})
			} */
			

	</script>
</head>
<body>
	<div class="container">
    <form id="searchForm" class="form-horizontal" tabindex="0" style="outline: none;">
              <div class="row">
              
              	<div class="control-group span7">
                  <label class="control-label">试卷编号：</label>
                  <div class="controls">
					<select name="tep_code">
						<option value="0">请选择</option>
						<?php if(is_array($page)): $i = 0; $__LIST__ = $page;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["tep_code"]); ?>"><?php echo ($vo["tep_code"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				    </select>
                  </div>
                </div>
              
                <div class="control-group span7">
                  <label class="control-label">所属方向：</label>
                  <div class="controls">
                   	<select name="dirname">
						<option value="0">请选择方向</option>
						<?php if(is_array($dir)): $i = 0; $__LIST__ = $dir;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				    </select>
                  </div>
                </div>
                <div class="control-group span7">
                  <label class="control-label">班级：</label>
                  <div class="controls">
                    	<select name="name">
			              <option value="0">请选择</option>
			              <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			            </select>
                  </div>
                </div>
                
                    

                
                <div class="control-group span3">
                  <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
                </div>
              
            </form>
		</div>  
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>
  
说明：统计在试卷一样的情况下，每班的平均分对比

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
		  {title:'序号',dataIndex:'id',width:50},
		  {title:'试卷编号',dataIndex:'tep_code',width:60},
          {title:'日期',dataIndex:'tes_date',width:60},
		  {title:'班级',dataIndex:'name',width:70},
		  {title:'方向',dataIndex:'dirname',width:100},
		  {title:'课程',dataIndex:'kname',width:100},
		  {title:'天',dataIndex:'dayname',width:100},
		  {title:'阶段',dataIndex:'jname',width:100},
		  {title:'及格率(%)',dataIndex:'jigelv',width:100},
		  {title:'班级平均分',dataIndex:'avg',width:100},      
          {title:'统计图',dataIndex:'',width:150,renderer : function(value,obj){
        	  viewCouTableStr =  Search.createLink({ //链接使用 此方式
                  id : 'edit' + obj.id,
                  title : '查看统计图',
                  text : '查看统计图',
                  href : '<?php echo U("coursetable");?>'+"?id="+obj.id+"&name="+obj.name+"&start="+obj.start
                }),
				 editStr1 = '<span class="grid-command btn-edit" title=""></span>',
              delStr = '<span class="grid-command btn-del" title=""></span>';//页面操作不需要使用Search.createLink
            return viewCouTableStr+editStr1 + delStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : '<?php echo U("add");?>',
              updateUrl : "<<?php echo U('updata');?>>",
              removeUrl : "<<?php echo U('delete');?>>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>导入',btnCls : 'button button-small',handler:addFunction}
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