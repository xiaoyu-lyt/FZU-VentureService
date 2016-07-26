<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function pass($id) {
		$ret = M('User')->where(array('uid'=>$id))->setField('status',1);
		if($ret) {
			$this->success("审核成功",U('user/index'));
		}
	}

}
