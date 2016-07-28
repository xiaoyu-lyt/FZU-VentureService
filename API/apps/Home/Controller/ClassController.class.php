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

		if(!empty($data)) {
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无培训课堂信息");
		}
		//var_dump($jsonReturn);
		$this->ajaxReturn($json);
	}

	/**
	 * 培训课报名
	 */
	public function enlist_post() {

	}
	/**
	 * 获取所有可下载的材料
	 * @param int $type 类型：0 文档类 1视频类
	 * @return json
	 */
	public function downloads_get() {
		$type = I('get.type');
		$data = M('Documents')->where(array('type'=>$type))->order('issue_time desc')->select();
		if(!empty($data)){
			$json = $this->jsonReturn(200,"查询成功",$data);
		} else {
			$json = $this->jsonReturn(0,"暂无可下载的培训材料");
		}
		$this->ajaxReturn($json);
	}

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


