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
			return session("login_user");
		}
	}

	/**
	 * 发送短信验证码
	 * @param int $tel 接收方电话
	 * @param string $code 验证码
	 * @return json
	 */
	public function send_verify($tel,$code) {
		$url = "http://api.sms.cn/sms";
		$post_data = array(
				'ac'	=> 'send',
				'uid'	=> 'l131458',
				'pwd'	=> '120130833a3b637a1191839444d2d194',
				'template'=> '100000',
				'mobile' => $tel,
				'content'=> json_encode(array('code'=>$code))
				);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// post数据
		curl_setopt($ch, CURLOPT_POST, 1);
		// post的变量
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		curl_close($ch);
		//打印获得的数据
		//print_r($output);
		$ret = json_decode($output);
		if($ret['stat'] == '100') {
			$json = $this->jsonReturn(200,$ret['message'],array('v_code'=>$code));
		} else {
			$json = $this->jsonReturn(0,$ret['message']);
		}
		return $json;
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
		return $arr;
	}
}