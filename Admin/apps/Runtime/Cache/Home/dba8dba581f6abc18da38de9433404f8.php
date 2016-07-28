<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/reset.css" />
</head>
<body>
	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/FZU-VentureService/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
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

			<?php if(is_array($teachers)): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "暂无要审核的教师信息" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if( $vo["status"] == 0): ?><tr>
						<td class="admin-teacher-select">
							<input class="admin-teacher-select-btn" type="checkbox">
						</td>
						<td class="admin-teacher-id"><?php echo ($i); ?></td>
						<td class="admin-teacher-username">
							<a href=""><?php echo ($vo["username"]); ?></a>
						</td>
						<td class="admin-teacher-name"><a href=""><?php echo ($vo["name"]); ?></a></td>
						<td class="admin-teacher-phone"><span><?php echo ($vo["tel"]); ?></span></td>
						<td class="admin-teacher-email"><span><?php echo ($vo["email"]); ?></span></td>
						<td class="admin-teacher-operation admin-operation">
							<span class="admin-teacher-pass admin-pass"><a href="/FZU-VentureService/Admin/index.php/home/user/pass?uid=<?php echo ($vo["uid"]); ?>">通过</a></span>
							<span class="admin-teacher-refuse admin-refuse" id="<?php echo ($vo["tel"]); ?>" onclick="refuse(this)">拒绝</span>
						</td>
					</tr><?php endif; endforeach; endif; else: echo "暂无要审核的教师信息" ;endif; ?>
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
			<?php if(is_array($investors)): $i = 0; $__LIST__ = $investors;if( count($__LIST__)==0 ) : echo "暂无待审核的投资人信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["status"] == 0): ?><tr>
						<td class="admin-teacher-select">
							<input class="admin-teachers-select-btn" type="checkbox">
						</td>
						<td class="admin-teacher-id"><?php echo ($i); ?></td>
						<td class="admin-teacher-username">
							<a href=""><?php echo ($v["username"]); ?></a>
						</td>
						<td class="admin-teacher-name"><span><?php echo ($v["name"]); ?></span></td>
						<td class="admin-teacher-phone"><span><?php echo ($v["tel"]); ?></span></td>
						<td class="admin-teacher-email"><span><?php echo ($v["email"]); ?></span></td>
						<td class="admin-teacher-operation admin-operation">
							<span class="admin-teacher-pass admin-pass"><a href="/FZU-VentureService/Admin/index.php/home/user/pass?uid=<?php echo ($v["uid"]); ?>">通过</a></span>
							<span class="admin-teacher-refuse admin-refuse" id="<?php echo ($v["tel"]); ?>" onclick="refuse(this)">拒绝</span>
						</td>
					</tr><?php endif; endforeach; endif; else: echo "暂无待审核的投资人信息" ;endif; ?>

			
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
			<?php if(is_array($teachers)): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if( $v["status"] == 1): ?><tr>
						<td class="admin-investor-select">
							<input class="admin-investors-select-btn" type="checkbox">
						</td>
						<td class="admin-investor-id"><?php echo ($i); ?></td>
						<td class="admin-investor-username">
							<span><?php echo ($v["username"]); ?></span>
						</td>
						<td class="admin-investor-name"><a href=""><?php echo ($v["name"]); ?></a></td>
						<td class="admin-investor-phone"><span><?php echo ($v["tel"]); ?></span></td>
						<td class="admin-investor-email"><span><?php echo ($v["email"]); ?></span></td>
						<td class="admin-investor-operation admin-operation">
							<a href="/FZU-VentureService/Admin/index.php/home/user/detail?uid=<?php echo ($v["uid"]); ?>"><span class="admin-view-info">查看信息</span></a>
						</td>
					</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			
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
			<?php if(is_array($investors)): $i = 0; $__LIST__ = $investors;if( count($__LIST__)==0 ) : echo "暂无投资人信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["status"] == 1): ?><tr>
						<td class="admin-teacher-select">
							<input class="admin-teachers-select-btn" type="checkbox">
						</td>
						<td class="admin-teacher-id"><?php echo ($i); ?></td>
						<td class="admin-teacher-username">
							<a href=""><?php echo ($v["username"]); ?></a>
						</td>
						<td class="admin-teacher-name"><span><?php echo ($v["name"]); ?></span></td>
						<td class="admin-teacher-phone"><span><?php echo ($v["tel"]); ?></span></td>
						<td class="admin-teacher-email"><span><?php echo ($v["email"]); ?></span></td>
						<td class="admin-teacher-operation admin-operation">
							<a href="/FZU-VentureService/Admin/index.php/home/user/detail?uid=<?php echo ($v["uid"]); ?>"><span class="admin-view-info">查看信息</span></a>
						</td>
					</tr><?php endif; endforeach; endif; else: echo "暂无投资人信息" ;endif; ?>
			
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
			<?php if(is_array($students)): $i = 0; $__LIST__ = $students;if( count($__LIST__)==0 ) : echo "暂无学生信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td class="admin-teacher-select">
							<input class="admin-teachers-select-btn" type="checkbox">
						</td>
						<td class="admin-teacher-id"><?php echo ($i); ?></td>
						<td class="admin-teacher-username">
							<a href=""><?php echo ($v["username"]); ?></a>
						</td>
						<td class="admin-teacher-name"><span><?php echo ($v["name"]); ?></span></td>
						<td class="admin-teacher-phone"><span><?php echo ($v["tel"]); ?></span></td>
						<td class="admin-teacher-email"><span><?php echo ($v["email"]); ?></span></td>
						<td class="admin-teacher-operation admin-operation">
							<a href="/FZU-VentureService/Admin/index.php/home/user/detail?uid=<?php echo ($v["uid"]); ?>"><span class="admin-view-info">查看信息</span></a>
						</td>
					</tr><?php endforeach; endif; else: echo "暂无学生信息" ;endif; ?>
			
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
			<?php if(is_array($admins)): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "暂无普通管理员信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td class="admin-teacher-select">
							<input class="admin-teachers-select-btn" type="checkbox">
						</td>
						<td class="admin-teacher-id"><?php echo ($i+1); ?></td>
						<td class="admin-teacher-username">
							<a href=""><?php echo ($v["username"]); ?></a>
						</td>
						<td class="admin-teacher-name"><span><?php echo ($v["name"]); ?></span></td>
						<td class="admin-teacher-phone"><span><?php echo ($v["tel"]); ?></span></td>
						<td class="admin-teacher-email"><span><?php echo ($v["email"]); ?></span></td>
						<td class="admin-teacher-operation admin-operation">
							<a href="/FZU-VentureService/Admin/index.php/home/user/detail?uid=<?php echo ($v["uid"]); ?>"><span class="admin-view-info">查看信息</span></a>
						</td>
					</tr><?php endforeach; endif; else: echo "暂无普通管理员信息" ;endif; ?>
							
		</table>
	</div>

</div>
	
			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/FZU-VentureService/Admin/index.php/home/admin/refuse" method="post">
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
	<script src="/FZU-VentureService/Admin/Public/js/tabswift.js"></script>
	<script src="/FZU-VentureService/Admin/Public/js/admin.js"></script>
</body>
</html>