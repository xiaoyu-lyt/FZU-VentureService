<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class FieldController extends BaseController {
	/**
	 * 获取场地列表
	 * @return json
	 */
	public function list_get() {
		// $page = !empty(I('get.page')) ? I('get.page') : 1;
		// $pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$where['type'] = I('get.type');
		$where['status'] = 1;
		$data = M('fields')->where($where)->order('run_time desc')->field('fid,name,pic,synopsis,run_time')->select();
		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['pic'] = SITE_URL.'/Uploads/'.$data[$i]['pic'];
		}

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无场地信息");
		}
		//var_dump($jsonReturn);
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
		$data['detail'] = htmlspecialchars_decode($data['detail']);
		$data['pic'] = SITE_URL.'/Uploads/'.$data['pic'];
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此场地详细信息");

		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}
	/**
	 * 入驻申请
	 * @param int $uid 申请人id session('login_user')
	 * @param int $fid 申请场地id
	 * @return json
	 */
	public function fieldApply_post() {
		$login_user = session('login_user');
		$data = I('post.');
		$data['uid'] = $login_user['uid'];
		$data['person_in_charge'] = json_encode($data['person_in_charge']);
		$data['members_info'] = json_encode($data['members_info']);
		$data['documents'] = json_encode($data['documents']);
		if (M('field_apply')->add($data)) {
			$json = $this->jsonReturn(200,"入驻申请成功，请等待审核",$data);
		} else {
			$json = $this->jsonReturn(0,"入驻申请失败，请重新申请入驻");
		}
		$this->ajaxReturn($json);
	}


	public function delete_delete() {

	}
}

