<?php if (!defined('THINK_PATH')) exit();?><!-- 用户管理 -->
<div class="user-box admin-users-management pull-right">
	<div class="admin-top">
		<ul class="admin-mangement-ul clearfix" id="admin-users">
			<li class="pull-left now-li">教师审核</li>
			<li class="pull-left">教师信息</li>
			<li class="pull-left">投资人审核</li>
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
						<span class="admin-teacher-pass admin-pass"><a href="/demo/jyzd/Admin/index.php/home/admin/pass?id=<?php echo ($vo["uid"]); ?>">通过</a></span>
						<span class="admin-teacher-refuse admin-refuse">拒绝</span>
					</td>
				</tr><?php endif; endforeach; endif; else: echo "暂无要审核的教师信息" ;endif; ?>
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
						<a href=""><span class="admin-view-info">查看信息</span></a>
					</td>
				</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
						<span class="admin-teacher-pass admin-pass"><a href="/demo/jyzd/Admin/index.php/home/admin/pass?id=<?php echo ($vo["uid"]); ?>">通过</a></span>
						<span class="admin-teacher-refuse admin-refuse">拒绝</span>
					</td>
				</tr><?php endif; endforeach; endif; else: echo "暂无待审核的投资人信息" ;endif; ?>

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
					<td class="admin-teacher-id"><?php echo ($i+1); ?></td>
					<td class="admin-teacher-username">
						<a href=""><?php echo ($v["username"]); ?></a>
					</td>
					<td class="admin-teacher-name"><span><?php echo ($v["name"]); ?></span></td>
					<td class="admin-teacher-phone"><span><?php echo ($v["tel"]); ?></span></td>
					<td class="admin-teacher-email"><span><?php echo ($v["email"]); ?></span></td>
					<td class="admin-teacher-operation admin-operation">
						<a href=""><span class="admin-view-info">查看信息</span></a>
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
						<a href=""><span class="admin-view-info">查看信息</span></a>
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
						<a href=""><span class="admin-view-info">查看信息</span></a>
					</td>
				</tr><?php endforeach; endif; else: echo "暂无普通管理员信息" ;endif; ?>
	</table>
</div>	
</div>