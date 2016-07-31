var btn = document.querySelector('#condition-search-btn'),
	input = document.querySelector('#condition-search');

getProjectsList();
getTeacherList();
getInvestorsList();
/**
 * 按条件寻找创业项目
 * @param  {dom事件} event) {	keycode    Enter13
 * @return {none}        绑定btn
 */
$(input).keyup(function(event) {
	keycode = event.which || event.keyCode;
	if(keycode == 13) {
		$(btn).trigger('click');
	} 
});

btn.onclick = function() {
	var condition = $(input).val();
	console.log(condition);
	if(condition) {
		$.ajax({
			type: "get",
			url: "../../API/index.php/home/Partner/search.html",
			dataType: "json",
			data: {
				condition: condition
			},
			error: function (){
				console.log("error!");
			},
			success: function(result) {
				var data = result.data;
				// console.log(data);
				
				var template = Handlebars.compile($('#projects-template').html()); //注册模板
				var html = template(data); //封装模板
				$('#user-projects-box').html(html); //插入基础模板中

				// getPageBar();
			}
		});
	}
}

/**
 * 渲染项目列表	
 * @param  {json}  success [项目列表json]
 */
function getProjectsList() {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/Partner/seekList.html",
		dataType: "json",
		error: function (){
			console.log("error!");
		},
		success: function(result) {
			var data = result.data;
			console.log(data);
			var pages = data.pages;
			var template = Handlebars.compile($('#projects-template').html()); //注册模板
			var html = template(data); //封装模板
			$('#user-projects-box').html(html); //插入基础模板中
			getPageBar('partners',1, pages);
		}
	}) 
}

/**
 * 渲染导师列表	
 * @param  {json}  success [导师列表json]
 */
function getTeacherList() {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/Partner/tutorList.html",
		dataType: "json",
		error: function (){
			console.log("error!");
		},
		success: function(result) {
			var data = result.data;
			console.log(data);
			var pages = data.pages;
			var template = Handlebars.compile($('#teachers-template').html()); //注册模板
			var html = template(data); //封装模板
			$('#teachers-box').html(html); //插入基础模板中

			getPageBar('teachers',1, pages);
		}
	}) 
}

/**
 * 渲染投资人列表	
 * @param  {json}  success [投资人列表json]
 */
function getInvestorsList() {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/Partner/investorList.html",
		dataType: "json",
		error: function (){
			console.log("error!");
		},
		success: function(result) {
			var data = result.data;
			// console.log(data);
			var pages = data.pages;
			var template = Handlebars.compile($('#investors-template').html()); //注册模板
			var html = template(data); //封装模板
			$('#investors-box').html(html); //插入基础模板中

			getPageBar('investors',1, pages);
		}
	}) 
}

/**
 * 渲染分页条
 * @param  {string} typeName 类别名称：partners-团队成员、teachers-创业导师、investors-投资人
 * @param  {number} pages    对应总页数
 */
function getPageBar(typeName, pageNum, pages) {
	var pageStr = '',
		pagination;
	if(pageNum == 1) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&laquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) - 1) +">&laquo;</a></li>";
	}
	for(var i=1; i <= pages; i++) {
		pageStr += "<li><a href='javascoript:void(0)' rel='" + i + "'>" + i + "</a></li>"
	}
	if(pageNum == pages) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&raquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) + 1) +">&raquo;</a></li>";
	}
	var pagination = '#' + typeName + '-pagination';
	$(pagination).html(pageStr);
	var oli = document.querySelector(pagination).querySelectorAll('li');
	$(oli[pageNum]).addClass('active');
}

// 页码切换
$(function() {
	var paginavs = document.querySelectorAll('.pagination');
	$(paginavs).each(function(index, elem) {
		var type = elem.id.split('-')[0];
		elem.addEventListener('click', function(event) {
			var curType = types[type].num,
				pageNum = event.target.rel;
			types[type].count = pageNum;
			// console.log(pageNum);
			if(pageNum) {
				getData(curType, pageNum);
			}
		})
	})
})
