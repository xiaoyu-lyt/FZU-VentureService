<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap-datetimepicker.min.css" /><!--日期插件样式-->
	<script src="/demo/jyzd/01/Admin/Public/date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/js/jquery.form.js" charset="UTF-8"></script>

</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/demo/jyzd/01/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
				<p class="old-line">	
					<input type="password" name="old_pwd" placeholder="旧密码" value="" required>
				</p>
				<p class="new-line">
					<input type="password" name="new_pwd" placeholder="新密码" value="" required>
				</p>
				<p class="submit-line">
					<input class="submit" type="submit" value="确认修改">
				</p>
			</form>
		</div>
	</div>
	<!-- Modify End -->

	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/demo/jyzd/01/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name'] != '' ? $user['name'] : "管理员"; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/demo/jyzd/01/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/field">基地管理</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<div class="user-box admin-projects-management sub-management pull-right">
	<!-- 发布表格 -->
	<div class="block">
	 	<table class="view-table table-bordered">
	 		<tr>
	 			<td class="line-title text-center" colspan="6">项目基本信息</td>
	 		</tr>
			<tr>
				<th><h4 class="line-title text-left">项目名称</h4></th>
				<td colspan="5"><?php echo ($detail["name"]); ?></td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">项目图片</h4></th>
				<td colspan="5">
					<?php if($detail["pic"] == '' ): ?>无<?php else: ?>
						<div class="view-pic"><img src="<?php echo ($deatil["pic"]); ?>" alt=""></div><?php endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">项目LOGO</h4></th>
				<td colspan="5">
					<?php if($detail["logo"] == '' ): ?>无<?php else: ?>
						<div class="view-pic"><img src="<?php echo ($detail["logo"]); ?>" alt=""></div><?php endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">项目简介</h4></th>
				<td colspan="5">
					<?php if($detail["synopsis"] == ''): ?>无<?php else: ?>
						<?php echo ($detail["synopsis"]); endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">项目开发进度</h4></th>
				<td colspan="5">
					<?php if($detail["progress"] == ''): ?>无<?php else: ?>
						<?php echo ($detail["progress"]); endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">销售或服务类型</h4></th>
				<td colspan="2"><?php echo ($detail["service_type"]); ?></td>
				<th><h4 class="line-title text-left">是否已成立公司</h4></th>
				<td colspan="2">
					<?php if($detail["is_company"] == 1): ?>是<?php else: ?>否<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">商业计划书</h4></td>
				<td colspan="2">
					<a href="<?php echo ($detail["plan"]); ?>">计划书</a>
					<span style="color:#ccc;">(点击文件名可下载)</span>
				</td>
				<th><h4 class="line-title text-left">附件</h4></th>
				<td colspan="2">
					<a href="<?php echo ($detail["attachment"]); ?>">附件</a>
					<span style="color:#ccc;">(点击文件名可下载)</span>
				</td>
			<tr><td class="line-title text-center" colspan="6">负责人信息</td></tr>
			<tr>
				<td><p class="line-title">姓名</p></td>
				<td><?php echo ($detail["charge"]["name"]); ?></td>
				<td><p class="line-title">性别</p></td>
				<td><?php echo ($detail["charge"]["gender"]); ?></td>
				<td><p class="line-title">占股比例</p></td>
				<td>
					<?php if($detail.charge.share_percentage == ' '): ?>无<?php else: ?>
						<?php echo ($detail["charge"]["share_percentage"]); endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">手机</h4></td>
				<td><?php echo ($detail["charge"]["tel"]); ?></td>
				<th><h4 class="line-title text-left">邮箱</h4></th>
				<td><div><?php echo ($detail["charge"]["email"]); ?></div></td>
				<td><p class="line-title">主要职责</p></td>
				<td>
					<?php if($detail.charge.duty == ' '): ?>无<?php else: ?>
						<?php echo ($detail["charge"]["duty"]); endif; ?>
				</td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">证件类型</h4></td>
				<td colspan="2"><div><?php echo ($detail["charge"]["id_type"]); ?></div></td>
				<th><h4 class="line-title text-left">证件号</h4></th>
				<td colspan="2"><div><?php echo ($detail["charge"]["id_number"]); ?></div></td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">工作履历</h4></td>
				<td colspan="2">
					<?php if($detail.charge.work_record == ''): ?>无<?php else: ?>
						<?php echo ($detail["charge"]["work_record"]); endif; ?>
				</td>
				<th><h4 class="line-title text-left">创业履历</h4></td>
				<td colspan="2">
					<?php if($detail.charge.business_record == ''): ?>无<?php else: ?>
						<?php echo ($detail["charge"]["business_record"]); endif; ?>
				</td>

			</tr>
			<tr><td class="line-title text-center" colspan="6">融资需求</td></tr>
			<tr>
				<th><h4 class="line-title text-left">已融资金额</h4></td>
				<td colspan="2"><?php echo ($detail["finan_amount"]); ?></td>
				<th><h4 class="line-title text-left">融资方式</h4></td>
				<td colspan="2"><?php echo ($detail["finan_mode"]); ?></td>
			</tr>
			<tr>
				<th><h4 class="line-title text-left">融资时间段</h4></td>
				<td colspan="2"><?php echo ($detail["time"]); ?></td>
				<th><h4 class="line-title text-left">下一融资阶段</h4></td>
				<td colspan="2"><?php echo ($detail["next_stage"]); ?></td>
			</tr>

	 	</table>
	 	<div class="view-btn-group">
	 		<a class="btn-view" href="javascript:history.back(-1)" >返回上一级</a>
	 	</div>
	</div>
</div>
			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/demo/jyzd/01/Admin/index.php/home/admin/refuse" method="post">
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
	<!-- Admin End -->
	
	<script src="/demo/jyzd/01/Admin/Public/js/admin.js"></script>


	<!-- 日期插件 -->
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap.min.js"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
		$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    	});
    	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd'});
	</script>
</body>
</html>