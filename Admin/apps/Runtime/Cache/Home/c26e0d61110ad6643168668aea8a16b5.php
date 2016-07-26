<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/reset.css" />
=======
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/reset.css" />
>>>>>>> origin/master
</head>
<body>
	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
<<<<<<< HEAD
				<img src="/demo/jyzd/Admin/Public/images/setting.png" alt="">
=======
				<img src="/FZU-VentureService/Admin/Public/images/setting.png" alt="">
>>>>>>> origin/master
				<h1>管理中心</h1>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
<<<<<<< HEAD
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 咨询管理 -->
<div class="user-box admin-info-management pull-right">
=======
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 咨询管理 -->
<div class="user-box block admin-info-management pull-right">
>>>>>>> origin/master
	<div class="admin-top">
		<a class="admin-publish-article" href="article_publish.html">发布文章</a>
	</div>
	<div class="admin-info-table admin-table">
		<table>
<<<<<<< HEAD
			<tr>
				<th class="admin-th-select">
					<input class="admin-article-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
				<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
				<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
				<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
				<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
			</tr>
=======
				<tr>
					<th class="admin-th-select">
						<input class="admin-article-select-btn" type="checkbox"> 全选
					</th>
					<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
					<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
					<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
					<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
					<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
					<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
				</tr>
>>>>>>> origin/master
			<tr>
				<td class="admin-article-select">
					<input class="admin-article-select-btn" type="checkbox">
				</td>
				<td class="admin-article-id">1</td>
				<td class="admin-article-title">
					<a href="article.html">福州大学第二十九届学生文化艺术节圆满落幕</a>
				</td>
				<td class="admin-article-pageview"><span>123</span></td>
				<td class="admin-article-publisher"><span>admin-1</span></td>
				<td class="admin-article-updatetime"><span>2016-07-23</span></td>
				<td class="admin-article-operation admin-operation">
					<span class="admin-article-modify">修改</span>
					<span class="admin-article-delete">删除</span>
				</td>
			</tr>
			<tr>
				<td class="admin-article-select">
					<input class="admin-article-select-btn" type="checkbox">
				</td>
				<td class="admin-article-id">1</td>
				<td class="admin-article-title">
					<a href="article.html">福州大学第十七届青年教师“最佳一节课”竞赛圆满落幕</a>
				</td>
				<td class="admin-article-pageview"><span>123</span></td>
				<td class="admin-article-publisher"><span>admin-1</span></td>
				<td class="admin-article-updatetime"><span>2016-07-23</span></td>
				<td class="admin-article-operation admin-operation">
					<span class="admin-article-modify">修改</span>
					<span class="admin-article-delete">删除</span>
				</td>
			</tr>
			<tr>
				<td class="admin-article-select">
					<input class="admin-article-select-btn" type="checkbox">
				</td>
				<td class="admin-article-id">1</td>
				<td class="admin-article-title">
					<a href="article.html">福大学子写三行情诗致父母，让爱回家传递孝悌之情</a>
				</td>
				<td class="admin-article-pageview"><span>123</span></td>
				<td class="admin-article-publisher"><span>admin-1</span></td>
				<td class="admin-article-updatetime"><span>2016-07-23</span></td>
				<td class="admin-article-operation admin-operation">
					<span class="admin-article-modify">修改</span>
					<span class="admin-article-delete">删除</span>
				</td>
			</tr>
		 	<tr>
				<td class="admin-article-select">
					<input class="admin-article-select-btn" type="checkbox">
				</td>
				<td class="admin-article-id">1</td>
				<td class="admin-article-title">
					<a href="article.html">福州大学2016届毕业生班级校友联络员和学院年级校友召集人聘任大会举行</a>
				</td>
				<td class="admin-article-pageview"><span>123</span></td>
				<td class="admin-article-publisher"><span>admin-1</span></td>
				<td class="admin-article-updatetime"><span>2016-07-23</span></td>
				<td class="admin-article-operation admin-operation">
					<span class="admin-article-modify">修改</span>
					<span class="admin-article-delete">删除</span>
				</td>
			</tr>
		</table>
	</div>
<<<<<<< HEAD

=======
>>>>>>> origin/master
</div>
		</div>
	</div>
	
	<!-- Admin End -->
<<<<<<< HEAD
	<script src="/demo/jyzd/Admin/Public/js/tabswift.js"></script>
	<script src="/demo/jyzd/Admin/Public/js/admin.js"></script>
=======
	<script src="/FZU-VentureService/Admin/Public/js/tabswift.js"></script>
	<script src="/FZU-VentureService/Admin/Public/js/admin.js"></script>
>>>>>>> origin/master
</body>
</html>