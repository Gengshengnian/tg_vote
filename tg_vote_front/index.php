<?php
        header('Content-type:text/html;charset=utf-8');
		$openid = isset($_REQUEST['openid'])?$_REQUEST['openid']:"";
		$action = isset($_GET['a'])?$_GET['a']:"index";
		if($openid == ""){
			index();
			exit;
		}
		switch ($action) {
			case 'register':
				register();
				break;
			case 'index': //进入首页，或是注册页面
				index();
				break;
			case 'theme':  //投票时间 投票方法
				theme($openid);
				break;
			case 'award':  //获奖说明
				award($openid);
				break;
			case 'toupiao_Details':  //单个用户的页面
				toupiao_Details($openid);
				break;
			case 'rank':    //排行榜
				rank($openid);
				break;
			case 'vote':
				vote($openid);
				break;
			default:
				echo 'not have this action:'.$action;
				break;
		}
		function index(){
			$appid = 'wxe81fe08ed3c26b73';
			$secret ='c9325e089e7292746fce919812093e86'; 
			if(!isset($_GET["code"])){
				echo '<h1>请在微信平台，加入本活动微信公众号，才可以参加本次投票</h1>';
				exit;
			}  
			$code = $_GET["code"];
			// echo $code;exit;
			//第一步:取全局access_token
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
			$token = getJson($url);
			// var_dump($token);exit;
			//第二步:通过code换取网页授权access_token
			$oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
			$oauth2 = getJson($oauth2Url);
			  
			// var_dump($oauth2);exit; 
			//第三步:根据全局access_token和openid查询用户信息 
			//拉取用户信息(需scope为 snsapi_userinfo) 
			$access_token = $token["access_token"]; 
			if(!isset($oauth2['openid'])){
				echo '<h1>请通过公众号按钮点击进入！</h1>';
				exit;
			}
			$openid = $oauth2['openid'];
			// // $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
			// // $userinfo = getJson($get_user_info_url);
			 
			// //打印用户信息
			// // echo "<pre>";
			// // print_r($userinfo);
			// // echo "</pre>";
			// $openid = "omCX9s4DUx8FcytRsdfpyt4e791noJM";  //这是本地测试用，如果需要微信测试就把上面的代码取消注释掉，上面是用来第一次进入微信公众号获取openid用的
			$link = connectDB();
			$sql = "select id from tg_fans_fans where open_id = '{$openid}'";
			$result = mysqli_query($link, $sql);
			mysqli_close($link);
			if(mysqli_num_rows($result)>0){//他已经注册，跳转到首页
				include('hello.html');
			}else{//进入注册页面
				include('register.html');
			}
		}

		function register(){
			$username = $_POST['username'];
			$mobile = $_POST['mobile'];
			$qq = $_POST['qq'];
			$password = $_POST['password'];
			$openid = $_POST['openid'];

			$link = connectDB();
			$sql = "insert into tg_fans_fans(open_id, fans_name,tel,qq,password,register_time) value('{$openid}','{$username}','{$mobile}',{$qq},{$password},now())";
			// echo $sql;exit;
			$result = mysqli_query($link , $sql);
			mysqli_close($link);
			if($result){
				include('hello.html');
			}else{
				echo '注册失败';
			}
		}
		function theme($openid){

			$actInfo = getNowActivityInfo();
			// var_dump($actInfo);
			if($actInfo[0]['end_time']<date('Y-m-d H:i:s',time())){
				activityOver();//活动结束
			}
			include('theme.html');
		}
		function award($openid){
			$actInfo = getNowActivityInfo();
			include('award.html');
		}
		function toupiao_Details($openid){
			$fansInfo = getFansByOpenid($openid);

			// isVoteMaxByFansid($fansInfo[0]['id']);

			if(!isset($_REQUEST['Playerid'])){
				$playlist = getNowPlayList();
				$Playerid = $playlist[0]['id'];
			}else{
				$Playerid = $_REQUEST['Playerid'];
			}
			
			$playerInfo = getPlayByPlayerid($Playerid);
			// var_dump($playerInfo);
			include('toupiao_Details.html');
		}
		function rank($openid){
			$list = getNowPlayList();
			// var_dump($list);
			include('rank.html');
		}
		function vote($openid){
			$apid = $_REQUEST['apid'];
			$fansid = $_REQUEST['fansid'];
			$link = connectDB();
			$sql = "insert into tg_vote_voterecord(fans_id, vote_time,activity_player_id) value('{$fansid}',now(),'{$apid}')";
			// echo $sql;exit;
			$result = mysqli_query($link , $sql);
			mysqli_close($link);
			if($result){
				rank($openid);
			}else{
				echo '投票失败';
			}

		}
		function activityOver(){
			echo '<h1>本活动已经结束，谢谢您的参与！</h1>';
			echo '<h2>以下是本次比赛结果：<br></h2>';
			$plays = getNowPlayList();
			$cssStyle = '<style type="text/css">
							td ,th{
								
								border:3px solid #000;
							}
						</style>';
			$tableStart = '<table style="font-size:40px;">';
			$tableHead = '<tr><th>排名</th><th>姓名</th><th>作品</th><th>票数</th></tr>';
			$tableBody = '';
			$tableEnd = '</table>';

			foreach($plays as $i=> $onePlayer){
				$tableBody = $tableBody.'<tr><td>'.($i+1).'</td><td>'.$onePlayer['player_name'].'</td><td>'.$onePlayer['production_introduction'].'</td><td>'.$onePlayer['vote_num'].'</td></tr>';
			}

			echo $cssStyle.$tableStart.$tableHead.$tableBody.$tableEnd;
			exit;
		}
		function getNowActivityInfo(){
			$sql = 'SELECT 
						t1.*,t2.rule_content AS rule,t2.day_maxnum,t3.prize_num,t4.*,t5.prize_level_name
					FROM
						tg_vote_activity t1,
						tg_vote_rule t2,
						tg_vote_activity_prize t3,
						tg_vote_prize t4,
						tg_vote_prize_level t5
					WHERE
						t1.rule_id = t2.id
						AND t1.id = t3.activity_id
						AND t4.id = t3.prize_id
						AND t5.id = t4.prize_level_id';
			$rows = getListBySql($sql);
			return $rows;
		}
		// function getNowAward(){
		// 	$link = connectDB();
		// 	$sql = "select";
		// }
		function getNowPlayList(){
			$sql = 'SELECT
						t3.*,t2.id as act_player_id,count(t4.id) as vote_num
					FROM
						tg_vote_activity t1,
						tg_vote_activity_player t2 LEFT JOIN tg_vote_voterecord t4 on t4.activity_player_id=t2.id,
						tg_fans_player t3
						
		
					where t1.`status`=1 and t2.activity_id=t1.id and t2.player_id=t3.id 
					GROUP BY activity_player_id
					order by count(t4.id) desc
					';
			$rows = getListBySql($sql);
			return $rows;
		}
		function getPlayByPlayerid($Playerid){
			$sql = "SELECT
						t3.*,t2.id as act_player_id,count(t4.id) as vote_num
					FROM
						tg_vote_activity t1,
						tg_vote_activity_player t2 LEFT JOIN tg_vote_voterecord t4 on t4.activity_player_id=t2.id,
						tg_fans_player t3
						
		
					where t1.`status`=1 and t2.activity_id=t1.id and t2.player_id=t3.id and  t2.player_id = {$Playerid}
					GROUP BY activity_player_id";
			$rows = getListBySql($sql);
			return $rows;
		}
		function getFansByOpenid($openid){
			$sql = "SELECT * from tg_fans_fans where open_id='{$openid}'";
			$rows = getListBySql($sql);
			return $rows;
		}
		function getVoteNumByFansid($fansid,$type){ //根据fansid 判断当前fans的投票数

			$playlist = getNowPlayList();
			$apids = '';
			foreach($playlist as $player){
				$apids .= $player['act_player_id'].',';
			}
			$apids = substr($apids, 0,-1);

			$sql = "select count(id) as num 
					from tg_vote_voterecord 
					where  fans_id = {$fansid} 
							and activity_player_id in ({$apids}) 
							and TO_DAYS(vote_time)=TO_DAYS(now())
					";
			$num = getListBySql($sql);
			return $num[0]['num'];
		}
		function getActVoteNumByFansid($fansid){
			$playlist = getNowPlayList();
			$apids = '';
			foreach($playlist as $player){
				$apids .= $player['act_player_id'].',';
			}
			$apids = substr($apids, 0,-1);

			$sql = "select count(id) as num 
					from tg_vote_voterecord 
					where  fans_id = {$fansid} 
							and activity_player_id in ({$apids})
					";
			$num = getListBySql($sql);
			return $num[0]['num'];
		}
		function isVoteMaxByFansid($fansid){

			$thisFansTodayNum = getTodayVoteNumByFansid($fansid);

			$actInfo = getNowActivityInfo();
			$daymaxvotenum = $actInfo[0]['day_maxnum'];
			if($thisFansTodyNum<$daymaxvotenum){
				return true;
			}else{
				return false;
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
		function getListBySql($sql){
			// if(isset($sql) || $sql==""){return null;}
			$link = connectDB();
			$result = mysqli_query($link,$sql);
			$rows = array();
			while($row = mysqli_fetch_assoc($result)){
				$rows[] = $row;
			}
			mysqli_close($link);
			return $rows;
		}
		function connectDB(){
			$link = mysqli_connect('localhost','root','root','tg_vote');
			mysqli_set_charset($link, 'utf8');
			return $link;
		}
?>