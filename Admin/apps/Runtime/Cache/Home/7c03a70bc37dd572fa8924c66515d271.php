<?php if (!defined('THINK_PATH')) exit();?>
			<!-- 咨询管理 -->
			<div class="user-box block admin-info-management pull-right">
				<div class="admin-top">
					<a class="admin-publish-article" href="article_publish.html">发布文章</a>
				</div>
				<div class="admin-info-table admin-table">
					<table>
							<tr>
								<th class="admin-th-select">
									<input class="admin-article-select-btn" type="checkbox"> 全选
								</th>
								<th class="admin-th-article-id admin-th-id"><span>ID</span></th>
								<th class="admin-th-article-title admin-th-title"><span>标题</span></th>
								<th class="admin-th-article-pageview admin-th-pageview"><span>点击量</span></th>
								<th class="admin-th-article-publisher admin-th-publisher"><span>发布人</span></th>
								<th class="admin-th-article-updatetime admin-th-updatetime"><span>更新时间</span></th>
								<th class="admin-th-article-operation admin-th-operation"><span>管理操作</span></th>
							</tr>
						<tr>
							<td class="admin-article-select">
								<input class="admin-article-select-btn" type="checkbox">
							</td>
							<td class="admin-article-id">1</td>
							<td class="admin-article-title">
								<a href="article.html">福州大学第二十九届学生文化艺术节圆满落幕</a>
							</td>
							<td class="admin-article-pageview"><span>123</span></td>
							<td class="admin-article-publisher"><span>admin-1</span></td>
							<td class="admin-article-updatetime"><span>2016-07-23</span></td>
							<td class="admin-article-operation admin-operation">
								<span class="admin-article-modify">修改</span>
								<span class="admin-article-delete">删除</span>
							</td>
						</tr>
						<tr>
							<td class="admin-article-select">
								<input class="admin-article-select-btn" type="checkbox">
							</td>
							<td class="admin-article-id">1</td>
							<td class="admin-article-title">
								<a href="article.html">福州大学第十七届青年教师“最佳一节课”竞赛圆满落幕</a>
							</td>
							<td class="admin-article-pageview"><span>123</span></td>
							<td class="admin-article-publisher"><span>admin-1</span></td>
							<td class="admin-article-updatetime"><span>2016-07-23</span></td>
							<td class="admin-article-operation admin-operation">
								<span class="admin-article-modify">修改</span>
								<span class="admin-article-delete">删除</span>
							</td>
						</tr>
						<tr>
							<td class="admin-article-select">
								<input class="admin-article-select-btn" type="checkbox">
							</td>
							<td class="admin-article-id">1</td>
							<td class="admin-article-title">
								<a href="article.html">福大学子写三行情诗致父母，让爱回家传递孝悌之情</a>
							</td>
							<td class="admin-article-pageview"><span>123</span></td>
							<td class="admin-article-publisher"><span>admin-1</span></td>
							<td class="admin-article-updatetime"><span>2016-07-23</span></td>
							<td class="admin-article-operation admin-operation">
								<span class="admin-article-modify">修改</span>
								<span class="admin-article-delete">删除</span>
							</td>
						</tr>
					 	<tr>
							<td class="admin-article-select">
								<input class="admin-article-select-btn" type="checkbox">
							</td>
							<td class="admin-article-id">1</td>
							<td class="admin-article-title">
								<a href="article.html">福州大学2016届毕业生班级校友联络员和学院年级校友召集人聘任大会举行</a>
							</td>
							<td class="admin-article-pageview"><span>123</span></td>
							<td class="admin-article-publisher"><span>admin-1</span></td>
							<td class="admin-article-updatetime"><span>2016-07-23</span></td>
							<td class="admin-article-operation admin-operation">
								<span class="admin-article-modify">修改</span>
								<span class="admin-article-delete">删除</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			<!-- 用户管理 -->
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

			<!-- 项目管理 -->
			<div class="user-box admin-projects-management pull-right">
				<div class="admin-top">
					<ul class="admin-mangement-ul clearfix" id="admin-projects">
						<li class="pull-left now-li">项目审核</li>
						<li class="pull-left">项目信息</li>
					</ul>
				</div>
				<!-- 项目审核 -->
				<div class="admin-projects-table admin-check-projects-table admin-table block" id="projects-check-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-project-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-project-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-project-name admin-th-name"><span>项目名</span></th>
							<th class="admin-th-project-username admin-th-username"><span>负责人</span></th>
							<th class="admin-th-project-time admin-th-time"><span>申请时间</span></th>
							<th class="admin-th-project-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-project-select">
								<input class="admin-project-select-btn" type="checkbox">
							</td>
							<td class="admin-project-id">1</td>
							<td class="admin-project-name">
								<a href="">互联网技术威客兼职预约平台</a>
							</td>
							<td class="admin-project-username"><span>林渊腾</span></td>
							<td class="admin-project-time"><span>2016-07-23</span></td>
							<td class="admin-project-operation admin-operation">
								<span class="admin-project-pass admin-pass">通过</span>
								<span class="admin-project-refuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
					</table>
				</div>
				<!-- 项目信息 -->
				<div class="admin-projects-table admin-check-projects-table admin-table" id="projects-check-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-project-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-project-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-project-name admin-th-name"><span>项目名</span></th>
							<th class="admin-th-project-username admin-th-username"><span>负责人</span></th>
							<th class="admin-th-project-time admin-th-time"><span>申请时间</span></th>
							<th class="admin-th-project-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-project-select">
								<input class="admin-project-select-btn" type="checkbox">
							</td>
							<td class="admin-project-id">1</td>
							<td class="admin-project-name">
								<a href="">互联网技术威客兼职预约平台</a>
							</td>
							<td class="admin-project-username"><span>林渊腾</span></td>
							<td class="admin-project-time"><span>2016-07-23 21:00</span></td>
							<td class="admin-project-operation admin-operation">
								<a href=""><span class="admin-view-info">查看信息</span></a>	
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<!-- 入驻申请 -->
			<div class="user-box admin-bases-management pull-right">
				<div class="admin-bases-table admin-check-bases-table admin-table block" id="bases-check-table">
					<table>
						<tr>
							<th class="admin-th-select">
								<input class="admin-base-select-btn" type="checkbox"> 全选
							</th>
							<th class="admin-th-base-id admin-th-id"><span>ID</span></th>
							<th class="admin-th-base-name admin-th-name"><span>基地名称</span></th>
							<th class="admin-th-base-username admin-th-username"><span>负责人</span></th>
							<th class="admin-th-base-time admin-th-time"><span>申请时间</span></th>
							<th class="admin-th-base-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-base-select">
								<input class="admin-base-select-btn" type="checkbox">
							</td>
							<td class="admin-base-id">1</td>
							<td class="admin-base-name">
								<a href="">balbal创业基地</a>
							</td>
							<td class="admin-base-username"><span>林渊腾</span></td>
							<td class="admin-base-time"><span>2016-07-23</span></td>
							<td class="admin-base-operation admin-operation">
								<span class="admin-base-pass admin-pass">通过</span>
								<span class="admin-base-refuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<!-- 培训管理 -->
			<div class="user-box admin-classes-management pull-right">
				<div class="admin-top">
						<a class="admin-publish-classes" href="">发布培训课</a>
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
						<tr>
							<td class="admin-student-select">
								<input class="admin-students-select-btn" type="checkbox">
							</td>
							<td class="admin-student-id">1</td>
							<td class="admin-student-username">
								<a href="">joipouqew</a>
							</td>
							<td class="admin-student-name"><a href="">qewrqew</a></td>
							<td class="admin-student-phone"><span>18476931485</span></td>
							<td class="admin-student-email"><span>jasduiu@163.com</span></td>
							<td class="admin-student-operation admin-operation">
								<span class="admin-project-pass admin-pass">通过</span>
								<span class="admin-project-refuse admin-refuse">拒绝</span>
							</td>
						</tr>
						
					</table>
				</div>
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
							<th class="admin-th-textbook-management admin-th-management"><span>管理操作</span></th>
						</tr>
						<tr>
							<td class="admin-textbook-select">
								<input class="admin-textbook-select-btn" type="checkbox">
							</td>
							<td class="admin-textbook-id">1</td>
							<td class="admin-textbook-name">
								<a href="">Excel培训</a>
							</td>
							<td class="admin-textbook-operation admin-operation">
								<span class="admin-article-modify">修改</span>
								<span class="admin-article-delete">删除</span>
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<!-- 比赛管理 -->
			<div class="user-box admin-games-management pull-right">
				<div class="admin-top">
					<a class="admin-publish-game" href="">发布比赛通知</a>
				</div>
			</div>


			<div class="admin-popup">
				<div class="popup-delete">
					<p>确认删除？</p>
					<div class="popup-select clearfix">
						<span class="yes pull-left">确认</span>
						<span class="no pull-right">取消</span></div>
				</div>
				<div class="popup-refuse">
					<p>请填写拒绝理由</p>
					<p class="refuse-hint">拒绝后将通过短信通知</p>
					<textarea></textarea>
					<div class="popup-select clearfix">
						<span class="yes pull-left">确认</span>
						<span class="no pull-right">取消</span></div>
				</div>
			</div>