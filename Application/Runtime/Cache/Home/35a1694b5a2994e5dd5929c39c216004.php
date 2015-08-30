<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>红岩搞基平台</title>
	<link rel="stylesheet" type="text/css" href="/letmebe/Public/css/bootstrap.min.css">
	<style type="text/css">
	.list{
		width: 200px;
		position: absolute;
		left: 10px;
		top: 50px;
	}
	.talk{
		width: 300px;
		position: absolute;
		top: 500px;
		left: 37%;
	}
	.chatting{
		width: 55%;
		height: 400px;
		position: absolute;
		left: 300px;
		top: 50px;
	}
	.p{
		font-color: green;
	}
	</style>
</head>
<body style="background-image: url(/letmebe/Public/image/1.jpg); ">
	<div class="list">
		<p style="color:#00FFFF">&nbsp管理员列表</p>
		<ul class="list-group">
			<?php foreach ($maneger as $key) { $name2 = $key['username']; ?>
		  	<li class="list-group-item"><?php echo ($name2); ?>
		  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  		<a href="<?php echo U('Chatting/silent?username='.$name2);?>" >
		  			<span class="glyphicon glyphicon-volume-off"></span>
		  		</a>
		  		<a href="<?php echo U('Chatting/delete2?username='.$name2);?>" >
		  			<span class="glyphicon glyphicon-remove"></span>
		  		</a>
		  	</li>
		  	<?php } ?>
		  	<li class="lsit-group">
		  		<a href="" class="list-group-item" data-toggle="modal" data-target=".bs-modal-signUp1">点击添加管理员
		  			<span class="glyphicon glyphicon-plus"></span>
		  		</a>
		  	</li>
		  	<div class="modal fade bs-modal-signUp1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title">Sign Up Maneger</h4>
			      </div>
			      <div class="modal-body">
			      	<div class="form-horizontal" role="form">
			      	  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" placeholder="Your Name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" placeholder="Password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default" id="addManeger">Sign Up</button>
					    </div>
					  </div>
					</div>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div>
		</ul>
		<p style="color: #00FFFF">&nbsp用户列表</p>
		<ul class="list-group">
		  	<?php foreach ($user as $key) { $name3 = $key['username']; ?>
		  	<li class="list-group-item"><?php echo ($name3); ?>
		  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  		<a href="<?php echo U('Chatting/silent?username='.$name3);?>" >
		  			<span class="glyphicon glyphicon-volume-off"></span>
		  		</a>
		  		<a href="<?php echo U('Chatting/delete3?username='.$name3);?>">
		  			<span class="glyphicon glyphicon-remove"></span>
		  		</a>
		  	</li>
		  	<?php } ?>
		  	<li class="lsit-group">
		  		<a href="" class="list-group-item"  data-toggle="modal" data-target=".bs-modal-signUp">点击添加用户
		  			<span class="glyphicon glyphicon-plus"></span>
		  		</a>
		  	</li>
		  	<div class="modal fade bs-modal-signUp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title">Sign Up User</h4>
			      </div>
			      <div class="modal-body">
			      	<div class="form-horizontal" role="form">
			      	  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username2" placeholder="Your Name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password2" placeholder="Password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default" id="addUser">Sign Up</button>
					    </div>
					  </div>
					</div>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div>
		</ul>
	</div>
	<div class="panel panel-default chatting" style="overflow:scroll">
		<div class="panel-body" id="chatting">
			<p class="p">>...<</p>
	    	<span class = "time"></span>
		</div>
	</div>
	<div class="talk">
		<h4>
			<span class="label label-info">say something~</span>
		</h4>
		<textarea class="form-control" rows="4" id="input"></textarea>
		<button class="btn btn-primary" id="en">Submit</button>
	</div>
	<script type="text/javascript" src="/letmebe/Public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/letmebe/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function ajaxfor(){
		var id = document.getElementsByClassName('p').length;
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "<?php echo U('Chatting/chatting');?>&id="+id);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send();
		xhr.onload = function(){
			var data = JSON.parse(xhr.responseText);
			if(data.status){      //判断是否有新的信息
				var n = 0;
				for(var i in data){  //获取对象长度
					n++;
				}
				for(i = 0; i < n - 1; i++){
					var father = document.getElementById('chatting');
					var son = document.createElement("p");
					son.className = 'p';
					son.innerHTML = data[i].username+": "+data[i].comment;
					father.appendChild(son);
				}
			}
		}
	}
	setInterval("ajaxfor()", 1000);
	//ajax轮询部分

	var submit = document.getElementById('en');
	submit.onclick = function(){
		var comment = document.getElementById('input').value;
		var config = {};
		config.comment = comment;
		var usent = JSON.stringify(config);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "<?php echo U('Chatting/getComment');?>");
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send('comment='+usent);
		xhr.onload = function(){
			var data = JSON.parse(xhr.responseText);
			if(!data.status){
				alert(data.reason);
			}
		}
	}//发送对话部分

	var addManeger = document.getElementById('addManeger');
	addManeger.onclick = function(){
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		if(username || password){
			var config = {};
			config.username = username;
			config.password = password;
			usent = JSON.stringify(config);
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "<?php echo U('Chatting/addManeger');?>");
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send('newManeger='+usent);
			xhr.onload = function(){
				var data = JSON.parse(xhr.responseText);
				alert(data.response);
				window.location.href = "<?php echo U('Chatting/index');?>";
			}
		}else{
			alert("信息不能为空");
		}
	}
	//添加管理员

	var addUser = document.getElementById('addUser');
	addUser.onclick = function(){
		var username = document.getElementById('username2').value;
		var password = document.getElementById('password2').value;
		if(username || password){
			var config = {};
			config.username = username;
			config.password = password;
			usent = JSON.stringify(config);
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "<?php echo U('Chatting/addUser');?>");
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send('newUser='+usent);
			xhr.onload = function(){
				var data = JSON.parse(xhr.responseText);
				alert(data.response);
				window.location.href = "<?php echo U('Chatting/index');?>";
			}
		}else{
			alert("信息不能为空");
		}
	}
	//添加用户
	</script>
</body>
</html>