<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>随时练习</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     
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
	margin-top:
    }
   </style>
   <link rel="stylesheet" href="/tg_oa_crm_20161008/Public/common/common.css">
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/tg_oa_crm_20161008/Public/bui/Common/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <script src="/tg_oa_crm_20161008/Public/js/jquery.js"></script>
	<script src="/tg_oa_crm_20161008/Public/js/table+.js?ver=110"></script>
   
	
 </head>
 <body>
  <div class="container">
     <div style='text-align:center;color:red'>注意：关于多选~填空题（填写答案如果有两个空用“{|}”符号隔开，选择题打下写都可以，例如：PHP{|}HTML 两个空，不要加任何符号）注意：判断题如果错误用‘f’用正确‘e’
    </div>
    <hr>
    <form id="searchForm" class="form-horizontal"action="<?php echo U('getData1');?>"  method="post">
    
        
      <div class="row">
       
         <div class="control-group span8">
          <label class="control-label">方向：</label>
          <div class="controls">
            <select name="name">
              <option value="">请选择</option>
             <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">阶段：</label>
          <div class="controls">
            <select name="name3">
              <option value="">请选择</option>
             <?php if(is_array($arr3)): $i = 0; $__LIST__ = $arr3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
        </div>
        <div class="control-group span8">
          <label class="control-label">课程：</label>
          <div class="controls">
            <select name="name2">
              <option value="">请选择</option>
             <?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
        </div>
        
        </div>

      <div class="row"> 
       
        <div class="control-group span8">
          <label class="control-label">知识点：</label>
          <div class="controls">
            <select name="name5">
              <option value="">请选择</option>
             <?php if(is_array($arr5)): $i = 0; $__LIST__ = $arr5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
        </div>
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

        <div class="span3 offset2" >
          <button  type="sumbit" id="btnSearch" class="button button-primary" >搜索</button>
        </div>
      </div>

      </div>

      

    </form>
	   
    <hr>
      <div style="margin-left:80px;">
           <!-- 表格部分 开始-->
           <div class="table-content result">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form id="form input"  >
                <tr>
                <td style="height:100px;width:700px;">
                
                  <h1>      <input type='hidden'  id='id<?php echo ($i); ?>' value='<?php echo ($vo["id"]); ?>'></h1>
                  <h3 ><?php echo ($i); ?>.<?php echo ($vo["tet_content"]); ?></h3><br/><br/>
                  <input  id="un<?php echo ($i); ?>" class="control-text" name='answer' value=''>
                
              </tr>
                  <tr>
                  <input  type="button"  onclick="tijiao(<?php echo ($i); ?>)" class="button button-primary" value="提交"/>
                  <div id='jg<?php echo ($i); ?>' style='display:inline-block'></div><br/>
                  <input  type='button' id="btn" class="button button-primary" onclick='showAnswer(this);' value='显示答案'>
                  
                  <p style='display: none'  id='da<?php echo ($i); ?>'><?php echo ($vo["tet_answer"]); ?></p><hr/>
                </td>
              </tr>
              </form><?php endforeach; endif; else: echo "" ;endif; ?>
                
      </div>


  </div>
     
      
      	 	 
     
      	 	
      
  
<body>
 <script>

 
 	
	function tijiao(sum){
	console.log('#un'+sum);
	
	var id=$('#id'+sum).val();
	var un=$('#un'+sum).val();
	if (un == "")
	{
		$('#jg'+sum).html("<span style='color:red'>您的答案为空</span>")
	}else{
	//alert('id='+id+'&'+'un='+un+'&'+'trueanswer='+trueanswer);
	//console.log('id='+id+'&un='+un);
	$.ajax({
	type: 'POST',
	url: "/tg_oa_crm_20161008/index.php/Admin/EvaluateAnytimetest/add", 
     data: 'id='+id+'&'+'un='+un, 
	success: function(e){
		console.log(e);
		//var jg=$('#jg'+sum).text(e);
		$('#jg'+sum).html(e)
		//console.log();
	//var  jg = document.getElementById('jg'+sum);
	//console.log(jg.html());
	//var x=document.getElementById("myHeader")
	 // alert(x.innerHTML)
	//jg.innerHTML = e;
	//console.log(jg.innerHTML);
        //$(this).addClass("done");
      }});
	
	}
	}
		
	function showAnswer(obj)
    		{
		//alert('aa');
    			$(obj).next().toggle();
    			if($(obj).val() == '显示答案'){
    				$(obj).val('隐藏答案');
    				//$('#da'+sum).css('display','none');
    			}else{
    				$(obj).val('显示答案');
    				//$('#da'+sum).css('display','block');
    			}
    		}
	
	
	//alert($('#jg5').text());
	
	


</script>
</html>