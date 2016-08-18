<?php
namespace Home\Controller;
use Home\Controller\BaseController;
//header("Content-type: text/html; charset=utf-8");

class UserController extends BaseController {

	/**
	 * 用户注册
	 * @return string json
	 */
	public function register_post() {
		$data = I('post.');
		//if( session('v_code') && $data['v_code'] == session('v_code')) {
		if($data['v_code'] == '1234') {
			if( !D('user')->isExisted($data['username']) ) {
				if( D('user')->register($data) ) {
					$arr = array(
						'username'	=> $data['username'],
						'nickname'	=> $data['nickname'],
						'groupid'	=> $data['groupid']
						);
					$json = $this->jsonReturn(200,"注册成功，返回首页登陆！",$arr);
				} else {
					$json = $this->jsonReturn(0,"操作失败，请重新提交！");
				}
			} else {
				$json = $this->jsonReturn(0,"用户已存在！");
			}
		} else {
			$json = $this->jsonReturn(0,"验证码有误！");
		}
		//print_r($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 用户登陆
	 * @return string json
	 */
	public function login_post() {

		if(IS_POST) {
			$cookie_token = cookie('cookie_token');
			if(!$cookie_token) {
				$username = I('post.username');
				$password = I('post.password');
				$login_user = D('User')->checkLogin($username,$password);
				if(!empty($login_user)) {
					unset($login_user['password']);
					session('login_user',$login_user);
					$token = D('UserToken')->createToken($login_user['uid'],$login_user['groupid']);
					cookie('cookie_token',$token,60*60*24);
					$data = array(
						'uid'		=> $login_user['uid'],
						'username'	=> $login_user['username'],
						'nickname'	=> $login_user['nickname'],
						'name'		=> $login_user['name'],
						'avatar'	=> $login_user['avatar'],
						'groupid'	=> $login_user['groupid'],
						'token'		=> $token
						);
					$json = $this->jsonReturn(200,"登陆成功",$data);
				} else {
					$json = $this->jsonReturn(0,"密码错误，请重新登录！");
				}
			} else {
				//判断是否已登录
				$ret = D('UserToken')->getToken($cookie_token);
				if($ret && $ret['token_expire'] > time()) {
					$login_user = M('User')->where(array('uid'=>$ret['uid']))->field('uid,username,nickname,avatar,groupid')->find();
					$login_user['token'] = $cookie_token;
					session('login_user',$login_user);
				}
				$json = $this->jsonReturn(0,"已登录",$login_user);
			}
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 个人信息修改
	 * @return json
	 */
	public function modify_put() {
		$update = I('put.');
		if(D('User')->updateInfo($update)) {
			session('login_user',$login_user);
			$json = $this->jsonReturn(200,"修改成功",$login_user);
		} else {
			$json = $this->jsonReturn(0,"修改失败，请重新提交！");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 修改密码
	 * @param int $uid 
	 * @param string $v_code 手机验证码
	 * @param string password 新密码
	 * @return json
	 */
	public function setting_put() {
		$data = I('put.');
		$login_user = session('login_user');
		//if( $data['v_code'] == session('v_code') ) {
		if( $data['v_code'] == '1234') {
			$ret = M('User')->where(array('username'=>$login_user['username']))->field('userKey')->find();
			$data['password'] = md5(md5($data['password']).$ret['userKey']);
			if( D('User')->updateInfo($login_user['username'],$data) ) {
				$json = $this->jsonReturn(200,"成功修改密码");
				unset($data);
			} else {
				$json = $this->jsonReturn(0,"密码修改失败，请重试！");
			}
		} else {
			$json = $this->jsonReturn(0,"验证码有误！");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 上传用户头像
	 * @param int $uid 
	 * @param file $avatar 用户头像
	 * @return json 
	 */
	public function uploadAvatar_post() {
		//$uid = I('post.uid');
		$login_user = session('login_user');
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->rootPath = BASE_PATH.'/Uploads/';
		// $upload->savePath = ""
		$upload->exts = array('jpg','png','jpeg','bmp');
		$upload->saveName = array('uniqid',$login_user['uid']."_".time()."_");
		$upload->autoSub =  true; //关闭创建子目录保存文件
		$upload->subName   =     'Avatar/'.date('Ym',time()).'/'.date('d',time());
		$info = $upload->upload();
		//echo BASE_PATH;exit;
		if( $info ) {
			$data['avatar'] = $info['avatar']['savepath'].$info['avatar']['savename'];
			/*$data['user'] = $login_user;*/
			if( M('User')->where(array('uid'=>$login_user['uid']))->save($data) ) {
				
				$json = $this->jsonReturn(200,"头像修改成功",$data);
			} else {
				$json = $this->jsonReturn(0,"头像修改失败!");
			}
		} else {
			$json = $this->jsonReturn(0,"头像上传失败！");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取个人信息
	 * @param int $uid
	 * @return json 
	 */
	public function getUserInfo_get() {
		$login_user = session('login_user');
		$data = D('User')->getInfo($login_user['uid']);
		$data['avatar'] = SITE_URL.'/Uploads/'.$data['avatar'];
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"无此用户个人信息");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取学生信息
	 */
	public function student_get() {
		$login_user = $this->checkLogin();
		$uid = I("get.uid");
		if(empty($login_user)) {
			$json = $this->jsonReturn(0,"用户未登录或者登陆超时，请先登录");
		}
		$ret = D("Student")->getInfo($uid);
		if(!empty($ret))
			$json = $this->jsonReturn(200,"操作成功",$ret);
		else
			$json = $this->jsonReturn(0,"请先进行学生验证");
		$this->ajaxReturn($json);
	}




	/**
	 * 学生认证
	 */
	public function stuComfirm_post() {
		$stu_id = I('post.stu_id');
		$stu_pwd = I('post.stu_pwd');
	}





	/**
	 * 检查是否已进行学生认证
	 * @param int $uid
	 * @return boolen
	 */
	public function isComfirm_get() {
		$uid = I('get.id');
		if( M('Student')->where('uid',$uid)->find() )
			return ture;
		return false;
	}

	/**
	 * 修改手机
	 * @param int $uid
	 * @param string $username 用户名
	 * @param int $tel 用户手机
	 * @param string $password 用户密码
	 * @return json
	 */
	public function phoneModify_put() {
		$data = I('put.');
		$login_user = session('login_user');
		//if( $data['v_code'] == session('v_code') ) {
		if( $data['v_code'] == '1234') {
			if( D('User')->checkLogin($login_user['username'],$data['password']) ) {
				if(M('User')->where('uid',$data['uid'])->save(array('tel'=>$data['tel']))) {
					$json = $this->jsonReturn(200,"手机号更新成功");
				} else {
					$json = $this->jsonReturn(0,"操作失败，请重新提交！");
				}
			} else {
				$json = $this->jsonReturn(0,"密码错误");
			}
		} else {
			$json = $this->jsonReturn(0,"验证码有误！");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 用户名唯一性认证
	 * @return boolen
	 */
	public function isUnique_get() {
		$username = I('username');
		return D('User')->isExisted($username);
	}

	/**
	 * 退出登录
	 * @return json
	 */
	public function logout() {
		session('login_user',NULL);
		cookie('cookie_token',NULL);
		$json = $this->jsonReturn(200,"注销成功");
		$this->ajaxReturn($json);
	}
	
	/**
	 * 发送手机验证码
	 * @param int $tel
	 * @return json
	 */
	public function verify_get() {
		$tel = I('get.tel');
		$code = "";
		for($i = 1; $i <= 4; $i++) $code .= rand(0,9);
		session('v_code',$code);	
		echo $this->send_verify($tel,$code);
	}

	/**
	* 查询所有标签的名称和id
	* @return json
	*/
	public function tag_get(){
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$data = M('Tag')->page($page,$pageSize)->select();
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无可用标签");
		}
		$this->ajaxReturn($json);
	}

	/**
	* 用户从已有标签中选择标签添加
	* @return json
	*/
	public function userTagSet_post(){
		$login_user = session('login_user');
		$data = I('post.');
		
		$where['uid'] = $login_user['uid'];

		$data = M('User')->where($where)->setField('tags',json_encode($data['tag']));
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"标签添加成功",$data);
		} else {
			$json = $this->jsonReturn(0,"标签添加失败");
		}
		$this->ajaxReturn($json);
	}

	/**
	* 用户移除自己添加的标签
	* @return json
	*/
	public function userTagUnset_get(){
		$data = I('get.');

		$login_user = session('login_user');
		$where['uid'] = $login_user['uid'];

		$dataTag = M('User')->where($where)->field('tags')->select();
		$arr = json_decode($dataTag);
		$offset = array_search($data, $arr);
		arrayRemove($arr,$offset);
		$data = M('User')->where($where)->setField('tags','json_encode($arr)');
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"标签修改成功",$data);
		} else {
			$json = $this->jsonReturn(0,"标签修改失败");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取属于该用户且需要寻找合伙人的项目
	 * @param int $uid
	 */
	public function needSeek_get() {
		$uid = I('get.uid');
		$data = M('Projects')->where(array('uid'=>$uid))->where('is_seek=1')->field('pid,name')->select();
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无需要寻找合伙人的项目");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取个人中心－我的项目列表－已申请的项目
	 * @return json
	 */
	public function myProjects_get() {
		$login_user = session('login_user');
		// $login_user['uid'] = I('get.uid');
		$data = M('projects')->where(array('uid'=>$login_user['uid']))->field('pid,uid,name,pic,synopsis,status')->select();

		for ($i=0; $i <count($data); $i++) { 
			$data[$i]['pic'] = SITE_URL.'/Uploads/'.$data[$i]['pic'];
        }

		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无已申请的项目");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取个人中心－我的寻找列表－已发布的寻找
	 * @return json
	 */
	public function mySeek_get() {
		$login_user = session('login_user');
		// $login_user['uid'] = I('get.uid');
		$data = M('seekRecords')->where(array('uid'=>$login_user['uid']))->field('sid,uid,description')->select();
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无发起的申请");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 获取个人中心－我的入驻列表－已申请的入驻
	 * @return json
	 */	
	public function myFieldApply_get() {
		$login_user = session('login_user');
		// $login_user['uid'] = I('get.uid');
		$data = M('fieldApply')->where(array('uid'=>$login_user['uid']))->field('id,uid,fid,name,status')->select();
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无申请的入驻");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 查看其他人的信息
	 * @param int $uid 用户id
	 */
	public function getOtherInfo_get() {
		$where['uid'] = I('get.uid');
		$data = M('User')->where($where)->field('username,name,tel,email,avatar')->find();
		$data['projects'] = M('Projects')->where($where)->field('pid,name')->select();
		$data['avatar'] = SITE_URL.'/Uploads/'.$data['avatar'];
		if (!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无该用户信息");
		}
		$this->ajaxReturn($json);
	}
}

