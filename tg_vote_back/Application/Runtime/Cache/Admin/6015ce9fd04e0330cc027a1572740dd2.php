<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>巡查日报</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
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


<!-- 搜索 -->
  <div class="container">
      <div class="row">
        <form id="searchForm" class="form-horizontal span24">
          <div class="row">
            <div class="control-group span12">
                <label class="control-label"><s>*</s>班级：</label>
                <div class="controls">
                  <select id="class" name="class" >
                    <option value="0">请选择</option>
                    <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($class['id']); ?>"><?php echo ($class["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </div>
          </div>
            <div class="control-group span12">
              <label class="control-label">学生姓名：</label>
              <div class="controls">
                <input type="text" class="control-text" name="student_name">
              </div>
            </div>
            <div class="control-group span12">
              <label class="control-label">时间：</label>
              <div class="controls">
                <div class="controls">
                <input name="date" type="text" class="calendar">
              </div>
              </div>
            </div>
            <div class="span3 ">
              <button  type="button" id="btnSearch" class="button button-small  button-primary">搜索</button>
            </div>
          </div>
        </form>
      </div>
      <div class="search-grid-container">
        <div id="grid">
          <a class="page-action" data-href="/weixin/web/tg_vote_back/index.php/Admin/Player/playerAddInput/activity_id/<?php echo ($activity_id); ?>"  title="添加" data-id="test"><button style="width:80px;height:30px;"><i class="icon-plus"></i>添加</button>
          </a>
        </div>
      </div>
  </div> 
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">
  function xiugai(obj)
  {
    $("#student_name").attr("value","");
  }
  function get(obj,fName,sName)
    {
   //del(fName); 
   //alert(fName);
   //alert($("#class1").attr("value"));
    $.ajax({
      type:"post",
      url:'<?php echo U("dier");?>',
      data:"id="+obj.value+"&"+"fName="+fName+"&"+"sName="+sName+"&"+"class_id="+$("#class1").attr("value"),
      success:function(msg)
      {
        var len = msg.length;
          //$("#"+secondLevelName).empty();
          //清除上次选择痕迹
        $("#"+sName).find("option:gt(0)").remove();
        for(var i=0;i<len;i++)
          {
            var id = msg[i].id;
            var name = msg[i].name;
            //alert(sName);
            //alert(name);      
            $("#"+sName).append("<option value='"+id+"'>"+name+"</option>");
                }
      }
    });
  }
  </script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });

  </script>
  
<script type="text/javascript">
  BUI.use('common/search',function (Search) {
      var state = {"1":"睡觉","2":"玩手机","3":"走神","4":"其他"},
      editing = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'content', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-edit'
      }),
      columns = [
          {title:'序号',dataIndex:'id',width:60},
          {title:'参赛者姓名',dataIndex:'player_name',width:80},
          {title:'头像',dataIndex:'head_img',width:80,renderer : function(value,obj){

      if(value=='' || value== null)
      {
         return '没有图片';
      }

      return "<img width='30px' height='30px' src='"+value+"'>"

    }},
          {title:'参赛作品',dataIndex:'production_img',width:80,renderer : function(value,obj){

      if(value=='' || value== null)
      {
         return '没有图片';
      }

      return "<img width='30px' height='30px' src='"+value+"'>"

    }},
          {title:'作品介绍',dataIndex:'production_introduction',width:200},
          {title:'得票数',dataIndex:'num',width:100},
          {title:'电话',dataIndex:'tel',width:100},
          {title:'邮箱',dataIndex:'email',width:120},
          {title:'个人介绍',dataIndex:'personal_introduction',width:300},
        ],
      store = Search.createStore('getData/activity_id/<?php echo ($activity_id); ?>',{
        proxy : {
          save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            //addUrl : "<?php echo U('DailyPatrol/add');?>"
          },
          method : 'POST',
        },
        autoSync : true ,//保存数据后，自动更新
        pageSize:10
      }),
      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
          ]
        },
        plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');

    function addFunction(){
      
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