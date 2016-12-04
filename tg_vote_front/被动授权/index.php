<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxcfa8bea4c860a83d", "1d82818edb65bce7ecda81eca3662958");
$signPackage = $jssdk->GetSignPackage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>yaoyao first</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>成功好难</h1>
    <p>直到中午才完成了上午的任务</p> 
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h3>get</h3>
      <p>下面是我希望获得到的用户数据</p>
      <p><?php var_dump($signPackage)?></p>
    </div>
    <!-- <div class="col-sm-4">
      <h3>第二列</h3>
      <p>学的不仅是技术，更是梦想！</p>
      <p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
    </div>
    <div class="col-sm-4">
      <h3>第三列</h3>        
      <p>学的不仅是技术，更是梦想！</p>
      <p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
    </div> -->
  </div>
</div>

</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
    	'onMenuShareTimeline'
      // 所有要调用的 API 都要加到这个列表中
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
    wx.onMenuShareTimeline({

        title: '姚姚的第一个微信网页', // 分享标题

        link: 'https://www.duba.com/?f=liebaont', // 分享链接

        imgUrl: 'http://www.baidu.com/img/bd_logo1.png', // 分享图标

        success: function () { 
            alert('分享成功了，小傻傻');
            // 用户确认分享后执行的回调函数

        },
        cancel: function () { 
            alert('没有风向！！！');
            // 用户取消分享后执行的回调函数
        }

    });

  });
  wx.error(function(res){
  	alert('失败了，小傻傻');
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

});
</script>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(function () {
    var wxopenid=getcookie('wxopenid');
    var key=getcookie('key');
    alert(wxopenid);
    alert(34);
    if (key==''){
        var access_code=GetQueryString('code');
        if (wxopenid==""){
            if (access_code==null)
            {   
                var fromurl=location.href;
                var url='https://open.weixin.qq.com/connect/oauth2/authorize?appid=填你自已的appid哟&redirect_uri='+encodeURIComponent(fromurl)+'&response_type=code&scope=snsapi_base&state=STATE%23wechat_redirect&connect_redirect=1#wechat_redirect';
                location.href=url;
            }
            else
            {   
                $.ajax({
                    type:'get',
                    url:ApiUrl+'/index.php?act=payment&op=getopenid', 
                    async:false,
                    cache:false,
                    data:{code:access_code},
                    dataType:'json',
                    success:function(result){                 
                            if (result!=null && result.hasOwnProperty('openid') && result.openid!=""){
                               addcookie('wxopenid',result.openid,360000);                           
                               getlogininfo(result.openid);
                            } 
                            else
                            {
                              alert('微信身份识别失败 \n '+result);
                              location.href=fromurl;
                            }
                        }
                    });    
            }
        }else{
           if (key=='' && wxopenid!='')
               getlogininfo(wxopenid);  
        }

        function getlogininfo(wxopenid){       
            $.ajax({
               type:'get',
               url: ApiUrl + '/index.php?act=login&op=autologininfo',
               data: { wxopenid:wxopenid},
               dataType:'json',
               async:false,
               cache:false,               
               success: function (result) {                   
                       if (result.return_code=='OK'){
                           addcookie('key',result.memberinfo.key);
                           addcookie('username',result.memberinfo.username);
                       }else{
                           alert(result.return_msg);
                           location.href=WapSiteUrl+'/tmpl/member/login.html';
                       }
               }
            });
        }
    }
});
</script>