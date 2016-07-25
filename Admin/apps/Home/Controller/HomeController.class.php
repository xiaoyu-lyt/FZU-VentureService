<?php
namespace Home\controller;
use Think\Controller;
class HomeController extends Controller {
	public function index() {
		$this->display('login');
	}
}