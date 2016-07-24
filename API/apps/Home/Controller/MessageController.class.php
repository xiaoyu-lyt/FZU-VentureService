<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class MessageController extends BaseController {
	/**
	 * 获取查询消息列表
	 * @return json
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$where['from_uid'] = I('get.uid');
		$where['to_uid'] = I('get.uid');
		$where['_logic'] = 'OR';
		$data = M('Message')->where($where)->order('time desc')->page($page,$pageSize)->select();
		
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无相关消息");
		}
		//var_dump($jsonReturn);
		echo $json;
	}

	/**
	 * 获取两个账号的消息对话列表
	 * @param $from_uid $to_uid
	 * @return json
	 */
	public function detail_get() {
		$where['from_uid'] = I('get.from_uid');
		$where['to_uid'] = I('get.to_uid');

		$data = M('Message')->where($where)->find();

		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无相关对话消息");
		}
		//var_dump($jsonReturn);
		echo $json;
	}

	/**
	 * 发送消息
	 * @return json
	 */
	public function send_post() {
		$login_user = $_session['login_user'];
		$data = I('post.');
		$data['time'] = time();
		$data['from_uid'] = $login_user['uid'];

		if (M('Message')->add($data)) {
			$json = $this->jsonReturn(200,"消息发送成功");
		} else {
			$json = $this->jsonReturn(0,"消息发送失败，请重试！");
		}
		echo $json;
	}
}
