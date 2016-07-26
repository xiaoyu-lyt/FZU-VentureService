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
<!-- 入驻申请 -->
<div class="user-box admin-bases-management pull-right">
	<div class="admin-bases-table admin-check-bases-table admin-table block" id="bases-check-table">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-base-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-base-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-base-name admin-th-name"><span>基地名称</span></th>
				<th class="admin-th-base-username admin-th-username"><span>负责人</span></th>
				<th class="admin-th-base-time admin-th-time"><span>申请时间</span></th>
				<th class="admin-th-base-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<tr>
				<td class="admin-base-select">
					<input class="admin-base-select-btn" type="checkbox">
				</td>
				<td class="admin-base-id">1</td>
				<td class="admin-base-name">
					<a href="">balbal创业基地</a>
				</td>
				<td class="admin-base-username"><span>林渊腾</span></td>
				<td class="admin-base-time"><span>2016-07-23</span></td>
				<td class="admin-base-operation admin-operation">
					<span class="admin-base-pass admin-pass">通过</span>
					<span class="admin-base-refuse admin-refuse">拒绝</span>
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