<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class UploadController extends BaseController {

	/**
	 * 文件上传
	 * @return json
	 */
	public function fileUpload() {
		$login_user = session('login_user');

		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     314572800 ;// 设置附件上传大小
	    $upload->rootPath  =     BASE_PATH.'/Uploads/'; // 设置附件上传根目录
	    $upload->saveName  =      array('uniqid',$login_user['uid']."_".time()."_");
	    // $upload->savePath  =     ''; // 设置附件上传（子）目录
	    $upload->autoSub   = 	 true;
	    $upload->subName   =     'Files/'.date('Ym',time()).'/'.date('d',time());
	    // 上传文件 
	    $info   =   $upload->upload();
		if ($info) {
		    $data = array(
		    	'pic'	=> $info['pic']['savepath'].$info['pic']['savename'],
		    	'logo'	=> $info['logo']['savepath'].$info['logo']['savename'],
		    	'plan'	=> $info['plan']['savepath'].$info['plan']['savename'],
		    	'attachment' => SITE_URL.'/Uploads/'.$info['attachment']['savepath'].$info['attachment']['savename']
		    	);
			$json = $this->jsonReturn(200,'文件上传成功',$data);
		} else {
			$json = $this->jsonReturn(0,'文件上传失败');
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 头像上传
	 * @return json
	 */
	public function avatarUpload() {
		$login_user = session('login_user');

		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     314572800 ;// 设置附件上传大小
	    $upload->rootPath  =     BASE_PATH.'/Uploads/'; // 设置附件上传根目录
	    $upload->saveName  =     array('uniqid',$login_user['uid']."_".time()."_");
	    // $upload->savePath  =     ''; // 设置附件上传（子）目录
	    $upload->autoSub   = 	 true;
	    $upload->subName   =     'Avatar/'.date('Ym',time()).'/'.date('d',time());
	    // 上传文件 
	    $info   =   $upload->upload();
	    // var_dump($info);exit;
		//$info['url'] = "http://xx/FZU_VentureService/Uploads/".$info['file']["savepath"].$info['file']["savename"];
		if ($info) {
	    	$data['avatar'] = $info['avatar']['savepath'].$info['avatar']['savename'];
			$json = $this->jsonReturn(200,'头像上传成功',$data);
		} else {
			$json = $this->jsonReturn(0,'头像上传失败');
		}
		$this->ajaxReturn($json);
	}
}
