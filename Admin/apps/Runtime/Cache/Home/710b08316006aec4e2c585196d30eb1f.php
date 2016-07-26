<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/reset.css" />
</head>
<body>
	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/demo/jyzd/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 项目管理 -->
<div class="user-box admin-projects-management sub-management pull-right">
	<div class="admin-top admin-projects-management">
		<ul class="admin-management-ul clearfix" id="admin-projects">
			<li class="pull-left now-li">项目审核</li>
			<li class="pull-left">项目信息</li>
		</ul>
	</div>
	<!-- 项目审核 -->
	<div class="admin-projects-table admin-check-projects-table admin-table block" id="projects-check-table">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-project-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-project-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-project-name admin-th-name"><span>项目名</span></th>
				<th class="admin-th-project-username admin-th-username"><span>负责人</span></th>
				<th class="admin-th-project-time admin-th-time"><span>申请时间</span></th>
				<th class="admin-th-project-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<tr>
				<td class="admin-project-select">
					<input class="admin-project-select-btn" type="checkbox">
				</td>
				<td class="admin-project-id">1</td>
				<td class="admin-project-name">
					<a href="">互联网技术威客兼职预约平台</a>
				</td>
				<td class="admin-project-username"><span>林渊腾</span></td>
				<td class="admin-project-time"><span>2016-07-23</span></td>
				<td class="admin-project-operation admin-operation">
					<span class="admin-project-pass admin-pass">通过</span>
					<span class="admin-project-refuse admin-refuse">拒绝</span>
				</td>
			</tr>
			
		</table>
	</div>
	<!-- 项目信息 -->
	<div class="admin-projects-table admin-check-projects-table admin-table" id="projects-check-table">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-project-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-project-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-project-name admin-th-name"><span>项目名</span></th>
				<th class="admin-th-project-username admin-th-username"><span>负责人</span></th>
				<th class="admin-th-project-time admin-th-time"><span>申请时间</span></th>
				<th class="admin-th-project-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<tr>
				<td class="admin-project-select">
					<input class="admin-project-select-btn" type="checkbox">
				</td>
				<td class="admin-project-id">1</td>
				<td class="admin-project-name">
					<a href="">互联网技术威客兼职预约平台</a>
				</td>
				<td class="admin-project-username"><span>林渊腾</span></td>
				<td class="admin-project-time"><span>2016-07-23 21:00</span></td>
				<td class="admin-project-operation admin-operation">
					<a href=""><span class="admin-view-info">查看信息</span></a>	
				</td>
			</tr>
			
		</table>
	</div>
</div>
		</div>
	</div>
	
	<!-- Admin End -->
	<script src="/demo/jyzd/Admin/Public/js/tabswift.js"></script>
	<script src="/demo/jyzd/Admin/Public/js/admin.js"></script>
</body>
</html>