<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href ="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />  
   <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript">
     function get()
     {
      alert(11);
     }
   </script>
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
   <style type="text/css">
     .table{
      width: 1000px;
      margin-left: -100px;
     }
   </style>
 </head>
 <body>

  <div class="container">
    
<form id ="J_Form" class="form-horizontal" method="post" action="/weixin/web/tg_vote_back/index.php/Admin/Player/add" enctype="multipart/form-data">
  <h1 style="margin-left: 300px">添加参赛者</h1>
       <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>姓名：</label>
            <div class="controls">
               <input name="player_name" type="text" class="control-text" > 
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label"><s>*</s>照片：</label>
            <div class="controls">
               <input  name="head_img" type="file" class="control-text" >
            </div>
          </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>联系电话：</label>
          <div class="controls">
             <input name="tel" type="text" class="control-text" >
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>邮箱：</label>
          <div class="controls">
             <input name="email" type="text" class="control-text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">个人介绍：</label>
          <div class="controls">
             <textarea name="personal_introduction"  cols="60" rows="30"></textarea>
          </div>
        </div>
        <input type="hidden" name="activity_id" value="<?php echo ($activity_id); ?>">
      </div>
      <br><br><br>
      <div class="row">
        <div class="control-group span8">
            <label class="control-label"><s>*</s>作品：</label>
            <div class="controls">
               <input  name="production_img" type="file" class="control-text" >
            </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">作品介绍：</label>
          <div class="controls">
             <textarea name="production_introduction"  cols="60" rows="30"></textarea>
          </div>
        </div>
      </div>
        <input type="hidden" name="activity_id" value="<?php echo ($activity_id); ?>">
      </div>
      <br><br><br>
      <div class="row">
        <div class="form-actions offset3">
          <button type="submit" class="button button-primary">保存</button>
          <button type="reset" class="button">重置</button>
        </div>
      </div>
 
    </form>
    
 
  <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
  <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
  <script src="http://g.alicdn.com/bui/bui/1.1.21/config.js"></script>
 
  <script type="text/javascript">
    //   function planFormat(value){
    //   return value + '转换';
    // }
      BUI.use(['bui/grid','bui/data','bui/form'],function (Grid,Data,Form) {
      
       var columns = [
        {title : '表现(1代表优秀2代表差劲)',dataIndex :'performance',editor : {xtype : 'select',

        items : [
              {text:'表现优异',value:'1'},
              {text:'表现很差',value:'2'}
            ], 
            valueField:'hide',
            render:'#s1'

        }

        },
        {title : '学生姓名',dataIndex :'student_name',editor : {xtype : 'text',
        items:[{
          btnCls : 'button button-small',
          text : '<i class="icon-remove"></i>删除',
        }]


      }},
        {id:'student_number', title : '学号',dataIndex :'student_number',editor : {xtype : 'text', 
            items : [
      
              {text:'请选择',value:'请选择',value2:'0'}
              ], 
            valueField:'hide',
            render:'#s1'
        },
      },
      {title : '原因',dataIndex :'commit',editor : {xtype : 'text'}},

      ],
      //默认的数据
      data = [],
      store = new Data.Store({
        data:data
      }),
      editing = new Grid.Plugins.CellEditing(),
      grid = new Grid.Grid({
        render : '#grid',
        columns : columns,
        width : 700,
        forceFit : true,
        store : store,
        plugins : [Grid.Plugins.CheckSelection,editing],
        tbar:{
            items : [{
              btnCls : 'button button-small',
              text : '<i class="icon-plus"></i>添加',
              listeners : {
                'click' : addFunction
              }
            },
            {
              btnCls : 'button button-small',
              text : '<i class="icon-remove"></i>删除',
              listeners : {
                'click' : delFunction
              }
            }
            ]
        }
 
      });
    grid.render(); 
    
    store.on('update',function(ev){ //第一项改变时，清空第二项
          var record = ev.record,
            field = ev.field;
          //验证姓名是否有对应的学号
          if(field == 'student_name'){
            $.ajax({
                type:"post",
                url:'<?php echo U("dier");?>',
                data:"student="+ev.value,
                success:function(msg)
                {

                  var len = msg.length;
                  for(var i=0;i<len;i++)
                  { 
                    $('#student_number.items').val(function() {
                                    return q111;
                              });
                  }
                }
              });

            store.setValue(record,'student_number','');
            editing.edit(record,'student_number'); //第一项修改后，显示第二项编辑
          }
        });


    function addFunction(){
      var newData = {student_name :''};
      store.add(newData);
      editing.edit(newData,'student_name'); //添加记录后，直接编辑
    }
 
    function delFunction(){
      var selections = grid.getSelection();
      store.remove(selections);
    }
 
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });
    form.render();
 
    form.on('beforesubmit',function(){
      if(!editing.isValid()){
 
        return false;
      }
      var str = BUI.JSON.stringify(store.getResult());
      form.getField('good_data').set('value',str);
    });
 
      
  });  
      
</script>  
      
</script>
  </div>
</body>
    
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>

  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/prettify.js"></script>
  <script type="text/javascript">

    $(function () {
      prettyPrint();
    });
  </script>
 
</html>