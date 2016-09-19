<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

	/**
	 * 根据分组id获取用户信息
	 * @param int $groupid 分组id
	 * @return array
	 */
	public function userinfo( $groupid ) {
		$data = $this->where(array('groupid'=>$groupid))->field('uid,username,name,tel,email,reg_time,avatar,gender,tags,groupid,status')->select();
		for($i = 0; $i < count($data); $i++) { 
			$data[$i]['reg_time'] = date('Y-m-d',$data[$i]['reg_time']);
		}
		return $data;
	}
	public function register( $data ) {
		if(M("User")->where(array('username'=>trim($data['username'])))->find()) {
			return false;
		}
		$data['userKey'] = $this->getRandChar();//随机字符串
		$data['password'] = md5(md5($data['password']).$data['userKey']);
		$data['groupid'] = 6;
		$data['reg_time'] = time();

		return $this->add($data);
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