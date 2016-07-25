<?php
namespace Home\Controller;
use Think\Controller;
class CompetitionController extends Controller {
	public $MODULE_NAME = "Competition";
	public function index() {
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('competition');
	}
}