<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" href="/demo/jyzd/Admin/Public/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/demo/jyzd/Admin/Public/css/admin.css">
	<link rel="stylesheet" href="/demo/jyzd/Admin/Public/css/reset.css">
</head>
<body>
	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="images/setting.png" alt="">
				<h1>管理中心</h1>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="now">资讯管理</li>
					<li class="user-sidnav-li admin-users">用户管理</li>
					<li class="user-sidnav-li admin-projects">项目管理</li>
					<li>入驻申请</li>
					<li>培训管理</li>
					<li>教材管理</li>
					<li>比赛管理</li>
				</ul>
			</div>
			<!-- 咨询管理 -->
			<div class="user-box admin-info-management pull-right">
				<div class="admin-top">
					<a class="admin-publish-article" href="article_publish.html">发布文章</a>
				</div>
				<div class="admin-info-table admin-table">
					<table>
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

			</div>
			<!-- 用户管理 -->
			<div class="user-box admin-users-management sub-management pull-right">
				<div class="admin-top admin-users-management">
					<ul class="admin-management-ul clearfix" id="admin-users">
						<li class="pull-left now-li">教师审核</li>
						<li class="pull-left">投资人审核</li>
						<li class="pull-left">教师信息</li>
						<li class="pull-left">投资人信息</li>
						<li class="pull-left">学生信息</li>
						<li class="pull-left">管理员信息</li>
					</ul>
				</div>
				<!-- 教师审核 -->
				<div class="admin-teachers-table admin-users-table admin-table block" id="teachers-check-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-teacher-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-teacher-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-teacher-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-teacher-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-teacher-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-teacher-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-teacher-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-teacher-select">
								<input class="admin-teacher-select-btn" type="checkbox">
							</td>
							<td class="admin-teacher-id">1</td>
							<td class="admin-teacher-username">
								<a href="">oipqeu</a>
							</td>
							<td class="admin-teacher-name"><a href="">林渊腾</a></td>
							<td class="admin-teacher-phone"><span>15648973275</span></td>
							<td class="admin-teacher-email"><span>55647854@qq.com</span></td>
							<td class="admin-teacher-operation admin-operation">
								<span class="admin-teacher-pass admin-pass">通过</span>
								<span class="admin-teacher-refuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 投资人审核 -->
				<div class="admin-investors-table admin-users-table admin-table" id="investors-check-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-investor-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-investor-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-investor-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-investor-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-investor-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-investor-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-investor-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investor-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><a href="">宋一博</a></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<span class="admin-investor-pass admin-pass">通过</span>
								<span class="admin-investor-refsuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 教师信息 -->
				<div class="admin-teachers-box admin-users-table admin-table" id="teachers-info-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-investors-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-investor-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-investor-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-investor-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-investor-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-investor-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-investor-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investors-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><a href="">balal</a></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 投资人信息 -->
				<div class="admin-investors-box admin-users-table admin-table" id="investors-info-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-investors-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-investor-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-investor-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-investor-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-investor-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-investor-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-investor-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-teacher-select">
								<input class="admin-teachers-select-btn" type="checkbox">
							</td>
							<td class="admin-teacher-id">1</td>
							<td class="admin-teacher-username">
								<a href="">joipouqew</a>
							</td>
							<td class="admin-teacher-name"><span>123</span></td>
							<td class="admin-teacher-phone"><span>18476931485</span></td>
							<td class="admin-teacher-email"><span>jasduiu@163.com</span></td>
							<td class="admin-teacher-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 学生信息 -->
				<div class="admin-students-table admin-users-table admin-table" id="students-info-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-investors-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-investor-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-investor-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-investor-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-investor-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-investor-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-investor-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investors-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><span>123</span></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 管理员信息 -->
				<div class="admin-administrators-table admin-users-table admin-table" id="administrators-info-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-administrators-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-administrator-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-administrator-username admin-th-username"><span>用户名</span></th>
							<th class="admin-th-administrator-name admin-th-name"><span>姓名</span></th>
							<th class="admin-th-administrator-phone admin-th-phone"><span>手机号</span></th>
							<th class="admin-th-administrator-email admin-th-email"><span>邮箱</span></th>
							<th class="admin-th-administrator-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-administrator-select">
								<input class="admin-administrators-select-btn" type="checkbox">
							</td>
							<td class="admin-administrator-id">1</td>
							<td class="admin-administrator-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-administrator-name"><span>123</span></td>
							<td class="admin-administrator-phone"><span>18476931485</span></td>
							<td class="admin-administrator-email"><span>jasduiu@163.com</span></td>
							<td class="admin-administrator-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
					</table>
				</div>

			</div>

			<!-- 比赛管理 -->
			<div class="user-box admin-games-management pull-right">
				<div class="admin-top">
					<a class="admin-publish-game" href="">发布比赛通知</a>
				</div>
			</div>
			<div class="admin-popup">
				<div class="popup-delete">
					<p>确认删除？</p>
					<div class="popup-select clearfix">
						<span class="yes pull-left">确认</span>
						<span class="no pull-right">取消</span></div>
				</div>
				<div class="popup-refuse">
					<p>请填写拒绝理由</p>
					<p class="refuse-hint">拒绝后将通过短信通知</p>
					<textarea></textarea>
					<div class="popup-select clearfix">
						<span class="yes pull-left">确认</span>
						<span class="no pull-right">取消</span></div>
				</div>
			</div>	
		</div>
	</div>
	
	<!-- Admin End -->
	<script src="/demo/jyzd/Admin/Public/js/tabswift.js"></script>
	<script src="/demo/jyzd/Admin/Public/js/admin.js"></script>
</body>
</html>