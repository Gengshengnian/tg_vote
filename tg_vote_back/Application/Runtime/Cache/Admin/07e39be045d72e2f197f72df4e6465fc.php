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
          <label class="control-label">联系电话：</label>
          <div class="controls">
            <input name="tel" type="text" class="control-text">
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="control-group span8">
          <label class="control-label">登记日期：</label>
          <div class="controls">
            <input name="entrytime" type="text" class="calendar" >
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

  <!-- 点击编辑按钮 弹出以下div -->
    <div id="editContent" class="hide">

    <form class="form-horizontal" method="post" >
     <input type="hidden" name='id'>
      <h3>基本信息</h3>
       <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>来源途径：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="way">
              <option value="">请选择</option>
              <option value="熟人介绍">熟人介绍</option>
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
          <!-- <div class="controls">
            <input name="dirames" type="text" class="span5 span-width control-text"  data-rules="{required:true}"><br/>
          </div> -->
          <select id="intention" name="intention" data-rules="{required:true}">
	          <option value=''>-请选择</option>
	          <?php if(is_array($dirs)): foreach($dirs as $key=>$val): ?><option value='<?php echo ($val["id"]); ?>'><?php echo ($val["name"]); ?></option><?php endforeach; endif; ?>
          </select>
          
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="name" type="text" class="control-text" data-rules="{required:true}" readonly>
          </div>
        </div>
      </div>

      <div class="row">

         <div class="control-group span8">
          <label class="control-label"><s>*</s>电话：</label>
          <div class="controls">
            <input name="tel" type="text" class="span5 span-width control-text"  data-rules="{required:true,number:true,maxlength:11,regexp:/^1[3578][0-9]{9}$/}"  data-messages="{regexp:'电话格式不正确'}">
          </div>
        </div>
         <div class="control-group span8">
          <label class="control-label">QQ：</label>
          <div class="controls">
            <input name="qq" type="text" class="span5 span-width control-text" data-rules="{number:true,maxlength:10}">
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
          <label class="control-label">性别：</label>
          <div class="controls">
            <select name="gender">
              <option value="1">男</option>
              <option value="0">女</option>
            </select>
          </div>
        </div>
         <div class="control-group12 span8">
          <label class="control-label">出生日期：</label>
          <div class="controls">
            <input name="birthday" type="text" class="calendar">
          </div>
        </div>
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
      </div>

      <div class="row">

         <div class="control-group span8">
          <label class="control-label"><s>*</s>学历：</label>
          <div class="controls">
            <select name="degree" data-rules="{required:true}">
              <option value="0">请选择</option>
              <option value="初中">初中</option>
	          <option value="高中">高中</option>
	          <option value="专科">专科</option>
	          <option value="本科">本科</option>
            </select>
          </div>
        </div>
		<div class="control-group span8">
          <label class="control-label">学校：</label>
          <div class="controls">
            <input name="school" type="text" class="span5 span-width control-text">
          </div>
        </div>
		 <div class="control-group span8">
          <label class="control-label">专业：</label>
          <div class="controls">
            <input name="major" type="text" class="control-text">
          </div>
        </div>
      </div>


      <div class="row">
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
        <div class="control-group12 span8">
          <label class="control-label"><s>*</s>录入人：</label>
          <div class="controls">
            <input name="chargename" type="text" readonly>
          </div>
        </div>
       	<div class="control-group12 span8">
          <label class="control-label"><s>*</s>录入时间：</label>
          <div class="controls">
			<input name="entrytime" type="text" value='<<?php echo ($entrytime); ?>>' readonly>
          </div>
        </div>

      </div>

      <div class="row">

         <div class="control-group12 span8">
          <label class="control-label"><s>*</s>负责人：</label>
          <div class="controls">
            <input name="chargename" type="text"  readonly>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label"><s>*</s>客户分级：</label>
          <div class="controls">
            <select data-rules="{required:true}" name="intention_client">
              <option value="">请选择</option>
              <option value="1">A类客户</option>
              <option value="2">B类客户</option>
              <option value="3">C类客户</option>
            </select>
          </div>
        </div>
         <div class="control-group span8">
        	<label class="control-label">类型：</label>
        	<div class="controls">
          		<select  name="type" class="input-normal">
                <option value="2">编辑</option>
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
                <option value="0">请选择</option>
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

     </form>
  </div>

<!-- 点击制定跟进计划  弹出以下div 其中显示一个表单 主要包括下次跟进时间  下次跟进方式-->
    <div id="followContent" class="hide">
    
     <form id ="J_Form_follow" class="form-horizontal" action="<?php echo U('CrmDistribution/addfollow');?>" >
      <input name="tci_id" type="hidden" class="control-text">
      <div class="row">
        <div class="control-group12 span8">
          <label class="control-label"><s>***</s>下次跟进时间：</label>
          <div class="controls">
            <input name="trailtime" id='trailtime' type="text" class="calendar" data-rules="{required:true,date:true}">
          </div>
        </div>
		         <div class="control-group12 span8">
          <label class="control-label"><s>***</s>下次跟进方式：</label>
          <div class="controls">
			<select data-rules="{required:true}" name="follow_way" id='follow_way'>
              <option value="">请选择</option>
              <option value="2">面谈</option>
              <option value="1">电话</option>
            
            </select>
          </div>
        </div>
      </div>
 		<!-- <div class="control-group12 span8">
        	<table width="600px">
        		<tr>
        			<td width="20">客户</td>
        			<td width="20">跟进时间</td>
        			<td width="20">状态</td>
        			<td width="20">是否跟进</td>
        		</tr>
        	</table>
        </div> -->
    </form>

  </div>


	<!-- 点击申请调价 弹出以下div 其中显示一个表单 主要包括原价格 调价 原因 -->
    <div id="applyContent" class="hide">
     <form id ="J_Form_apply" class="form-horizontal"  >
      <input name="tci_id" type="hidden" class="control-text">
      <div class="row">
        <div class="control-group span16">
          <label class="control-label"><s>*</s>原价：</label>
          <div class="controls">
            <input name="yprice" id='yprice' type="text" class="control-text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span16">
          <label class="control-label"><s>*</s>申请价：</label>
           <div class="controls">
            <input name="sprice" id='sprice' type="text" class="control-text">
          </div>
        </div>
      </div>
   	  <div class="row">
        <div class="control-group span16">
          <label class="control-label">调价原因：</label>
          <div class="controls control-row4">
            <textarea name="reason" id='reason' class="span8 span-width"></textarea><span>(200字内)</span>
          </div>
        </div>
      </div>
    </form>

  </div>


  <!-- 点击退费 弹出以下div 写明退费原因 -->
    <div id="repealContent" class="hide">
    <form id ="J_Form_repeal" class="form-horizontal" >
      <input name="tci_id" type="hidden" class="control-text">
      <div class="row">
        <div class="control-group span16">
          <label class="control-label"><s>*</s>交费原价：</label>
          <div class="controls">
            <input name="yprice" id='ypay' type="text" class="control-text">
          </div>
        </div>
      </div>
   	  <div class="row">
        <div class="control-group span16">
          <label class="control-label"><s>*</s>退费原因：</label>
          <div class="controls control-row4">
            <textarea name="reason" id='tReason' class="span8 span-width"></textarea>
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

	  var state = {"1":"在校学生","2":"在职人员","3":"待业人员"},//2待业，1在职，0在读
	  	status = {"1":"<font color='red'>未报名</font>","2":"<font color='orange'>报名</font>","3":"<font color='green'>缴费</font>","4":"开班","5":"退费"},
		edit = new BUI.Grid.Plugins.DialogEditing({
         contentId : 'editContent', //设置隐藏的Dialog内容
         autoSave : true, //添加数据或者修改数据时，自动保存
         triggerCls : 'btn-edit'
       }),

       follow = new BUI.Grid.Plugins.DialogEditing({
           contentId : 'followContent', //设置隐藏的Dialog内容
           autoSave : true, //添加数据或者修改数据时，自动保存
           triggerCls : 'btn-follow',
           editor: {
     	  		buttons:[
                         { text:'跟进',
                           elCls : 'button button-primary',
                           handler : function(){
                        	 //console.log(this.__attrVals.editValue.id);
                        	 var client_id = this.__attrVals.editValue.id;//获得当前的客户id
                        	 var tel = this.__attrVals.editValue.tel;
							 
							 var dire_id = this.__attrVals.editValue.intention;
							 if($('#trailtime').val()){
								 
							 //alert(dire_id);
                        	 $.post("<?php echo U('CrmDistribution/addfollow');?>", { client_id : client_id,next_follow:$('#trailtime').val(),tel:tel,dire_id:dire_id,follow_way:$('#follow_way').val()},
                      			   function(data){
									  //alert(dire_id);
                      			     alert(data);
                      			     //console.log(this);
                      			    //this.jsonpCallback.close();
                      	  		});
								//setTimeout('alert(111)',2000);
								//setTimeout('alert(111)',2000);
								this.hide();
							 }else{
								//alert("日期不能为空")；
							 }
                           }
                        },
                         { text:'关闭', elCls : 'button', handler : function(){ this.hide();} }
                        ]
   			  }
         }),

	  apply = new BUI.Grid.Plugins.DialogEditing({
        contentId : 'applyContent', //设置隐藏的Dialog内容
        autoSave : true, //添加数据或者修改数据时，自动保存
        triggerCls : 'btn-add',
       	editor: {
     	  		buttons:[
                         { text:'申请',
                           elCls : 'button button-primary',
                           handler : function(){
                        	 var intention = this.__attrVals.editValue.intention;
                        	 var client_id = this.__attrVals.editValue.id;//获得当前的客户id
                        	
                        	 $.post("<?php echo U('CrmDistribution/addApply');?>", {client_id : client_id,ypay:$('#yprice').val(),
                        		 applyPay:$('#sprice').val(),reason:$('#reason').val(),type:0,intention:intention},
                      			   function(data){
                      			     alert(data);
                      			     //this.hide();
                      			    // this.window.close();
                      	  		});
						   }
						},
                         { text:'关闭', elCls : 'button', handler : function(){ this.hide(); } }
                        ]
   			  }
      }),
      repeal = new BUI.Grid.Plugins.DialogEditing({
          contentId : 'repealContent', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-repeal',
          editor: {
   	  		buttons:[
                       { text:'申请',
                         elCls : 'button button-primary',
                         handler : function(){
                      	 //console.log(this.__attrVals.editValue.id);
						 var intention = this.__attrVals.editValue.intention;
                      	 var client_id = this.__attrVals.editValue.id;//获得当前的客户id
                      	
                      	 $.post("<?php echo U('CrmDistribution/addApply');?>", {client_id : client_id,yprice:$('#ypay').val(),
                      		 reason:$('#tReason').val(),type:1,intention:intention},
                    			   function(data){
                    			     alert(data);
                    			     //this.hide();
                    			    // this.window.close();
                    	  		});
						 
						 //this.hide();
                         }
                      },
                       { text:'关闭', elCls : 'button', handler : function(){ this.hide(); } }
                      ]
 			  }
      }),
      columns = [
		 {title:'客户编号',dataIndex:'number',width:100},
		  {title:'ID',dataIndex:'id',width:80,visible:false},
          {title:'姓名',dataIndex:'name',width:80},
          {title:'联系电话',dataIndex:'tel'},
          {title:'目前状态',dataIndex:'state',width:60,renderer:BUI.Grid.Format.enumRenderer(state)},
          {title:'客户意向',dataIndex:'cname',width:60},
          {title:'负责人',dataIndex:'chargename',width:60},
          {title:'登记时间',dataIndex:'entrytime',width:80},
          {title:'开始时间',dataIndex:'starttime',width:70},
          {title:'截止时间',dataIndex:'endtime',width:70},
          //{title:'下次跟进',dataIndex:'trailtime',width:80},
          {title:'原价',dataIndex:'pay',width:60},
          {title:'已付',dataIndex:'yf',width:60},
          {title:'报名情况',dataIndex:'status',width:60,renderer:BUI.Grid.Format.enumRenderer(status)},
          {title:'操作',dataIndex:'',width:230,renderer : function(value,obj){
                editStr = '<span class="grid-command btn-edit" title="编辑">编辑</span>',
                followStr = '<span class="grid-command btn-follow" title="制定跟进计划">制定跟进计划</span>',
                applyStr = '<span class="grid-command btn-add" title="点击申请">申请调价</span>',
                repealStr = '<span class="grid-command btn-repeal" title="点击退费">退费</span>';
                //console.log(obj.apply_price);

                if(obj.yf)//也就是obj.apply_price != null
                {
					if(obj.status>3){
						return applyStr + repealStr + editStr;
					}else{
						return followStr + applyStr + repealStr + editStr;
					}
                }
				
			return followStr+editStr;
            }}
        ],
      store = Search.createStore('data',{
        proxy : {
          save :
          { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
            <!-- addUrl : "<?php echo U('CrmDistribution/addfollow');?>", -->
            updateUrl : "<?php echo U('CrmDistribution/eidtClient');?>"
          },
          method : 'POST',
        },
        autoSync : true, //保存数据后，自动更新
        pageSize:7
      }),

      gridCfg = Search.createGridCfg(columns,{
        tbar : {
          items : [
			{text : '<i class="icon-plus"></i>导出数据',btnCls : 'button button-small',handler:exportFunction},
          ]
        },
        emptyDataTpl:'<div class="centered"><img alt="Crying" src="/tg_oa_crm_20161008/Public/img/nodata.png"><h2>查询的数据不存在</h2></div>',
        plugins : [edit,follow,apply,repeal,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit]// 插件形式引入多选表格
      });

    var  search = new Search({
        store : store,
        gridCfg : gridCfg
      }),
      grid = search.get('grid');

    //导出数据
    function exportFunction(){
		location.href="<?php echo U('CrmDistribution/exportData');?>";
    }

    //申请退费
    function applyFunction(){
       var newData = {cname:""};
       editing.add(newData); //添加记录后，直接编辑
    }


  });
</script>

<body>
</html>