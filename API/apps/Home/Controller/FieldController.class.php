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

		// $where['type'] = I('get.type');
		$where['status'] = 1;
		$data = M('fields')->where($where)->order('run_time desc')->page($page,$pageSize)->field('fid,name,pic,synopsis,run_time')->select();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无场地信息");
		}
		//var_dump($jsonReturn);
		// echo $json;
		$this->ajaxReturn($json);
	}
	/**
	 * 根据id获取场地详情介绍
	 * @param int $fid 
	 * @return json
	 */
	public function detail_get() {
		$where['fid'] = I('get.fid');
		$data = M('fields')->where($where)->find();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此场地详细信息");

		}
		//var_dump($jsonReturn);
		// echo $json;
		$this->ajaxReturn($json);
	}

	/**
	 * 添加场地信息
	 */
	public function add_post() {

		$data = I('post.');

		if (M('fields')->add($data)) {
			$json = $this->jsonReturn(200,"场地添加成功",$data);
		} else {
			$json = $this->jsonReturn(0,"场地添加失败，请重新添加");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 删除场地信息
	 */
	public function delete_delete() {

		$where['fid'] = I('delete.fid');
		if (M('fields')->where($where)->delete()) {
			$json = $this->jsonReturn(200,"场地删除成功");
		} else {
			$json = $this->jsonReturn(0,"场地删除失败");
		}
		$this->ajaxReturn($json);
	}
}

