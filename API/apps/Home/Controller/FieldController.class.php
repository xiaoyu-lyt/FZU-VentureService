<?php
namespace Home\Controller;
use Think\Controller\RestController;
class FieldController extends RestController {
	/**
	 * 获取场地信息列表
	 * @return json
	 */
	public function list_get() {
		$type = I('get.type');
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 20;

		$fields = M('fields');
		$where['type'] = $type;

		$data = $fields->field('fid,name,pic,synopsis,date')->order('date desc')->page($page,$pageSize)->where($where)->select();

		if (!empty($data)) {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> $data,
				'msg'	=> "场地查询成功"
				);
		}
		else {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> null,
				'msg'	=> "暂无场地信息"
				);
		}

		echo json_encode($jsonReturn);
	}

	/**
	 * 获取场地详情介绍
	 * @return json
	 */
	public function detail_get() {
		$id = I('get.id');

		$fields = M('fields');
		$where['fid'] = $id;

		$data = $fields->field('fid,name,pic,detail,date')->where($where)->select();
		if (!empty($data)) {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> $data,
				'msg'	=> "场地详细介绍查询成功"
				);
		}
		else {
			$jsonReturn = array(
				'code'	=> 200,
				'data'	=> null,
				'msg'	=> "暂无此场地的详细介绍"
				);
		}

		echo json_encode($jsonReturn);
	}

	public function add_post() {

	}
	public function delete_delete() {

	}
}

