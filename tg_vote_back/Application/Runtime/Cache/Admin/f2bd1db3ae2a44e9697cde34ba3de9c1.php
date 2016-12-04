<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图形展示</title>
</head>
<body>
 
<div class="detail-section">
    <div id="canvas">
 
    </div>
</div>
 
<script src="/tg_crm_sx_job/Public/bui/Common/assets/js/acharts-min.js"></script>
<!-- https://g.alicdn.com/bui/acharts/1.0.29/acharts-min.js -->
 
 
  <script type="text/javascript">
        var chart = new AChart({
          theme : AChart.Theme.SmoothBase,
          id : 'canvas',
          width : 950,
          height : 500,
          plotCfg : {
            margin : [80,50,80] //画板的边距
          },
          xAxis : {
            categories: [
              '1',
              '2',
              '3',
              '4',
              '5'
            ],
            labels : {
              label : {
                rotate : -45,
                'text-anchor' : 'end'
              }
            }
          },
          yAxis : {
            min : 0
          },
          seriesOptions : { //设置多个序列共同的属性
            /*columnCfg : { //公共的样式在此配置
 
            }*/
          },
          tooltip : {
            valueSuffix : ''
          },
          series : [ {
            name: '题目编号',
            type : 'column',
            data: [ {y : 2,attrs : {fill : '#abc'}},1.5, {y : 1,attrs : {fill : '#ff0000'}},{y : 0.0,attrs : {fill : '0'}},0.5,],
            labels : { //显示的文本信息
              label : {
                rotate : -90,
                y : 10,
                'fill' : '#fff',
                'text-anchor' : 'end',
                textShadow: '0 0 3px black',
                'font-size' : '14px'
              }
            }
 
          }]
		  

 
        });
 
        chart.render();
      </script>
 
</body>
</html>