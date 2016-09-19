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
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/date/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/date/bootstrap/css/bootstrap-datetimepicker.min.css" /><!--日期插件样式-->
	<script src="/FZU-VentureService/Admin/Public/date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script src="/FZU-VentureService/Admin/Public/js/jquery.form.js" charset="UTF-8"></script>

</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/FZU-VentureService/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
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
				<img src="/FZU-VentureService/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name'] != '' ? $user['name'] : "管理员"; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/FZU-VentureService/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice/index">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user/index">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project/index">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field/index">基地管理</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class/index">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document/index">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition/index">比赛管理</a></li>
				</ul>
			</div>
<div class="user-box admin-projects-management sub-management pull-right">
	<!-- 基地信息 -->
	<div class="block">
 	 	<table class="view-table table-bordered">
 	 		<tr><td class="line-title text-center" colspan="3">基地基本信息</td></tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地名称</h4></th>
 				<td colspan="2"><p><?php echo ($detail["name"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">法定代表人（负责人）</h4></th>
 				<td colspan="2"><p><?php echo ($detail["chief"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地地址</h4></th>
 				<td colspan="2"><p><?php echo ($detail["addr"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">开办时间</h4></th>
 				<td colspan="2"><p><?php echo ($detail["run_time"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地面积</h4></th>
 				<td colspan="2"><p><?php echo ($detail["area"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">自有/合办</h4></th>
 				<td colspan="2"><p><?php echo ($detail["own_or_co"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">产权单位</h4></th>
 				<td colspan="2"><p><?php echo ($detail["owner"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地投入（万元）</h4></th>
 				<td colspan="2"><p><?php echo ($detail["investment_field"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">学校投入（万元）</h4></th>
 				<td colspan="2"><p><?php echo ($detail["investment_class"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">其他投入（万元）</h4></th>
 				<td colspan="2"><p><?php echo ($detail["investment_other"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地简介</h4></th>
 				<td colspan="2"><?php echo ($detail["synopsis"]); ?></td>
 			</tr>
			<tr>
 				<th><h4 class="line-title text-left">基地详情</h4></th>
 				<td colspan="2"><p><?php echo ($detail["detail"]); ?></p></td>
 			</tr>
 			<tr>
 				<th><h4 class="line-title text-left">基地照片</h4></th>
 				<td colspan="2">
 					
 						<img width="500" height="300" src="<?php echo ($detail["pic"]); ?>" alt="">
 					
 				</td>
 			</tr>
 			<tr><td class="line-title text-center" colspan="3">公共场地信息</td></tr>
 			<?php if(is_array($detail["public"])): $i = 0; $__LIST__ = $detail["public"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	 				<th><h4 class="line-title text-left">公共场地名称</h4></th>
	 				<td colspan="2"><p><?php echo ($vo["name"]); ?></p></td>
	 			</tr>
	 			<tr>
	 				<th><h4 class="line-title text-left">公告场地说明</h4></th>
	 				<td colspan="2"><?php echo ($vo["synopsis"]); ?></td>
	 			</tr>
				<tr>
	 				<th><h4 class="line-title text-left">场地照片</h4></th>
	 				<td colspan="2">
	 					
	 						<img width="250" height="150" src="<?php echo ($vo["pic"]); ?>" alt="">
	 					
	 				</td>
	 			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
 		</table>
	 	<div class="view-btn-group">
	 		<a class="btn-view" href="javascript:history.back(-1)" >返回上一级</a>
	 	</div>
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
	<!-- Admin End -->
	
	<script src="/FZU-VentureService/Admin/Public/js/admin.js"></script>


	<!-- 日期插件 -->
	<script src="/FZU-VentureService/Admin/Public/date/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="/FZU-VentureService/Admin/Public/date/bootstrap/js/bootstrap.min.js"></script>
	<script src="/FZU-VentureService/Admin/Public/date/bootstrap/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
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