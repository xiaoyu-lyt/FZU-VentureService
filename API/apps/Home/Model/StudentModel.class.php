<?php
namespace Home\Model;
use Home\BaseModel;
class StudentModel extends BaseModel {

	/**
	 * 获取学生信息
	 * @param int $uid 学生uid
	 */
	public function getInfo($uid) {
		return $this->where('uid',$uid)->find();
	}
}