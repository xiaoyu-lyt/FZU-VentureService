<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class ClassController extends AdminController {
	public $MODULE_NAME = "Class";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('未登录',U('home/index'));
	}
	public function index($page = 1) {

		$total = count(M('ClassEnroll')->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//总页数
		


		$enlist = M('ClassEnroll')->where(array('status'=> 0))->page($page,$this->pageSize)->select();
		for ($i=0; $i < count($enlist); $i++) { 
			$enlist[$i]['class'] = M('Classes')->where(array('cid'=>$enlist[$i]['cid']))->find();
			$enlist[$i]['stu'] = M('User')->where(array('uid'=>$enlist[$i]['uid']))->field('username,name,gender,tel,email,reg_time,avatar')->find();
			$enlist[$i]['issue_time'] = date("Y-m-d",$enlist[$i]['issue_time']);
		}

		$pageBar = array(
				'total'	=> $total,
				'totalPage'	=> $totalPage+1,
				'pageSize' => $this->pageSize,
				'curPage'	=> $page //当前页
				);
		$this->assign($pageBar);


		$this->assign('now','index');

		$this->assign('enlist',$enlist);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('class');
	}

	
	public function class_list($page = 1) {

		$total = count(M('Classes')->where("status != '2'")->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//总页数
		
		$list = M('Classes')->where("status != '2'")->order('deadline asc')->page($page,$this->pageSize)->select();
		for ($i=0; $i < count($list); $i++) { 
			$list[$i]['start_time'] = date('Y-m-d',$list[$i]['start_time']);
			$list[$i]['deadline'] = date('Y-m-d',$list[$i]['deadline']);
		}
		$pageBar = array(	
				'total'	=> $total,
				'totalPage'	=> $totalPage+1,
				'pageSize' => $this->pageSize,
				'curPage'	=> $page //当前页
				);
		$this->assign($pageBar);


		$this->assign('now','class_list');

		$this->assign('list',$list);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('class_list');
	}

	/**
	 * 修改
	 */
	public function modify($cid,$action = '') {
		if($action == 'do') {
			$data = I('post.');
			$data['content'] = trim($data['content']);
			$data['start_time'] = strtotime($data['start_time']);
			$data['deadline'] = strtotime($data['deadline']);
			$data['issue_time'] = time();
			if(M('Classes')->where(array('cid'=>$cid))->save($data)) {
				$this->success("发布修改成功",U('class_list'));
			} else {
				$this->success("修改失败，请重新提交",U('modify'));
			}

		} else {

			$data = M('Classes')->where(array('cid'=>$cid))->find();
			$data['start_time'] = date('Y-m-d',$data['start_time']);
			$data['deadline'] = date('Y-m-d',$data['deadline']);
			$data['content'] = htmlspecialchars_decode($data['content']);


			$this->assign('class',$data);
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('modify');
		}

	}

	/**
	 * 发布
	 */
	public function publish($action = '') {
		if($action == 'do') {
			$data = I('post.');
			$data['content'] = trim($data['content']);
			$data['start_time'] = strtotime($data['start_time']);
			$data['deadline'] = strtotime($data['deadline']);
			$data['issue_time'] = time();
			if(M('Classes')->add($data)) {
				$this->success("发布成功",U('class_list'));
			} else {
				$this->success("发布失败，请重新发布",U('publish'));
			}
		} else {

			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('publish');
		}
	}

	public function detail($cid) {
		$detail = M('Classes')->where(array('cid'=>$cid))->find();
		$detail['content'] = htmlspecialchars_decode($detail['content']);
		$detail['start_time'] = date('Y-m-d',$detail['start_time']);
		$detail['deadline'] = date('Y-m-d',$detail['deadline']);

		$this->assign('detail',$detail);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('class_detail');
	}

	/**
	 * 培训管理审核通过
	 */
	public function pass(){
		$id = I('id');
		if(!is_array($id)) {
			$ret = M('ClassEnroll')->where(array('id'=>$id))->setField(array('status'=>1));

			if($ret) {
				$login_manager = session('login_manager');
				$log = array(
					'obj'	=> $id,
					'operate' => "培训管理审核"
					);
				$this->addLog($login_manager['uid'],json_encode($log));//添加操作日志

				$this->success("审核成功",U('index'));
			} else {
				$this->error("操作失败",U('index'));
			}
		}
	}

	public function delete($cid) {
		if(M('Classes')->where(array('cid'=>$cid))->setField(array('status'=>2))) {
			$this->success('删除成功',U('class_list'));
		} else {
			$this->error('操作失败',U('class_list'));
		}
	}
}