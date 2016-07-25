<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function pass($id) {
		$ret = M('User')->where("uid",$id)->save(array('status'=>1));
		if($ret) {
			$this->success("审核成功",U('/Admin/index'));
		}
	}

}
