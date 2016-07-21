<?php
namespace Home\Model;
use Home\Model\BaseModel;
class UserModel extends BaseModel {

	/**
	 * 判断用户是否存在
	 */
	public function isExisted( $username ) {
		$userinfo = M('user')->where('username',$username)->find();
		if(!empty($userinfo)) {
			return true;
		}
		return false;	
	}


	public function register( $data ) {
		$data['userKey'] = $this->getRandChar();//随机字符串
		$data['password'] = md5(md5($data['password']).$data['userKey']);
		if($data['groupid'] == 0){
			$data['status'] = 1;
		} else {
			$data['status'] = 0;
		}
		$data['reg_time'] = time();
		return $this->add($data);
	}

	public function checkLogin($username,$password){
		$userinfo = $this->where(array('username'=>$username))->field('uid,username,nickname,name,password,userKey,groupid')->find();
        $password = md5(md5($password).$userinfo['userKey']);
        unset($userinfo['userKey']);
    	if($password == $userinfo['password']){
    		$this->where('username',$username)->save(array('log_time'=>time()));
    		return $userinfo;
    	}
        return false;
    }

    /**
     * 获取用户组id
     * @return int
     */
    public function getGroup($uid) {
    	$ret = $this->where('uid',$uid)->field('groupid')->find();
    	return $ret['groupid'];
    }

    /**
     * 获取个人信息
     * @return array
     */
    public function getInfo($uid) {
    	$where['uid'] = $uid;
    	return M('User')->where($uid)->field('uid,username,nickname,name,gender,tel,email,groupid')->find();
    }

    /**
     * 更新用户信息
     * @return boolen
     */
    public function updateInfo($data) {
    	return M('User')->where('uid',$data['uid'])->save($data);
    }

	/**
	 * 随机字符串
	 * @return string 
	 */
	public function getRandChar() {
		$randChar = "";
		$str = "zxcvbnmasdfghjklqwertyuiop";
		for( $i = 1; $i <= 8; $i++ ) {
			$randChar .= $str[rand(0,strlen($str))];
		}
		return $randChar;
	}

}
