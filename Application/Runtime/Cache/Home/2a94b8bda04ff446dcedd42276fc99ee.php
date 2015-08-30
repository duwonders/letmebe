<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>红岩搞基平台</title>
	<link rel="stylesheet" type="text/css" href="/letmebe/Public/css/bootstrap.min.css">
</head>
<body>
	<p style="font-size: 30px; position: absolute; top: 50px; left:44%">登陆聊天室</p>
	<div style="margin: 200px auto; width: 200px;">
		<form role="form">
			<div class="form-group">
				<lable>用户名</lable>
				<input type="text" placeholder="账号" id="username" class="form-control">
				<lable>密码</lable>
				<input type="password" placeholder="密码" id="password" class="form-control">
			</div>
		</form>
		<button id="submit" class="btn btn-primary">登陆</button>
	</div>
	<script type="text/javascript">
	var sub = document.getElementById('submit');
	sub.onclick = function(){
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var config = {};
		config.username = username;
		config.password = password;
		var usent = JSON.stringify(config);
		console.log(usent);
		xhr = new XMLHttpRequest();
		xhr.open("POST", "<?php echo U('Home/Index/check_log');?>");
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send('message='+usent);
		xhr.onload = function(){
			var data = JSON.parse(xhr.responseText);
			if(data.status == 'ok'){
				window.location.href = "<?php echo U('Chatting/index');?>"; 
			}else{
				alert("验证失败");
			}
		}
	}
	</script>
	<?php print_r($_SESSION);?>
</body>
</html>