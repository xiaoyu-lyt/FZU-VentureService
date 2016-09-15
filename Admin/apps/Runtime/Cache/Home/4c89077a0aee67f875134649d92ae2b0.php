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
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/notice/index">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/user/index">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project/index">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/field/index">基地管理</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class/index">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/document/index">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/competition/index">比赛管理</a></li>
				</ul>
			</div>
<!-- 比赛管理 -->
<div class="user-box admin-games-management pull-right">
	<div class="admin-top">
		<a class="admin-publish-game" href="/demo/jyzd/01/Admin/index.php/home/competition/publish">发布比赛通知</a>
	</div>

	<div class="admin-new-table admin-info-table admin-table block">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-news-select-btn" type="checkbox">
				</th>
				<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
				<th class="admin-th-article-times admin-th-times"><span>届数</span></th>
				<th class="admin-th-article-publishtime admin-th-publishtime"><span>发布时间</span></th>
				<th class="admin-th-article-deadline admin-th-deadline"><span>截止时间</span></th>
				<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
			</tr>
		<?php if(empty($competition)): ?><!-- 要和volist的name一样 -->
			<tr align="center">
				<td colspan="6">
					暂无比赛记录
				</td>
			</tr>
		<?php else: ?>
			<?php if(is_array($competition)): $i = 0; $__LIST__ = $competition;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
					<td class="admin-article-select">
						<input id="<?php echo ($v["cid"]); ?>" class="admin-policy-select-btn admin-select-btn" type="checkbox">
					</td>
					<td class="admin-article-id"><?php echo ($i); ?></td>
					<td class="admin-article-title">
						<a href="article.html"><?php echo ($v["name"]); ?></a>
					</td>
					<td class="admin-article-times"><span>第 <?php echo ($v["times"]); ?> 届</span></td>
					<td class="admin-article-publishtime"><span><?php echo ($v["issue_time"]); ?></span></td>
					<td class="admin-article-deadline"><span><?php echo ($v["deadline"]); ?></span></td>
					<td class="admin-article-operation admin-operation">
						<span class="admin-article-modify"><a href="/demo/jyzd/01/Admin/index.php/home/competition/modify?cid=<?php echo ($v["cid"]); ?>">修改</a></span>
						<span class="admin-article-delete"><a onclick="javascript: if(confirm('确定删除？')) return true; return false;" href="/demo/jyzd/01/Admin/index.php/home/competition/deleteOne?cid=<?php echo ($v["cid"]); ?>">删除</a></span>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

			<tr>
				<td colspan="2">
					<div class="admin-article-operation admin-operation">
						<span class="admin-article-delete delete-all" style="right: 185px">批量删除</span>
					</div>
				</td>
			</tr>

		</table>

	</div>
	<!-- 分页 -->
	<div class="pull-right">
		<ul class="pagination">
			<?php if($curPage != 1 ): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/competition/index/1">首页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($curPage-1); ?>">上一页</a></li><?php endif; ?>
			
			<?php if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_9062__=$curPage-2;$__FOR_END_9062__=$curPage+3;for($i=$__FOR_START_9062__;$i < $__FOR_END_9062__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): ?>
				<?php $__FOR_START_22183__=$totalPage-5;$__FOR_END_22183__=$totalPage;for($i=$__FOR_START_22183__;$i < $__FOR_END_22183__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif($totalPage > 5): ?>
				<?php $__FOR_START_30548__=1;$__FOR_END_30548__=6;for($i=$__FOR_START_30548__;$i < $__FOR_END_30548__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php else: ?>
				<?php $__FOR_START_5885__=1;$__FOR_END_5885__=$totalPage;for($i=$__FOR_START_5885__;$i < $__FOR_END_5885__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } endif; ?>
				
			<?php if($curPage < $totalPage-1): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($curPage+1); ?>">下一页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/competition/index/<?php echo ($totalPage-1); ?>">末页</a></li><?php endif; ?>

			<li><a href="">共 <?php echo ($total); ?> 条记录</a></li>
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

<script type="text/javascript">
	var deleteBtn = document.querySelector('.delete-all');
	var idArr;
	deleteBtn.onclick = function() {
		idArr = [];
		var select = document.querySelectorAll('.admin-select-btn');
		select = [].slice.call(select);
		select.forEach(function (elem) {
			console.log(elem);
			console.log(elem.checked);
			if(elem.checked) {
				idArr.push(elem.id);
			}
		})
		// console.log(nidArr);
		$.ajax({
			url: "./discard",
			type: 'POST',
			data: {idArr:idArr},
			dataType: 'json',
			async:false,
			success:function(result) {
				alert(result.msg);
				window.location.reload();
			}
		})
	}
</script>