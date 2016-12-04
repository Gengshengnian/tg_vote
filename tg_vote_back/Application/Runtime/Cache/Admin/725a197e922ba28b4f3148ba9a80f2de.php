<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="/tg_vote/tg_vote_back/Public/css/0-login.css">
</head>
<body>
	<!--logo start-->
	<div class="wlh-heardbox">
		<img src="/tg_vote/tg_vote_back/Public/image/logo1-0.png" alt="">
	</div>
	<!--logo end-->
	<!--内容 start-->
	<div class="wlh-conbox">
		<div class="wlh-con">
			<h3>欢迎您，请先登录!</h3>
			<form action="/tg_vote/tg_vote_back/index.php/Admin/Login/login" method="post" name="myform">

				<div class="wlh-line">
					<p class="wlh-word">用<span style="margin-left:8px">户</span><span style="margin-left:8px">名:</span></p>
					<div class="wlh-text">
						<!--用户名输入-->
						<img src="/tg_vote/tg_vote_back/Public/image/usename-0.png" alt=""><input type="text" size="30" name="username">
					</div>
				</div>

				<div class="wlh-line">
					<p class="wlh-word">密<span>码:</span></p>
					<div class="wlh-text">
						<!--密码输入-->
						<img src="/tg_vote/tg_vote_back/Public/image/password-0.png" alt=""><input type="password" name="password" size="30">
					</div>
				</div>
				<img src="/tg_vote/tg_vote_back/index.php/Admin/Login/verifyCodeImg" alt="" onclick="this.src='/tg_vote/tg_vote_back/index.php/Admin/Login/verifyCodeImg/'+Math.random()" >
				<div class="wlh-line">
					<p class="wlh-word">验<span style="margin-left:8px">证</span><span style="margin-left:8px">码:</span></p>
					<div class="wlh-text">
						<!--验证码输入-->
						<img src="" alt=""><input type="text" name="captcha" size="30">
					</div>
				</div>

	            <!--登录按钮-->
	            <input class="wlh-submit wlh-login" type="submit" value="登&nbsp;&nbsp;录">
	            <!--注册按钮-->
	            <input class="wlh-submit wlh-register" type="submit" value="注&nbsp;&nbsp;册">

			</form>
		</div>
	</div>
	<!--内容 end-->
	<script>
		var wlhtext=document.getElementsByClassName("wlh-text");


		for (var i = 0; i < wlhtext.length; i++) {
			wlhtext[i].index=i;
			wlhtext[i].onclick=function(){
				var imgs=wlhtext[this.index].getElementsByTagName("img")[0];
				var texts=wlhtext[this.index].getElementsByTagName("input")[0];
		        imgs.style.display="none";
		        texts.style.display="block";
		        texts.focus();
		        texts.onblur=function(){
		        	//imgs.style.display="block";
		            //texts.style.display="none";
		        }
			}
		};
	</script>
</body>
</html>