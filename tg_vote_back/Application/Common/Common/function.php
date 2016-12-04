<?php
/**
 * alltosun.com 公共函数库 functions.php
 * ============================================================================
 * 版权所有 (C) 2009-2014 北京互动阳光科技有限公司，并保留所有权利。
 * 网站地址:   http://www.alltosun.com
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * $Author: 勾国印 (gougy@alltosun.com) $
 * $Date: 2014-10-20 下午5:20:19 $
 * $Id$
*/

//根据登录用户ID，获取班级ID；并且放到session中
function getClass($useid){
	
	//获取学生班级ID并放到session中；
	$sql="select t2.class_id from tg_privilege_user t1
                      LEFT JOIN tg_acdemic_students t2
                      on t1.id = t2.user_id
                      where t1.id={$useid}
                      ";
			    $classStudentId = M('privilege_user')->query($sql);
				
				
             //获取老师所带班级ID
	          $class = M()->query("select t1.class_id  from tg_acdemic_course_table t1
                                    JOIN tg_organization_employee t2 ON t1.teacher_id=t2.id
                                    JOIN tg_privilege_user t3 ON t3.id=t2.user_id
                                    WHERE t3.id='{$useid}'");
        
               $classTeaId = $class['0']['class_id'];
			   //dump($classStudentId);
			   /* dump($classTeaId);
			   exit; */
			   if(!empty($classStudentId['0']['class_id'])){
				  // echo "我是学生";exit;
				   $_SESSION['loginedUser']['class_id']=$classStudentId['0']['class_id'];
				   //dump($_SESSION);exit;
				   return $classStudentId;
			   }elseif(!empty($class['0']['class_id'])){
				   //echo "我是老师";exit;
				   return $class;
			   }else{
				   $_SESSION['loginedUser']['class_id']=null;
				  // echo "该用户既不是学生也不是老师";exit;
				   return "该用户既不是学生也不是老师";
			   }
}
/**
 * 是否手机端
 */
function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}

/**
 * 是否微信端
 */
function is_weixin()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(stripos($user_agent, 'MicroMessenger') !== false) {
        return true;
    }
    return false;
}

/**
 * size的换算
 * @param $number
 * @return string
 */
function conversion($number)
{
    $num = strlen($number);
    if ($num > 9) {
        $num = $num - 9;
        return  substr($number,0,$num)."GB";
    } elseif ($num > 6) {
        $num = $num - 6;
        return substr($number,0,$num)."MB";
    } elseif ($num > 3) {
        $num = $num -3;
        return substr($number,0,$num)."KB";
    } else {
        return $number."B";
    }
}

/**
 * 显示距离当前时间的字符串
 * @param $time 时间戳
 * @return string
 */
function tranTime($time)
{
    $rtime = date("m-d H:i",$time);
    $htime = date("H:i",$time);

    $time = time() - $time;

    if ($time < 60)
    {
        $str = '刚刚';
    }
    elseif ($time < 60 * 60)
    {
        $min = floor($time/60);
        $str = $min.'分钟前';
    }
    elseif ($time < 60 * 60 * 24)
    {
        $h = floor($time/(60*60));
        $str = $h.'小时前 '.$htime;
    }
    elseif ($time < 60 * 60 * 24 * 3)
    {
        $d = floor($time/(60*60*24));
        if($d==1)
            $str = '昨天 '.$rtime;
        else
            $str = '前天 '.$rtime;
    }
    else
    {
        $str = $rtime;
    }
    return $str;
}
/*
 * 获取指定目录下的子目录或指定后缀的子文件
* @param string $path 指定目录路径
* @param string $suffix 文件后缀,不写默认为获取子目录
* @return array
*/
function get_sub_dir($path, $suffix='')
{
    $path = iconv('utf-8', 'gbk', $path);
    if(!is_dir($path)){
        throw new Exception($path."不是目录");
    }
    $arr = array('dir'=>array(),'file'=>array());
    $hd = opendir($path);
    while(($file = readdir($hd))!==false){
        if($file=="."||$file=="..") {continue;}
        if(is_dir($path."/".$file)){
            $arr['dir'][] = iconv('gbk','utf-8',$file);
        }else if(is_file($path."/".$file)){
            $pathinfo = pathinfo($file);
            if($suffix && $pathinfo['extension'] == $suffix){
                $arr['file'][] = iconv('gbk','utf-8',$file);
            }

        }
    }
    closedir($hd);
    return $arr;
}


/*
 * 获取前台所有模板主题名
* @return array
*/
function get_all_tpl_theme($type = 'array')
{
    $path = 'Template';
    $sub_dir = get_sub_dir($path);
    if($type == 'array'){
        return $sub_dir['dir'];
    }else if($type == 'string'){
        $tpl_theme_array = $sub_dir['dir'];
        $tpl_theme_str = implode(',', $tpl_theme_array);
        return $tpl_theme_str;
    }

}

/*
 * 获取某个模板风格的缩略图
* @return string
*/
function get_theme_thumb($theme) {
    $path = 'Template/'.$theme;
    $tpl_theme_thumb_array = get_sub_dir($path, 'png');
    $tpl_theme_thumb = $tpl_theme_thumb_array['file'][0];

    if($tpl_theme_thumb){
        $tpl_theme_thumb_src = __ROOT__.'/'.$path.'/'.$tpl_theme_thumb;
    }else{
        $tpl_theme_thumb_src = __ROOT__.'/Public/images/default_preview.png';
    }
    return $tpl_theme_thumb_src;
    }

/*
 * 获取当前模板路径
* @return string
*/
function get_theme_path() {
    $default_theme = C('DEFAULT_THEME');
    $path = __ROOT__.'/Template/'.$default_theme;

    return $path;
}

/**
 * 返回配置项对应值
 * @param string|integer $field 标识名,标识为空则返回所有配置项数组
 * @param string|integer $config_type 配置类型
 * @return string
 */
function get_config_value($field = '', $type = 'site') {
    $Config = M('Config');
    if ($field) {
        $value = $Config->where(array('status' => 1, 'field' => $field))->getField('value');
        return $value;
    } else {
        $config_list = $Config->where(array('status' => 1, 'config_type' => $type))->order('sort ASC')->select();
        return $config_list;
    }

}

//文件上传方法
/*$buttonname:上传按钮name,*/
function upload($buttonname,$updir,$twidth,$theight) {
    $tmp_name=$_FILES[$buttonname]['tmp_name'];
    if(file_exists($tmp_name)){
        import('ORG.Net.UploadFile');
        // 实例化上传类
        $upload = new UploadFile();
        // 设置附件上传大小
        $upload->maxSize  = 3145728 ;
        // 设置附件上传类型
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
        // 设置附件上传目录
        $uploaddir=$upload->savePath =  './Uploads/'.$updir.'/';
        //开启缩略图
        $upload->thumb=ture;
        $upload->thumbMaxWidth=$twidth;
        $upload->thumbMaxHeight=$theight;
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            $url=$uploaddir.$info[0]['savename'];
            $url=ltrim($url,'./');
            return $url;
        }
    }

}

/**********
 * 发送邮件 *
**********/
function sendmail($tomail,$title,$content){
    header("content-type:text/html;charset=utf-8");
    ini_set("magic_quotes_runtime",0);
    //获取邮件设置信息
    $email_host = get_config_value('email_host');
    $email_title = get_config_value('email_title');
    $email_name = get_config_value('email_name');
    $email_user = get_config_value('email_user');
    $email_password = get_config_value('email_password');

    Vendor('phpmailer.class#phpmailer');
    //实例化PHPMailer类,true表示出现错误时抛出异常
    $mail = new PHPMailer(true);
    try {
        // 使用SMTP
        $mail->IsSMTP();

        $mail->CharSet    ="UTF-8";      //设定邮件编码
        $mail->Host       = $email_host; // SMTP server
        $mail->SMTPDebug  = 1;           // 启用SMTP调试 1 = errors  2 =  messages
        $mail->SMTPAuth   = true;        // 服务器需要验证
        $mail->Port       = 25;          // 设置端口


        $mail->Username   = $email_user;             //SMTP服务器的用户帐号
        $mail->Password   = $email_password;         //SMTP服务器的用户密码
        $mail->AddReplyTo($email_name,$email_title); //收件人回复时回复到此邮箱,可以多次执行该方法
        if (is_array($tomail)){
            foreach ($tomail as $m){
                $mail->AddAddress($m, 'user');
            }
        }else{
            $mail->AddAddress($tomail, 'user');
        }

        $mail->SetFrom($email_name,$email_title);
        $mail->Subject = $title;

        //以下是邮件内容相关
        $mail->Body = $content;
        $mail->IsHTML(true);

        //$body = file_get_contents('tpl.html'); //获取html网页内容
        // $mail->MsgHTML(eregi_replace("[]",'',$body));
        return $mail->Send()? true:false;
    } catch (phpmailerException $e) {
		return "邮件发送失败：".$e->errorMessage();
	}
}

function get_list($model, $order='sort desc')
{
    $Model = M($model);
    $model_list = $Model->where(array('status' => 1))->order($order)->select();
    return $model_list;

}

//获取商品已选机型
function get_type_list($goods_id)
{
    $Goods = M('Goods');
    $type_ids = $Goods->where(array('id' => $goods_id))->getField('type_ids');

    $type_ids = trim($type_ids, ',');
    if($type_ids){
        $type_list = explode(',', $type_ids);
    }else{
        $type_list = array();
    }

    return $type_list;
}

//获取某个帖子可以选择的标签
function get_rest_type_ids($goods_id)
{
    $all_type_ids = M('Type')->where(array('status' => 1))->getField('id', true);

    $old_type_ids = M('Goods')->where(array('id' => $goods_id))->getField('type_ids');

    $old_type_ids = trim($old_type_ids, ',');
    $old_type_ids = explode(',', $old_type_ids);
    $rest_type_ids = array_diff($all_type_ids, $old_type_ids);
    return $rest_type_ids;
}


//获取标题
function get_title($model, $id)
{
    $title = M($model)->where(array('id' => $id))->getField('title');
    return $title;
}

//检测标题是否存在
function check_title($model, $title)
{
    $info = M($model)->where(array('title' => $title))->find($id);
    if($info){
        return true;
    }else{
        return false;
    }
}

//获取产品所属机型
function get_type_title($goods_id)
{
    $type_list = get_type_list($goods_id);
    if($type_list){
        $type_title = '';
        foreach ($type_list as $v){
            $v = (int)$v;
            if(!$v) {
                continue;
            }
            $type_title .= get_title('type', $v);
            $type_title = $type_title.',';
        }
    }else{
        $type_title = '';
    }

    return trim($type_title, ',');

}