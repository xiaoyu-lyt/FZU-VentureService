<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class NoticeController extends AdminController {
	public $MODULE_NAME = "Notice";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	
	public function index() {

		$news = D('Notice')->noticeType(0);
		$notices = D('Notice')->noticeType(1);
		$policy = D('Notice')->noticeType(2);

		$data = array(
			'news' => $news,
			'notices' => $notices,
			'policy' => $policy
			);


		$this->assign($data);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('notice');
	}
	
	public function publish($action = '') {
		
		$login_manager = session('login_manager');
		if($action == 'do') {
			$data = I('post.');
			$data['date'] = time();
			$data['uid'] = $login_manager['uid'];
			if(M('Notice')->add($data)) {
				$this->success("发布成功",U('index'));
			} else {
				$this->error("发布失败",U('publish'));
			}
		} else {
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('article');
		}
	}


	public function modify($nid) {
		$article = M('Notice')->where(array('nid'=>$nid))->find();
		$this->assign('article',$article);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('modify');
	}
}