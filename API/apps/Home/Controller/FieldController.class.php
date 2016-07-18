<?php
namespace Home\Controller;
use Think\Controller\RestController;
class FeildController extends RestController {
	/**
	 * 获取场地列表
	 * @return json
	 */
	public function list_get() {
		$type = I('get.type');
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$fields = M('fields');
		$where['type'] = $type;
		$where['status'] = 1;
		$data = $fields->where($where)->order('date desc')->page($page,$pageSize)->field('fid,name,pic,synopsis,date')->select();

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
				'msg'	=> "暂无场地信息"
				);
		}
		//var_dump($jsonReturn);
		echo json_encode($jsonReturn);
	}
	/**
	 * 根据id获取场地详情介绍
	 * @param 
	 * @return json
	 */
	public function detail_get() {
		$id = I('get.id');
		$fields = M('fields');
		$where['fid'] = $id;
		$data = $fields->where($where)->field('fid,name,pic,detail,date')->select();

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
				'msg'	=> "暂无此场地详细内容"
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

