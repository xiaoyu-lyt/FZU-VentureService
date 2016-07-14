<?php
namespace Home\Controller;
use Think\Controller\RestController;
header("Content-type: text/html; charset=utf-8");

class UserController extends RestController {

	/**
	 * 用户注册
	 * @return string json
	 */
	public function register_post() {

		$data = I('post.');
		$data['userKey'] = $this->getRandChar();//随机字符串
		$data['password'] = md5(md5($data['password']).$data['userKey']);
		$data['status'] = 0;
		$data['regTime'] = date('Y-m-d H:i:s',time());
		$data['level'] = 4;
		
		$user = D('user');
		//echo $user->userExisted($data['username']);exit;
		if( !$user->userExisted($data['username']) ) {
			if($user->insert($data)) {
				$jsonReturn = array(
					'code'	=> 200,
					'data'	=> null,
					'msg'	=> "注册成功，请返回首页登录！"
					);
			} else {
				$jsonReturn = array(
					'code'	=> 0,
					'data'	=> null,
					'msg'	=> "操作失败，请重新提交！"
					); 
			}
		} else {
			$jsonReturn = array(
				'code'	=> 10001,
				'data'	=> null,
				'msg'	=> "用户已存在"
				);
		}
		//print_r($jsonReturn);
		echo json_encode($jsonReturn);
	}

	/**
	 * 用户登陆
	 * @return string json
	 */
	public function login_post() {

		$data = I('post.');

		$user = M('user');
		$where['username'] = $data['username'];
		$userinfo = $user->where($where)->select();
		if(!empty($userinfo)) {
			if( md5(md5($data['password']).$userinfo['userKey']) == $userinfo['password']) {

				$jsonReturn = array(
					'code'	=> 200,
					'data'	=> null,
					'msg'	=> "登陆成功！"
					);
			} else {
				$jsonReturn = array(
					'code'	=> 0,
					'data'	=> null,
					'msg'	=> "密码错误，请重新登录！"
					);
			}
		} else {
			$jsonReturn = array(
				'code'	=> 0,
				'data'	=> null,
				'msg'	=> "用户名不存在，请先注册！"
				);
		}


	}

	/**
	 * 随机字符串
	 * @return string 
	 */

	public function getRandChar() {
		$randChar = "";
		$str = "zxcvbnmasdfghjklqwertyuiop";
		for( $i = 1; $i <= 8; $i++ ) {
			$randChar .= $str[rand(0,strlen($str))];
		}
		return $randChar;
	}
	
	public function test1(){
		test();
	}
}

