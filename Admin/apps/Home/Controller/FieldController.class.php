<?php
namespace Home\Controller;
use Think\Controller;
class FieldController extends Controller {
	public $MODULE_NAME = "Field";
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field');
	}
}