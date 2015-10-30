<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=UTF-8");
class ChattingController extends Controller {
    public function index(){
    	$where = [
    		'limit' => 2,
    	];
    	$maneger = M('all')->field('username')->where($where)->select();//获取管理员
    	$where = [
    		'limit' => 3,
    	];
    	$user = M('all')->field('username')->where($where)->select();//获取用户
    	$this->assign('maneger', $maneger);
    	$this->assign('user', $user);
        $this->display();
    }

    public function delete2(){         //删除管理员方法
    	$userMessage = session('userMessage');
    	$limit = $userMessage['limit'];
    	$path = "<script>window.location.href='".U('Chatting/index')."'</script>";
    	if($limit < 2){				//判断权限是否够
    		$where = [
    			'username' => I('get.username'),//获取管理员名字
    		];
    		M("all")->where($where)->delete();
    		echo "<script>alert('删除成功')</script>";
    		echo $path;
    	}else{
    		echo "<script>alert('删除失败，权限不够')</script>";
    		echo $path;
    	}
    }

    public function delete3(){         //删除用户的方法
    	$userMessage = session('userMessage');
    	$limit = $userMessage['limit'];
    	$path = "<script>window.location.href='".U('Chatting/index')."'</script>";
    	if($limit < 3){				//判断权限是否够
    		$where = [
    			'username' => I('get.username'),//获取用户
    		];
    		M("all")->where($where)->delete();
    		echo "<script>alert('删除成功')</script>";
    		echo $path;
    	}else{
    		echo "<script>alert('删除失败，权限不够')</script>";
    		echo $path;
    	}
    }

    public function chatting(){
        $id = I('get.id');                      //获取上一次查询的终点，判断是否有新信息
        $where = [
            'id' => ['gt', $id],
        ];
        $res = M('comment')->where($where)->select();
        if($res){
            $res['status'] = true;        //当有新的消息时就返回数组和状态为true
            $this->ajaxReturn($res, 'json');
        }else{
            $res['status'] = false;       //当没有新的消息就返回false
            $this->ajaxReturn($res, 'json');
        }
    }

    public function getComment(){
        $where = [
            'username'=>session('userMessage')['username'],
        ];
        $status = M('all')->field('status')->where($where)->select();
        if($status[0]['status']){                      //查看是否被禁言
            $comments = json_decode($_POST['comment']);//获取聊天内容
            $comment = $comments->comment;
            $username = session('userMessage')['username'];//获取用户名
            $data = [
                'username'=>$username,
                'comment'=>$comment,
            ];
            if($comment){
                if(M('comment')->add($data)){                  //成功的方法
                    $data = [
                        'status' => true,
                    ];
                    $this->ajaxReturn($data, 'json');
                }else{                            //插入失败的方法
                    $data = [
                        'status' => false,
                        'reason' => '数据库出问题了',
                    ];
                    $this->ajaxReturn($data, 'json');
                }
            }else{                                  //评论为空的方法
                $data = [
                    'status' => false,
                    'reason' => '不能为空',
                ];
                $this->ajaxReturn($data, 'json');
            }
        }else{
            $data = [
                'reason' => '你被禁言了',
                'status' => false,
            ];
            $this->ajaxReturn($data, 'json');
        }
    }

    public function silent(){  //禁言和接触禁言的方法
        $path = "<script>window.location.href='".U('Chatting/index')."'</script>";
        $doer_limit = session('userMessage')['limit'];//获取执行人权限
        $where = [
            'username'=>I('get.username'),
        ];
        $limit = M('all')->field('limit')->where($where)->select();
        $silented_limit = $limit[0]['limit'];
        if($doer_limit < $silented_limit){         //判断执行人权限是否够
            $status = M('all')->field('status')->where($where)->select();
            if($status[0]['status']){               //如果为1禁言，如果为0解除禁言
                $save = [
                    'status'=>0,
                ];
                M('all')->where($where)->save($save);
                echo "<script>alert('禁言成功!')</script>";
                echo $path;
            }else{
                $save = [
                    'status'=>1,
                ];
                M('all')->where($where)->save($save);
                echo "<script>alert('解除禁言成功!')</script>";
                echo $path;
            }
        }else{
            echo "<script>alert('你的权限不够')</script>";
            echo $path;
        }
    }

    public function addManeger(){   //添加管理员
        $limit = session('userMessage')['limit'];        //先判断是否有权限添加管理员
        if($limit < 2){
            $data = json_decode($_POST['newManeger']);
            $dat = [
                'username' => $data->username,
                'password' => $data->password,
                'limit' => 2,
                'status' => 1,
            ];
            M('all')->add($dat);
            $data = [
                'response' => "添加成功",
            ];
            $this->ajaxReturn($data, 'json');
        }else{
            $data = [
                'response' => "你没有权限添加管理员",
            ];
            $this->ajaxReturn($data, 'json');
        }
    }

    public function addUser(){   //添加用户
        $limit = session('userMessage')['limit'];        //先判断是否有权限添加用户
        if($limit < 3){
            $data = json_decode($_POST['newUser']);
            $dat = [
                'username' => $data->username,
                'password' => $data->password,
                'limit' => 3,
                'status' => 1,
            ];
            M('all')->add($dat);
            $data = [
                'response' => "添加成功",
            ];
            $this->ajaxReturn($data, 'json');
        }else{
            $data = [
                'response' => "你没有权限添加用户",
            ];
            $this->ajaxReturn($data, 'json');
        }
    }
}
