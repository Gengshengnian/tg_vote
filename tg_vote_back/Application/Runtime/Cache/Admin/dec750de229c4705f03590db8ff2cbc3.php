<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="path/to/multiselect.css" media="screen" rel="stylesheet" type="text/css">
       <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/aa.css" rel="stylesheet" type="text/css" />
  
    
    <head>
   
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   .control-group{
	margin-top:10px;
   	
   }
   .button{
	 margin-top:10px;
   	
   }
   </style>
 </head>
 <body>

  <a  class='button' href='<?php echo U("coursetable");?>'>点击进入自动加载 课程表</a>
   <!--搜索  -->
  <div class="container">
    <form id="searchForm" class="form-horizontal">
      <div class="row">
        <div class="control-group span8">
         <label class="control-label"><s>*</s>班级：</label>
			<select  name="class_id">
			 <option value="0">请选择</option>
			<?php if(is_array($res)): foreach($res as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
           </select>
        </div>
        <div class="control-group span8">
         <label class="control-label"><s>*</s>方向：</label>
			<select  name="direction_id"  onchange="get(this,'dir2','stage2')">
              <option value="0">请选择</option>
              <?php if(is_array($res1)): foreach($res1 as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
            </select>
       </div>
        <div class="control-group span8">
           <label class="control-label"><s>*</s>阶段：</label>
			<select  name="stage_id" id='stage2'>
			 <option value="0">请选择</option>
           </select>
        </div>
      </div>
      <div class="row">
        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
    </form>

    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>	  

  
   <!-- 弹出区域 -->
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row">
         <div class="control-group span10">
          <label class="control-label" ><s>*</s>班级：</label>
			<select  name="class_id" id='class'>
			 <option value="0">请选择</option>
			 <?php if(is_array($res)): foreach($res as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
           </select>
        </div>
        <div class="control-group span10">
          <label class="control-label"><s>*</s>方向：</label>
			<select  id='dir' name="direction_id"   onchange="get(this,'dir','stage')" >
              <option value="0">请选择</option>
              <?php if(is_array($res1)): foreach($res1 as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
          </select>
      
        </div>
      </div>
      
      
        <div class="row">
         <div class="control-group span10">
          <label class="control-label"><s>*</s>阶段：</label>
			<select  name="stage_id" id='stage'  onchange="get(this,'stage','course')">
			 <option value="0">请选择</option>
			
           </select>
        </div>
        <div class="control-group span10">
        
          <label class="control-label"><s>*</s>课程：</label>
			<select  name="course_id"  id='course' onchange="get(this,'course','days')">
              <option value="0">请选择</option>
   
            
            </select>
      
        </div>
      </div>
 
        <div class="row">
         <div class="control-group span10">
          <label class="control-label"><s>*</s>所属天：</label>
			<select  name="course_days_id" id='days'>
			 <option value="0">请选择</option>
		
           </select>
        </div>
        <div class="control-group span10">
        
          <label class="control-label"><s>*</s>讲师：</label>
			<select  name="teacher_id">
              <option value="0">请选择</option>
              <?php if(is_array($res5)): foreach($res5 as $key=>$vo): ?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </div>
      </div>
      

   <div class="row">
        <div class="control-group span10 ">
          <label class="control-label">上课时间：</label>
          <div class="controls">
          <input name='date' type="text" class="control-text calendar" value= "<?php echo date('Y-m-d');?>" >
          </div>
        </div>
	</div>
   </form>
  </div>
  
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/jquery.js"></script>
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/js/table+.js"></script>
  
 <script>
  
  function get(obj,fName,sName)
  {
	 del(fName); 
	 
		$.ajax({
			type:"post",
			url:'<?php echo U("dier");?>',
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
	 
	  
	  
	  
		/* 删除函数 */
	function del(levename)
		  {
              if( levename == "class")
				{   
					$("#dir option:not(:first)").remove();
					
					//$("#dir").empty(); 
					$("#stage option:not(:first)").remove();
					$("#course option:not(:first)").remove();
					$("#days option:not(:first)").remove();
					
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
	 }  
	  
  }
  
     
 </script>

  
  
  
  
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
              {title:'',dataIndex:'id',width:50},
 			  {title:'班级',dataIndex:'name1',width:100},
 			  {title:'方向',dataIndex:'direction',width:100},
 			  {title:'阶段',dataIndex:'stage',width:100},
 			  {title:'课程',dataIndex:'course',width:100},
 			  {title:'第几天',dataIndex:'name2',width:120},
 			  {title:'讲师',dataIndex:'name3',width:100},
 			  {title:'开班时间',dataIndex:'date',width:100}
 			
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
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
            {text : '<i class="icon-plus"></i>添加',btnCls : 'button button-small',handler:addFunction}
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