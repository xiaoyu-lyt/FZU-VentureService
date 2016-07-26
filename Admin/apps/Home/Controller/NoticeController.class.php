<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class NoticeController extends AdminController {
	public $MODULE_NAME = "Notice";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	
	public function index() {

		$news = D('Notice')->noticetype(0);
		$notices = D('Notice')->noticetype(1);
		$policy = D('Notice')->noticetype(2);

		$data = array(
			'news' => $news,
			'notices' => $notices,
			'policy' => $policy
			);


		$this->assign($data);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('notice');
	}
}