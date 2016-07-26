<?php
namespace Home\Model;
use Think\Model;
class HomeModel extends Model {
	
	protected $tableName = 'user';
	public function checkLogin($username,$password) {

		 $userinfo = M('User')->where(array('username'=>$username))->field('uid,username,nickname,name,password,userKey,groupid')->find();
		
		 $password = md5(md5($password).$userinfo['userKey']);

		 if ($password == $userinfo['password']) {
		 	if ($userinfo['groupid'] == "6" || $userinfo['groupid'] == "7") {
		 		$this->where(array('username'=>$username))->save(array('log_time'=>time()));
		 		return $userinfo;
		 	}
		 }
		 return false;
	}
}