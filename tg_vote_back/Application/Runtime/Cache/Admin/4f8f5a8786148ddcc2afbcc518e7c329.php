<?php if (!defined('THINK_PATH')) exit(); echo '<?'; ?>
xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Insert title here</title>
 <script type="text/javascript" src="/tg_oa_crm_20161008/Public/bui/Common/assets/js/jquery-1.8.1.min.js"></script>
<script>
	function load(){
		var crews = document.getElementsByName("crew");
		var crewname = document.getElementsByName("span");
		//console.dir(crewname);
		var str = [];
		var stb = [];
		for(i=0;i<crews.length;i++){
			if(crews[i].checked){
				str +=crews[i].value+',';
				stb +=crewname[i].innerText+',';
			}
		}
		
		$("#shuchu").text(stb);
		//$("#shuchu").val(str);
		
	}
	function fanhui(){
		var crews = document.getElementById("shuchu").value;
		var p = window.opener;
		var pd = p.document.getElementById("crew");
		pd.value = crews;
		window.close();
	}
</script>
</head>
<body>
	<table cellspacing="10" cellpadding="10" border="1" width="700" height="230">
		<thead>
			<th>请选择组员</th>
			<th></th>
			<th>已选择组员</th>
		</thead>
		<tbody>
		<tr>
			<td width="300px">
		 <?php if(is_array($data)): foreach($data as $key=>$vo): ?><span name="span"><input type="checkbox" name="crew" value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["name"]); ?>
				</span>
				</br><?php endforeach; endif; ?></td>
			<td width="100px"><input type="button" name="add" value="添加" onclick="load()"/></td>
			<td width="300px">
				<input type="hidden" id="id[]"/>
				<textarea rows="15" cols="100" id="shuchu">
					请选择组员
				</textarea>
			</br>
			</td>
		</tr>
		</tbody>
	</table>
</body>
</html>