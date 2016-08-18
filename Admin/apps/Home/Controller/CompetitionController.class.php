<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class CompetitionController extends AdminController {
	public $MODULE_NAME = "Competition";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
	}
	public function index($page = 1) {

		$pageSize = 8;
		$total = count(M('Competitions')->select());
		$totalPage = ceil($total/$pageSize);

		$competition = M('Competitions')->page($page,$pageSize)->select();
		for ($i=0; $i < count($competition); $i++) {
			$competition[$i]['issue_time'] = date('Y-m-d',$competition[$i]['issue_time']);
			$competition[$i]['deadline'] = date('Y-m-d',$competition[$i]['deadline']);
		}

		$pageBar = array(
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $pageSize,
			'curPage'   => $page
			);
		$this->assign($pageBar);
		$this->assign('competition',$competition);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('competition');
	}


	public function publish($action = '',$cid = '') {
		if($action == 'do') {
			$data = I('post.');
			$data['issue_time'] = time();
			$data['number'] = $this->getRandNum();
			$data['deadline'] = strtotime($data['deadline']);
			if ($data['name'] != NULL && $data['url'] != NULL && $data['description'] != NULL && $data['times'] != NULL && $data['deadline'] != NULL) {
				if(M('Competitions')->add($data)) {
					$this->success("发布成功",U('Competition/index'));
				} else {
					$this->error("发布失败",U('publish'));
				}
			} else {
					$this->error("发布失败,不能为空",U('publish'));
			}
		} elseif ($action == 'domodify') {
			$data = I('post.');
			$data['issue_time'] = time();
			$data['deadline'] = strtotime($data['deadline']);
			M('Competitions')->where(array('cid'=>$cid))->save($data);
			$this->success("修改成功",U('index'));
		} else {
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('article');
		}
	}

	public function modify($cid) {
		$competition = M('Competitions')->where(array('cid'=>$cid))->find();
		$competition['deadline'] = date('Y-m-d',$competition['deadline']);
		$this->assign('competition',$competition);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('modify');

	}

	//批量删除
	public function discard() { // delete all selected
		$cidArr = I('idArr');
		/*if (is_array($nidArr)) {
			$where = 'nid in('.implode(',',$nidArr).')';
		} else {
			$where = 'nid='.$nidArr;
		}*/
		// echo json_encode(array('msg'=>'success'));
		if (M('Competitions')->where(array('cid'=>array('in',$cidArr)))->delete()) {
			$this->ajaxReturn(array('msg'=>"删除成功"));
		} else {
			$this->ajaxReturn(array('msg'=>"删除失败"));

		}

	}

	//删除单条
	public function deleteOne($cid) {
		if(M('Competitions')->where(array('cid'=>$cid))->delete()) {
			$this->success("删除成功",U('index'));
		} else {
			$this->error("删除失败",U('index'));
		}
	}

	/**
	 * 随机字符串
	 * @return string
	 */
	public function getRandNum() {
		$randNum = "";
		$str = "0123456789";
		for( $i = 0; $i <= 4; $i++ ) {
			$randNum .= $str[rand(0,strlen($str))];
		}
		return $randNum;
	}
}
