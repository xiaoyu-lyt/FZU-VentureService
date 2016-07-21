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

	/**
	 * 个人信息修改
	 * @return json
	 */
	public function modify_put() {
		$update = I('put.');
		if(D('User')->updateInfo($update)) {
			$json = $this->jsonReturn(200,"修改成功");
		} else {
			$json = $this->jsonReturn(0,"修改失败，请重新提交！");
		}
		echo $json;
	}
	/**
	 * 修改密码
	 */
	public function setting_put() {
		$data = I('put.');
		$ret = M('User')->where('uid',$data['uid'])->field('userKey')->find();
		$data['password'] = md5(md5($data['password']).$ret['userKey']);
		if( D('User')->updateInfo($data['uid'],$data) ) {
			$json = $this->jsonReturn(200,"成功修改密码");
		} else {
			$json = $this->jsonReturn(0,"密码修改失败，请重试！");
		}
		echo $json;
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
	 * 获取学生信息
	 */
	public function student_get() {
		$login_user = $this->checkLogin();
		$uid = I("get.uid");
		if(empty($login_user)) {
			$json = $this->jsonReturn(0,"用户未登录或者登陆超时，请先登录");
			echo $json;
			exit();
		}
		$ret = D("Student")->getInfo($uid);
		if(!empty($ret))
			$json = $this->jsonReturn(200,"操作成功",$ret);
		else
			$json = $this->jsonReturn(0,"无此学生信息，请先进行学生验证");
		echo $json;
	}

	/**
	 * 学生认证
	 */
	public function stuComfirm_post() {
		$stu_id = I('post.stu_id');
		$stu_pwd = I('post.stu_pwd');
	}

	/**
	 * 检查是否已进行学生认证
	 */
	public function isComfirm() {

	}

	/**
	 * 修改手机
	 */
	public function phoneModify_put() {

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
	
	/**
	 * 生成验证码
	 */
	public function verify_get() {
		$code = "";
		for($i = 1; $i <= 4; $i++) 
			$code .= rand(0,9);
		echo $code;
	}
}

