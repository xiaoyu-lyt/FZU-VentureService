<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class DocumentController extends AdminController {
	public $MODULE_NAME = "Document";
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('未登录',U('home/index'));
	}
	public function index($page = 1) {
		$pageSize = 8;
		$total = count(M('Documents')->select());
		$totalPage = ceil($total/$this->pageSize);//总页数

		$documents = M('Documents')->order('issue_time desc')->page($page,$pageSize)->select();
		for ($i=0; $i < count($documents); $i++) { 
			$documents[$i]['issue_time'] = date('Y-m-d',$documents[$i]['issue_time']);
		}
		$pageBar = array(
			'total'	=> $total,
			'totalPage'	=> $totalPage+1,
			'pageSize' => $this->pageSize,
			'curPage'	=> $page
			);
		$this->assign($pageBar);
		$this->assign('now','index');
		$this->assign('documents',$documents);

		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('document');
	}

	public function publish($action = '') {
		$login_manager = session('login_manager');
		if($action == 'do') {

			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     314572800 ;// 设置附件上传大小
		    $upload->rootPath  =     BASE_URL.'/Uploads/'; // 设置附件上传根目录
		    $upload->saveName  =     $login_manager['uid']."_".time();
		    $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     array('date','Ymd');
		    // 上传文件 
		    $info   =   $upload->upload();
		    $data = I('post.');
		    if($info) {// 上传错误提示错误信息
		       $data['file_url'] = $info['file']['savepath'].$info['file']['savename'];
		       $data['pic_url'] = $info['pic']['savepath'].$info['pic']['savename'];
		    }else{// 上传成功
		        $this->error($upload->getError());
		    }
		    $data['issue_time'] = time();

		    if(M('Documents')->add($data)) {
		    	$this->success('发布成功',U('index'));
		    } else {
		    	$this->error('发布失败，请重新发布！',U('publish'));
		    }
		} else {

			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('publish');
		}
	}

	public function modify($id ,$action = '') {
		if($action == 'do' ) {

			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     314572800 ;// 设置附件上传大小
		    $upload->rootPath  =     BASE_URL.'/Uploads/'; // 设置附件上传根目录
		    $upload->saveName  =     $login_manager['uid']."_".time();
		    $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     array('date','Ymd');
		    // 上传文件 
		    $info   =   $upload->upload();
		    $data = I('post.');
		    if($info) {// 上传错误提示错误信息
		       $data['file_url'] = $info['file']['savepath'].$info['file']['savename'];
		       $data['pic_url'] = $info['pic']['savepath'].$info['pic']['savename'];
		    }else{// 上传成功
		        $this->error($upload->getError());
		    }
		    $data['issue_time'] = time();

		    if(M('Documents')->where(array('id'=>$id))->save($data)) {
		    	$this->success('修改成功',U('index'));
		    } else {
		    	$this->error('修改失败，请重新发布！',U('index'));
		    }	

		} else {
			$doc = M('Documents')->where(array('id'=>$id))->find();
			$this->assign('doc',$doc);

			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('modify');
		}
	}

	public function delete($id){
		if(M('Documents')->where(array('id'=>$id))->delete()) {
			$this->success('删除成功！',U('index'));
		} else {
			$this->error('删除失败！',U('index'));
		}
	}

}