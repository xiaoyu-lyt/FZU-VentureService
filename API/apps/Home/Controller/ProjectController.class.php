<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class ProjectController extends BaseController {
	/**
	 * 获取项目列表
	 * @return json
	 */
	public function list_get() {
		$conditions = I('get.');

		$page = !empty($conditions['page']) ? $conditions['page'] : 1;
		$pageSize = !empty($conditions['pageSize']) ? $conditions['pageSize'] : 10;

		$where['status'] = 1;

		if($conditions['area'] != "all" && !empty($conditions['area']))
			$where['area'] = $conditions['area'];
		if($conditions['form_company'] != "all" && !empty($conditions['form_company']))
			$where['form_company'] = $conditions['form_company'];
		if($conditions['stage'] != "all" && !empty($conditions['stage']))
			$where['stage'] = $conditions['stage'];
		if($conditions['product_type'] != "all" && !empty($conditions['product_type']))
			$where['product_type'] = $conditions['product_type'];
		if($conditions['group'] != "all" && !empty($conditions['group']))
			$where['group'] = $conditions['group'];
		if($conditions['is_show'] && !empty($conditions['is_show']))
			$where['is_show'] = $conditions['is_show'];

		$data = M('Projects')->where($where)->field('pid,uid,name,pic,synopsis,product_type,time,stage,issue_time,is_show')->page($page,$pageSize)->select();
		for ($i=0; $i <count($data); $i++) { 
        	$data[$i]['issue_time'] = date('Y-m-d',$data[$i]['issue_time']);
			$data[$i]['pic'] = SITE_URL.'/Uploads/'.$data[$i]['pic'];
        }

		$count = count(M('Projects')->where($where)->select());
		$data['pages'] = ceil($count/$pageSize);

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无项目信息");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}
	/**
	 * 根据id获取通知详情内容
	 * @return json
	 */
	public function detail_get() {
		$where['pid'] = I('get.pid');
		$data = M('projects')->where($where)->find();
		$data['partner'] = json_decode($data['partner']);
		$data['uidname'] = M('User')->where(array('uid'=>$data['uid']))->field('username,name')->find(); 
		$data['pic'] = SITE_URL.'/Uploads/'.$data['pic'];
		$data['logo'] = SITE_URL.'/Uploads/'.$data['logo'];
		$data['plan'] = SITE_URL.'/Uploads/'.$data['plan'];
		$data['attachment'] = SITE_URL.'/Uploads/'.$data['attachment'];


		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无此项目详细内容");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 项目申请
	 * @return json
	 */
	public function apply_post() {
		$login_user = session('login_user');
		$data = I('post.');
		$data['uid'] = $login_user['uid'];
		$data['partner'] = json_encode($data['partner']);
	    $data['issue_time'] = time();
		if (M('Projects')->add($data)) {
			$json = $this->jsonReturn(200,"项目申请成功，请等待审核",$data);
		} else {
			$json = $this->jsonReturn(0,"项目申请失败，请重新申请");
		}
		$this->ajaxReturn($json);
	}

	/**
	 * 删除项目
	 * @param $pid 新闻资讯编号
	 * @return json
	 */
	public function delete_delete() {
		$where['pid'] = I('delete.pid');

		if (!M('projects')->where($where)->delete()) {
			$json = $this->jsonReturn(200,"项目删除成功");
		} else {
			$json = $this->jsonReturn(0,"项目删除失败");
		}
		$this->ajaxReturn($json);
	}


	/**
	 * 根据条件搜索项目
	 * @param int $area 所属领域
	 * @param int $form_company 公司形式
	 * @param int $stage 融资阶段
	 * @param int $product_type 产品类别
	 * @param int $group 面向群体
	 * @return json
	 */
	public function projectSelect_get() {
		$where['area'] = I('get.area');
		$where['form_company'] = I('get.form_company');
		$where['stage'] = I('get.stage');
		$where['product_type'] = I('get.product_type');
		$where['group'] = I('get.group');
		
	}

    /**
     * 根据关键词搜索项目
     * @param
     * @return json
     */
    public function  wordSelect_get() {
    	$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 10;

        $word = I('get.word');
        $where['name'] = array('like','%'.$word.'%');
        $where['status'] = 1;
        $data = M('projects')->where($where)->field('pid,uid,name,pic,synopsis,product_type,time,stage,issue_time')->select();
        for ($i=0; $i <count($data); $i++) { 
        	$data[$i]['issue_time'] = date('Y-m-d',$data[$i]['issue_time']);
			$data[$i]['pic'] = SITE_URL.'/Uploads/'.$data[$i]['pic'];
        }

        $count = count(M('Projects')->where($where)->select());
		$data['pages'] = ceil($count/$pageSize);

        if (!empty($data)) {
            $json = $this->jsonReturn(200,"搜索成功",$data);
        } else {
            $json = $this->jsonReturn(0, "暂无相关搜索结果");
        }
        $this->ajaxReturn($json);
    }
	
}
