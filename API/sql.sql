
--
--用户表
--

CREATE TABLE IF NOT EXISTS `eg_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL COMMENT '用户角色',
  `sex` char(10) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `graduation_year` varchar(30) DEFAULT NULL COMMENT '毕业年份',
  `token` varchar(32) DEFAULT NULL,
  `userKey` varchar(10) NOT NULL,
  `timeout` int NOT NULL DEFAULT '600' COMMENT '超时时间(s)', 
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `regTime` varchar(50) DEFAULT NULL COMMENT '注册时间',
  `logTime` varchar(50) DEFAULT NULL COMMENT '最后登录时间',
  `level` tinyint(1) NOT NULL COMMENT '权利级别',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
--功能权限表
--
CREATE TABLE IF NOT EXISTS `eg_powerlevels` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '功能名称',
  `controller` varchar(20) DEFAULT NULL COMMENT '控制器名称',
  `method` varchar(20) DEFAULT NULL COMMENT '方法名称',
  `level1` tinyint(1) NOT NULL COMMENT '级别1',
  `level2` tinyint(1) NOT NULL COMMENT '级别2',
  `level3` tinyint(1) NOT NULL COMMENT '级别3',
  `level4` tinyint(1) NOT NULL COMMENT '级别4',
  `level5` tinyint(1) NOT NULL COMMENT '级别5',
  `level6` tinyint(1) NOT NULL COMMENT '级别6',
  `level7` tinyint(1) NOT NULL COMMENT '级别7',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
--导师信息表
--
CREATE TABLE IF NOT EXISTS `eg_tutors` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL COMMENT '导师职务',
  `title` varchar(20) NOT NULL COMMENT '导师职称',
  `introduction` mediumtext DEFAULT NULL COMMENT '导师简介',
  `addr` varchar(50) DEFAULT NULL COMMENT '通讯地址',
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
--团队信息表
--

CREATE TABLE IF NOT EXISTS `eg_teams` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tcharge` varchar(20) NOT NULL COMMENT '队长id',
  `tname` varchar(50) NOT NULL COMMENT '团队名称',
  `goals` varchar(500) NOT NULL COMMENT '团队目标',
  `task` varchar(500) NOT NULL COMMENT '团队任务',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `memberinfo` varchar(500) NOT NULL COMMENT '队员信息',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
--企业信息表
--

CREATE TABLE IF NOT EXISTS `eg_company` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `ccharge_id` varchar(50) NOT NULL COMMENT '企业负责人id',
  `cname` varchar(50) NOT NULL COMMENT '企业名称',
  `addr` varchar(50) NOT NULL COMMENT '企业注册地址',
  `tel` varchar(10) NOT NULL COMMENT '联系电话',
  `fax` varchar(20) NOT NULL COMMENT '传真',
  `license_url` varchar(100) NOT NULL COMMENT '营业执照',
  `more_info` mediumtext DEFAULT NULL COMMENT '更多内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `regTime` varchar(50) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
--项目信息表
--
-- type：1、互联网 2、文化创意 3、科技产品 4、传统服务
--

CREATE TABLE IF NOT EXISTS `eg_projects` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `type` tinyint(1) NOT NULL COMMENT '项目类别',
  `tags` varchar(100) NOT NULL COMMENT '项目标签',
  `progress` tinyint(1) NOT NULL COMMENT '项目研发进度',
  `logo` varchar(100) NOT NULL COMMENT '项目logo',
  `synopsis` varchar(500) NOT NULL COMMENT '项目简介',
  `detail` mediumtext NOT NULL COMMENT '项目详情介绍',
  `members` varchar(300) DEFAULT NULL COMMENT '团队成员',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `date` varchar(50) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
--场地信息表
--
-- type：1、孵化基地 2、校外场地 3、。。
--

CREATE TABLE IF NOT EXISTS `eg_fields` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '场地名称',
  `type` tinyint(1) NOT NULL COMMENT '场地类别',
  `pic` varchar(100) NOT NULL COMMENT '场地照片',
  `synopsis` varchar(500) NOT NULL COMMENT '场地简介',
  `detail` mediumtext NOT NULL COMMENT '场地详情介绍',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `date` varchar(50) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;










/*--
--创业大赛信息表
--
CREATE TABLE IF NOT EXISTS `eg_competitions` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '大赛主题',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '大赛内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '比赛状态',--0：比赛结束 1：比赛正在进行
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
--创业培训信息表
--
CREATE TABLE IF NOT EXISTS `eg_training` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '培训主题',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '培训内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '培训状态',--0：培训结束 1：培训正在进行
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/





--
--type: 1、热门资讯 2、最新政策 3、通知公告 4、新闻热点
--

CREATE TABLE IF NOT EXISTS `eg_notice` (
  `nid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '通知主题',
  `type` tinyint(1) NOT NULL COMMENT '通知类型',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '通知内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否发布',
  `rank` smallint(5) NOT NULL COMMENT '排序',
  `overhead` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否顶置',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;











--
--各类申请记录表
--

CREATE TABLE IF NOT EXISTS `eg_application` (
  `aid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '申请主题',
  `date` varchar(50) NOT NULL COMMENT '申请时间',
  `content` mediumtext NOT NULL COMMENT '申请内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '申请审核状态',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;