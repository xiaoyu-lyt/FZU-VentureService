<?php
namespace Home\Controller;
use Home\Controller\BaseController;
//header("Content-Type:text/html;charset=utf-8");
class NoticeController extends BaseController {
	/**
	 * 获取通知列表
	 * @return json
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$where['type'] = I('get.type');
		$where['status'] = 1;
		$data = M('Notice')->where($where)->order('overhead desc,rank desc,date desc')->page($page,$pageSize)->field('nid,type,theme,date')->select();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无通知");
		}
		//var_dump($jsonReturn);
		echo $json;
	}

	/**
	 * 根据id获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$where['nid'] = I('get.nid');
		$data = M('notice')->where($where)->field('nid,theme,type,date,content')->find();
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无此通知详细内容");
		}
		//var_dump($jsonReturn);
		echo $json;
	}
	public function add_post() {

	}
	public function delete_delete() {

	}
}

