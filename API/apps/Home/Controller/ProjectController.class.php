<?php
namespace Home\Controller;
use Think\Controller\RestController;
class ProjectController extends RestController {
	/**
	 * 获取项目列表
	 * @return json
	 */
	public function list_get() {
		$area = !empty(I('get.area')) ? I('get.area') : '';
		$type = !empty(I('get.type')) ? I('get.type') : '';
		$stage = !empty(I('get.stage')) ? I('get.stage') : '';
		$shareholding = !empty(I('get.shareholding')) ? I('get.shareholding') : '';


		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 20;

		$notice = M('projects');
		$where['status'] = 1;
		$data = $notice->where($where)->order('date desc')->field('pid,name,logo,synopsis,stage,area,shareholding,tags,progress,type,date')->page($page,$pageSize)->select();

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
				'msg'	=> "暂无项目信息"
				);
		}
		//var_dump($jsonReturn);
		echo json_encode($jsonReturn);
	}
	/**
	 * 根据id获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$pid = I('get.pid');
		$notice = M('projects');
		$where['pid'] = $pid;
		$data = $notice->where($where)->field('pid,name,stage,area,shareholding,tags,progress,logo,detail,members,date')->select();

		if(!empty($data)) {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> $data,
				'msg'	=> "查询成功"
				);
		} else {
			$jsonReturn = array(
				'code'	=> 0,
				'data'	=> null,
				'msg'	=> "暂无此项目详细内容"
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
