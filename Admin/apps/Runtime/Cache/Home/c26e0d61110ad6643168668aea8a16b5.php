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
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Projects') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Fields') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Documents') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competitions') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 资讯管理 -->
			<div class="user-box  admin-info-management sub-management pull-right">
				<div class="admin-top">
					<ul class="admin-management-ul clearfix" id="admin-articles">
						<li class="pull-left now-li">新闻资讯</li>
						<li class="pull-left">通知公告</li>
						<li class="pull-left">最新政策</li>
					</ul>
					<a class="admin-publish-article" href="javascript:void(0)" onclick="publish()">发布文章</a>
				</div>
				<div class="admin-new-table admin-info-table admin-table block">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-news-select-btn" type="checkbox">
							</th>
							<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
							<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
							<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
							<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
							<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
						</tr>

						<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td class="admin-article-select">
									<input class="admin-news-select-btn" type="checkbox">
								</td>
								<td class="admin-article-id"><?php echo ($i); ?></td>
								<td class="admin-article-title">
									<a href="article.html"><?php echo ($v["theme"]); ?></a>
								</td>
								<td class="admin-article-pageview"><span><?php echo ($v["hits"]); ?></span></td>
								<td class="admin-article-publisher"><span><?php echo ($v["name"]["name"]); ?></span></td>
								<td class="admin-article-updatetime"><span><?php echo ($v["date"]); ?></span></td>
								<td class="admin-article-operation admin-operation">
									<span class="admin-article-modify">修改</span>
									
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td colspan="6"></td>
							<td>
								<div class="admin-article-operation admin-operation">
									<span class="admin-article-delete">删除</span>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="admin-notice-table admin-info-table admin-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-notice-select-btn" type="checkbox">
							</th>
							<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
							<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
							<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
							<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
							<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
						</tr>

						<?php if(is_array($notices)): $i = 0; $__LIST__ = $notices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td class="admin-article-select">
									<input class="admin-notice-select-btn" type="checkbox">
								</td>
								<td class="admin-article-id"><?php echo ($i); ?></td>
								<td class="admin-article-title">
									<a href="article.html"><?php echo ($v["theme"]); ?></a>
								</td>
								<td class="admin-article-pageview"><span><?php echo ($v["hits"]); ?></span></td>
								<td class="admin-article-publisher"><span><?php echo ($v["name"]["name"]); ?></span></td>
								<td class="admin-article-updatetime"><span><?php echo ($v["date"]); ?></span></td>
								<td class="admin-article-operation admin-operation">
									<span class="admin-article-modify">修改</span>
									
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>

						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="admin-article-operation admin-operation">
									<span class="admin-article-delete">删除</span>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="admin-policy-table admin-info-table admin-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-policy-select-btn" type="checkbox">
							</th>
							<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
							<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
							<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
							<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
							<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
						</tr>

						<?php if(is_array($policy)): $i = 0; $__LIST__ = $policy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td class="admin-article-select">
									<input class="admin-policy-select-btn" type="checkbox">
								</td>
								<td class="admin-article-id"><?php echo ($i); ?></td>
								<td class="admin-article-title">
									<a href="article.html"><?php echo ($v["theme"]); ?></a>
								</td>
								<td class="admin-article-pageview"><span><?php echo ($v["hits"]); ?></span></td>
								<td class="admin-article-publisher"><span><?php echo ($v["name"]["name"]); ?></span></td>
								<td class="admin-article-updatetime"><span><?php echo ($v["date"]); ?></span></td>
								<td class="admin-article-operation admin-operation">
									<span class="admin-article-modify">修改</span>
									
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>

						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="admin-article-operation admin-operation">
									<span class="admin-article-delete">删除</span>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			<div class="admin-popup">
				<div class="popup-delete">
					<p>确认删除？</p>
					<div class="popup-select clearfix">
						<span class="yes pull-left"><a href="/FZU-VentureService/Admin/index.php/home/admin/delete">确认</a></span>
						<span class="no pull-right">取消</span></div>
				</div>

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