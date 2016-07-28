
CREATE TABLE IF NOT EXISTS `vs_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(10) NOT NULL COMMENT '用户昵称',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `gender` tinyint(1) NOT NULL COMMENT '性别（0女1男）',
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `userKey` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `reg_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `log_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `groupid` tinyint(1) NOT NULL COMMENT '用户组(0学生 1导师 2企业)',
  `tags` varchar(100) DEFAULT NULL COMMENT '标签编号，形如1-3-6-9',
  `avatar` varchar(100) DEFAULT NULL COMMENT '用户头像url',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vs_student` (
  `uid` mediumint(8) NOT NULL ,
  `stu_id` mediumint(9) NOT NULL COMMENT '学号',
  `school` varchar(20) NOT NULL COMMENT '学校',
  `college` varchar(20) NOT NULL COMMENT '学院',
  `major` varchar(30) NOT NULL COMMENT '专业',
  `start_year` char(4) NOT NULL COMMENT '入学年份',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `vs_powerlevels` (
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




CREATE TABLE IF NOT EXISTS `vs_seek_records` (
  `sid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) NOT NULL COMMENT '主题',
  `advantage` mediumtext NOT NULL COMMENT '团队优势',
  `demands` mediumtext NOT NULL COMMENT '成员要求（性格、技术）',
  `tel` varchar(30) NOT NULL COMMENT '联系电话',
  `email` varchar(50) NOT NULL COMMENT '联系邮箱',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `vs_tutors` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '导师姓名',
  `sex` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL COMMENT '导师职务',
  `title` varchar(20) NOT NULL COMMENT '导师职称',
  `introduction` mediumtext DEFAULT NULL COMMENT '导师简介',
  `addr` varchar(50) DEFAULT NULL COMMENT '通讯地址',
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `vs_teams` (
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




CREATE TABLE IF NOT EXISTS `vs_investors` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `charge_id` mediumint(8) NOT NULL COMMENT '投资人id',
  `name` varchar(50) NOT NULL COMMENT '投资人姓名',
  `company` varchar(30) NOT NULL COMMENT '公司名称',
  `addr` varchar(50) NOT NULL COMMENT '公司注册地址',
  `tel` varchar(11) NOT NULL COMMENT '联系电话',
  `fax` varchar(20) NOT NULL COMMENT '传真',
  `license_url` varchar(100) DEFAULT NULL COMMENT '营业执照',
  `more_info` mediumtext DEFAULT NULL COMMENT '企业详细内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `reg_time` int(11) NOT NULL COMMENT '注册时间戳',
  `issue_time` int(11) NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `vs_projects` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL COMMENT '项目创建人id',
  `synopsis` varchar(500) NOT NULL COMMENT '项目简介',
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `area` tinyint(1) NOT NULL COMMENT '项目所属技术领域',
  `addr_postcode` varchar(30) NOT NULL COMMENT '联系地址及邮编',
  `group_size` int NOT NULL COMMENT '团队人数',
  `start_time` varchar(50) NOT NULL COMMENT '项目启动时间',
  `next_stage` tinyint(1) NOT NULL COMMENT '下一融资阶段',
  `is_college` tinyint(1) NOT NULL COMMENT '是否大学生创业(0:否 1:是)',
  `plan` varchar(50) NOT NULL COMMENT '商业计划书url',
  `attachment` varchar(100) NOT NULL COMMENT '附件url',
  `partner` mediumtext NOT NULL COMMENT '合伙人信息（json字符串）',
  `product` varchar(50) NOT NULL COMMENT '产品（服务）名称',
  `process` varchar(50) NOT NULL COMMENT '销售流程或服务过程',
  `level` varchar(50) NOT NULL COMMENT '目前执行的水平',
  `price_descr` varchar(200) NOT NULL COMMENT '产品定价描述',
  `cost` varchar(100) NOT NULL COMMENT '成本构成',
  `pricing_policy` varchar(200) NOT NULL COMMENT '定价策略',
  `product_attach` varchar(100) NOT NULL COMMENT '相关附件',
  `market_channel` tinyint(1) NOT NULL COMMENT '市场渠道(1:直销渠道为主 2:间接渠道为主 3:混合渠道(两者兼有) 4:其他)',
  `channel_descr` varchar(200) NOT NULL COMMENT '市场渠道描述',
  `mstc` varchar(100) NOT NULL COMMENT '市场细分/目标客户',
  `estimate` varchar(200) NOT NULL COMMENT '市场份额估计',
  `sads` varchar(200) NOT NULL COMMENT '供求状况',
  `is_income`tinyint(1) NOT NULL COMMENT '当前是否有收入(0:否 1:是)',
  `expected_this_year` varchar(50) NOT NULL COMMENT '今年预计收入',
  `net_this_year` varchar(50) NOT NULL COMMENT '今年净收入',
  `expected_next_year` varchar(50) NOT NULL COMMENT '明年预计收入',
  `net_next_year` varchar(50) NOT NULL COMMENT '明年净收入',
  `finan_amount` varchar(50) NOT NULL COMMENT '融资金额',
  `finan_mode` tinyint(1) NOT NULL COMMENT '融资方式(1: 股权 2：债权)',
  `deadline` varchar(50) NOT NULL COMMENT '项目截止时间',
  `turn` varchar(50) NOT NULL COMMENT '融资投向',

  `type` tinyint(1) NOT NULL COMMENT '项目类别',
  `logo` varchar(100) NOT NULL COMMENT '项目logo',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `issue_time` int(11) DEFAULT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_fields` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '基地名称',
  `chief` varchar(10) NOT NULL COMMENT '法定代表人（负责人）',
  `addr` varchar(100) NOT NULL COMMENT '基地地址',
  `run_time` int(11) NOT NULL COMMENT '开办时间',
  `area` int(5) NOT NULL COMMENT '基地面积（平方米）',
  `own_or_co` tinyint(1) NOT NULL COMMENT '自有/合办(1:自有 2:合办)',
  `owner` varchar(30) NOT NULL COMMENT '产权单位',
  `investment_field` int(11) NOT NULL COMMENT '基地投入',
  `investment_class` int(11) NOT NULL COMMENT '其中学校投入',
  `investment_other` int(11) NOT NULL COMMENT '其他投入',
  `b_or_p_name` varchar(50) NOT NULL COMMENT '企业或项目名称',
  `item_type` tinyint(1) NOT NULL COMMENT '项目类型(1:服务 2:科技)',
  `item_class` tinyint(1) NOT NULL COMMENT '项目类别(1:企业 2:项目 3:个人)',
  `reg_capital` int(11) NOT NULL COMMENT '注册资本（万元）',
  `products` varchar(100) NOT NULL COMMENT '主要产品',
  `employees` int NOT NULL COMMENT '吸纳员工人数',
  `group` varchar(30) NULL COMMENT '项目面向群体',
  `duration` varchar(50) NOT NULL COMMENT '立项时长',
  `financing` varchar(30) NOT NULL COMMENT '融资情况',
  `budgey` int(11) NULL COMMENT '投资预算',
  `person_in_charge` varchar(10) COMMENT '法定代表或负责人姓名',
  `office_tel` varchar(30) NOT NULL COMMENT '办公电话/移动电话',
  `pic` varchar(100) NOT NULL COMMENT '场地照片',
  `synopsis` varchar(500) NOT NULL COMMENT '场地简介',
  `detail` mediumtext NOT NULL COMMENT '场地详情介绍',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否空闲',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `vs_field_apply` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `fid` mediumint(8) NOT NULL COMMENT '申请表id',
  `uid` mediumint(8) NOT NULL COMMENT '申请人id',
  `apply_time` int(11) NOT NULL COMMENT '申请时间戳',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '申请审核状态 0:未通过 1:通过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `vs_competitions` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `number` varchar(10) NOT NULL COMMENT '比赛编号',
  `name` varchar(20) NOT NULL COMMENT '比赛名称',
  `times` tinyint(1) NOT NULL COMMENT '届数',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  `deadline` int NOT NULL COMMENT '截止时间戳',
  `description` mediumtext NOT NULL COMMENT '比赛介绍',
  `url` varchar(100) NOT NULL COMMENT '报名链接',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vs_training` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '培训主题',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '培训内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '培训状态',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;






CREATE TABLE IF NOT EXISTS `vs_notice` (
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






CREATE TABLE IF NOT EXISTS `vs_application` (
  `aid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '申请主题',
  `type` tinyint(1) NOT NULL COMMENT '申请类型 1：入驻申请 2：项目申请',
  `apply_time` int(11) NOT NULL COMMENT '申请时间',
  `content` mediumtext NOT NULL COMMENT '申请内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '申请审核状态',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_user_token` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `token` varchar(32) NOT NULL,
  `groupid` tinyint(1) NOT NULL,
  `token_expire` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `vs_classes` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '课堂名称',
  `theme` mediumtext NOT NULL COMMENT '课堂主要内容',
  `teacher` varchar(30) NOT NULL COMMENT '主讲人',
  `limit` int NOT NULL COMMENT '课堂限定人数',
  `students` int NOT NULL COMMENT '报名学生数目',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `vs_documents` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '文件名',
  `url` varchar(100) NOT NULL COMMENT '文件存放路径',
  `issue_time` int NOT NULL COMMENT '上传时间',
  `type` tinyint(1) NOT NULL COMMENT '文件类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
