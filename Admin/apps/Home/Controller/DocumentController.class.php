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
	public function index($page = 1) {
		$pageSize = 8;
		$total = count(M('Documents')->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$documents = M('Documents')->page($page,$pageSize)->select();
		for ($i=0; $i < count($documents); $i++) { 
			$documents[$i]['issue_time'] = date('Y-m-d',$documents[$i]['issue_time']);
		}
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);
		$this->assign('now','index');
		$this->assign('documents',$documents);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('document');
	}
}