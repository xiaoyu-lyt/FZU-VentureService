<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class DocumentController extends AdminController {
	public $MODULE_NAME = "Documents";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('document');
	}
}