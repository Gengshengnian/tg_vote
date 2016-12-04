<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->

<link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
 
</head>
<body>
  <div class="demo-content">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
      <div class="span24">
      <form id="J_Form" class="form-horizontal" method="post" action="/weixin/web/tg_vote_back/index.php/Admin/VoteActivity/add" enctype="multipart/form-data">
          &nbsp;&nbsp;<h3>活动信息:</h3>
            <div class="control-group">
              <label class="control-label"><s>*</s>主题</label>
              <div class="controls">
                <select name="theme_id" data-rules="{required:true}" name='theme'>
                  <option value="0">-请选择-</option> 
                  <?php if(is_array($themes)): foreach($themes as $key=>$vo): if($vo['id'] == $activity['theme_id']): ?><option value="<?php echo ($vo["id"]); ?>" selected><?php echo ($vo["theme_name"]); ?></option>
                    <?php else: ?>
                    	<option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["theme_name"]); ?></option><?php endif; endforeach; endif; ?>    
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>规则</label>
              <div class="controls">
                <select name="rule_id" data-rules="{required:true}">
                  <option value="0">-请选择-</option>
                  <?php if(is_array($rules)): foreach($rules as $key=>$vo): if($vo['id'] == $activity['rule_id']): ?><option value="<?php echo ($vo["id"]); ?>" selected><?php echo ($vo["rule_name"]); ?></option>
	                  <?php else: ?>
	                  		<option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["rule_name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>开始时间：</label>
              <div class="controls">
                <input type="text" class="calendar calendar-time" name="start_time" data-rules="{required:true}" value="<?php echo ($activity["start_time"]); ?>">
              </div>
            </div>
             <div class="control-group">
              <label class="control-label"><s>*</s>结束时间：</label>
              <div class="controls">
                <input type="text" class="calendar calendar-time" name="end_time" data-rules="{required:true}" value="<?php echo ($activity["end_time"]); ?>">
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>活动图片</label>
              <div class="controls">
                <input type="file"  name="logo_img" data-rules="{required:true}">
              </div>
            </div>

             <div class="control-group">
              <label class="control-label"><s>*</s>活动二维码</label>
              <div class="controls">
                <input type="file"  name="ewm_img" data-rules="{required:true}">
              </div>
            </div>
      
            <div class="control-group">
              <label class="control-label">主办方：</label>
              <div class="controls">
                  <input type="text"  name="zbf" value="<?php echo ($activity["zbf"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">赞助方1：</label>
              <div class="controls">
                  <input type="text"  name="zzf1" value="<?php echo ($activity["zzf1"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">赞助方2：</label>
              <div class="controls">
                  <input type="text" name="zzf2" value="<?php echo ($activity["zzf2"]); ?>">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">赞助方3：</label>
              <div class="controls">
                  <input type="text" name="zzf3" value="<?php echo ($activity["zzf3"]); ?>">
              </div>
            </div>
            <div class="form-actions span5 offset3">
            <?php if(empty($activity)): ?><input type="hidden" value="" name="tag">
              <button id="btnSearch" type="submit" class="button button-primary">添加活动</button>
           	<?php else: ?>
           	  <input type="hidden" value="<?php echo ($activity["id"]); ?>" name="tag">
           	  <button id="btnSearch" type="submit" class="button button-primary">修改活动</button><?php endif; ?>
            </div>
        </form> 	
      </div>
    </div>  
 </div>
<script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script> 
<script type="text/javascript">



BUI.use('bui/form',function  (Form) {
  new Form.Form({
    srcNode : '#J_Form'
  }).render();
});
</script>
<!-- script end -->
 
</body>
</html>