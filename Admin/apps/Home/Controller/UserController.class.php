<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class UserController extends AdminController {
	public $MODULE_NAME = "User";
	public $pageSize = 8;
	protected $_list = "";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() ) {
			$this->error('未登录',U('home/index'));
		} else {
			$login_manager = session('login_manager');
			$this->_list = M('Powerlevels')->where(array("level{$login_manager['groupid']}"=>'1'))->select();
			$this->assign('list',$this->_list);
		}
	}

	public function index($page = 1) {

		$total = count(M('User')->where(array('status'=>0,'groupid'=>1))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$teachers = M('User')->where(array('status'=>0,'groupid'=>1))->field('password,userKey',true)->page($page,$this->pageSize)->select();
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('teachers',$teachers);

		$this->assign('now',"index");
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('teacher_audit');
	}

	public function investor_audit($page = 1) {

		$total = count(M('User')->where(array('status'=>0,'groupid'=>2))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$investors = M('User')->where(array('status'=>0,'groupid'=>2))->field('password,userKey',true)->page($page,$this->pageSize)->select();
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('investors',$investors);

		$this->assign('now','investor_audit');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('investor_audit');
	}

	public function teacher($page = 1) {

		$total = count(M('User')->where(array('status'=>1,'groupid'=>1))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$teachers = M('User')->where(array('status'=>1,'groupid'=>1))->field('password,userKey',true)->page($page,$this->pageSize)->select();
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('teachers',$teachers);

		$this->assign('now','teacher');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('teacher');
	}

	public function investor($page = 1) {

		$total = count(M('User')->where(array('status'=>1,'groupid'=>2))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$investors = M('User')->where(array('status'=>1,'groupid'=>2))->field('password,userKey',true)->page($page,$this->pageSize)->select();

		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('investors',$investors);

		$this->assign('now','investor');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('investor');
	}

	public function student($page = 1) {

		$total = count(M('User')->where(array('groupid'=>0))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$students = M('User')->where(array('groupid'=>0))->field('password,userKey',true)->page($page, $this->pageSize)->select();


		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);
		$this->assign('students',$students);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->assign('now','student');
		$this->display('student');
	}

	public function admin($page = 1) {

		$total = count(M('User')->where(array('groupid'=>6))->select());
		$totalPage = ceil($total/$this->pageSize);//总页数
		$admins = M('User')->where(array('groupid'=>6))->field('password,userKey',true)->page($page,$this->pageSize)->select();

		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);

		$this->assign('admins',$admins);

		$this->assign('now','admin');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('admin');
	}


	public function admin_add($action = '') {
		if($action == "do") {
			$data = I('post.');
			if(D('User')->register($data)) {
				$this->success("成功添加管理员",U('admin'));
			} else {
				$this->error("添加失败，请重新添加",U('admin_add'));
			}
		} else {
			$this->assign('now','admin_add');
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('admin_add');
		}
	}

	/**
	 * 用户审核
	 * @param int $uid 用户id
	 */
	public function pass() {
		$uid = I('uid');
		if( !is_array($uid) ) {
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
	/**
	 * 查看用户信息
	 * @param int $uid 用户id
	 */
	public function detail($uid) {
		$profile = M('User')->where(array('uid'=>$uid))->field('password,userKey,status',true)->find();
		$profile['reg_time'] = date('Y-m-d',$profile['reg_time']);
		$profile['log_time'] = date('Y-m-d',$profile['log_time']);
		$profile['avatar'] = SITE_URL.'/Uploads/'.$profile['avatar'];

		$projects = M('Projects')->where(array('uid'=>$profile['uid']))->field('pid,name')->select();
		$tems = M('Teams')->where(array('tcharge'=>$profile['uid']))->select();

		$this->assign('teams',$teams);
		$this->assign('profile',$profile);
		$this->assign('projects',$projects);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('profile');
	}




}
