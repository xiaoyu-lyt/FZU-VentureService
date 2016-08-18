<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class ClassController extends BaseController {

	/**
	 * 获取所有培训课堂
	 * @param int $page 页码
	 * @param int size 页大小
	 * @param int $mode 0查询所有 1查询所有正在进行的课堂
	 * @return json 
	 */
	public function list_get() {
		$page = !empty(I('get.page')) ? I('get.page') : 1;
		$pageSize = !empty(I('get.size')) ? I('get.size') : 20;

		$mode = I('get.mode');
		if($mode)
			$data = M('Classes')->where('status = 1')->order('issue_time desc')->page($page,$pageSize)->select();
		else
			$data = M('Classes')->order('issue_time desc')->page($page,$pageSize)->select();

		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['start_time'] = date('Y-m-d',$data[$i]['start_time']);
			$data[$i]['deadline'] = date('Y-m-d',$data[$i]['deadline']);
			$data[$i]['issue_time'] = date('Y-m-d',$data[$i]['issue_time']);
			$data[$i]['content'] = htmlspecialchars_decode($data[$i]['content']);

		}

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无培训课堂信息");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 获取课堂的具体信息
	 * @param int $cid
	 * @return json
	 */
	public function detail_get() {
		$where['cid'] = I('get.cid');
		$data = M('Classes')->where($where)->find();

		$data['start_time'] = date('Y-m-d',$data['start_time']);
		$data['deadline'] = date('Y-m-d',$data['deadline']);
		$data['issue_time'] = date('Y-m-d',$data['issue_time']);
		$data['content'] = strip_tags(htmlspecialchars_decode($data['content']));

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无培训课堂具体信息");
		}
		$this->ajaxReturn($json);

	}

	/**
	 * 培训课报名
	 * @param int $uid 报名者id
	 * @param int $cid 课堂id
	 * @return json
	 */
	public function enlist_post() {
		$data = I('post.');
		$data['issue_time'] = time();
		$limit = M('classes')->where(array('cid'=>$data['cid']))->field('limit')->find();
		$students = M('classes')->where(array('cid'=>$data['cid']))->field('students')->find();
		if ($students < $limit) {
			if (M('classEnroll')->add($data)) {
				$json = $this->jsonReturn(200,"报名成功，请等待审核",$data);
			}
			else {
				$json = $this->jsonReturn(0,"报名失败，请重新报名");
			}
		} else {
			$json = $this->jsonReturn(0,"报名失败，课堂人数已满",$data);
		}
		$this->ajaxReturn($json);
	}
	/**
	 * 获取所有可下载的材料
	 * @param int $type 类型：0 文档类 1视频类
	 * @return json
	 */
	public function downloads_get() {
		$type = I('get.type');
		$data = M('Documents')->where(array('type'=>$type))->order('issue_time desc')->select();
		for ($i=0; $i <count($data) ; $i++) { 
			$data[$i]['file_url'] = SITE_URL.'/Uploads/'.$data[$i]['file_url'];
			$data[$i]['pic_url'] = SITE_URL.'/Uploads/'.$data[$i]['pic_url'];
		}

		if(!empty($data)){
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无可下载的培训材料");
		}
		$this->ajaxReturn($json);
	}

	// function DeleteHtml($str) { 
	// 	$str = trim($str); //清除字符串两边的空格
	// 	$str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
	// 	$str = preg_replace("/\r\n/","",$str); 
	// 	$str = preg_replace("/\r/","",$str); 
	// 	$str = preg_replace("/\n/","",$str); 
	// 	$str = preg_replace("/ /","",$str);
	// 	$str = preg_replace("/  /","",$str);  //匹配html中的空格
	// 	return trim($str); //返回字符串
	// }

}

/*CREATE TABLE IF NOT EXISTS `vs_classes` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '课堂名称',
  `theme` mediumtext NOT NULL COMMENT '课堂主要内容',
  `teacher` varchar(30) NOT NULL COMMENT '主讲人',
  `limit` int NOT NULL COMMENT '课堂限定人数',
  `students` int NOT NULL COMMENT '报名学生数目',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否正在进行 0结束 1正在进行',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `vs_documents` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '文件名',
  `type` tinyint(1) NOT NULL COMMENT '文件类型 1：文档 2：视频',
  `url` varchar(100) NOT NULL COMMENT '文件存放路径',
  `issue_time` int NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;*/


