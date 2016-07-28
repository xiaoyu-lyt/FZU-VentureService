<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class ClassController extends AdminController {
	public $MODULE_NAME = "Class";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index() {

		$enlist = M('ClassEnroll')->where(array('status'=> 0))->select();
		for ($i=0; $i < count($enlist); $i++) { 
			$enlist[$i]['class'] = M('Classes')->where(array('cid'=>$enlist[$i]['cid']))->find();
			$enlist[$i]['stu'] = M('User')->where(array('uid'=>$enlist[$i]['uid']))->field('username,name,gender,tel,email,reg_time,avatar')->find();
		}
		$this->assign('enlist',$enlist);

		
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('class');
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
}