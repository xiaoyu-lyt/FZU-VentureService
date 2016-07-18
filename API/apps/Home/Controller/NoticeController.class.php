<?php
namespace Home\Controller;
use Think\Controller\RestController;
//header("Content-Type:text/html;charset=utf-8");
class NoticeController extends RestController {
	/**
	 * 获取通知列表
	 * @return json
	 */
	public function list_get() {
		$type = I('get.type');    //相当于$_GET['type']
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 20;

		$notice = M('notice');
		$where['type'] = $type;
		$where['status'] = 1;
		$data = $notice->where($where)->order('overhead desc,rank desc,date desc')->page($page,$pageSize)->field('nid,theme,date,content')->select();

		if(!empty($data)) {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> $data,
				'msg'	=> "查询成功"
				);
		} else {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> null,
				'msg'	=> "暂无通知"
				);
		}
		//var_dump($jsonReturn);
		echo json_encode($jsonReturn);
	}
	/**
	 * 获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$id = I('get.id');
		$notice = M('notice');
		$where['nid'] = $id;
		$data = $notice->where($where)->field('nid,theme,date,content')->select();

		if(!empty($data)) {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> $data,
				'msg'	=> "查询成功"
				);
		} else {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> null,
				'msg'	=> "暂无此通知详细内容"
				);
		}
		//var_dump($jsonReturn);
		echo json_encode($jsonReturn);
	}
	public function add_post() {

	}
	public function delete_delete() {

	}
}

