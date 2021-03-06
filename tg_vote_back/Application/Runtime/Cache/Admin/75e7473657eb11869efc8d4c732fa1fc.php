<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
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
          <label class="control-label">客户姓名：</label>
          <div class="controls">
            <input type="text" class="control-text" name="cname">
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
<!-- 点击跟进以后的界面  -->
  <div id="content" class="hide">
     <form id ="J_Form" class="form-horizontal" >
      <h3>基本信息</h3>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">客户编号：</label>
          <div class="controls">
            <input name="number" type="text" class="control-text" readonly>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">客户姓名：</label>
          <div class="controls">
            <input name="cname" type="text" class="control-text" data-rules="{required:true}" readonly>
			<input name="client_id" type="hidden" class="control-text">
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label">联系电话：</label>
          <div class="controls">
            <input name="ctel" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="control-group12 span8">
          <label class="control-label">意向课程：</label>
          <div class="controls">
           <select  name="did">
            	<option >请选择</option>
	            <?php if(is_array($direction)): foreach($direction as $key=>$class): ?><option value= '<?php echo ($class["id"]); ?>'> <?php echo ($class["name"]); ?> </option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label">负责人：</label>
          <div class="controls">
            <input name="rname" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>本次跟进：</label>
          <div class="controls">
            <input type="text"  name="nowfollow" readonly>
          </div>
        </div>
        
        
      </div> 

      <div class="row">
       <div class="control-group span8">
          <label class="control-label"><s>*</s>本次跟进结果：</label>
          <div class="controls" >
            <select  name="result" data-rules="{required:true}" class="input-normal">
			  <option value="">请选择</option>
              <option value="1">未报名</option>
              <option value="2">报名</option>
              <option value="3">缴费</option>
			  <option value="4">进班</option>
			  <option value="5">退费</option>
			  <option value="6">放弃</option>
            </select>
          </div>
        </div>
       <div class="control-group span8">
          <label class="control-label">下次跟进：</label>
          <div class="controls">
            <input type="text" class="calendar" name="next_follow">
          </div>
        </div> 
        <div class="control-group12 span8">
          <label class="control-label">下次跟进方式：</label>
          <div class="controls">
			<select name="follow_way">
              <option value="">请选择</option>
              <option value="面谈">面谈</option>
              <option value="电话">电话</option>
              <option value="网络">网络</option>
            </select>
          </div>
        </div>
	  
      </div>
      <div class="row">
          <div class="control-group span24">
	          <label class="control-label">备注：</label>
	          <div class="controls control-row4">
	            <textarea name="comment" class="span8 span-width"></textarea><span>(200字内)</span>
	          </div>
        </div>
      </div>

    <h3>报名缴费信息</h3>

      <div class="row">
      	<div class="control-group span8">
          <label class="control-label">预约班级：</label>
          <div class="controls">
			 <select name="class_id">
			 <option value=''>请选择</option>
			 <?php if(is_array($classname)): foreach($classname as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
      	
		<div class="control-group span8">
          <label class="control-label">付款方式：</label>
          <div class="controls">
            <select name="paytype">
              <option value="0">请选择</option>
              <option value="现金">现金</option>
            <option value="转账">转账</option>
            <option value="刷卡">刷卡</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="control-group span8">
          <label class="control-label">原价：</label>
          <div class="controls">
             <select name="ypay">
              <option value="0">请选择</option>
              <?php if(is_array($direction)): foreach($direction as $key=>$pay): ?><option value= '<?php echo ($pay["pay"]); ?>'> <?php echo ($pay["pay"]); ?> &nbsp(<?php echo ($pay["name"]); ?>) </option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
      	 <div class="control-group span8">
          <label class="control-label">缴费金额：</label>
          <div class="controls">
            <input name="spay" type="text" class="control-text" value="0">
          </div>
        </div>
      	<div class="control-group span8">
          <label class="control-label">缴费计划：</label>
          <div class="controls">
            <select name="payplan">
            	<option value="">请选择</option>
	            <option value="0">贷款</option>
	            <option value="1">一次性现金</option>
            </select>
          </div>
        </div>
      </div>
      <hr/>
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
	
	  var follow = {"1":"面谈","2":"电话","3":"网络"},
	  	  result = {"1":"未报名","2":"报名","3":"缴费","4":"进班","5":"退费","6":"放弃"},
	  	  completed = {"0":"未处理","1":"已处理"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit',
		
        
      }),
      columns = [
          {title:'编号',dataIndex:'id',width:80,renderer:function(v){
            return Search.createLink({
              id : 'detail' + v,
              title : '学生信息',
              text : v,
              href : 'detail/example.html'
            });
          }},
          {title:'客户姓名',dataIndex:'cname',width:80},
          {title:'联系电话',dataIndex:'ctel',width:80},
          {title:'意向课程',dataIndex:'dcourse',width:80},
		  {title:'意向课程',dataIndex:'did',width:80,visible:false},
		  {title:'缴费计划',dataIndex:'payplan',width:80,visible:false},
          //{title:'客户分类',dataIndex:'intention',width:100},
          {title:'本次跟进',dataIndex:'nowfollow',width:100},
          //{title:'下次跟进',dataIndex:'next_follow',width:100},
          {title:'跟进方式',dataIndex:'follow_wayname',width:100,renderer:BUI.Grid.Format.enumRenderer(follow)},
          {title:'备注',dataIndex:'comment',width:100},
          {title:'结果',dataIndex:'result',width:100,renderer:BUI.Grid.Format.enumRenderer(result)},
          {title:'负责人',dataIndex:'rname',width:100},
          {title:'是否处理',dataIndex:'completed',width:100,renderer:BUI.Grid.Format.enumRenderer(completed)},
          {title:'操作',dataIndex:'',width:100,renderer : function(value,obj){
              editStr1 = '<span class="grid-command btn-edit" title="编辑客户信息">跟进</span>';//页面操作不需要使用Search.createLink
            return editStr1;
              //return editStr1;
          }}
        ],
      store = Search.createStore('<?php echo U("getData");?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
        	  addUrl : "<?php echo U('add');?>",
              updateUrl : "<?php echo U('up');?>",
              removeUrl : "<?php echo U('del');?>"
          },
          method : 'POST'
        },
		//top.topManager.reloadPage(); 
        autoSync : true,//保存数据后，自动更新
        pageSize:5	 //每页五条
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
			//{text : '<i class="icon-edit"></i>登记',btnCls : 'button button-small',handler:addtFunction},
            //{text : '<i class="icon-plus"></i>登记',btnCls : 'button button-small',handler:addFunction},
            //{text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
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