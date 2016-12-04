$(function(){
		/*
			处理窗口高度
		*/

		//设置 table 高度
		var clientH=$(window).height();
		var headerH=$('.content-box>.header:not(.alert-box)').height();
		var content=$('.content');
		content.height(clientH-headerH);

		var hth=$('.content .header-title').height();
		var chc=clientH-headerH-hth-20;

		var tableCnt=$('.content .table-content');
		$('.content .header-content').height(chc);
		tableCnt.height(chc-50);

		var tableContent=$('.table-content .table');

		//保持 th  td 宽度一致
		var ths=$('.table-header th');
		var tds=$('tr:first td',tableCnt);
		tds.width(function(index,width){
			ths.eq(index).width(width);
		});
		var tableHeader=$('.table .table-header th');
		//tableCnt.scroll(function(){
			//var tableTop=tableCnt.scrollTop();
			tableHeader.css('top',tableTop);
		//})



	/*
	&表格按钮 部分逻辑&

		添加按钮 ajax
		查看按钮
		编辑按钮 ajax
		删除按钮 ajax

		showData() 函数 显示数据逻辑
		editData() 函数 编辑数据逻辑
	*/
		//元素获取
		var alertBox=$('.alert-box');
		var headerTitle=$('.header-title',alertBox);
		var aths=$('.table-header th').not(":first").not(":last");
		var atds;
		var contentTable=$('.tables',alertBox);
		var nobtn=$('.input-button-no');
		var yesbtn=$('.input-button-yes');


		//显示数据
		var oldVal;
		var flag;

		//type 值 ： show  edit
		function showData(td,type){
			var tables=[];
			var o=0;
			var str="";
			var xlk;
			var urled;
			var oc;
			var contented;
			alertBox.css('display','block');
			oldVal=[];
			td.each(function(i){
				var cont=$(this).html();
				if($(this).attr('data-hid') == 'true'){
					return true;
				}
				if($(this).attr('class') == 'optioned'){

                  
					urled = $(this).attr("id");
					oc = $(this).attr("data-oc");
					xkname = $(this).attr('data-role');
				    var parent_id = '';

					$.ajax({
						url:"ajaxed",
						async: false,
						type:'post',
						data:"content="+cont+"&urled="+urled+"&oc="+oc+"&parent_id="+parent_id,
						success:function(data){
							var ids = new Array();
							contented = '<select name='+gid+'><option value=0>请选择</option>';

							$.each(data,function(i){
								//console.log($(this).attr('parent_id'));
									//parent_id 为null 的是一级菜单
									var self_id = $(this).attr('id');
									var parent_id = $(this).attr('parent_id');

									if( parent_id == null)
									{
										contented = contented+'<option value='+self_id+' data-pid=5 >'+$(this).attr('name')+'</option>';
										//ids[i] = self_id;
										ids.push(self_id);
									}else{

										//二级菜单 二级菜单的parent_id不为null 而且在一级菜单id范围内
										if( $.inArray(parent_id, ids) != -1 )
										{
											var optionName = "---" + $(this).attr('name');
										}else
										{
											var optionName = "------" + $(this).attr('name');
										}

										contented = contented+'<option value='+$(this).attr('id')+' data-pid=5 >'+ optionName +'</option>';
									}
							});

							contented = contented+'</select>';
						}
					})
					//alert(contented);
				}

				var title=aths.eq(i).html();
				contents.push(cont);
				oldVal.push(cont);
				if(o==0){str+="<tr>";}
				if(type=='edit'){
					if($(this).attr('class') == 'optioned'){
						//alert(contented);
						str+="<td><span style='float:left;'>"+title+"</span><span>"+contented+"</span></td>";
					}else{
						str+="<td><span style='float:left;'>"+title+"</span><input type='text' value='"+cont+"' name='"+$(this).attr('data-role')+"'style='float:right;'></td>";
					}
				}else{
					str+="<td><span style='float:left;'>"+title+"</span><span style='float:right;width:160px;text-align:left;border-left:1px solid #f6f6f6;padding-left:5px;margin-left:5px;'>"+cont+"</span></td>";
				}
				o++;
				if(o==2){str+="</tr>";o=0;}
			})
			contentTable.html(str);
		}


		//编辑好之后点击确定按钮提交数据到服务器
		function editData(){
			var inputs=$('input',contentTable);
			inputs.each(function(i,obj){
				$(this).data('a',i)
			})
			inputs.focus(function(){
				nowInput=$(this).val();
				$(this).val('');
			})
			flag=false;
			inputs.blur(function(){
				var vals=$(this).val();
				if(vals==''){
					vals=nowInput;
					$(this).val(nowInput);
				}
				if(nowInput!=vals){
					contents[$(this).data('a')]=vals;
					flag=true;
				};

			});


			//确认按钮
			yesbtn.click(function(){
				$(this).off();
				$(".header-content").wrap("<form class='formbd'></form>");

					var datas={};
					var titles=[];
					aths.attr('data-role',function(i,cont){
						titles.push(cont);
					})
					datas = $(".formbd").serialize();
					/*
						ajax提交数据 后台页面
						1. 提交地址url 从 按钮 属性 urls获取
						2. 提交 键名 从表格头部
					*/
					var cc = '';
					$.ajax({
						url:urls,
						type:'post',
						data:datas,
						success:function(data){
							$('body').html(cc);
							$('body').html(data);
						}
					})
					alertBox.css('display','none');

				flag=false;
			})


			//取消按钮
			nobtn.click(function(){

				flag=false;
				alertBox.css('display','none');
			})
		}


		var nowInput;
		var contents;
		var urls;

		//查看按钮
		tableContent.on("click",'.view',function(){
			contents=[];//存放内容 json
			var that=this;
			headerTitle.html('查看');
			yesbtn.css('display','none');
			atds=$(this).parent().parent().find('td').not(":first").not(":last");
			//显示数据
			showData(atds,'show');
			nobtn.click(function(){
				alertBox.css('display','none');
			})
		})


		//编辑按钮
		tableContent.on("click",'.edit',function(){
			contents=[];//存放内容 json
			urls=$(this).attr('urls');
			headerTitle.html('编辑');
			atds=$(this).parent().parent().find('td').not(":first").not(":last");
			//显示数据
			showData(atds,'edit');
			//编辑数据
			yesbtn.css('display','inline-block');
			editData(atds);
		});


		//删除按钮
		tableContent.on("click",".delete",function(){

			headerTitle.html('编辑');
			urls=$(this).attr('urls');
			var tr=$(this).parent().parent();
			//ajax  传递后台删除数据
			var bh=$('td:eq(1)',tr).html();
			$.ajax({
				url:urls,
				data:{"bh":bh},
				success:function(data){
					var cc = '';
					$('body').html(cc);
					$('body').html(data);
				}
			})
			//tr.remove();
		})


		//添加按钮
		$('.add-table').click(function(){
			var that=this;
			flag=false;
			yesbtn.css('display','inline-block');
			contents=[];//存放内容
			urls=$(this).attr('urls');
			headerTitle.html('添加');
			var o=0;
			var str="";
			var gid;
			alertBox.css('display','block');

			aths.each(function(i){
				var title=$(this).html();
				if($(this).attr('data-hid') == 'true'){
					return true;
				}
				if(o==0){str+="<tr>";}
				if($(this).attr('class')=='options'){
					urled = $(this).attr("data-id");
					oc = $(this).attr("data-oc");
					gid= $(this).attr('data-role');
					$.ajax({
						url:"ajaxed",
						async: false,
						type:'post',
						data:"urled="+urled+"&oc="+oc,
						success:function(data){
							var ids = new Array();
							contented = '<select name='+gid+'><option value=0>请选择</option>';

							$.each(data,function(i){
								//console.log($(this).attr('parent_id'));
									//parent_id 为null 的是一级菜单
									var self_id = $(this).attr('id');
									var parent_id = $(this).attr('parent_id');

									if( parent_id == null)
									{
										contented = contented+'<option value='+self_id+' data-pid=5 >'+$(this).attr('name')+'</option>';
										//ids[i] = self_id;
										ids.push(self_id);
									}else{

										//二级菜单 二级菜单的parent_id不为null 而且在一级菜单id范围内
										if( $.inArray(parent_id, ids) != -1 )
										{
											var optionName = "---" + $(this).attr('name');
										}else
										{
											var optionName = "------" + $(this).attr('name');
										}

										contented = contented+'<option value='+$(this).attr('id')+' data-pid=5 >'+ optionName +'</option>';
									}
							});

							contented = contented+'</select>';

						}
					});
					str+="<td><span style='float:left;'>"+title+"</span>"+contented+"</td>";
				}else{
					str+="<td><span style='float:left;'>"+title+"</span><input type='text' value='' name='"+$(this).attr('data-role')+"' style='float:right;'></td>";
				}

				o++;
				if(o==2){str+="</tr>";o=0;}
			})

			contentTable.html(str);
			var inputs=$('input',contentTable);
			if($("input[name='crew']")){
				$("input[name='crew']").replaceWith("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' id='tianjia'>添加</a><input type='text' name='crew' id='crew'/>");
				$('#tianjia').click(function(){
					var class_id = $("select[name='class_id'] option:selected").val();
					var headman = $("select[name='headman'] option:selected").val();
					window.open('tianjia/id/'+class_id+'/sid/'+headman,'aaa','width=600,height=300');
				});
			}
			inputs.each(function(i,obj){
				$(this).data('a',i)
			})
			inputs.blur(function(){
				var vals=$(this).val();
				if(nowInput!=''){
					flag=true;
					contents[$(this).data('a')]=vals;
				};
			});
			//确认按钮  ajax提交
			yesbtn.click(function(){
				$(".header-content").wrap("<form class='formbd'></form>");
				flag=true;
				if(flag){

					var datas;
					datas = $(".formbd").serialize();

					//$('<tr>'+conts+'</tr>').appendTo('.table-content .table');

					/*
						ajax提交数据 后台页面
						1. 提交地址url 从 按钮 属性 urls获取
						2. 提交 键名 从表格头部
					*/

					$.ajax({
						url:'add',
						type:'post',
						data:datas,
						success:function(data){
							  $('body').html('');
                              $('body').html(data);

							//$("#pageStr").html(data);

							//console.log('success');
						}

					});

					alertBox.css('display','none');
					flag=false;
				}else{
					alertBox.css('display','none');
				}

				$(this).off()
			})
			//取消按钮
			nobtn.click(function(){
				alertBox.css('display','none');
				$(this).off()
			})
		})

		$(".input-button-down").attr("class","input-button-down export");

		$(".export").click(function(){

			//alert('1111');
			var that=this;
			flag=false;
			yesbtn.css('display','inline-block');
			contents=[];//存放内容
			urls=$(this).attr('urls');
			headerTitle.html('导入');
			var o=0;
			var str="<div class='daoru'><form action='upload' method='post' enctype='multipart/form-data' id='drbd'> </form></div>";
			alertBox.css('display','block');
			contentTable.html(str);
			$("#drbd").append("<input type='file' name='file' id='export'/> <input type='submit' value='导入' id='dran' />");
			yesbtn.css('display','none');
			//确认按钮  ajax提交
			$("#dran").css({"width":"100%"});
			$("#dran").click(function(){

					//$('<tr>'+conts+'</tr>').appendTo('.table-content .table');

					/*
						ajax提交数据 后台页面
						1. 提交地址url 从 按钮 属性 urls获取
						2. 提交 键名 从表格头部
					*/

					alertBox.css('display','none');

				$(this).off();
			})
			//取消按钮
			nobtn.click(function(){
				alertBox.css('display','none');
				$(this).off()
			})
			//$("body").append("<div class='daoru'><form action='__URL__/upload' method='post' enctype='multipart/form-data'><input type='file' name='file' /><input type='submit' /></form></div>")
		})
	});