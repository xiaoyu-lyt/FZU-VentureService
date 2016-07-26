<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public $MODULE_NAME = "User";

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
}