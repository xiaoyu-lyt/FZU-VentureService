<?php
namespace Home\Model;
use Think\Model;
class NoticeModel extends Model {

	/**
	 * 根据资讯类型获取不同资讯
	 * @param int $type 资讯类型
	 * @return array
	 */
	public function noticetype( $type ) {
		$data = $this->where(array('type'=>$type))->select();
		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['name'] = M('User')->where(array('uid'=>$data[$i]['uid']))->find();
		}
		return $data;
	}
}