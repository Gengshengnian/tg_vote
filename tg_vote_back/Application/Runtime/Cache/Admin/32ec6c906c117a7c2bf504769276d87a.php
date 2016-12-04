<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title>硬汉科技综合服务平台</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/weixin/web/tg_vote_back/Public/bui/Common/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">

      <div class="dl-title">
        <a href="<<?php echo U('Index/index');?>>" title="首页"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
          <span class="lp-title-port">硬汉科技-</span><span class="dl-title-text">综合服务平台</span>
        </a>
      </div>

    <div class="dl-log">欢迎您:<span class="dl-log-user"><?php echo ($_SESSION['loginedUser']['username']); ?></span><a href="<?php echo U('Login/logout');?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>

      <ul id="J_Nav"  class="nav-list ks-clear">
        <?php if(is_array($p)): foreach($p as $key=>$vo): ?><li class="nav-item">
        		<div class="nav-item-inner nav-order"><?php echo ($vo["text"]); ?></div>
        	</li><?php endforeach; endif; ?>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/bui.js"></script>
  <script type="text/javascript" src="/weixin/web/tg_vote_back/Public/bui/Common/assets/js/config.js"></script>

  <script>

  BUI.use('common/main',function(){
	  //获取json
	  $.getJSON('getMenus',function(config){
	    new PageUtil.MainPage({
	        modulesConfig : config
	    });

	  });
	});

  </script>
 </body>
</html>