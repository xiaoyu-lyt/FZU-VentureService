<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class PartnerController extends BaseController {


/******************************创业团队*****************************************/

	/**
	 * 获取寻找列表
	 * @return json
	 */
	public function seekList_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$data = M('seek_records')->field('sid,uid,description,find_type,issue_time')->page($page,$pageSize)->select();

		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['issue_time'] = date('Y-m-d',$data[$i]['issue_time']);
			$data[$i]['name'] = M('User')->where(array('uid'=>$data[$i]['uid']))->field('username,name')->find();
		}

		$count = count(M('seek_records')->select());
		$data['pages'] = ceil($count/$pageSize);
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"寻找列表查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无寻找列表");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 根据sid获取寻找的详细信息
	 * @param int $sid
	 * @return json
	 */
	public function seekDetail_get() {
		$where['sid'] = I('get.sid');
		$data = M('seek_records')->where($where)->find();
		$data['issue_time'] = date('Y-m-d',$data['issue_time']);
		$data['name'] = M('User')->where(array('uid'=>$data['uid']))->field('username,name')->find();
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此寻找详细内容");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 发布新寻找
	 * @return json
	 */
	public function newSeek_post() {
		$login_user = session('login_user');

		$data = I('post.');

		$data['person_type'] = json_encode($data['person_type']);
		$data['find_type'] = json_encode($data['find_type']);
		$data['issue_time'] = time();
		$data['uid'] = $login_user['uid'];
		$data['tel'] = $login_user['tel'];
		$data['email'] = $login_user['email'];
		if (M('seek_records')->add($data)) {
			$json = $this->jsonReturn(200,"新寻找发布成功",$data);
		} else {
			$json = $this->jsonReturn(0,"发布失败，请重新发布寻找");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 根据条件搜索寻找记录列表
	 * @param string $condition 条件
	 * @return json
	 */
	public function search_get() {
		$condition = I('get.condition');
		$where['demands'] = array('like',"%".$condition."%",'OR');
		$data = M('seekRecords')->where($where)->select();
		if( !empty($data) ) {
			$json = $this->jsonReturn(200,"搜索成功",$data);
		} else {
			$json = $this->jsonReturn(0,'暂无符合条件的记录');
		}
		$this->ajaxReturn($json);
	}

/******************************导师*****************************************/

	/**
	 * 获取导师信息列表
	 * @param int $page 页码
	 * @param int $size 页大小
	 * @return json
	 */
	public function tutorList_get() {

		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$count = count(M('Tutors')->select());
		$data = M('Tutors')->page($page,$pageSize)->field('tid,name,sex,job,introduction')->select();
		$data['pages'] = ceil($count/$pageSize);

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无任何导师信息");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 获取导师详细信息
	 * @param int $tid 导师id
	 * @return json
	 */
	public function tutorDetail_get() {
		$tid = I('get.tid');
		$data = M('Tutors')->where(array('tid'=>$tid))->find();
		if( !empty($data) ) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"查询失败或者该导师不存在！");
		}
		$this->ajaxReturn($json);
	}

/******************************投资人*****************************************/

	/**
	 * 获取投资人信息列表
	 * @param int $page 页码
	 * @param int $size 页大小
	 * @return json
	 */
	public function investorList_get() {

		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$data = M('Investors')->field('id,name,company,tel,reg_time')->page($page,$pageSize)->select();
		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['reg_time'] = date('Y-m-d',$data[$i]['reg_time']);
		}

		$count = count(M('Investors')->select()); //这两句要放在最后面，我也不知道为什么
		$data['pages'] = ceil($count/$pageSize);

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无任何投资人信息！");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 获取投资人详细信息
	 * @param int $id 投资人id
	 * @return json
	 */
	public function investorDetail_get() {
		$id = I('get.id');
		$data = M('Investors')->where(array('id'=>$id))->find();
		$data['issue_time'] = date('Y-m-d',$data['issue_time']);
		$data['reg_time'] = date('Y-m-d',$data['reg_time']);
		if( !empty($data) ) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"查询失败或者该投资人不存在！");
		}
		$this->ajaxReturn($json);
	}



}