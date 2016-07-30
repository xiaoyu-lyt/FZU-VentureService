<?php
namespace Home\Model;
use Think\Model;
class NoticeModel extends Model {

	/**
	 * 根据资讯类型获取不同资讯
	 * @param int $type 资讯类型
	 * @return array
	 */
	public function noticeType($type,$page,$pageSize) {
		$data = $this->where(array('type'=>$type))->page($page,$pageSize)->select();
		// $data['count'] = count($data);
		for ($i=0; $i < count($data) ; $i++) { 
			$data[$i]['name'] = M('User')->where(array('uid'=>$data[$i]['uid']))->field('username,name')->find();
			$data[$i]['date'] = date('Y-m-d',$data[$i]['date']);
		}
		return $data;
	}
	
}