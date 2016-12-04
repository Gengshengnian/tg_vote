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
          <label class="control-label">姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">班级：</label>
          <div class="controls">
            <select name="classname">
              <option value="0">请选择</option>
			  <?php if(is_array($data)): foreach($data as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
          	</select>
          </div>
        </div>
        <div class="span3 offset2" >
          <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
        </div>
      </div>
    </form>
	</div>
	<div class="container">
	    <form id="searchForm" class="form-horizontal" action="<?php echo U('import');?>" enctype="multipart/form-data" method="post">
	      <div class="row">
	        <div class="control-group span10">
		          <div class="controls">
		          	<input type="file" name="file" >
		          	<input type="submit" value="导入" />
		          	<a href="<?php echo U('download');?>" >下载模板</a>
		          </div>
		     </div>
	    </form>
	  </div>

    <div class="search-grid-container">
      <div id="grid"></div>
    </div>
  </div>
  <!--转班信息栏隐藏页面-->
  <div id="changeContent" class="hide">
     <form id ="J_Form" class="form-horizontal" >
	 <input name="stu_id" type="hidden" class="control-text" value=''>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>转向班级：</label>
          <div class="controls">
          	<select name="class_id">
              <option value="0">请选择</option>
			  <?php if(is_array($data)): foreach($data as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
			</select>
          </div>

        </div>
      </div>





    </form>
  </div>

<!--编辑更新隐藏如下代码-->
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>真实姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" >

          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>：虚拟企业</label>
          <div class="controls">
			 <select name="pro_team_id">
	              <option value="0">请选择</option>
				  <?php if(is_array($team)): foreach($team as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
			  </select>
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label"><s>*</s>状态：</label>
          <div class="controls" >
            <select  name="status">
              <option value="1">1</option>
              <option value="2">2</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>性别：</label>
          <div class="controls">
          	<select  name="gender">
          		<option value="男">男</option>
				<option value="女">女</option>
            </select>
          </div>
        </div>
      	<div class="control-group span10">
          <label class="control-label"><s>*</s>民族：</label>
          <div class="controls">
            <select  name="nation">
				<option value="0">其他</option>
				<option value="1">汉</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="control-group span10">
          <label class="control-label">毕业学校：</label>
          <div class="controls">
          	<input name="school" type="text" class="control-text">
          </div>
        </div>
      	<div class="control-group span10">
			<label class="control-label">专业：</label>
			<div class="controls">
            <input name="major" type="text" class="control-text" >
			</div>
		</div>
	</div>
	<div class="row">
        <div class="control-group span10">
          <label class="control-label">学历性质：</label>
          <div class="controls">
          	<select  name="education">
				<option value="全日制">全日制</option>
				<option value="专科">专科</option>
            </select>
          </div>
        </div>
      	<div class="control-group span10">
			<label class="control-label"><s>*</s>联系电话：</label>
			<div class="controls">
            <input  placeholder="请输入数字" name="u_tel" type="text" class="control-text" data-rules="{number:true,required:true,maxlength:11,minlength:11}">
			</div>
		</div>
	</div>
    <div class="row">
        <div class="control-group span10">
          <label class="control-label">登陆名字：</label>
          <div class="controls">
          	 <input name="user_name" type="text" class="control-text" >
          	 <input name="user_id" type="hidden" class="control-text" >
          </div>
        </div>
      	<div class="control-group span10">
			<label class="control-label">实训班级：</label>
			<div class="controls">
			<select name="class_id">
              <option value="0">请选择</option>
			  <?php if(is_array($data)): foreach($data as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
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
			  {title:'编号',dataIndex:'id',width:50,renderer:function(v){
		             return Search.createLink({
		                 id : 'detail' + v,
		                 title : '客户详情',
		                 text : v,
		                 href : '<?php echo U("detail");?>'+'?id='+v
		               });
		      }},
			  {title:'姓名',dataIndex:'name',width:50},
			  {title:'编号',dataIndex:'student_number',width:100},
			  {title:'实训班级',dataIndex:'class_name',width:80},
			  {title:'项目组',dataIndex:'pro_team_name',width:50},
			  
			  {title:'性别',dataIndex:'gender',width:50,renderer:BUI.Grid.Format.enumRenderer(enumObj) },
			  {title:'学校',dataIndex:'school',width:150},
			  {title:'专业',dataIndex:'major',width:120},
			  {title:'毕业日期',dataIndex:'gradution_time',width:80},
			  {title:'学历性质',dataIndex:'education',width:50},
			  {title:'电话',dataIndex:'phone',width:80},
			  {title:'身份证',dataIndex:'idcard',width:120},
			  {title:'登录名字',dataIndex:'user_name',width:50},
			  {title:'登录ID',dataIndex:'user_id',width:50,visible:false},
              {title:'操作',dataIndex:'',width:100,renderer : function(value,obj){
			   changeclassStr  =  Search.createLink({ //链接使用 此方式
                  id : 'changeclass' + obj.id,
                  title : '转班信息登记',
                  text : '转班',
                  href : '/tg_oa_crm_20161008/index.php/Admin/StudentsChange/index/id/'+ obj.id
			   }),
              editStr1 = '<span class="grid-command btn-edit" title="编辑学生信息">编辑</span>',
              delStr = '<span class="grid-command btn-del" title="删除学生信息">删除</span>';//页面操作不需要使用Search.createLink
            return changeclassStr+editStr1 + delStr;
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