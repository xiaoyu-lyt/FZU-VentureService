<?php
namespace Home\Controller;
use Home\Controller\BaseController;
//header("Content-Type:text/html;charset=utf-8");
class NoticeController extends BaseController {
	/**
	 * 获取通知列表
	 * @return json
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 15;

		$where['type'] = I('get.type');
		$where['status'] = 1;

		$data = M('Notice')->where($where)->order('overhead desc,rank desc,date desc')->page($page,$pageSize)->field('nid,type,theme,date')->select();
		for ($i=0; $i < count($data); $i++) { 
			$data[$i]['date'] = date('Y/m/d',$data[$i]['date']); 
		}
		$count = count(M('Notice')->where($where)->select());
		$data['pages'] = ceil($count/$pageSize);

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无通知");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 根据id获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$where['nid'] = I('get.nid');
		$data = M('notice')->where($where)->field('nid,theme,type,date,content')->find();
		$data['content'] = htmlspecialchars_decode($data['content']);
		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此通知详细内容");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 添加新闻资讯
	 * @return json
	 */
	public function add_post() {
		$login_user = session('login_user');

		$data = I('post.');
		
		$data['date'] = time();
		$data['publisher'] = $login_user['name'];

		if (!M('notice')->add($data)) {
			$json = $this->jsonReturn(200,"新闻添加成功，请返回新闻资讯列表查看",$data);
		} else {
			$json = $this->jsonReturn(0,"新闻添加失败，请重新添加");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 编辑新闻资讯
	 * @param $nid 新闻资讯编号
	 * @return json
	 */
	public function newsEdit_put(){

		$where['nid'] = I('put.nid');
		$data[] = I('put.');

		if (!M('notice')->where($where)->save($data)) {
			$json = $this->jsonReturn(200,"新闻编辑成功，请返回新闻资讯列表查看",$data);
		} else {
			$json = $this->jsonReturn(0,"新闻编辑失败，请重新编辑");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 删除新闻资讯
	 * @param $nid 新闻资讯编号
	 * @return json
	 */
	public function delete_delete() {
		$where['nid'] = I('delete.nid');
		if (!M('notice')->where($where)->delete()) {
			$josn = $this->jsonReturn(200,"新闻删除成功");
		} else {
			$josn = $this->jsonReturn(0,"新闻删除失败");
		}
		$this->ajaxReturn($json);
	}
}

