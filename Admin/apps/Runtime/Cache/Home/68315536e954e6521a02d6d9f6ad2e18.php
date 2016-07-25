<?php if (!defined('THINK_PATH')) exit();?>
			<!-- 用户管理 -->
			<div class="user-box admin-users-management pull-right">
				<div class="admin-top">
					<ul class="admin-mangement-ul clearfix" id="admin-users">
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
						<tr>
							<td class="admin-teacher-select">
								<input class="admin-teacher-select-btn" type="checkbox">
							</td>
							<td class="admin-teacher-id">1</td>
							<td class="admin-teacher-username">
								<a href="">oipqeu</a>
							</td>
							<td class="admin-teacher-name"><a href="">林渊腾</a></td>
							<td class="admin-teacher-phone"><span>15648973275</span></td>
							<td class="admin-teacher-email"><span>55647854@qq.com</span></td>
							<td class="admin-teacher-operation admin-operation">
								<span class="admin-teacher-pass admin-pass">通过</span>
								<span class="admin-teacher-refuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
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
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investor-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><a href="">宋一博</a></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<span class="admin-investor-pass admin-pass">通过</span>
								<span class="admin-investor-refsuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
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
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investors-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><a href="">balal</a></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
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
						<tr>
							<td class="admin-teacher-select">
								<input class="admin-teachers-select-btn" type="checkbox">
							</td>
							<td class="admin-teacher-id">1</td>
							<td class="admin-teacher-username">
								<a href="">joipouqew</a>
							</td>
							<td class="admin-teacher-name"><span>123</span></td>
							<td class="admin-teacher-phone"><span>18476931485</span></td>
							<td class="admin-teacher-email"><span>jasduiu@163.com</span></td>
							<td class="admin-teacher-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
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
						<tr>
							<td class="admin-investor-select">
								<input class="admin-investors-select-btn" type="checkbox">
							</td>
							<td class="admin-investor-id">1</td>
							<td class="admin-investor-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-investor-name"><span>123</span></td>
							<td class="admin-investor-phone"><span>18476931485</span></td>
							<td class="admin-investor-email"><span>jasduiu@163.com</span></td>
							<td class="admin-investor-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
						
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
						<tr>
							<td class="admin-administrator-select">
								<input class="admin-administrators-select-btn" type="checkbox">
							</td>
							<td class="admin-administrator-id">1</td>
							<td class="admin-administrator-username">
								<span>joipouqew</span>
							</td>
							<td class="admin-administrator-name"><span>123</span></td>
							<td class="admin-administrator-phone"><span>18476931485</span></td>
							<td class="admin-administrator-email"><span>jasduiu@163.com</span></td>
							<td class="admin-administrator-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>
							</td>
						</tr>
					</table>
				</div>
			</div>