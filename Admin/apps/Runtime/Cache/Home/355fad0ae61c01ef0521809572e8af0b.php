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
<!-- 发布表格 -->
			<div class="user-box block">
				<form class="publish-form form-horizontal">
					<div class="form-group">
						<h4 class="line-title text-right"><span class="star">*</span>发布类型：</h4>
						<label class="radio-inline">
							<input type="radio" name="optionsRadios">新闻资讯
						</label>
						<label class="radio-inline">
							<input type="radio" name="optionsRadios">通知公告
						</label>
						<label class="radio-inline">
							<input type="radio" name="optionsRadios">最新政策
					</div>
					<div class="form-group">
						<h4 class="line-title text-right">首页显示：</h4>
							<label class="checkbox-inline">
								<input type="checkbox"> 热门资讯
							</label>
					</div>
					<div class="form-group">
						<h4 class="line-title text-right"><span class="star">*</span>标题：</h4>
						<input class="title-input form-control" type="text">
					</div>
					<div class="form-group">
						<h4 class="line-title text-right"><span class="star">*</span>内容：</h4>
						<script id="_container" name="content" type="text/plain" style="width: 87%; height:300px; margin-left: 113px"> 
			    </script>
					</div>
					<div class="publish-group">
						<button class="btn btn-publish">发布</button>
					</div>
				</form>
			</div>
<!-- Aricle-publish Start
<div class="article-publish-form">
	<form action="/demo/jyzd/Admin/index.php/home/notice/publish/do" method="post">
		<div class="article-publish-box article-publish-column">
			<label for=""><span class="star">*</span>栏目:</label>
			<select name="type" >
				<option value="0">新闻热点</option>
				<option value="1">通知公告</option>
				<option value="2">政策法规</option>
			</select>
		</div>
		<div class="article-publish-box article-publish-title">
			<label for=""><span class="star">*</span>标题:</label>
			<input type="text" name="theme" value="">
			<button class="duplicate-detection">检测重复</button>
		</div>
		<div class="article-publish-box article-publish-abstract">

			<label for=""><span class="star">*</span>内容:</label>
				加载编辑器的容器
			    <script id="_container" name="content" type="text/plain" style="width: 740px; height:250px; margin-left:190px;"> 
			    </script>
			    配置文件
			    <script type="text/javascript" src="/demo/jyzd/Admin/Public/ueditor/ueditor.config.js"></script>
			    编辑器源码文件
			    <script type="text/javascript" src="/demo/jyzd/Admin/Public/ueditor/ueditor.all.js"></script>
			    实例化编辑器
		</div>
		<div class="article-publish-btn">
			<button type="submit" name="sub" class="save-close">保存后自动关闭</button>
			<button class="save-publish">保存并继续发表</button>
			<button class="publish-close"><a href="javascript :;" onClick="javascript :history.back(-1);">关闭</a></button>
		</div>
	</form>
</div> -->
<script type="text/javascript" src="/demo/jyzd/Admin/Public/ueditor/ueditor.config.js"></script>

<script type="text/javascript" src="/demo/jyzd/Admin/Public/ueditor/ueditor.all.js"></script>

<script type="text/javascript">
	        var ue = UE.getEditor('_container');
</script>
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