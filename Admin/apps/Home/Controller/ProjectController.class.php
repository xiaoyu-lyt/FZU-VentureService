<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class ProjectController extends AdminController {
	public $MODULE_NAME = "Project";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	
	public function index() {

		$projects = M('Projects')->field('pid,name,uid,issue_time,status')->select();
		for ($i=0; $i < count($projects); $i++) { 
			$projects[$i]['issue_time'] = date('Y-m-d H:i:s',$projects[$i]['issue_time']);
			$projects[$i]['charge'] = M('User')->where(array('uid'=>$projects[$i]['uid']))->field('name,tel,email')->find();
		}
		$this->assign('projects',$projects);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('project');
	}

	/**
	 * 项目审核
	 * @param int $uid 用户id
	 */
	public function pass($pid) {
		$ret = M('Projects')->where(array('pid'=>$pid))->setField('status',1);
		if($ret) {
			
			$login_manager = session('login_manager');
			$log = array(
				'obj'	=> $uid,
				'operate' => "项目通过审核"
				);
			$this->addLog($login_manager['uid'],json_encode($log));

			$this->success("审核成功",U('index'));
		} else {
			$this->error("操作失败",U('index'));
		}
	}
	/**
	 * 查看项目信息
	 * @param int $pid 项目id
	 */
	public function detail($pid) {
		$detail = M('Projects')->where(array('pid'=>$pid))->find();
		$detail['charge'] = M('User')->where(array('uid'=>$detail['uid']))->field('name,tel,email')->find();

		$this->assign('detail',$detail);
		$this->ajaxReturn($detail);
		//$this->display('detail'); 
	}

	/**
	 * 项目删除
	 * @param int $pid 项目id 
	 */
	public function delete($pid) {
		$ret = M('Projects')->where(array('pid'=>$pid))->setField('status',3);
		if($ret) {
			$this->success("删除成功",U('index'));
		} else {
			$this->error("操作失败",U('index'));
		}
	}
}