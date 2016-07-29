$.ajax({
	type: "get",
	url: "../../API/index.php/home/project/detail.html",
	dataType: "json",
	data: {
		pid: 1
	},
	error: function() {
		console.log("error!");
	},
	success: function(result) {
		var	dataArr = result.data;
		console.log(result);
		// $('.article-publish-time span').innerHTML  = info.date;
		$('#project-name').text(dataArr.name); //项目名称
		$('#project-area').text(dataArr.area); //所属领域
		$('#project-time').text(dataArr.date) //创建时间
		$('#project-members').text(dataArr.members.length); //团队人数
		$('#project-principal').text(dataArr.members[0].name); //负责人
		$('#project-brief').html(dataArr.); //项目简介
		$('#project-bright').html(dataArr.); //项目亮点
		$('project-advantage').html(dataArr.); //竞争优势
		$('project-stage').html(dataArr.); //项目阶段
		$('project-invest').html(dataArr.); //项目总投资
		$('project-need').html(dataArr.); //资金需求
		$('project-partner').html(dataArr.); //寻找合伙人
	}
}) 