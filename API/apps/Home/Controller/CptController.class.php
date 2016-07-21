<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class CptController extends BaseController {
	/**
	 * 获取比赛列表
	 * @return json
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

		$data = M('Competitions')->where("deadline > %d",time())->order('deadline desc')->page($page,$pageSize)->select();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无比赛信息");
		}
		//var_dump($jsonReturn);
		echo $json;
	}

	/**
	 * 根据id获取比赛详情介绍
	 * @return json
	 */
	public function detail_get() {

		$where['cid'] = I('get.cid');
		$data = M('Competitions')->where($where)->find();

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无此场地详细信息");

		}
		//var_dump($jsonReturn);
		echo $json;
	}

	/**
	 * 获取往届比赛信息
	 * @param int $cid 比赛id
	 * @return json
	 */
	public function previous_get() {
		$where['cid'] = I('cid');
		$ret = M('Competitions')->where($where)->field('number')->find();
		$data = M('Competitions')->where("number = '%s' && deadline < '%d'",array($ret['number'],time()))->select();
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(200,"暂无该比赛往届信息");
		}
		echo $json;
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
		echo $json;
	}

	/**
	 * 举行下一届
	 */
	public function next_put() {

	}
}