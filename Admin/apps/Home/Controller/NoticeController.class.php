<?php
namespace Home\Controller;
use Think\Controller;
class NoticeController extends Controller {
	public $MODULE_NAME = "Notice";
	
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('notice');
	}
}