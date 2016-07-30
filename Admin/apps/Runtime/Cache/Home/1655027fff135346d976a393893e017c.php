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
	<script type="text/javascript" src="/demo/jyzd/Admin/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/demo/jyzd/Admin/Public/js/getData.js"></script>
</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/demo/jyzd/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
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
				<img src="/demo/jyzd/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name']; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/demo/jyzd/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
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
<!-- 教材管理 -->
<div class="user-box admin-textbook-management pull-right">
	<div class="admin-top">
			<a class="admin-publish-textbook" href="">发布教材</a>
	</div>
	<div class="admin-textbook-table admin-table block">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-textbook-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-textbook-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-textbook-name admin-th-username"><span>教材名</span></th>
				<th class="admin-th-textbook-name admin-th-username"><span>发布时间</span></th>
				<th class="admin-th-textbook-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<?php if(empty($documents)): ?><tr align="center">
					<td colspan="6">
						暂无教材信息
					</td>
				</tr>
			<?php else: ?>
				<?php if(is_array($documents)): $i = 0; $__LIST__ = $documents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="admin-textbook-select">
							<input class="admin-textbook-select-btn" type="checkbox">
						</td>
						<td class="admin-textbook-id"><?php echo ($vo["id"]); ?></td>
						<td class="admin-textbook-name">
							<a href=""><?php echo ($vo["name"]); ?></a>
						</td>
						<td><?php echo ($vo["issue_time"]); ?></td>
						<td class="admin-textbook-operation admin-operation">
							<span class="admin-article-modify">修改</span>
							<span class="admin-article-delete">删除</span>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		</table>
	</div>
	<!-- 分页栏 -->
	<div class="pull-right">
		<ul class="pagination">
			<?php if($curPage != 1 ): ?><li><a href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/1" >首页</a></li>
				<li><a href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($curPage-1); ?>">上一页</a></li><?php endif; ?>

			<?php if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_21096__=$curPage-2;$__FOR_END_21096__=$curPage+3;for($i=$__FOR_START_21096__;$i < $__FOR_END_21096__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): ?>
				<?php $__FOR_START_30337__=$totalPage-5;$__FOR_END_30337__=$totalPage;for($i=$__FOR_START_30337__;$i < $__FOR_END_30337__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif($totalPage > 5): ?>
				<?php $__FOR_START_29478__=1;$__FOR_END_29478__=6;for($i=$__FOR_START_29478__;$i < $__FOR_END_29478__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php else: ?>
				<?php $__FOR_START_19303__=1;$__FOR_END_19303__=$totalPage;for($i=$__FOR_START_19303__;$i < $__FOR_END_19303__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } endif; ?>

			<?php if($curPage < $totalPage-1): ?><li><a href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($curPage+1); ?>">下一页</a></li>
				<li><a href="/demo/jyzd/Admin/index.php/home/user/<?php echo ($now); ?>/<?php echo ($totalPage-1); ?>">末页</a></li><?php endif; ?>

			<li><a href="javascript:void(0);">共 <?php echo ($total); ?> 条记录</a></li>
		</ul>
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
	
	<script src="/demo/jyzd/Admin/Public/js/admin.js"></script>
	
</body>
</html>