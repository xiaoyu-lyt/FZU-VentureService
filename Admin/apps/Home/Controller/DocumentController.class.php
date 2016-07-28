<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class DocumentController extends AdminController {
	public $MODULE_NAME = "Document";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index() {

		$documents = M('Documents')->select();
		for ($i=0; $i < count($documents); $i++) { 
			$documents[$i]['issue_time'] = date('Y-m-d',$documents[$i]['issue_time']);
		}

		$this->assign('documents',$documents);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('document');
	}
}