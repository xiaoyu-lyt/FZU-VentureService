<?php
namespace Home\controller;
use Think\Controller;
class HomeController extends Controller {
	
	public function isLogin() {
		$username = I('post.username');
		$password = I('post.password');
		$login_manager = D('Home')->checkLogin($username,$password);
		if (!empty($login_manager)) {
			unset($login_user['password']);
			session('login_user',$login_user);
			$data = array(
				'uid'		=> $login_user['uid'],
				'username'	=> $login_user['username'],
				'nickname'	=> $login_user['nickname'],
				'name'		=> $login_user['name'],
				'groupid'	=> $login_user['groupid'],
			//	'token'		=> $token
				);
			$this->success('登录成功',U('Notice/index'));
		} else {
			$this->error('密码错误或您不是管理员，请重试或联系管理员',U('Home/index'));
		}
	}
}