<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class FieldController extends BaseController {
	/**
	 * 获取场地列表
	 * @return json
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$where['type'] = I('get.type');
		$where['status'] = 1;
		$data = M('fields')->where($where)->order('date desc')->page($page,$pageSize)->field('fid,name,pic,synopsis,date')->select();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无场地信息");
		}
		//var_dump($jsonReturn);
		echo $json;
	}
	/**
	 * 根据id获取场地详情介绍
	 * @param int $fid 
	 * @return json
	 */
	public function detail_get() {
		$where['fid'] = I('get.fid');
		$data = M('fields')->where($where)->field('fid,name,pic,detail,date')->find();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此场地详细信息");

		}
		//var_dump($jsonReturn);
		echo $json;
	}
	public function add_post() {

	}
	public function delete_delete() {

	}
}

