<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {



	public function isLogin() {
		$cookie_token = cookie('cookie_token');
		//判断是否已登录
		$ret = D('UserToken')->getToken($cookie_token);
		if($ret && $ret['token_expire'] > time()) {
			$login_manager = M('User')->where(array('uid'=>$ret['uid']))->field('uid,username,nickname,name,groupid')->find();
			if( $login_manager['groupid'] == 6 || $login_manager['groupid'] == 7 ) {
				session('login_manager',$login_manager);
				return true;
			}
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

	public function pwdModify() {
		$old_pwd = I('post.old_pwd');
		$new_pwd = I('post.new_pwd');
		$login_manager = session('login_manager');
		$ret = M('User')->where(array('uid'=>$login_manager['uid']))->field('password,userKey')->find();
		$old_pwd = md5(md5($old_pwd).$ret['userKey']);
		if( $old_pwd == $ret['password']) {
			$new_pwd = md5(md5($new_pwd).$ret['userKey']);
			$ret2 = M('User')->where(array('uid'=>$login_manager['uid']))->setField(array('password'=>$new_pwd));
			if( $ret2 ) {
				$this->success("密码修改成功",U('notice/index'));
			} else {
				$this->error("密码修改失败",U('notice/index'));
			}
		} else {
			$this->error("原密码不一致",U('notice/index'));
		}
	}


	public function getpage(&$m,$pagesize=10){
	    $m1=clone $m;//浅复制一个模型
	    $count = $m->count();//连惯操作后会对join等操作进行重置
	    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
	    $p=new \Think\Page($count,$pagesize);
	    $p->lastSuffix=false;
	    $p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>%LIST_ROW%</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	    $p->setConfig('prev','上一页');
	    $p->setConfig('next','下一页');
	    $p->setConfig('last','末页');
	    $p->setConfig('first','首页');
	    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

	    $p->parameter=I('get.');

	    $m->limit($p->firstRow,$p->listRows);

	    return $p;
	}
}
