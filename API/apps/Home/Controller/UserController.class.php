<?php
namespace Home\Controller;
use Home\Controller\BaseController;
//header("Content-type: text/html; charset=utf-8");

class UserController extends BaseController {

	/**
	 * 用户注册
	 * @return string json
	 */
	public function register_post() {

		$data = I('post.');
		if( !D('user')->isExisted($data['username']) ) {
			if( D('user')->register($data) ) {
				$arr = array(
					'username'	=> $data['username'],
					'nickname'	=> $data['nickname'],
					'groupid'	=> $data['groupid']
					);
				$json = $this->jsonReturn(200,"注册成功，返回首页登陆！",$arr);
			} else {
				$json = $this->jsonReturn(0,"操作失败，请重新提交！");
			}
		} else {
			$json = $this->jsonReturn(0,"用户已存在！");
		}
		//print_r($jsonReturn);
		echo $json;
	}

	/**
	 * 用户登陆
	 * @return string json
	 */
	public function login_post() {

		if(IS_POST) {
			$cookie_token = cookie('cookie_token');
			if(!$cookie_token) {
				$username = I('username');
				$password = I('password');
				$login_user = D('User')->checkLogin($username,$password);
				if(!empty($login_user)) {
					unset($login_user['password']);
					session('login_user',$login_user);
					$token = D('UserToken')->createToken($login_user['uid'],$login_user['groupid']);
					cookie('cookie_token',$token,60*60*24);
					$data = array(
						'uid'		=> $login_user['uid'],
						'username'	=> $login_user['username'],
						'nickname'	=> $login_user['nickname'],
						'name'		=> $login_user['name'],
						'groupid'	=> $login_user['groupid'],
						'token'		=> $token
						);
					$json = $this->jsonReturn(200,"登陆成功",$data);
				} else {
					$json = $this->jsonReturn(0,"密码错误，请重新登录！");
				}
			} else {
				//判断是否已登录
				$ret = D('UserToken')->getToken($cookie_token);
				if($ret && $ret['token_expire'] > time()) {
					$login_user = M('User')->where('uid',$ret['uid'])->field('uid,username,nickname,greoupid')->find();
					session('login_user',$login_user);
				}
				$json = $this->jsonReturn(200,"已登录",$login_user);
			}
		}
		echo $json;
	}

	public function modify_put() {

	}

	/**
	 * 获取个人信息
	 * @param int $uid 
	 */
	public function getUserInfo_get() {
		$uid = I('uid');
		$data = D('User')->getInfo($uid);
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"",$data);
		} else {
			$json = $this->jsonReturn(200,"无此用户个人信息");
		}
		echo $json;
	}

	/**
	 * 用户名唯一性认证
	 * @return boolen
	 */
	public function isOnly_get() {
		$username = I('username');
		return D('User')->isExisted($username);
	}

	/**
	 * 退出登录
	 * @return json
	 */
	public function logout() {
		session('login_user',NULL);
		cookie('cookie_token',NULL);
		echo $this->jsonReturn(200,"注销成功");
	}
	
}

