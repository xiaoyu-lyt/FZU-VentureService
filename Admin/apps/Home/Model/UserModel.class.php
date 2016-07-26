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
		$data = $this->where("groupid = '%d'",$groupid)->field('uid,username,name,tel,email,reg_time,avatar,gender,tags,groupid,status')->select();
		for($i = 0; $i < count($data); $i++) { 
			$data[$i]['reg_time'] = date('Y-m-d',$data[$i]['reg_time']);
		}
		return $data;
	}
}