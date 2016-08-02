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
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name']; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/demo/jyzd/01/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 培训管理 -->
<div class="user-box admin-classes-management pull-right">
	<div class="admin-top">
			<div class="admin-top admin-projects-management">
				<ul class="admin-management-ul clearfix" id="admin-projects">
					<li class="pull-left <?php if($now == 'index' ) echo 'now-li';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class/index">待审核报名</a></li>
					<li class="pull-left <?php if($now == 'class_list' ) echo 'now-li';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class/class_list">培训课程</a></li>
				</ul>
			</div>
		<a class="admin-publish-classes" href="/demo/jyzd/01/Admin/index.php/home/class/publish">发布培训课</a>
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
			<?php if(empty($enlist)): ?><tr align="center">
					<td colspan="6">
						暂无待审核的报名信息
					</td>
				</tr>
			<?php else: ?>
				<?php if(is_array($enlist)): $i = 0; $__LIST__ = $enlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="admin-student-select">
							<input class="admin-students-select-btn" type="checkbox">
						</td>
						<td class="admin-student-id"><?php echo ($vo["cid"]); ?></td>
						<td class="admin-student-username">
							<a href=""><?php echo ($vo["stu"]["username"]); ?></a>
						</td>
						<td class="admin-student-name"><a href=""><?php echo ($vo["stu"]["name"]); ?></a></td>
						<td class="admin-student-phone"><span><?php echo ($vo["stu"]["tel"]); ?></span></td>
						<td class="admin-student-email"><span><?php echo ($vo["stu"]["email"]); ?></span></td>
						<td class="admin-student-operation admin-operation">
							<span class="admin-project-pass admin-pass"><a href="/demo/jyzd/01/Admin/index.php/home/class/pass?id=<?php echo ($vo["id"]); ?>">通过</a></span>
							<span class="admin-project-refuse admin-refuse">拒绝</span>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		</table>

	</div>


	<!-- 分页栏 -->
	<div class="pull-right">
		<ul class="pagination">
			<?php if($curPage != 1 ): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/1" >首页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($curPage-1); ?>">上一页</a></li><?php endif; ?>

			<?php if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_22345__=$curPage-2;$__FOR_END_22345__=$curPage+3;for($i=$__FOR_START_22345__;$i < $__FOR_END_22345__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): ?>
				<?php $__FOR_START_6222__=$totalPage-5;$__FOR_END_6222__=$totalPage;for($i=$__FOR_START_6222__;$i < $__FOR_END_6222__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif($totalPage > 5): ?>
				<?php $__FOR_START_19823__=1;$__FOR_END_19823__=6;for($i=$__FOR_START_19823__;$i < $__FOR_END_19823__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php else: ?>
				<?php $__FOR_START_31356__=1;$__FOR_END_31356__=$totalPage;for($i=$__FOR_START_31356__;$i < $__FOR_END_31356__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } endif; ?>

			<?php if($curPage < $totalPage-1): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($curPage+1); ?>">下一页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($totalPage-1); ?>">末页</a></li><?php endif; ?>

			<li><a href="javascript:void(0);">共 <?php echo ($total); ?> 条记录</a></li>
		</ul>
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