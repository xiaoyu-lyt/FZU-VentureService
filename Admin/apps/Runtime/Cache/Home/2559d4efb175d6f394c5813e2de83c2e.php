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





		<!-- 在下面的div添加 -->
	<div class="user-box block">
		<form class="publish-form base-publish form-horizontal" enctype="multipart/form-data" action="/FZU-VentureService/Admin/index.php/home/field/publish/do" method="post">
			<h2 align="center" style="margin: 0 0 20px 0; color: #61a3e1;">创业基地发布</h2>
		 	<table class="publish-table">
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地名称：</h4></td>
					<td><input name="name" style="width: 280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>法定代表人：</h4></td>
					<td><input name="chief" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地地址：</h4></td>
					<td><input name="addr" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地面积：</h4></td>
					<td><input name="area" style="width:280px;" class="title-input form-control" type="text">
					</td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>产权单位：</h4></td>
					<td><input name="owner" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>自有/合办：</h4></td>
					<td>
						<label for="own" class="radio-inline">
						<input id="own" name="own_or_co"  type="radio" value="1">自有
						</label>
						<label for="co" class="radio-inline">
						<input id="co" name="own_or_co"  type="radio" value="2">合办
						</label>

					</td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地投入：</h4></td>
					<td><input name="investment_field" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>其中学校投入：</h4></td>
					<td><input name="investment_class" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>其他投入：</h4></td>
					<td><input name="investment_other" style="width:280px;" class="title-input form-control" type="text"></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地简介：</h4></td>
					<td>
						<textarea class="form-control" style="width: 280px; height: 100px;" name="synopsis" id="" cols="30" rows="10"></textarea>
						<!-- <input name="synopsis" style="width:280px;" class="title-input form-control" type="text"> -->
					</td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地详情：</h4></td>
					<!-- 下面插入富文本 -->
					<td><script id="_container" name="detail" type="text/plain" style="width: 100%; height:300px;">
						（这里填写基地详情内容）
					</script>
					</td>
				</tr>

				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地照片：</h4></td>
					<td><input name="pic" type="file" ></td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>开办时间：</h4></td>
					<td>
						<!-- 日期插件 -->
						<div class="input-group date form_date col-md-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="run_time" data-link-format="yyyy-mm-dd">
		                    <input  class="form-control" size="16" type="text" placeholder="点击选择日期" value="" readonly>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
		                <input type="hidden" id="run_time" name="run_time" value="" ><br/>
		                <!-- 日期插件结束 -->
					</td>
				</tr>
				<tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>是否空闲：</h4></td>
					<td>
						<label for="leisure" class="radio-inline">
						<input id="leisure" name="status"  type="radio" value="1">是
						</label>
						<label for="occupies" class="radio-inline">
						<input id="occupies" name="status"  type="radio" value="0">否
						</label>

					</td>
				</tr>
				<!-- <tr>
					<td colspan="2"><h2 align="center" style="margin: 0 0 20px 0; color: #61a3e1;">公共场地详情</h2></td>
					
				</tr> -->
				<!-- <tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>公告场地名称：</h4></td>
					<td><input name="public_name" style="width: 280px;" class="title-input form-control" type="text"></td>
				</tr> -->
				<!-- <tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>公告场地说明：</h4></td>
					<td>
						<textarea class="form-control" style="width: 280px; height: 100px;" name="public_synopsis" id="" cols="30" rows="10"></textarea>
						<input name="synopsis" style="width:280px;" class="title-input form-control" type="text">
					</td>
				</tr> -->
				<!-- <tr>
					<td><h4 class="line-title text-right"><span class="star">*</span>基地照片：</h4></td>
					<td><input name="public_pic" type="file" ></td>
				</tr> -->
	
					
		 	</table>
		 		
		 		<span id="add-public-base" class="add-public-base text-center">添加公共场地</span>
				<button class="btn btn-publish">发布</button>
		</form>
		<div class="view-btn-group">
	 		<a class="btn-view" href="javascript:history.back(-1)" >返回上一级</a>
	 	</div>
	</div>


<script type="text/javascript" src="/FZU-VentureService/Admin/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/FZU-VentureService/Admin/Public/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
	        var ue = UE.getEditor('_container');
</script>
	<script>
		var index = 1;
		$('#add-public-base').click(function () {
			var line = '<tr><td><h4 class="line-title text-right"><span class="star">*</span>公共场地名称：</h4></td><td><input name="public['+ index +'][name]" style="width: 280px;" class="title-input form-control" type="text"></td></tr>';
			line += '<tr><td><h4 class="line-title text-right"><span class="star">*</span>公共场地说明：</h4></td><td><textarea class="form-control" style="width: 280px; height: 100px;" name="public['+ index +'][synopsis]" id="" cols="30" rows="10"></textarea></tr>';
			line += '<tr><td><h4 class="line-title text-right"><span class="star">*</span>公共场地照片：</h4></td><td><input name="pic_'+index+'" type="file" ></td></tr>'
			console.log(index);
			$('.publish-table').append(line);
			index++;
		})
	</script>
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