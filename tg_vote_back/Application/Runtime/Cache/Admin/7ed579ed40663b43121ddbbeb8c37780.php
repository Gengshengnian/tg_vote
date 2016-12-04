<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>多个柱状图</title>
 
</head>
<body>
 
  <div class="demo-content">
 
    <div class="detail-section">
      <div id="canvas">
 
      </div>
    </div>
 
  <script type="text/javascript" src="/projects/tg_oa/src/tg_oa_crm/Public/bui/Common/assets/js/acharts-min.js"></script>
 
  <script type="text/javascript">
  
        var chart = new AChart({
          id : 'canvas',
          theme : Chart.Theme.Smooth1,
          width : 950,
          height : 400,
          title : {
            text : '学生每日成绩统计',
            'font-size' : '16px'
          },
         
          xAxis : {
            type : 'category'
          },
          yAxis : {
            title : {
              text : '客观+主观得分'
            },
            min : 0
          },
          seriesOptions : {
              columnCfg : {
                allowPointSelect : true,
                xField : 'x',
                item : {
                  cursor : 'pointer',
                  stroke : 'none'
                }
              }
          },
          series: [ {
            name: '班级学生',
            events : {
              itemclick : function (ev) {
                var point = ev.point,
                  //item = ev.item, //点击的项
                  obj = point.obj; //point.obj是点击的配置项的信息
                alert(obj.x); //执行一系列操作
              }/*,
              itemselected : function(ev){ //选中事件
 
              },
              itemunselected : function(ev){ //取消选中事件
  
              }
              */
            },
            data: [
              {x : 'ie',y : 50,attrs : {fill : '#7179cb'}},
              {x : 'chrome',y : 30,attrs : {fill : '#6ed7ff'}},
              {x : 'firfox',y : 10,attrs : {fill : '#79c850'}},
              {x : 'other',y : 10,attrs : {fill : '#ffb65d'}},
            ]
          }]
 
        });
 
        chart.render();
 
 
      </script>
<!-- script end -->
  </div>
</body>
</html>