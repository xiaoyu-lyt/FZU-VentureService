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
<<<<<<< HEAD
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/Admin/index.php/home/competition">比赛管理</a></li>
=======
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
>>>>>>> origin/master
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
			<?php if(is_array($enlist)): $i = 0; $__LIST__ = $enlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td class="admin-student-select">
						<input class="admin-students-select-btn" type="checkbox">
					</td>
					<td class="admin-student-id"><?php echo ($vo["id"]); ?></td>
					<td class="admin-student-username">
						<a href=""><?php echo ($vo["stu"]["username"]); ?></a>
					</td>
					<td class="admin-student-name"><a href=""><?php echo ($vo["stu"]["name"]); ?></a></td>
					<td class="admin-student-phone"><span><?php echo ($vo["stu"]["tel"]); ?></span></td>
					<td class="admin-student-email"><span><?php echo ($vo["stu"]["email"]); ?></span></td>
					<td class="admin-student-operation admin-operation">
						<span class="admin-project-pass admin-pass"><a href="/FZU-VentureService/Admin/index.php/home/class/pass?id=<?php echo ($vo["id"]); ?>">通过</a></span>
						<span class="admin-project-refuse admin-refuse">拒绝</span>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
		</table>
	</div>
</div>
			<div class="admin-popup">
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