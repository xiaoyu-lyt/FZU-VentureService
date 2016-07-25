<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {
	public $MODULE_NAME = "Project";
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('project');
	}
}