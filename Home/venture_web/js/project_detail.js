var _pid = window.location.search;
_pid = _pid.replace(/[^0-9]+/, ""); //项目pid
var typeArr = ['文化创业类','科技创业类','创业苗圃','互联网+现代农业','互联网+制造业','互联网+信息技术服务','互联网+商务服务','互联网+公共服务','互联网+公益创业']; //项目所属领域
var stageArr = ['未融资','天使轮','A轮','B轮','C轮','E轮及以后']; //融资阶段


/**
 * 获取项目详细信息
 */
function getDetail() {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/project/detail.html",
		dataType: "json",
		data: {
			pid: _pid
		}
		}).done(function(result) {
		var data = result.data;
			console.log(data);
		var template = Handlebars.compile($('#project-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#projects-info-box').html(html); //插入基础模板中
		$('#project-area').text(typeArr[data.area]);
		$('#next-stage').text(stageArr[data.next_stage]);
		$('#project-members').text(Object.getOwnPropertyNames(data.partner).length);
	}).always(function() {
		$('.owl-carousel').owlCarousel({ //图片轮播
			items: 4,
		    loop:true,
		    autoWidth:true
		});
	});
}


function init() {
	getDetail();

}

init();