<?php
namespace Home\Controller;
use Home\Controller\AdminController;
class FieldController extends AdminController {
	public $MODULE_NAME = "Field";
	public $pageSize = 8;
	public function __construct() {
		parent::__construct();
		if( !$this->isLogin() )
			$this->error('未登录',U('home/index'));
	}
	public function index($page = 1) {
		$total = count(M('FieldApply')->where(array('status'=>0))->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//

		$records = M('FieldApply')->where(array('status'=>0))->select();
		for($i=0; $i < count($records); $i++) { 
			$records[$i]['field'] = M('Fields')->where(array('fid'=>$records[$i]['fid']))->field('name')->find();
			$records[$i]['applicant'] = M('User')->where(array('uid'=>$records[$i]['uid']))->field('name,tel,email')->find();
			$records[$i]['apply_time'] = date('Y-m-d',$records[$i]['apply_time']);
		}

		$pageBar = array(
				'total'	=> $total,
				'totalPage'	=> $totalPage+1,
				'pageSize' => $this->pageSize,
				'curPage'	=> $page //当前页
				);
		$this->assign($pageBar);

		$this->assign('records',$records);

		$this->assign('now','index');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field');
	}

	public function field_list($page = 1) {
		$total = count(M('Fields')->select());//总记录数
		$totalPage = ceil($total/$this->pageSize);//
		$list = M('Fields')->select();
		for ($i=0; $i < count($list); $i++) { 
			$list[$i]['run_time'] = date('Y-m-d',$list[$i]['run_time']);
		}
		$pageBar = array(
				'total'	=> $total,
				'totalPage'	=> $totalPage+1,
				'pageSize' => $this->pageSize,
				'curPage'	=> $page //当前页
				);
		$this->assign($pageBar);
		$this->assign('list',$list);
		$this->assign('now','field_list');
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field_list');		
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
		    if($info) {// 上传成功
		       $data['pic'] = $info['photo']['savepath'].$info['photo']['savename'];
		    }else{//上传错误提示错误信息
		        $this->error($upload->getError());
		    }
		    $data['run_time'] = strtotime($data['run_time']);

		    if(M('Fields')->add($data)) {
		    	$this->success('添加成功',U('field_list'));
		    } else {
		    	$this->error('添加失败，请重新添加！',U('publish'));
		    }

		} else {
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('publish');	
		}

	}

	public function detail($fid) {
		$detail = M('Fields')->where(array('fid'=>$fid))->find();
		$detail['run_time'] = date('Y-m-d',$detail['run_time']);
		$own = array('','自有','合办');

		$detail['own_or_co'] = $own[$detail['own_or_co']];
		$detail['detail'] = htmlspecialchars_decode($detail['detail']);
		$detail['run_time'] = date($detail['run_time']);
		$detail['pic'] = SITE_URL."/Uploads/".$detail['pic'];




		$this->assign('detail',$detail);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field_detail');
	}
	/**
	 * 入驻申请审核
	 * @param int $id 申请记录id
	 */
	public function pass($id) {
		$ret = M('FieldApply')->where(array('id'=>$id))->setField('status',1);
		if($ret) {
			$this->success("审核成功",U('index'));
		} else {
			$this->error("操作失败",U('index'));
		}
	}

	
}