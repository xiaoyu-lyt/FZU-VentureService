var pageNum = 1;
getData(pageNum);

/**
 * 渲染项目列表
 * @param  {number} _page 当前页码
 */
function getData(_page) {
	var _size = 1, pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/project/list.html",
		data: {
			size: _size,
			page: _page //当前页码
			// area: 1, //所属领域
			// type: 1, //产品类别
 		},
	}).done(function(result) {
		var data = result.data;
		pages = data.pages;
		// console.log(data);
		var template = Handlebars.compile($('#project-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#projects-box').html(html); //插入基础模板中
	}).always(function(){
		getPageBar(pages);
	})
}

// 获取分页条
function getPageBar(pages) {
	var pageStr = '';
	// console.log('pageNum ' + pageNum + ' pages ' + pages);
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
	$('#project-pagination').html(pageStr);
	var oli = document.querySelector('#project-pagination').querySelectorAll('li');
	$(oli[pageNum]).addClass('active');
}


// 页码切换
$(function() {
		var pagination = document.querySelector('#project-pagination');
		pagination.addEventListener('click', function(event) {
			pageNum = event.target.rel;
			if(pageNum) {
				getData(pageNum);
			}
		})
});

