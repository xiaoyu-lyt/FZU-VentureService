<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class ProjectController extends AdminController {
	public $MODULE_NAME = "Project";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('未登录',U('home/index'));
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
		$detail['partner'] = json_decode($detail['partner'],true);

		$detail['charge'] = (array)$detail['partner'][1];

		$mode = array('银行贷款','股票筹资','债券融资','融资租赁','海外融资','典当融资');
		$stage = array('未融资','天使轮','A轮','B轮','C轮','D轮','E轮及以后');
		$duty = array('技术','融资','运营','市场','其他');
		$idType = array('学生证','身份证','其他');

		$detail['finan_mode'] = $mode[$detail['finan_mode']];
		$detail['next_stage'] = $stage[$detail['next_stage']];
		$detail['charge']['duty'] = $duty[$detail['charge']['duty']];
		$detail['charge']['id_type'] = $idType[$detail['charge']['id_type']];
		$detail['charge']['gender'] = $detail['charge']['gender'] ? "男" : "女";
		$detail['pic'] = SITE_URL.'/Uploads/'.$detail['pic'];
		$detail['logo'] = SITE_URL.'/Uploads/'.$detail['logo'];
		/*$detail['plan'] = basename(dirname($detail['plan']))."-".basename($detail['plan']);
		$detail['attachment'] = basename(dirname($detail['attachment']))."-".basename($detail['attachment']);*/


		$this->assign('detail',$detail);

		/*$data = array(
			'1' => array(
					'name' => 'lwb',
					'gender' => 1,
					'tel'	=> '15659751525',
					'email' => '1010548824@qq.com',
					'id_type'	=> 0,
					'id_number' => '031402219',
					'work_record'=> "送过外卖，做过项目",
					'share_percentage'	=> 'lalal',
					'duty'	=> 2,
					'business_record' => "正在创业"
					),
			'2' => array(
					'name' => '卢伟滨',
					'gender' => 1,
					'tel'	=> '15659751525',
					'email' => '1010548824@qq.com',
					'id_type'	=> 0,
					'id_number' => '031402219',
					'work_record'=> "送过外卖，做过项目",
					'share_percentage'	=> 'hahah',
					'duty'	=> 1,
					'business_record' => "正在创业"
					)
			);
		echo json_encode($data);exit;*/

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('project_detail');
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
