<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class NoticeController extends AdminController {
	public $MODULE_NAME = "Notice";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('未登录',U('home/index'));
	}
	
	//新闻资讯
	public function index($page = 1) {

		$total = count(M('Notice')->where(array('type'=>0))->select());
		$totalPage = ceil($total/$this->pageSize);

		$news = D('Notice')->noticeType(0,$page,$this->pageSize);

		$pageBar = array(
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $this->$pageSize,
			'curPage'   => $page
			);
		$this->assign($pageBar);
		$this->assign('news',$news);

		$this->assign('now','index'); //看前端
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('news');
	}

	//通知公告
	public function notice($page = 1) {

		$total = count(M('Notice')->where(array('type'=>1))->select());
		$totalPage = ceil($total/$this->pageSize);

		$notice = D('Notice')->noticeType(1,$page,$this->pageSize);

		$pageBar = array(
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $this->$pageSize,
			'curPage'   => $page
			);
		$this->assign($pageBar);
		$this->assign('notice',$notice);

		$this->assign('now','notice'); //看前端
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('notice');
	}

	//最新政策
	public function policy($page = 1) {

		$total = count(M('Notice')->where(array('type'=>2))->select());
		$totalPage = ceil($total/$this->pageSize);

		$policy = D('Notice')->noticeType(2,$page,$this->pageSize);

		$pageBar = array(
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $this->$pageSize,
			'curPage'   => $page
			);
		$this->assign($pageBar);
		$this->assign('policy',$policy);

		$this->assign('now','policy'); //看前端
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('policy');
	}

	//发布文章
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

	//修改文章
	public function modify($nid) {
		$article = M('Notice')->where(array('nid'=>$nid))->find();
		$this->assign('article',$article);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('modify');
	}

	//批量删除
	public function discard() { // delete all selected
		
		$deleteArr = I('nid');
		echo count($deleteArr);
	}

	//删除单条
	public function deleteOne($nid) {
		if(M('Notice')->where(array('nid'=>$nid))->delete()) {
			$this->success("删除成功",U('index'));
		} else {
			$this->error("删除失败",U('index'));
		}
	}
}