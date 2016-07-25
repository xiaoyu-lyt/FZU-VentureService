<?php
namespace Home\Controller;
use Think\Controller;
class DocumentController extends Controller {
	public $MODULE_NAME = "Document";
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('document');
	}
}