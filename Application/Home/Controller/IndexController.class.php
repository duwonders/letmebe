<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=UTF-8");
class IndexController extends Controller {
    public function index(){
    	if(session('userMessage')){
    		$path = "<script>window.location.href='".U('Chatting/index')."'</script>";
    		echo $path;
    	}else{
      		$this->display();
      	}
    }

 	public function check_log(){
		$usermessage = json_decode($_POST['message']);//获取json数据
		$username = $usermessage->username;
		$password = $usermessage->password;
		$where = [
			'username' => $username,
			'password' => $password,
		];
		//获取传过来的值
		if($result = M('all')->where($where)->select()){
			session('userMessage', $result[0]);//设置session
			$dat = [
				'status'=>'ok',
			];
			$this->ajaxReturn($dat, 'json');
		}else{
			$dat = [
				'status'=>'false',
			];
			$this->ajaxReturn($dat, 'json');
		}
 	}
}
