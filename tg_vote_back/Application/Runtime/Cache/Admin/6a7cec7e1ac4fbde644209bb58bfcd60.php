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
            <select  name="room_id">
          		<option value="0">请选择</option>
	          	<?php if(is_array($class)): foreach($class as $key=>$val): ?><option value="<?php echo ($val['room_id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">项目室：</label>
          <div class="controls">
			<select  name="room_id">
          		<option value="0">请选择</option>
	          	<?php if(is_array($team)): foreach($team as $key=>$val): ?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
	  </div>
	  <div class="row">
		<div class="control-group span8">
        <label class="control-label">班级类别：</label>
        <select  name="cate_class_id">
          		<option value="0">请选择</option>
	          	<?php if(is_array($cate)): foreach($cate as $key=>$val): ?><option value="<?php echo ($val['id']); ?>"><<?php echo ($val['name']); ?>></option><?php endforeach; endif; ?>
            </select>
        </div>
		 <div class="control-group span8">
          <label class="control-label">开始时间：</label>
          <div class="controls">
            <input name="start" type="text" class="calendar">
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

v <!-- 添加页面 -->
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >

      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>方向：</label>
          <div class="controls">
            <select id="dire_id" name="dire_id">
              <option value="0">请选择</option>
              <?php if(is_array($dire)): foreach($dire as $key=>$val): ?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>

        <div class="control-group span8">
          <label class="control-label"><s>*</s>班级类别：</label>
          <div class="controls">
            <select  name="cate_class_id">
              <option value="0">请选择</option>
              <?php if(is_array($cate)): foreach($cate as $key=>$val): ?><option value="<?php echo ($val['id']); ?>"><<?php echo ($val['name']); ?>></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
        
      </div>
      <div  class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>开始时间：</label>
          <div class="controls">
            <input  id='start' name="start" type="text" class="calendar" data-rules="{required:true}">
          </div>
        </div>

        <div class="control-group span8">
          <label class="control-label">预计结束时间：</label>
          <div class="controls"  id='end'>
           
          </div>
        </div>

      </div>

      <div class="row">
         <div class="control-group span8">
          <label class="control-label"><s>*</s>班级名称：</label>
          <div class="controls">
              <input id="class_name" name="name" type="text" class="control-text">
          </div>
        </div>

        <div class="control-group span8">
          <label class="control-label">项目室：</label>
          <div class="controls" >
           <select  name="room_id">
              <option value="0">请选择</option>
              <?php if(is_array($team)): foreach($team as $key=>$val): ?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="control-group span8">
          <label class="control-label">实训督导：</label>
          <div class="controls">
             <select  name="banzhuren_id">
              <option value="0">请选择</option>
                <?php if(is_array($pnames)): foreach($pnames as $key=>$val): ?><option value="<?php echo ($val['banzhuren_id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
              </select>
          </div>
        </div>

        <div class="control-group span8">
          <label class="control-label">讲师：</label>
          <div class="controls">
			       <select  name="teacher_id">
          		<option value="0">请选择</option>
	          		<?php if(is_array($teach_names)): foreach($teach_names as $key=>$val): ?><option value="<?php echo ($val['teacher_id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
              </select>
          </div>
        </div>
      </div>

       <div class="row">

        <div class="control-group span8">
          <label class="control-label">就业督导：</label>
          <div class="controls">
             <select  name="job_id">
              <option value="0">请选择</option>
                <?php if(is_array($job_names)): foreach($job_names as $key=>$val): ?><option value="<?php echo ($val['job_id']); ?>"><?php echo ($val['name']); ?></option><?php endforeach; endif; ?>
              </select>
          </div>
        </div>

      </div>

      
    </form>
  </div>

  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/bui-min.js"></script>


  <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
 
<script>
   $(document).ready(function(){

    /*
      添加班级时候当开始日期选择之后
      1 显示预计结束时间
      2 确定班级名称
    */
	  $('#start').live('change',function(){
		    
      var direction_id = $('#dire_id').val();

      var direction_name = $("#dire_id option[value="+direction_id+"]").text();

      if( direction_id > 0)
      {
          //ajax请求填写预计结束日期
          $.post('<?php echo U("CouTable/course");?>',{start:$('#start').val()},
                function(data){
                  if(data){
                   var len =data.length; 

                    for( var i=0;i<len;i++){
                       $('#end').empty();//清空原有数据
                       var date =data[i].date;
                       $('#end').append('<input name="pre_end" type="text"  disabled="true" value='+date+'  data-rules="{required:true}">');   
                    
                    } 
                    
                  }
              }   
              
          );

          //ajax请求定名字
          $.post('<?php echo U("Class/getClassNumByMonth");?>',{start_date:$('#start').val()},
              function(data){

                  var start_date = $('#start').val();

                  $('#class_name').val(direction_name+start_date.substr(2,2)+start_date.substr(5,2) +'-'+(data+1) );

              }   
              
          );
      }else
      {
          alert('请先选择方向!');
          $('#start').val('');//清空原有数据
      }

      
     


	  }); 
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
		  {title:'编号',dataIndex:'id',width:50},
          {title:'班级名称',dataIndex:'class_name',width:100},
          {title:'方向',dataIndex:'direction_name',width:60},
          {title:'当前讲师',dataIndex:'teacher_name',width:60},
          {title:'当前实训督导',dataIndex:'class_teacher_name',width:60},
          {title:'当前就业督导',dataIndex:'job_name',width:60},
          {title:'当前项目室',dataIndex:'room_name',width:100},
          {title:'班级类别',dataIndex:'category_name',width:100},
          {title:'开训时间',dataIndex:'start',width:100},
          {title:'预计结训时间',dataIndex:'pre_end',width:100},           
          {title:'操作',dataIndex:'',width:150,renderer : function(value,obj){
        	  viewCouTableStr =  Search.createLink({ //链接使用 此方式
                  id : 'edit' + obj.id,
                  name: 'edit' + obj.name,
                  start : 'edit' + obj.start,
                  title : '查看课程表',
                  text : '查看课程表',
                  href : '<?php echo U("coursetable");?>'+"?id="+obj.id+"&name="+obj.name+"&start="+obj.start
                }),
              editStr1 = '<span class="grid-command btn-edit" title="编辑职员信息">编辑</span>',
              delStr = '<span class="grid-command btn-del" title=""></span>';//页面操作不需要使用Search.createLink
            return viewCouTableStr+editStr1 + delStr;
          }}
        ],
      store = Search.createStore('getData',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : '<?php echo U("add");?>',
              updateUrl : "<?php echo U('update');?>",
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