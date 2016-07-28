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
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- Aricle-publish Start -->
<div class="article-publish-form">
	<form action="/FZU-VentureService/Admin/index.php/home/notice/publish/do" method="post">
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
				<!-- 加载编辑器的容器 -->
			    <script id="_container" name="content" type="text/plain" style="width: 740px; height:250px; margin-left:190px;"> 
<<<<<<< HEAD
			    <div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>大赛官网</h2>
						<a href="http://cy.ncss.org.cn/">http://cy.ncss.org.cn/</a>
					</div>
				</div>
				<div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>大赛介绍</h2>
					</div>
				</div>
				<div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>参赛对象</h2>
					</div>
					<p>以团队为单位报名参赛。允许跨校组建团队。每个团队的参赛成员不少于3人，须为项目的实际成员。参赛团队所报参赛创业项目，须为本团队策划或经营的项目，不可借用他人项目参赛。已获首届中国“互联网+”大学生创新创业大赛金奖和银奖的项目，不再报名参赛。根据参赛项目所处的创业阶段及已获投资情况， 大赛分为创意组、初创组和成长组。具体参赛条件如下：</p>
					<p>1、创意组</p>
					<p>参赛项目具有较好的创意和较为成型的产品原型或服务模式，但尚未完成工商登记注册。参赛申报人须为团队负责人，须为普通高等学校在校生（可为本专科生、研究生，不含在职生）</p>
					<p>2、初创组</p>
					<p>参赛项目工商登记注册未满3年（2013年3月1日后注册），且获机构或个人股权投资不超过1轮次。参赛申报人须为企业法人代表，须为普通高等学校在校生（可为本专科生、研究生，不含在职生），或毕业5年以内的毕业生（2011年6月10日之后毕业）</p>
					<p>3、成长组</p>
					<p>参赛项目工商登记注册3年以上（2013年3月1日前注册）；或工商登记注册未满3年（2013年3月1日后注册），且获机构或个人股权投资2轮次以上（含2轮次）。参赛申报人须为企业法人代表，须为普通高等学校在校生（可为本专科生、研究生，不含在职生），或毕业5年以内的毕业生（2011年6月10日之后毕业）</p>
				</div>
				<div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>参赛项目</h2>
					</div>
					<p>大赛主题：拥抱“互联网+”时代 共筑创新创业梦想</p>
					<p>参赛项目要求能够将移动互联网、云计算、大数据、物联网等新一代信息技术与经济社会各领域紧密结合，培育基于互联网的新产品、新服务、新业态、新模式。发挥互联网在促进产业升级以及信息化和工业化深度融合中的作用，促进制造业、农业、能源、环保等产业转型升级。发挥互联网在社会服务中的作用，创新网络化服务模式，促进互联网与教育、医疗、交通、金融、消费生活等深度融合。参赛项目主要包括以下类型</p>
					<p>1、“互联网+”现代农业，包括农林牧渔等</p>
					<p>2、“互联网+”制造业，包括智能硬件、先进制造、工业自动化、生物医药、节能环保、新材料、军工等</p>
					<p>3、“互联网+”信息技术服务，包括工具软件、社交网络、媒体门户、数字娱乐、企业服务等</p>
					<p>4、“互联网+”商务服务，包括电子商务、消费生活、金融、旅游户外、房产家居、高效物流等</p>
					<p>5、“互联网+”公共服务，包括教育文化、医疗健康、交通、人力资源服务等</p>
					<p>6、“互联网+”公益创业，以社会价值为导向的非盈利性创业</p>
				</div>
				<div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>大赛日程</h2>
					</div>
					<p>参赛报名：2016年3-5月</p>
					<p>初赛复赛：2016年6-9月</p>
					<p>全国总决赛：2016年10月中下旬</p>
				</div>
				<div class="game-introduction game-detail">
					<div class="game-introduction-top">
						<span></span>
						<h2>比赛赛制</h2>
					</div>
					<p>1、大赛采用校级初赛、省级复赛、全国总决赛三级赛制。校级初赛由各高校负责组织，省级复赛由各省（区、市）负责组织，全国总决赛由各省（区、市）按照大赛组委会确定的配额择优遴选推荐项目。大赛组委会将综合考虑各省（区、市）报名团队数、参赛高校数和创新创业教育工作情况等因素分配名额。每所高校入选全国总决赛团队总数不超过4个</p>
					<p>2、全国共产生600个项目入围全国总决赛</p>
					<p>3、通过网上评审，产生120个项目进入全国总决赛现场比赛</p>
				</div>
=======
>>>>>>> origin/master
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="/FZU-VentureService/Admin/Public/ueditor/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="/FZU-VentureService/Admin/Public/ueditor/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
		</div>
		<div class="article-publish-btn">
			<button type="submit" name="sub" class="save-close">保存后自动关闭</button>
			<button class="save-publish">保存并继续发表</button>
			<button class="publish-close"><a href="javascript :;" onClick="javascript :history.back(-1);">关闭</a></button>
		</div>
	</form>
</div>
<script type="text/javascript">
	        var ue = UE.getEditor('_container');
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