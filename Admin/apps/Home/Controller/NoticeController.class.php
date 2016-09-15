<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class NoticeController extends AdminController {
	public $MODULE_NAME = "Notice";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('请先登录！',U('home/index'));
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
		$this->assign('type',ACTION_NAME);

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
		$this->assign('type',ACTION_NAME);

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
		$this->assign('type',ACTION_NAME);

		$this->assign('now','policy'); //看前端
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('policy');
	}

	//发布文章
	public function publish($type,$action = '',$nid = '') {
		$login_manager = session('login_manager');	
		$this->assign('type',$type);	

		if($action == 'do') {
			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     314572800 ;// 设置附件上传大小
			$upload->rootPath  =     BASE_URL.'/Uploads/'; // 设置附件上传根目录
		    $upload->saveName  =      array('uniqid',$login_manager['uid']."_".time()."_");
		    $upload->thumb     =     true;
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     date('Ym',time()).'/'.date('d',time());
		    // 上传文件 
		    $info   =   $upload->upload();
		    $data = I('post.');
		    if ($data['overhead'] == 1) {
			    if($info) {// 上传成功
			       $data['pic'] = $info['photo']['savepath'].$info['photo']['savename'];
			    }
			 }
			 if (isset($data['type'])&&isset($data['theme'])&&isset($data['content'])) {
			 	$data['date'] = time();
				$data['uid'] = $login_manager['uid'];
				$count = count(M('Notice')->where(array('overhead'=>1))->select());
				if ($data['overhead'] == 1) {
					if ($count < 5) {
						if(M('Notice')->add($data)) {
							$this->success("发布成功",U($type));
						} else {
							$this->error("发布失败",U('publish'));
						}
					} else {
							$this->error("发布失败, 热门资讯不能超过5条",U('publish'));
					}
				} else {
					if(M('Notice')->add($data)) {
							$this->success("发布成功",U($type));
						
					} else {
						$this->error("发布失败",U('publish'));
					}
				}
			 } else {
			 	$this->error("发布失败, 类型、标题和内容不能为空",U('publish'));
			 }

		} elseif ($action == 'domodify') {
			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     314572800 ;// 设置附件上传大小
		    $upload->rootPath  =     BASE_URL.'/Uploads/'; // 设置附件上传根目录
		    $upload->saveName  =      array('uniqid',$login_manager['uid']."_".time()."_");
		    $upload->thumb     =     true;
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     date('Ym',time()).'/'.date('d',time());
		    // 上传文件 
		    $data = I('post.');
		    // if ($_FILES) {
			   //  $info   =   $upload->upload();
		    // }

			if ($data['overhead'] == 1) {
				if ($_FILES) {
					$info   =   $upload->upload();
				    if($info) {// 上传成功
				       $data['pic'] = $info['photo']['savepath'].$info['photo']['savename'];
				    }
				}
			}

			$data['date'] = time();
			$data['uid'] = $login_manager['uid'];
			if(M('Notice')->where(array('nid'=>$nid))->save($data)){
				$this->success('修改成功',U($type));
			} else {
				$this->error("操作失败，请重试！",U($type));
			}

		} else {
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('article');
		}
	}

	//修改文章
	public function modify($type,$nid) {
		$article = M('Notice')->where(array('nid'=>$nid))->find();
		$article['pic'] = SITE_URL.$article['pic'];
		$this->assign('type',$type);	
		$this->assign('article',$article);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('modify');
	}

	//批量删除
	public function discard() { // delete all selected
		$nidArr = I('idArr');
		/*if (is_array($nidArr)) {
			$where = 'nid in('.implode(',',$nidArr).')';
		} else {
			$where = 'nid='.$nidArr;
		}*/
		// echo json_encode(array('msg'=>'success'));
		if (M('Notice')->where(array('nid'=>array('in',$nidArr)))->delete()) {
			$this->ajaxReturn(array('msg'=>"删除成功"));
		} else {
			$this->ajaxReturn(array('msg'=>"删除失败"));
			
		}
		
	}

	//删除单条
	public function deleteOne($nid) {
		$type = M('Notice')->where(array('nid'=>$nid))->find();
		if(M('Notice')->where(array('nid'=>$nid))->delete()) {
			if ($type['type'] == 0) {
				$this->success("删除成功",U('index'));
			} elseif ($type['type'] == 1) {
				$this->success("删除成功",U('notice'));
			} elseif ($type['type'] == 2) {
				$this->success("删除成功",U('policy'));
			}
		} else {
			if ($type['type'] == 0) {
				$this->success("删除失败",U('index'));
			} elseif ($type['type'] == 1) {
				$this->success("删除失败",U('notice'));
			} elseif ($type['type'] == 2) {
				$this->success("删除失败",U('policy'));
			}
		}
	}
}