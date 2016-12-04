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
    #direction{
	margin-top:35px;

    }
    #direction1{
	margin-top:25px;
    }
    #anser{
	margin-left:-4px;
    }
    #ken{
	margin-left:-1px;

    }
 /*    #one{
	position:absolute;
    left:100px;
    }
     */

   </style>
 </head>
 <body>
  <div class="container">
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">编号：</label>
          <div class="controls" >
            <input name="tet_code" type="text" >
          </div>
        </div>

         <div class="control-group span8">
 <!--没有处理了  -->  <label class="control-label">所属方向：</label>
          <div class="controls">
            <select name="direction_id"  onchange="get(this,'dir','stage')"  >
            <option value=0>请选择</option>
                 <?php if(is_array($direction)): foreach($direction as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>

           <div class="control-group span8">
   <!-- 没有处理了 -->    <label class="control-label">所属阶段：</label>
          <div class="controls">
            <select name="stage_id" id='stage' onchange="get(this,'stage','course')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>
     </div>


      <div class="row">


       <!-- 没处理了 -->  <div class="control-group span8">
          <label class="control-label">所属课程：</label>
          <div class="controls">
            <select name="course_id" id='course'  onchange="get(this,'course','days')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>


        <div class="control-group span8">
        <!--  没处理了-->  <label class="control-label">所属天：</label>
          <div class="controls">
            <select name="days_id" id='days' onchange="get(this,'days','knowledge')">
              <option value="">请选择</option>

            </select>
          </div>
        </div>

                <div class="control-group span8">
        <!-- name处理了--> <label class="control-label">知识点：</label>
          <div class="controls">
            <select   name="tet_point" id='knowledge'>
              <option value="">请选择</option>

            </select>
          </div>
        </div>
     </div>



      <div class="row">
        <div class="control-group span8">
          <label class="control-label">题目类型：</label>
          <div class="controls">
            <select name="tet_category">
              <option value="">请选择</option>
              <option value="1">单选</option>
              <option value="2">多选</option>
              <option value="3">填空</option>
              <option value="4">判断</option>
              <option value="5">简答</option>
              <option value="6">程序</option>
            </select>
          </div>
        </div>

    <div class="control-group span8">
          <label class="control-label">难度：</label>
          <div class="controls">
            <select name="tet_level">
              <option value="">请选择</option>
              <option value="1">★</option>
              <option value="2">★★</option>
              <option value="3">★★★</option>
              <option value="4">★★★★</option>
              <option value="5">★★★★★</option>
            </select>
          </div>
        </div>

       <div class="control-group span8">
         <label class="control-label">出题老师：</label>
          <div class="controls">
          <select name='teacher_id'>
       <!--      <input name="teacher_id" type="text" class="control-text"> -->

             <option value='0'>请选择</option>
             <?php if(is_array($tea)): foreach($tea as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
          </select>
          </div>
        </div>
      </div>

     <div class="row">
        <div class="control-group span8">
          <label class="control-label">出题时间：</label>
	       	<div class="controls">
	            <input name="tet_addtime" type="text" class="calendar" data-rules="{date:true}">
	          </div>
        </div>

       <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
    </div>

    </form>

<div class="container">
    <form id="searchForm" class="form-horizontal" action="<?php echo U('import');?>" enctype="multipart/form-data" method="post">
      <div class="row">
        <div class="control-group span10">
	          <div class="controls">
	          	<input type="file" name="file" >
	          	<input type="submit" value="导入" />
	          	<a href="<?php echo U('downloadTemplate');?>" >下载模板</a>
	          </div>
	     </div>
    </form>
  </div>

    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>









<!-- 添加的部分 -->

     <!-- style="height:100px;" -->

   <div id="content"   class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row" >


       <div class="control-group span8">
          <label class="control-label">题目类型：</label>
          <div class="controls">
            <select  id='type'name="tet_category" data-rules="{required:true}">
              <option value="">请选择</option>
              <option value="1">单选</option>
              <option value="2">多选</option>
              <option value="3">填空</option>
              <option value="4">判断</option>
              <option value="5">简答</option>
              <option value="6">程序</option>
            </select>
          </div>
        </div>


        <div class="control-group span8">
          <label class="control-label">编号：</label>
          <div class="controls" >
            <input name="tet_code"  readOnly="true" id='code' type="text"  >
          </div>
        </div>


           <div class="control-group span8">
          <label class="control-label">难度：</label>
          <div class="controls">
            <select name="tet_level" data-rules="{required:true}" id='lever'>
              <option value="">请选择</option>
              <option value="1">★</option>
              <option value="2">★★</option>
              <option value="3">★★★</option>
              <option value="4">★★★★</option>
              <option value="5">★★★★★</option>
            </select>
          </div>
        </div>




     </div>


      <div class="row">





       <div class="control-group span8">
          <label class="control-label" ><s>*</s>分数：</label>
          <div class="controls" id='one'>
	           <select  name="tet_score" data-rules="{required:true}">
             	<option value="">请选择</option>
              	<option value="3">3</option>
              	<option value="5">5</option>
              	<option value="10">10</option>
              	<option value="15">15</option>
              	<option value="20">20</option>
              	<option value="25">25</option>
            </select>
          </div>
        </div>



            <div class="control-group span8">
 <!--没有处理了  -->  <label class="control-label">所属方向：</label>
          <div class="controls">
            <select name="direction_id"  onchange="get(this,'dir1','stage1')" data-rules="{required:true}"  >
               <option value=0>请选择</option>
              <?php if(is_array($direction)): foreach($direction as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>


           <div class="control-group span8">
   <!-- 没有处理了 -->    <label class="control-label">所属阶段：</label>
          <div class="controls">
            <select name="stage_id" id='stage1' onchange="get(this,'stage1','course1')" >
              <option value="">请选择</option>

            </select>
          </div>
        </div>






     </div>



      <div class="row">


        <div class="control-group span8">
          <label class="control-label">所属课程：</label>
          <div class="controls">
            <select name="course_id" id='course1'  onchange="get(this,'course1','days1')" >
              <option value="">请选择</option>

            </select>
          </div>
        </div>




        <div class="control-group span8">
        <!--  没处理了-->  <label class="control-label">所属天：</label>
          <div class="controls">
            <select name="days_id" id='days1' onchange="get(this,'days1','knowledge1')" >
              <option value="">请选择</option>

            </select>
          </div>
        </div>

           <div class="control-group span8">
        <!-- name处理了--> <label class="control-label">知识点：</label>
          <div class="controls">
            <select   name="tet_point" id='knowledge1'>
              <option value="">请选择</option>

            </select>
          </div>
        </div>



      </div>

     <div class="row" >
          <div class="control-group span8">
          <label class="control-label"><s>*</s>题目：</label>
           <div class="controls">
            <textarea name="tet_content" id="" class="span5 span-width" data-rules="{required:true}"></textarea>
          </div>
        </div>

         <div class="control-group span8" id='anser'>
          <label class="control-label"><s>*</s>答案：</label>
          <div class="controls">
			  <div class="controls">
	            <textarea name="tet_answer" class="span4 span-width" data-rules="{required:true}"></textarea>
	          </div>
          </div>
        </div>

         <div class="control-group span8">
          <label class="control-label"><s>*</s>解析：</label>
          <div class="controls">
          <textarea name="tet_analyze" id="tet_analyze" class="span5 span-width" data-rules="{required:true}"></textarea>
          </div>
        </div>


    </div>

      <div class="row" >
        <div class="control-group span8" id='direction1' >
          <label class="control-label" >建议作答时间</label>
          <div class="controls">
            <input name="tet_time"  id='tet_time' type="text"  >
          </div>
        </div>

     </div>
    </form>

    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>


 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/jquery.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
   <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/table+.js"></script>
  <script type="text/javascript">

    BUI.use('common/page');
  </script>

  <!-- 联动的jquery -->
    <script>
   function get(obj,fName,sName)
  {
	 del(fName);

		$.ajax({
			type:"post",
			url:'<?php echo U("CouTable/dier");?>',
			data:"id="+obj.value+"&"+"fName="+fName+"&"+"sName="+sName,
			success:function(msg)
			{
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
					$("#stage option:not(:first)").remove();
					$("#course option:not(:first)").remove();
				    $("#days option:not(:first)").remove();
				    $("#knowledge option:not(:first)").remove();




					//$("#dir").empty();
				}

                   if( levename == "dir")
   				{
                	   $("#stage option:not(:first)").remove();
   					$("#course option:not(:first)").remove();
   				    $("#days option:not(:first)").remove();
   				    $("#knowledge option:not(:first)").remove();

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
   					$("#course1 option:not(:first)").remove();
   				  $("#days1 option:not(:first)").remove();
   				  $("#knowledge1 option:not(:first)").remove();

   					//$("#dir").empty();
   				}

                 if( levename == "stage1")
      			{
      			$("#course1 option:not(:first)").remove();

      					//$("#dir").empty();
      		    }

                if( levename == "course1")
                {
                 $("#days1 option:not(:first)").remove();

                }
                if( levename == "days1")
                {
                 $("#knowledge1 option:not(:first)").remove();

                }








		  }



  }


 $('#type').live('change',function(){

	$.post('<?php echo U("itemtype");?>',{type:$('#type').val()},
				  function(data){
					  if(data){
						$('#code').val(data);
						 }
	});


 });


 $('#lever').live('change',function(){

		$.post('<?php echo U("tet_time");?>',{tet_time:$('#lever').val()},
					  function(data){
						  if(data){
							$('#tet_time').val(data);
							 }
		});


	 });
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
           {title:'id',dataIndex:'id',width:40},
        	{title:'编号',dataIndex:'tet_code',width:40},
           {title:'题目类型',dataIndex:'tet_category',width:70},
           {title:'题目',dataIndex:'tet_content',width:200},
           {title:'难度',dataIndex:'tet_level',width:60},
           {title:'知识点',dataIndex:'tet_point',width:150},
           {title:'方向',dataIndex:'direction_id',width:150},
           {title:'阶段',dataIndex:'stage_id',width:150},
           {title:'天',dataIndex:'days_id',width:150},
           {title:'课程',dataIndex:'course_id',width:150},
           {title:'答案',dataIndex:'tet_answer',width:150},
           {title:'答案',dataIndex:'tet_answer',width:150},
           {title:'解析',dataIndex:'tet_analyze',width:150},
           {title:'出题老师',dataIndex:'teacher_id',width:100},
           {title:'添加时间',dataIndex:'tet_addtime',width:100},
            {title:'分值',dataIndex:'tet_score',width:100},
           {title:'建议作答时间',dataIndex:'tet_time',width:100},
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑职员信息">编辑</span>',
              delStr = '<span class="grid-command btn-del" title="删除职员信息">删除</span>';//页面操作不需要使用Search.createLink
            return editStr1 + delStr;
          }}
        ],
      store = Search.createStore('<?php echo U("getData");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : '<?php echo U("add");?>',
              updateUrl : "<?php echo U('update');?>",
              removeUrl : "<?php echo U('delete');?>"
          },
          method : 'POST'
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:5
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>添加',btnCls : 'button button-small',handler:addFunction},
            {text : '<i class="icon-plus"></i>删除',btnCls : 'button button-small',handler:delFunction},
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