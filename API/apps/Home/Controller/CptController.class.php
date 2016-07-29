<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class CptController extends BaseController {
	/**
	 * 获取比赛列表
	 * @return json
	 */
	public function list_get() {

		$number = M('Competitions')->distinct(true)->field('number')->select();
		//$this->ajaxReturn($number);
		foreach ($number as $value) {
			$data[] = M('Competitions')->where($value)->order('times desc')->find();
		}
		// $data = M('Competitions')->where("deadline > %d",time())->order('deadline desc')->page($page,$pageSize)->select();
		$count = count(M('Competitions')->where($where)->select());
		$data['pages'] = ceil($count/$pageSize);
		
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无比赛信息");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 获取往届比赛信息
	 * @param int $number 比赛编号
	 * @param int $times 比赛届数
	 * @return json
	 */
	public function previous_get() {
		$number = I('get.number');
		$times = I('get.times');
		$data = M('Competitions')->where("number = '%d' && times < '%d' ",array($number,$times))->order('times asc')->select();// 查询编号为$number 的往届比赛
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无往届比赛信息");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 根据id获取比赛详情介绍
	 * @param int $cid
	 * @return json
	 */
	public function detail_get() {

		$where['cid'] = I('get.cid');
		$data = M('Competitions')->where($where)->find();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无该比赛详细信息");

		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 添加比赛信息
	 * @return json
	 */
	public function add_post() {
		$data = I('post.');
		$data['number'] = date('Ymd',time());
		$curTime = time();
		$data['issue_time'] = $curTime;
		$data['deadline'] = $curTime + 60*60*24*$data['days'];

		if(M('Competitions')->add($data)) {
			$json = $this->jsonReturn(200,"成功添加比赛");
		} else {
			$json = $this->jsonReturn(0,"添加失败，请重试。");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 举行下一届
	 */
	public function next_put() {

	}
}