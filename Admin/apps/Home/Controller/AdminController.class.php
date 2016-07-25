<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function index() {

		$notice = D('notice')->order('date desc,overhead desc,rank desc')->select();
		for($i=0;$i<count($notice);$i++)
			$notice[$i]['date'] = date('Y-m-d',$notice[$i]['date']);
		$this->assign('notices',$notice);


		

		$teachers = M('User')->where('groupid = 1')->select();
		for($i=0;$i<count($teachers);$i++) {
			$teachers[$i]['reg_time'] = date('Y-m-d',$teachers[$i]['reg_time']);
			$teachers[$i]['log_time'] = date('Y-m-d',$teachers[$i]['log_time']);
		}

		$investors = M('User')->where('groupid = 2 ')->select();
		for($i=0;$i<count($investors);$i++) {
			$investors[$i]['reg_time'] = date('Y-m-d',$investors[$i]['reg_time']);
			$investors[$i]['log_time'] = date('Y-m-d',$investors[$i]['log_time']);
		}

		$students = M('User')->where('groupid = 0')->select();
		for($i=0;$i<count($students);$i++) {
			$students[$i]['reg_time'] = date('Y-m-d',$students[$i]['reg_time']);
			$students[$i]['log_time'] = date('Y-m-d',$students[$i]['log_time']);
		}

		$admins = M('User')->where('groupid = 6')->select();
		for($i=0;$i<count($admins);$i++) {
			$admins[$i]['reg_time'] = date('Y-m-d',$admins[$i]['reg_time']);
			$admins[$i]['log_time'] = date('Y-m-d',$admins[$i]['log_time']);
		}
		$data = array(
			'teachers'	=> $teachers,
			'investors'	=> $investors,
			'students'	=> $students,
			'admins'	=> $admins
			);
		$this->assign($data);
		//$this->assign('users',$users);

	
		$this->display('header');
		$this->display('home');
		$this->display('footer');
	}

	public function pass($id) {
		$ret = M('User')->where("uid",$id)->save(array('status'=>1));
		if($ret) {
			$this->success("审核成功",U('/Admin/index'));
		}
	}

}
