<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {



	public function isLogin() {
		$cookie_token = cookie('cookie_token');
		//判断是否已登录
		$ret = D('UserToken')->getToken($cookie_token);
		if($ret && $ret['token_expire'] > time()) {
			$login_manager = M('User')->where(array('uid'=>$ret['uid']))->field('uid,username,nickname,groupid')->find();
			session('login_manager',$login_manager);
			return true;
		}
		return false;	
	}



	/**
	 * 发送短信通知
	 * @param int $tel 接收方电话
	 * @param string $message 通知内容
	 * @return json
	 */
	public function sendMessage($receiver, $message) {
		$url = "http://api.sms.cn/sms";
		$post_data = array(
				'ac'	=> 'send',
				'uid'	=> 'l131458',
				'pwd'	=> '120130833a3b637a1191839444d2d194',
				'template'=> '100000',
				'mobile' => $receiver,
				'content'=> json_encode(array('content'=>$message))
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
		if($ret['stat'] != '100') {
			return false;
		}
		return true;
	}

	/**
	 * 审核拒绝操作
	 * @param int $uid 用户id
	 * @param int $receiver 接收者手机
	 * @param  string $message 拒绝理由
	 */
	public function refuse() {
		$module = I('module');
		//$uid = I('uid');
		$receiver = I('receiver');
		$message = I('message');
		if( $this->sendMessage($receiver,$message) ) {
			//M('User')->where(array('uid'=>$uid))->setField('status',2);
			$this->success("发送成功",U($module.'/index'));
		} else {
			$this->error("发送失败",U($module.'/index'));
		}
	}
	/**
	 * 记录操作日志
	 */
	public function addLog($uid,$content) {
		$data = array(
			'uid'	=> $uid,
			'content'=> $content,
			'date'	=> time()
			);
		M('Logs')->add($data);
	}
}
