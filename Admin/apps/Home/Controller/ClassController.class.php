<?php
namespace Home\Controller;
use Think\Controller;
class ClassController extends Controller {
	public $MODULE_NAME = "Class";
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('class');
	}
}