$(function(){
		/*
			�����ڸ߶�
		*/

		//���� table �߶�
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

		//���� th  td ���һ��
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
	&���ť �����߼�&

		��Ӱ�ť ajax
		�鿴��ť
		�༭��ť ajax
		ɾ����ť ajax

		showData() ���� ��ʾ�����߼�
		editData() ���� �༭�����߼�
	*/
		//Ԫ�ػ�ȡ
		var alertBox=$('.alert-box');
		var headerTitle=$('.header-title',alertBox);
		var aths=$('.table-header th').not(":first").not(":last");
		var atds;
		var contentTable=$('.tables',alertBox);
		var nobtn=$('.input-button-no');
		var yesbtn=$('.input-button-yes');


		//��ʾ����
		var oldVal;
		var flag;

		//type ֵ �� show  edit
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
							contented = '<select name='+gid+'><option value=0>��ѡ��</option>';

							$.each(data,function(i){
								//console.log($(this).attr('parent_id'));
									//parent_id Ϊnull ����һ���˵�
									var self_id = $(this).attr('id');
									var parent_id = $(this).attr('parent_id');

									if( parent_id == null)
									{
										contented = contented+'<option value='+self_id+' data-pid=5 >'+$(this).attr('name')+'</option>';
										//ids[i] = self_id;
										ids.push(self_id);
									}else{

										//�����˵� �����˵���parent_id��Ϊnull ������һ���˵�id��Χ��
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


		//�༭��֮����ȷ����ť�ύ���ݵ�������
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


			//ȷ�ϰ�ť
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
						ajax�ύ���� ��̨ҳ��
						1. �ύ��ַurl �� ��ť ���� urls��ȡ
						2. �ύ ���� �ӱ��ͷ��
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


			//ȡ����ť
			nobtn.click(function(){

				flag=false;
				alertBox.css('display','none');
			})
		}


		var nowInput;
		var contents;
		var urls;

		//�鿴��ť
		tableContent.on("click",'.view',function(){
			contents=[];//������� json
			var that=this;
			headerTitle.html('�鿴');
			yesbtn.css('display','none');
			atds=$(this).parent().parent().find('td').not(":first").not(":last");
			//��ʾ����
			showData(atds,'show');
			nobtn.click(function(){
				alertBox.css('display','none');
			})
		})


		//�༭��ť
		tableContent.on("click",'.edit',function(){
			contents=[];//������� json
			urls=$(this).attr('urls');
			headerTitle.html('�༭');
			atds=$(this).parent().parent().find('td').not(":first").not(":last");
			//��ʾ����
			showData(atds,'edit');
			//�༭����
			yesbtn.css('display','inline-block');
			editData(atds);
		});


		//ɾ����ť
		tableContent.on("click",".delete",function(){

			headerTitle.html('�༭');
			urls=$(this).attr('urls');
			var tr=$(this).parent().parent();
			//ajax  ���ݺ�̨ɾ������
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


		//��Ӱ�ť
		$('.add-table').click(function(){
			var that=this;
			flag=false;
			yesbtn.css('display','inline-block');
			contents=[];//�������
			urls=$(this).attr('urls');
			headerTitle.html('���');
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
							contented = '<select name='+gid+'><option value=0>��ѡ��</option>';

							$.each(data,function(i){
								//console.log($(this).attr('parent_id'));
									//parent_id Ϊnull ����һ���˵�
									var self_id = $(this).attr('id');
									var parent_id = $(this).attr('parent_id');

									if( parent_id == null)
									{
										contented = contented+'<option value='+self_id+' data-pid=5 >'+$(this).attr('name')+'</option>';
										//ids[i] = self_id;
										ids.push(self_id);
									}else{

										//�����˵� �����˵���parent_id��Ϊnull ������һ���˵�id��Χ��
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
				$("input[name='crew']").replaceWith("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' id='tianjia'>���</a><input type='text' name='crew' id='crew'/>");
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
			//ȷ�ϰ�ť  ajax�ύ
			yesbtn.click(function(){
				$(".header-content").wrap("<form class='formbd'></form>");
				flag=true;
				if(flag){

					var datas;
					datas = $(".formbd").serialize();

					//$('<tr>'+conts+'</tr>').appendTo('.table-content .table');

					/*
						ajax�ύ���� ��̨ҳ��
						1. �ύ��ַurl �� ��ť ���� urls��ȡ
						2. �ύ ���� �ӱ��ͷ��
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
			//ȡ����ť
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
			contents=[];//�������
			urls=$(this).attr('urls');
			headerTitle.html('����');
			var o=0;
			var str="<div class='daoru'><form action='upload' method='post' enctype='multipart/form-data' id='drbd'> </form></div>";
			alertBox.css('display','block');
			contentTable.html(str);
			$("#drbd").append("<input type='file' name='file' id='export'/> <input type='submit' value='����' id='dran' />");
			yesbtn.css('display','none');
			//ȷ�ϰ�ť  ajax�ύ
			$("#dran").css({"width":"100%"});
			$("#dran").click(function(){

					//$('<tr>'+conts+'</tr>').appendTo('.table-content .table');

					/*
						ajax�ύ���� ��̨ҳ��
						1. �ύ��ַurl �� ��ť ���� urls��ȡ
						2. �ύ ���� �ӱ��ͷ��
					*/

					alertBox.css('display','none');

				$(this).off();
			})
			//ȡ����ť
			nobtn.click(function(){
				alertBox.css('display','none');
				$(this).off()
			})
			//$("body").append("<div class='daoru'><form action='__URL__/upload' method='post' enctype='multipart/form-data'><input type='file' name='file' /><input type='submit' /></form></div>")
		})
	});