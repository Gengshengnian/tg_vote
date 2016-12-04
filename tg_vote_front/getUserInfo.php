<?php
  //       header('Content-type:text/html;charset=utf-8');
		

		$openid = "omCX9s4DUx8FcytRpyt4e791noJM";
		$action = isset($_GET['a'])?$_GET['a']:"index";
		switch ($action) {
			case 'index': //进入首页，或是注册页面
				index();
				break;
			case '':
				break;
			default:
				echo 'not have this action';
				break;
		}
		function index(){
			// $appid = 'wxcfa8bea4c860a83d';
			// $secret ='1d82818edb65bce7ecda81eca3662958'; 
			// $code = $_GET["code"];
			// // echo $code;exit;
			// //第一步:取全局access_token
			// $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
			// $token = getJson($url);
			// // var_dump($token);exit;
			// //第二步:通过code换取网页授权access_token
			// $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
			// $oauth2 = getJson($oauth2Url);
			  
			// // var_dump($oauth2);exit; 
			// //第三步:根据全局access_token和openid查询用户信息 
			// //拉取用户信息(需scope为 snsapi_userinfo) 
			// $access_token = $token["access_token"]; 
			// $openid = $oauth2['openid'];  
			// // $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
			// // $userinfo = getJson($get_user_info_url);
			 
			// //打印用户信息
			// // echo "<pre>";
			// // print_r($userinfo);
			// // echo "</pre>";
			$openid = "omCX9s4DUx8FcytRpyt4e791noJM";
			$link = connectDB();
			$sql = "select id from tg_fans_fans where open_id = {$openid}";
			$result = mysqli_query($link, $sql);
			if(mysqli_num_rows($result)>0){//他已经注册，跳转到首页

			}else{//进入注册页面
				include('frontview/register.html');
			}
		}
		 
		function getJson($url){
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $output = curl_exec($ch);
		    curl_close($ch);
		    return json_decode($output, true);
		}
		function connectDB(){
			$link = mysqli_connect('localhost','root','root','tg_vote');
			mysqli_set_charset($link, 'utf8');
			return $link;
		}
?>