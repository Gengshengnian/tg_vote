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
          <label class="control-label">所属方向：</label>
          <div class="controls">
                        <select  name="direction_id"  onchange="get(this,'dir','stage')" >

		          		<option value="0">请选择</option>
		          <?php if(is_array($direction)): foreach($direction as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

		      </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">所属阶段：</label>
          <div class="controls">
            <select name="stage_id" id='stage' onchange="get(this,'stage','course')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>
        <div class="control-group span8">
        <label class="control-label">所属课程：</label>
          <div class="controls">
            <select name="course_id" id='course'  onchange="get(this,'course','days')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>

        <div class="control-group span8">
        <label class="control-label">所属天：</label>
          <div class="controls">
            <select name="days_id" id='days' onchange="get(this,'days','knowledge')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">知识点：</label>
          <div class="controls">

             <input type="text" id='knowledge' name="name">

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
          <label class="control-label"><s>*</s>所属方向：</label>
          <div class="controls">
          	 <select  name="direction_id" id="direction_id1" onchange="get(this,'dir1','stage1')">

		          		<option value="0">请选择</option>
		            <?php if(is_array($direction)): foreach($direction as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

		      </select>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="control-group span10">
          <label class="control-label"><s>*</s>所属阶段：</label>
          <div class="controls" >

             <select  name="stage_id" id='stage1' onchange="get(this,'stage1','course1')">

		          		<option value="">请选择</option>
		            <?php if(is_array($stage)): foreach($stage as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

		      </select>
          </div>
        </div>
      </div>
    	<div class="row">

        <div class="control-group span10">
          <label class="control-label"><s>*</s>所属课程：</label>
          <div class="controls" >

             <select  name="course_id"  id='course1' onchange="get(this,'course1','days1')">

		          		<option value="">请选择</option>
		              <?php if(is_array($course)): foreach($course as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

		      </select>
          </div>
        </div>
      </div>

          <div class="row">
          <div class="control-group span10">
          <label class="control-label"><s>*</s>所属天：</label>
          <div class="controls">
             <select  name="day_id"  id='days1' onchange="get(this,'days1','knowledge1')">

		          		<option value="0">请选择</option>
		             <?php if(is_array($days)): foreach($days as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

		      </select>
          </div>
          </div>
       </div>


      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>知识点名字：</label>
          <div class="controls">
            <input name="name" type="text" id="knowledge1" class="control-text" data-rules="{required:true}">
          </div>
        </div>
       </div>
       <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>知识点顺序：</label>
          <div class="controls">
            <input name="sequence" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
       </div>
         <div class="row">
	     <div class="control-group span10">
	          <label class="control-label">知识难易程度：</label>
	          <div class="controls">
	            <select name="is_difficult">
	                <option value="0">请选择</option>
	            	<option value=1>★</option>
	            	<option value=2>★★</option>
	            	<option value=3>★★★</option>
	            	<option value=4>★★★★</option>
	            </select>
	          </div>
	        </div>
	      </div>
	     <div class="row">
	     <div class="control-group span10">
	          <label class="control-label">知识点是否重要：</label>
	          <div class="controls">
	             <select name="is_important">
	                <option value="">请选择</option>
	            	<option value=1>是</option>
	            	<option value=2>否</option>
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
      <script>
   function get(obj,fName,sName)
  {
	 del(fName);

		$.ajax({
			type:"post",
			url:'<?php echo U("Kpoint/dier");?>',
			data:"id="+obj.value+"&"+"fName="+fName+"&"+"sName="+sName,
			success:function(msg){
				var len = msg.length;
				//$("#"+secondLevelName).empty();
				for(var i=0;i<len;i++)
					{

						var id = msg[i].id;
						var name = msg[i].name;
						//$("#dir").val(0);
						$("#"+sName).append("<option value='"+id+"'>"+name+"</option>");
					}
			}
		});




		/*   /* 删除函数 */
		  function del(levename)
		  {
                   if( levename == "class")
				{
					$("#dir option:not(:first)").remove();

					//$("#dir").empty();
				}

                   if( levename == "dir")
   				{
   					$("#stage option:not(:first)").remove();

   					//$("#dir").empty();
   				}

                 if( levename == "stage")
      			{
      			$("#course option:not(:first)").remove();

      					//$("#dir").empty();
      		    }

                if( levename == "course")
                {
                 $("#days option:not(:first)").remove();

                }
                if( levename == "days")
                {
                 $("#knowledge option:not(:first)").remove();

                }
                if( levename == "dir1")
   				{
   					$("#stage1 option:not(:first)").remove();

   					//$("#dir").empty();
   				}

                 if( levename == "stage1")
      			{
      			$("#course1 option:not(:first)").remove();

      					//$("#dir").empty();
      		    }

                if( levename == "course")
                {
                 $("#days1 option:not(:first)").remove();

                }
                if( levename == "days")
                {
                 $("#knowledge1 option:not(:first)").remove();

                }
		  }

  }
  </script>



<script type="text/javascript">
  BUI.use('common/search',function (Search) {

      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),

      columns = [
          {title:'id',dataIndex:'id',width:50},
          {title:'知识点名字',dataIndex:'name',width:200},
          {title:'顺序',dataIndex:'sequence',width:60},
          {title:'所属天',dataIndex:'day_name',width:100},
          {title:'所属天',dataIndex:'day_id',width:150,visible:false},
          {title:'所属课程',dataIndex:'course_name',width:100},
          {title:'所属课程',dataIndex:'course_id',width:120,visible:false},
          {title:'所属阶段',dataIndex:'stage_name',width:150},
          {title:'所属阶段',dataIndex:'stage_id',width:120,visible:false},
          {title:'所属方向',dataIndex:'direction_name',width:90},
          {title:'所属方向',dataIndex:'direction_id',width:90,visible:false},
          {title:'难易程度',dataIndex:'xingxing',width:90},
          {title:'是否重要',dataIndex:'is_important1',width:80},
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑职员信息">编辑</span>',
              delStr = '<span class="grid-command btn-del" title="删除职员信息">删除</span>';//页面操作不需要使用Search.createLink
            return editStr1 + delStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('add');?>",
              updateUrl : "<?php echo U('update');?>",
              removeUrl : "<?php echo U('delete');?>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>添加',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-plus"></i>删除',btnCls : 'button button-small',handler:delFunction}
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