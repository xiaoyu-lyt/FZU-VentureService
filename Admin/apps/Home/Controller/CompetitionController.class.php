<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class CompetitionController extends AdminController {
	public $MODULE_NAME = "Competition";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index() {
		$competition = M('Competitions')->select();
		
		$competition['competition'] = $competition;
		$this->assign($competition);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('competition');
	}


	public function publish($action = '') {
		if($action == 'do') {
			$data = I('post.');
			$data['issue_time'] = time();
			$data['number'] = date('Ymd',time());
			if(M('Competitions')->add($data)) {
				$this->success("发布成功",U('Competition/index'));
			} else {
				$this->error("发布失败",U('publish'));
			}
		} else {
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('article');
		}
	}
}