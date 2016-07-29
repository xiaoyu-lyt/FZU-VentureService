<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class PartnerController extends BaseController {


/******************************创业团队*****************************************/

	/**
	 * 获取寻找团队成员列表
	 * @param int $page 页码
	 * @param int $size 页大小
	 * @return json
	 */
	public function seekList_get() {

		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$data = M('Projects')->where(array('is_seek'=>1))->order('issue_time desc')->page($page,$pageSize)->field('pid,uid,tid,synopsis,name,logo,pic,issue_time')->select();
		for( $i = 0; $i < count($data); $i++) {
			$data[$i]['issue_time'] = date('Y/m/d',$data[$i]['issue_time']);
			$data[$i]['charge'] = M('User')->where(array('uid'=>$data[$i]['uid']))->field('username,name,tel,email')->find();
			$data[$i]['teams'] = M('Teams')->where(array('tid'=>$data[$i]['tid']))->field('tcharge,tname,tel')->find();
		}
		
		$count = count(M('Projects')->where(array('is_seek'=>1))->select());
		$data['pages'] = ceil($count/$pageSize);

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无团队成员寻找记录");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 获取某条寻找的详细信息
	 * @param int $sid 记录id
	 * @return json
	 */
	public function seekDetail_get() {
		$sid = I('get.sid');
		$data = M('seekRecords')->where('sid',$sid)->find();
		if( !empty($data) ) {
			$data['issue_time'] = date('Y-m-d',$data['issue_time']);
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"查询失败或者该记录不存在！");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 发布新的团队成员寻找
	 * @param array $data 记录信息
	 * @return json
	 */
	public function addSeek_post() {
		$data = I('post.');
		if( session('login_user') && cookie('cookie_token')) {
			if( M('seekRecords')->add($data) ) {
				$json = $this->jsonReturn(200,"添加成功！");
			} else {
				$json = $this->jsonReturn(0,"添加失败！");
			}
		} else {
			$json = $this->jsonReturn(0,"用户未登录，请先登录");
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

		$data = M('Tutors')->page($page,$pageSize)->select();

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
		$data = M('Tutors')->where('tid',$tid)->find();
		if( !empty($data) ) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"查询失败或者该投资人不存在！");
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

		$data = M('Investors')->page($page,$pageSize)->select();

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
	 * @param int $tid 导师id
	 * @return json
	 */
	public function investorDetail_get() {
		$id = I('get.id');
		$data = M('Investor')->where('id',$id)->find();
		if( !empty($data) ) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"查询失败或者该企业不存在！");
		}
		$this->ajaxReturn($json);
	}



}