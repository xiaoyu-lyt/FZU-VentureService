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
		$where['status'] = 1;//是否空闲
		$data = M('Fields')->where($where)->page($page,$pageSize)->select();

		$count = count(M('Fields')->where($where)->select());
		$data['pages'] = ceil($count/$pageSize);

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

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此场地详细信息");

		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}


	/**
	 *  入驻申请
	 */
	public function apply_post() {
		$data = I('post.');
		$login_user = D('UserToken')->getToken($data['token']);
		if( !empty($login_user) ) {
			if(M('FieldApply')->add($data)) {
				$json = $this->jsonReturn(200,"提交成功,请等待管理员审核");
			} else {
				$json = $this->jsonReturn(0,"提交失败，请重新提交");
			}
		} else {
			$json = $this->jsonReturn(0,"用户未登录，请先登录");
		}
		$this->ajaxReturn($json);
	}

	public function delete_delete() {

	}
}

