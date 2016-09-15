<?php
namespace Home\Controller;
use Home\Controller\AdminController;
header("Content-Type: text/html;charset=utf-8");
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

		$records = M('FieldApply')->where(array('status'=>0))->page($page,$this->pageSize)->select();
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
		$list = M('Fields')->page($page,$this->pageSize)->select();
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
		    $upload->saveName  =      array('uniqid',$login_manager['uid']."_".time()."_");
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     date('Ym',time()).'/'.date('d',time());
		    // 上传文件 
		    $info   =   $upload->upload();
		    $data = I('post.');
		    if($info) {// 上传成功

		       $data['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
		       for ($i=1; $i <= count($data['public']) ; $i++) { 
		       		$data['public'][$i]['pic'] = $info['pic_'.$i]['savepath'].$info['pic_'.$i]['savename'];
		       }
		       //$data['public_pic'] = $info['public_pic']['savepath'].$info['public_pic']['savename'];
		    }
		    $data['run_time'] = strtotime($data['run_time']);

		    $data['public'] = json_encode($data['public']);
		    
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

	public function modify($fid , $action = '') {
		if( $action == "" ) {
			$detail = M('Fields')->where(array('fid'=>$fid))->find();

			$detail['run_time'] = date('Y-m-d',$detail['run_time']);
			$detail['detail'] = htmlspecialchars_decode($detail['detail']);
			$detail['synopsis'] = trim($detail['synopsis']);
			$detail['run_time'] = date($detail['run_time']);
			$detail['pic'] = SITE_URL.$detail['pic'];
			$detail['public'] = json_decode($detail['public'],true);
			for ($i=1; $i <= count($detail['public']) ; $i++) { 
				$detail['public'][$i]['pic_name'] = $detail['public'][$i]['pic'];
				$detail['public'][$i]['pic'] = SITE_URL.$detail['public'][$i]['pic'];
			}
			$this->assign('next',count($detail['public'])+1);

			$this->assign('detail',$detail);
			$this->assign('MODULE',$this->MODULE_NAME);
			$this->display('modify');
					
		}elseif ($action == "do") {

			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     314572800 ;// 设置附件上传大小

		    $upload->rootPath  =     BASE_URL.'/Uploads/'; // 设置附件上传根目录
		    $upload->saveName  =      array('uniqid',$login_manager['uid']."_".time()."_");
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->autoSub   = 	 true;
		    $upload->subName   =     date('Ym',time()).'/'.date('d',time());
		    // 上传文件 
		    $info   =   $upload->upload();
		    $data = I('post.');

		    $data['run_time'] = strtotime($data['run_time']);

		    if($info) {// 上传成功
		    	if($info['pic'])
		    		$data['pic'] = $info['pic']['savepath'].$info['pic']['savename'];

		       for ($i=1; $i <= count($data['public']) ; $i++) {
		       		if($info['pic_'.$i]) {
		       			$data['public'][$i]['pic'] = $info['pic_'.$i]['savepath'].$info['pic_'.$i]['savename'];
		       		}else {
			       		$data['public'][$i]['pic'] = $data['public'][$i]['pic_pre'];
		       		}
			       	unset($data['public'][$i]['pic_pre']);
		       }	
		    }

		    $data['public'] = json_encode($data['public']);
		   
		    
		    if(M('Fields')->where(array('fid'=>$fid))->setField($data)) {
		    	$this->success('修改成功',U('field_list'));
		    } else {
		    	$this->error('操作失败，请重试！',U('field_list'));
		    }
		}	
	}

	public function detail($fid) {
		$detail = M('Fields')->where(array('fid'=>$fid))->find();
		$detail['run_time'] = date('Y-m-d',$detail['run_time']);
		$own = array('','自有','合办');

		$detail['own_or_co'] = $own[$detail['own_or_co']];
		$detail['detail'] = htmlspecialchars_decode($detail['detail']);
		$detail['run_time'] = date($detail['run_time']);
		$detail['pic'] = SITE_URL.$detail['pic'];

		$detail['public'] = json_decode($detail['public'],true);
		for($i=1; $i <= count($detail['public']); $i++) { 
			$detail['public'][$i]['pic'] = SITE_URL.$detail['public'][$i]['pic'];
		}

		$this->assign('detail',$detail);
		$this->assign('MODULE',$this->MODULE_NAME);
		$this->display('field_detail');
	}

	public function isShow( $fid ,$action = '' ) {
		if($action == "yes") {
			if( M('Fields')->where(array('fid'=>$fid))->setField(array('is_show'=>1)) ) {
				$this->success("操作成功",U('field_list'));
			}else {
				$this->success("操作失败",U('field_list'));
			}
		} elseif( $action == "no" ) {
			if(M('Fields')->where(array('fid'=>$fid))->setField(array('is_show'=>0))) {
				$this->success("操作成功",U('field_list'));
			}else {
				$this->success("操作失败",U('field_list'));
			}
		}
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

	//删除单条
	public function deleteOne($fid) {
		if(M('Fields')->where(array('fid'=>$fid))->delete()) {
			$this->success("删除成功",U('field_list'));
		} else {
			$this->error("删除失败",U('field_list'));
		}
	}
	
}