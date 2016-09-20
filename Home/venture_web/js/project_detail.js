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
		url:  baseUrl + "project/detail.html",
		dataType: "json",
		data: {
			pid: _pid
		}
		}).done(function(result) {
		var data = result.data;
			console.log(data);
		var template = Handlebars.compile($('#project-template').html()); //注册模板
		Handlebars.registerHelper('area',function(){ //helpers返回所属领域
			return typeArr[this.area];
		});
		Handlebars.registerHelper('stage',function(){ //helpers返回需求类型
			return stageArr[this.stage];
		});
		var html = template(data); //封装模板
		$('#projects-info-box').html(html); //插入基础模板中
		if(data.partner) {
			$('#project-members').text(Object.getOwnPropertyNames(data.partner).length);
		} else {
			$('#project-members').text(1);
		}
	
	}).always(function() {
		$('#project-principal').click(function () {
			getPrincipalInfo($(this).attr('rel'));
		})
		$('.owl-carousel').owlCarousel({ //图片轮播
			items: 4,
		    loop:true,
		    margin: 10,
		    autoWidth: true
		});
	});
}

/**
 * 点击发布者弹出对应负责人信息
 * @param  {Number} uid 导师编号uid
 */
function getPrincipalInfo(_uid) {
	$.ajax({
		url:  baseUrl + "user/getOtherInfo.html",
		type: "get",
		data: { uid: _uid}
	}).done(function(result) {
		var data = result.data;
		console.log(data);
		// Handlebars
		var template = Handlebars.compile($('#popup4-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#popup').html(html); //插入基础模板中

		//负责人具体信息弹窗
		layer.open({  
			title: ['项目负责人','font-size:17px; text-align: center'],
		 	type: 1, 
		 	area: '600px',
		 	content: $('#popup') //这里content是一个普通的String
		});
	})
}

function init() {
	getDetail();

}

init();