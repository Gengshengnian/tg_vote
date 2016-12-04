$(".left>ul>li").click(function(){
  $(this).children("ul").finish()
	$(this).children("ul").slideToggle()
	$(this).siblings().children("ul").slideUp()
})
$(".left>ul>li>ul a").click(function(e){
	 e.stopPropagation()
	 e.cancleBubble=true;	
	 $(".left>ul a").removeClass("active")
	 $(this).addClass("active")
	 $(this).parent().find("ul").finish();
	 $(this).parent().find("ul").slideToggle()
})

var innerleft=0;
var range=0;
var leftbtnarr={0:$(".first")}
var itemarr={0:$(".item")};
var btnarr={0:$(".righttopbut")};
var aa=1;
$(".left a[target=main]").click(function(){
 if($(".righttopbut").length<10){
  if($(this).attr("target")=="main"){
	var time=new Date().getTime();
  $(this).attr("target","t"+time);
	$(".righttopbut").removeClass("butactive")
    var btnobj=$("<div class='righttopbut butactive'>"+$(this).text()+"<div class='rrrclosebtn'></div></div>");
	$(".righttopinner").append(btnobj);
    btnarr[aa]=btnobj;
    $(".item").css("display","none")
    var obj=$("<div class='item'><iframe src="+$(this).attr("href")+" name=t"+time+"></iframe></div>")
    $(".rightbottom").append(obj);
    itemarr[aa]=obj;
    leftbtnarr[aa]=$(this)
    aa++;
    var width=($(".righttopbut").length)*151;
    var widths=$(".right").width();
    $('.righttopinner').css("width",width)
     if(width>widths){
     	range++;
     	innerleft-=150;
     	$(".righttopdir").css("display","block")
     	$(".righttopinner").css({left:innerleft})
     }
   }
}else{
    alert("先关闭几个再打开吧")
    return false;
}
var left=$(".dirleft")[0];
var right=$(".dirright")[0];
var width=($(".righttopbut").length)*151;
var widths=$(".right").width();
var n=0;
left.onclick=function(){
    if(n>0){
    n--;    
    range++;                        	
	innerleft-=150;
    $(".righttopinner").animate({left:innerleft})
}}
right.onclick=function(){
   if(innerleft<0){ 
   n++;
   range--;
	innerleft+=150;
  $(".righttopinner").animate({left:innerleft})
}
}
$(".left,.right").mousedown(function(e){
	e.preventDefault();
	e.returnValue=false;
})

//选项卡及关闭按钮实现部分
for (var i in btnarr){
btnarr[i][0].index=i;
btnarr[i][0].onclick=function(){
  $(this).addClass("butactive").siblings().removeClass("butactive")
  $(".item").css({zIndex:"0",display:"none"});
  itemarr[this.index].css({zIndex:"1",display:"block"});  
}
$(btnarr[i]).find(".rrrclosebtn")[0].index=i; 
$(btnarr[i]).find(".rrrclosebtn")[0].onclick=function(e){
     if(this.indx!=0){
      var e=e||window.event;
      e.stopPropagation()
      e.cancleBubble=true; 
      $(this).parent().remove();
      $(itemarr[this.index]).remove()
      $(leftbtnarr[this.index]).attr("target","main");
      delete btnarr[this.index]
      delete itemarr[this.index]
      delete leftbtnarr[this.index]
      $(".righttopbut:last").addClass("butactive").siblings().removeClass("butactive");
       $(".item").last().css({zIndex:"1",display:"block"})
      var width=($(".righttopbut").length)*151;
      $('.righttopinner').css("width",width)
      if(range>0){
         range--;
         innerleft+=150;
         if(range==0){
      $(".righttopdir").css("display","none")
         }
         $(".righttopinner").css({left:innerleft})
         }else{
         $(".righttopdir").css("display","none") 
         }
      }
    }
   };
//*******************************
})
