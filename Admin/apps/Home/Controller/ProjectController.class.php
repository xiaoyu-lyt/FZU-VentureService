<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class ProjectController extends AdminController {
	public $MODULE_NAME = "Project";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	
	public function index($page = 1) {

		$total = count(M('Projects')->where(array('status'=>0))->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//总页数

		$projects = M('Projects')->where(array('status'=>0))->field('pid,name,uid,issue_time,status')->page($page,$this->pageSize)->select();
		for ($i=0; $i < count($projects); $i++) { 
			$projects[$i]['issue_time'] = date('Y-m-d',$projects[$i]['issue_time']);
			$projects[$i]['charge'] = M('User')->where(array('uid'=>$projects[$i]['uid']))->field('name,tel,email')->find();
		}

		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page //当前页
			);
		$this->assign($pageBar);


		$this->assign('now','index');
		$this->assign('projects',$projects);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('project_audit');
	}

	public function info_list($page = 1) {

		$total = count(M('Projects')->where(array('status'=>1))->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//总页数

		$projects = M('Projects')->where(array('status'=>1))->field('pid,name,uid,issue_time,status')->page($page,$this->pageSize)->select();
		for ($i=0; $i < count($projects); $i++) { 
			$projects[$i]['issue_time'] = date('Y-m-d',$projects[$i]['issue_time']);
			$projects[$i]['charge'] = M('User')->where(array('uid'=>$projects[$i]['uid']))->field('name,tel,email')->find();
		}
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('now','info_list');
		$this->assign('projects',$projects);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('project_list');
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