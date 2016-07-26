<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class UserController extends AdminController {
	public $MODULE_NAME = "User";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}

	public function index() {

		$teachers = D('User')->userinfo(1);
		$investors = D('User')->userinfo(2);
		$students = D('User')->userinfo(0);
		$admins = D('User')->userinfo(6);
		
		$data = array(
			'teachers'	=> $teachers,
			'investors'	=> $investors,
			'students'	=> $students,
			'admins'	=> $admins
			);
		$this->assign($data);
		
		$this->assign('MODULE',$this->MODULE_NAME);	
		$this->display('user');
	}

	/**
	 * 用户审核
	 * @param int $uid 用户id
	 */
	public function pass($uid) {
		$ret = M('User')->where(array('uid'=>$uid))->setField('status',1);
		if($ret) {
			$login_manager = session('login_manager');
			$log = array(
				'obj'	=> $uid,
				'operate' => "用户通过审核"
				);
			$this->addLog($login_manager['uid'],json_encode($log));//添加操作日志

			$this->success("审核成功",U('index'));
		} else {
			$this->error("操作失败",U('index'));
		}
	}

}