<?php
namespace Home\Controller;
use Think\Controller\RestController;
class BaseController extends RestController {



	public function checkLogin(){
		if ( ! session("login_user")) {
			$cookie_token = cookie('cookie_token');
			if ($cookie_token) {
				$ret = D("UserToken")->getToken($cookie_token);
				if ($ret && $ret['token_expire'] > time() ) {
					$login_user = D("User")->where("uid",$ret['uid'])->field('uid,username,nickname,groupid')->find();
					session("login_user" , $login_user);
					return $login_user ;
				}
			}
		}else{
			return  session("login_user") ;
		}
	}

	public function verify($tel,$code) {
		
	}

	/**
	 * 返回 json 数据
	 * @param int $code 状态码
	 * @param string $msg 反馈信息
	 * @param array $data 数据
	 * @return json
	 */
	public function jsonReturn($code,$msg,$data = null) {
		$arr = array(
			'code'	=> $code,
			'data'	=> $data,
			'msg'	=> $msg
			);
		return json_encode($arr);
	}
}