<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class ProjectController extends BaseController {
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

		$where['status'] = 1;
		$data = M('projects')->where($where)->order('date desc')->field('pid,name,logo,synopsis,stage,area,shareholding,tags,progress,type,date')->page($page,$pageSize)->select();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无项目信息");
		}
		//var_dump($jsonReturn);
		echo $json;
	}
	/**
	 * 根据id获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$where['pid'] = I('get.pid');
		$data = M('projects')->where($where)->field('pid,name,stage,area,shareholding,tags,progress,logo,detail,members,date')->find();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此项目详细内容");
		}
		//var_dump($jsonReturn);
		echo $json;
	}
	public function add_post() {

	}
	public function delete_delete() {

	}
	
}
