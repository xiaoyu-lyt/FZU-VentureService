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
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Projects') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Fields') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Documents') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competitions') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 培训管理 -->
<div class="user-box admin-classes-management pull-right">
	<div class="admin-top">
			<a class="admin-publish-classes" href="">发布培训课</a>
		</div>
	<div class="admin-classes-table admin-table block">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-students-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-student-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-student-username admin-th-username"><span>用户名</span></th>
				<th class="admin-th-student-name admin-th-name"><span>姓名</span></th>
				<th class="admin-th-student-phone admin-th-phone"><span>手机号</span></th>
				<th class="admin-th-student-email admin-th-email"><span>邮箱</span></th>
				<th class="admin-th-student-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<tr>
				<td class="admin-student-select">
					<input class="admin-students-select-btn" type="checkbox">
				</td>
				<td class="admin-student-id">1</td>
				<td class="admin-student-username">
					<a href="">joipouqew</a>
				</td>
				<td class="admin-student-name"><a href="">qewrqew</a></td>
				<td class="admin-student-phone"><span>18476931485</span></td>
				<td class="admin-student-email"><span>jasduiu@163.com</span></td>
				<td class="admin-student-operation admin-operation">
					<span class="admin-project-pass admin-pass">通过</span>
					<span class="admin-project-refuse admin-refuse">拒绝</span>
				</td>
			</tr>
			
		</table>
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
					<form action="/demo/jyzd/Admin/index.php/home/admin/refuse" method="post">
						<p>请填写拒绝理由</p>
						<p class="refuse-hint">拒绝后将通过短信通知</p>
						<input id="module" type="hidden" name="module" value="<?php echo ($MODULE); ?>">
						<input id="receiver" type="hidden" name="receiver" value="">
						<textarea name="message"></textarea>
						<div class="popup-select clearfix">
							<span class="yes pull-left"><input type="submit" name="sub" value="确认"></span>
							<span class="no pull-right">取消</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
	</script>
	<!-- Admin End -->
	<script src="/demo/jyzd/Admin/Public/js/tabswift.js"></script>
	<script src="/demo/jyzd/Admin/Public/js/admin.js"></script>
</body>
</html>