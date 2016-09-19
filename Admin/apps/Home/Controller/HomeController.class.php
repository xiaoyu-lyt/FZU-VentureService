<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class HomeController extends AdminController {
	
	public $MODULE_NAME = "Home";
	
	public function index(){
			$this->display('login');
	}
	
	public function login() {
		$username = I('post.username');
		$password = I('post.password');
		$login_manager = D('Home')->checkLogin($username,$password);
		if (!empty($login_manager)) {
			unset($login_manager['password']);
			session('login_manager',$login_manager);

			$token = D('UserToken')->createToken($login_manager['uid'],$login_manager['groupid']);
			cookie('cookie_token',$token,60*60*24);

			$this->success('登录成功',U('Notice/index'));
		} else {
			$this->error('密码错误或您不是管理员，请重试或联系管理员',U('Home/index'));
		}
	}

	/**
	 * 退出登录
	 */
	public function logout() {
		session('login_manager',NULL);
		cookie('cookie_token',NULL);
		$this->success('注销成功',U('index'));
	}
}