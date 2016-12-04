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
    
<form id ="J_Form" class="form-horizontal" method="post" action="<?php echo U('add');?>" onsubmit="check()">
	<h3>基本信息</h3>
       <div class="row">
         <div class="control-group span8">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
			<input name="name" type="text" class="control-text" data-rules="{required:true}">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>来源途径：</label>
          <div class="controls">
            <select name="way" data-rules="{required:true}">
              <option value="">请选择</option>
              <option value="实训口碑">实训口碑</option>
              <option value="学生转介绍">学生转介绍</option>
              <option value="主动上门咨询">主动上门咨询</option>
              <option value="被动电话邀请">被动电话邀请</option>
              <option value="网站咨询">网站咨询</option>
              <option value="QQ咨询">QQ咨询</option>
              <option value="微信公众平台">微信公众平台</option>
              <option value="主动电话咨询">主动电话咨询</option>
              <option value="招聘网站咨询">招聘网站咨询</option>
              <option value="地面推广">地面推广</option>
              <option value="招聘会">招聘会</option>
              <option value="校企合作">校企合作</option>
            </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>意向课程：</label>
          <div class="controls">
            <select name="intention" id="intention" class="control-text" data-rules="{required:true}">
            	<option value="">请选择</option>
	            <?php if(is_array($dirtection)): foreach($dirtection as $key=>$d): ?><option value="<?php echo ($d['id']); ?>" class="dire"> <?php echo ($d["name"]); ?> </option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="control-group span8">
          <label class="control-label"><s>*</s>电话：</label>
          <div class="controls">
            <input name="tel" type="text" class="control-text"  data-rules="{required:true,number:true,maxlength:11,minlength:11,regexp:/^1[3578][0-9]{9}$/}"  data-messages="{regexp:'电话格式不正确'}" data-remote="<?php echo U('CrmClient/validate');?>">
          </div>
        </div>
         <div class="control-group span8">
          <label class="control-label">QQ：</label>
          <div class="controls">
            <input name="qq" type="text" class="control-text" data-rules="{number:true,maxlength:10}">
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">微信：</label>
          <div class="controls">
            <input name="weixin" type="text" class="control-text">
          </div>
        </div>
      </div>

      <div class="row">
         <div class="control-group span8">
          <label class="control-label"><s>*</s>目前状态：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="state">
              <option value="">请选择</option>
              <option value="1">在校学生</option>
              <option value="2">在职人员</option>
              <option value="3">待业人员</option>
            </select>
          </div>
        </div>
      	<div class="control-group span8">
          <label class="control-label"><s>*</s>性别：</label>
          <div class="controls">
            <select name="gender" data-rules="{required:true}">
              <option value = "1">男</option>
              <option value= "0">女</option>
            </select>
          </div>
        </div>
         <div class="control-group12 span8">
          <label class="control-label">出生日期：</label>
          <div class="controls">
            <input name="birthday" type="text" class="calendar">
          </div>
        </div>

      </div>




      <div class="row">
         <div class="control-group span8">
          <label class="control-label"><s>*</s>学历：</label>
          <div class="controls">
            <select name="degree" data-rules="{required:true}" >
              <option value="">请选择</option>
              <option value="初中">初中</option>
	          <option value="高中">高中</option>
	          <option value="专科">专科</option>
	          <option value="本科">本科</option>
            </select>
          </div>
        </div>

        <div class="control-group12 span8">
          <label class="control-label">录入时间：</label>
          <div class="controls">
			<input name="entrytime" type="text" value="<?php echo date('Y-m-d');?>" readonly>
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label">录入人：</label>
          <div class="controls">
            <input type="hidden"  name="entrymen_id" value='<?php echo ($_SESSION['loginedUser']['id']); ?>'></input>
			<input name="entrymen" type="text" value='<?php echo ($_SESSION['loginedUser']['username']); ?>' readonly>
          </div>
        </div> 
      </div> 
	  
	   <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>最近跟进时间：</label>
          <div class="controls">
            <div class="controls">
            <input name="followtime" type="text" class="calendar" data-rules="{required:true}">
          </div>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">下次跟进时间：</label>
          <div class="controls">
            <div class="controls">
            <input name="next_follow" type="text" class="calendar" >
          </div>
          </div>
        </div>
		 <div class="control-group span8">
          <label class="control-label">跟进方式：</label>
          <div class="controls">
            <select name="follow_way" >
              <option value="0">请选择</option>
              <option value="1">电话</option>
	          <option value="2">面谈</option>
            </select>
          </div>
        </div>
       
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">校区：</label>
          <div class="controls">
            <select name="campus">
              <option value="1">优逸客</option>
	          <option value="2">硬汉科技</option>
	          <option value="3">西安</option>
            </select>
          </div>
        </div> 
         <div class="control-group12 span8">
          <label class="control-label"><s>*</s>负责人：</label>
          <div class="controls">
            <input name="" type="text" value='<?php echo ($_SESSION['loginedUser']['username']); ?>' readonly>
			<input name="resp_id"  value='<?php echo (session('empId')); ?>' type="hidden">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>客户等级:</label>
          <div class="controls">
            <select name="intention_client">
              <option value="1">A类客户</option>
	          <option value="2">B类客户</option>
	          <option value="3">C类客户</option>
            </select>
          </div>
        </div> 
      </div>
	<div class="row">
       <div class="control-group span8">
          <label class="control-label">学校：</label>
          <div class="controls">
            <input name="school" type="text" class="control-text">
          </div>
        </div>
		 <div class="control-group span8">
          <label class="control-label">专业：</label>
          <div class="controls">
            <input name="major" type="text" class="control-text">
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">年级：</label>
          <div class="controls">
            <select name="grade">
              <option value="0">请选择</option>
              <option value="1">大一</option>
	          <option value="2">大二</option>
	          <option value="3">大三</option>
	          <option value="4">大四</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
		<div class="control-group span20">
          <label class="control-label">备注：</label>
          <div class="controls control-row4">
            <textarea name="comment" class="span8 span-width"></textarea><span>(200字内)</span>
          </div>
        </div>
         
      </div>
      <hr/>

      <h3>报名缴费信息</h3> 
	  <h4>
	  <p style="color:red">(客户状态为报名、缴费、进班时，请选择预约班级及付款事项)</p>
	  </h4>
	  <br/>
      <div class="row">
	  
	  <div class="control-group12 span8">
          <label class="control-label"><s>*</s>学员编号：</label>
          <div class="controls">
            <input name="number"  type="text" value="<?php echo ($a); ?>" readonly></input>
          </div>
        </div>
      <div class="control-group12 span8">
          <label class="control-label"><s>*</s>客户状态：</label>
          <div class="controls">
            <select name="status" data-rules="{required:true}" id="status">
			  <option value="">请选择</option>
              <option value="1">未报名</option>
	          <option value="2">报名</option>
	          <option value="3">缴费</option>
	          <option value="4">进班</option>
	         
            </select>
          </div>
        </div>
		
		<div class="control-group span8">
          <label class="control-label" id="yybj">预约班级：</label>
          <div class="controls">
             <select  name="class_id" id="class_id" >
            	<option value="">请选择</option>
	            <?php if(is_array($classname)): foreach($classname as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
        </div>
		
      </div>

      <div class="row">
      	<div class="control-group span8">
          <label class="control-label" id="fkfs">付款方式：</label>
          <div class="controls">
            <select name="paytype" id="paytype">
              <option value="">请选择</option>
              <option value="现金">现金</option>
	            <option value="银行卡">转账</option>
	            <option value="微信">微信</option>
            </select>
          </div>
        </div>
		
		
		
         <div class="control-group span8">
          <label class="control-label" id="yj">原价：</label>
          <div class="controls">
         <input type="text" name="ypay" id="ypay1" style="display:none">
            <!--<select name="ypay">
			  <option value="15800">15800</option>
              <option value="10800">12800</option>
            </select>-->
            
			<select id="ypay">
				<?php if(is_array($dirtection)): foreach($dirtection as $key=>$d): ?><option value="<?php echo ($d['id']); ?>"> <?php echo ($d["pay"]); ?> </option><?php endforeach; endif; ?>
			</select>

          </div>
        </div>
      </div>

      <div class="row">
      	 <div class="control-group span8">
          <label class="control-label" id="jfje">缴费金额：</label>
          <div class="controls">
            <input name="spay" value='0' type="text" data-rules ="{number:true}" id="spay">
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label" id="jfsj">缴费时间：</label>
          <div class="controls">
            <input name="payee_time" type="text" class="calendar" data-rules="{maxDate:'<?php echo date('Y-m-d')?>'}" id="payee_time">
          </div>
        </div>
      	<div class="control-group span8">
          <label class="control-label" id="jfjh">缴费计划：</label>
          <div class="controls">
            <select name="payplan" id="payplan">
             <option value="">请选择</option>
              <option value="0">贷款</option>
              <option value="1">一次性现金</option>
            </select>
          </div>
        </div>
      </div>
      
	  <div class="row">
		<div class="control-group span8">
          <label class="control-label" id="skr">收款人：</label>
          <div class="controls">
            <input type="hidden"  name="payee_id" value='<?php echo (session('empId')); ?>'></input>
			<input name="" type="text" value='<?php echo ($_SESSION['loginedUser']['username']); ?>' readonly>
          </div>
        </div>
	  </div>
      <hr/>

      <h3>相关联系人</h3>
        <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名1：</label>
            <div class="controls">
              <input name="linkman_one_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系1：</label>
            <div class="controls">
              <select  name="linkman_one_rel" class="input-normal">
                <option value="">请选择</option>
                <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话1：</label>
            <div class="controls">
              <input name="linkman_one_tel" type="text" data-rules="{number:true ,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>
      </div>
      
      <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名2：</label>
            <div class="controls">
              <input name="linkman_two_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系2：</label>
            <div class="controls">
              <select  name="linkman_two_rel" class="input-normal">
                <option value="0">请选择</option>
                <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话2：</label>
            <div class="controls">
              <input name="linkman_two_tel" type="text" data-rules="{number:true,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>
      </div>
      
      
      <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名3：</label>
            <div class="controls">
              <input name="linkman_three_name" type="text" class="input-normal control-text" >
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">关系3：</label>
            <div class="controls">
              <select  name="linkman_three_rel" class="input-normal">
                <option value="0">请选择</option>
               <option value="1">父亲</option>
                <option value="2">母亲</option>
                <option value="3">兄弟</option>
                <option value="4">姐妹</option>
              </select>
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">联系电话3：</label>
            <div class="controls">
              <input name="linkman_three_tel" type="text" data-rules="{number:true,maxlength:11}" class="input-normal control-text" >
            </div>
          </div>
      </div>
      
      <div class="row">
        <div class="form-actions offset3">
          <button type="submit" class="button button-primary">保存</button>
          <button type="reset" class="button">重置</button>
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
		
		
		//意向课程改变原价随之改变
		$('#intention').change(function(){
			var dire=$(this).find('option:selected').val();
			$('#ypay option').each(function(k,v){
				if (dire==$(v).val())
				{
					$('#ypay').hide();
					$('#ypay1').val($(v).text()).attr('disabled','disabled');
					$('#ypay1').show();
					}
			});
			
		});

		//客户状态改变决定预约班级及付款相关
		$('#status').change(function(){
			var status=$(this).find('option:selected').val();
			//alert(status);
			if(status>1){
				//alert(111);
				$('#yybj').html('<s>*</s>预约班级：');
				$('#fkfs').html('<s>*</s>付款方式：');
				$('#yj').html('<s>*</s>原价：');
				$('#jfje').html('<s>*</s>缴费金额：');
				$('#jfsj').html('<s>*</s>缴费时间：');
				$('#jfjh').html('<s>*</s>缴费计划：');
				$('#skr').html('<s>*</s>收款人：');
				$('#class_id,#payplan,#payee_time,#spay,#paytype').attr('required','true}');
				
			}

		});
    });
  </script>
 
<script type="text/javascript">

  BUI.use(['bui/grid','bui/data','bui/form'],function (Grid,Data,Form) {

	  var columns = [
	                 {title : '姓名',dataIndex :'cname'},
	                 {title : '关系',dataIndex :'crel'},
	                 {title : '电话',dataIndex :'ctel'},
	                 {title : 'qq',dataIndex :'cqq'},
	                 {title : '操作',renderer : function(){
	                   return '<span class="grid-command btn-edit">编辑</span>';
	                 }}
      ],
      //默认的数据
      data = [
        {cname:'',crel:'',ctel:'',cqq:''},
      ],
      
      store = new Data.Store({
         save:"<?php echo U('add');?>",
		data:data
      }),
      editing = new Grid.Plugins.DialogEditing({
        contentId : 'content',
        triggerCls : 'btn-edit',
        eidtor : {
          focusable : false
        }
      }),
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
          }]
        }

      });
    grid.render();

    function addFunction(){
      var newData = {cname:""};
      editing.add(newData); //添加记录后，直接编辑
    }

    function delFunction(){
      var selections = grid.getSelection();
      store.remove(selections);
    }

    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();

    /*
    var field = form.getField('contact');
    form.on('beforesubmit',function(){
      var records = store.getResult();
      field.set('value',BUI.JSON.stringify(records));
    });
    */
  });
</script>

<body>
</html>