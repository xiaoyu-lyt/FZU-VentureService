<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class FieldController extends AdminController {
	public $MODULE_NAME = "Field";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index() {
		$records = M('FieldApply')->where("status = 0")->select();
		for($i=0; $i < count($records); $i++) { 
			$records[$i]['field'] = M('Fields')->where(array('fid'=>$records[$i]['fid']))->field('name')->find();
			$records[$i]['applicant'] = M('User')->where(array('uid'=>$records[$i]['uid']))->field('name,tel,email')->find();
			$records[$i]['apply_time'] = date('Y-m-d',$records[$i]['apply_time']);
		}

		$this->assign('records',$records);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field');
	}

	/**
	 * 入驻申请审核
	 * @param int $id 申请记录id
	 */
	public function pass($id) {
		$ret = M('FieldApply')->where(array('id'=>$id))->setField('status',1);
		if($ret) {
			$this->success("审核成功",U('index'));
		} else {
			$this->error("操作失败",U('index'));
		}
	}

	
}