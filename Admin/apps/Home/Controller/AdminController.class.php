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

	public function download($f){

		//$filename = str_replace('-','/',$f);

		$file_path = BASE_URL."/Uploads/".$f;
		// echo $file_path;exit;
		// echo basename(dirname($file_path));exit;

		$file = fopen($file_path,"r");
        //返回的文件类型
        Header("Content-type: application/octet-stream");
        //按照字节大小返回
        Header("Accept-Ranges: bytes");
        //返回文件的大小
        Header("Accept-Length: ".filesize($file_path));
        //这里对客户端的弹出对话框，对应的文件名
        Header("Content-Disposition: attachment; filename=".basename($f));
        //修改之前，一次性将数据传输给客户端
        echo fread($file, filesize($file_path));
        //修改之后，一次只传输1024个字节的数据给客户端
        //向客户端回送数据
        $buffer=1024;//
        //判断文件是否读完
        while (!feof($file)) {
            //将文件读入内存
            $file_data=fread($file,$buffer);
            //每次向客户端回送1024个字节的数据
            echo $file_data;
        }

        fclose($file);
	}


}
