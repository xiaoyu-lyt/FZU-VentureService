var _area, _form , _stage, _group, _type;
var selectKeys = {
	area: {
		num: 0
	},
	form: {
		num: 0
	},
	stage: {
		num: 0
	},
	group: {
		num: 0
	},
	type: {
		num: 0
	}
};

getData(1); //初始化项目列表

/**
 * 渲染项目列表
 * @param  {number} _page 当前页码
 */
function getData(_page, _area, _form, _stage, _group) {
	var _size = 5, pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/project/list.html",
		data: {
			size: _size,
			page: _page, //当前页码
			area: _area, //所属领域
			form_company: _form, //公司形式
			stage: _stage, //融资阶段
			product_type: _type, //产品类别
			group: _group //面向群体
 		},
	}).done(function(result) {
		var data = result.data;
		pages = data.pages;
		console.log(data)
		var template = Handlebars.compile($('#project-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#projects-box').html(html); //插入基础模板中
	}).always(function(){
		getPageBar(_page, pages);
	})
}

/**
 * 获取分页条
 * @param  {string} typeName 类别名称：news/notice/policy
 * @param  {string} pages    当前类别总页数
 */
function getPageBar(pageNum,pages) {
	var pageStr = '',
		oNum = 0, //当前li序列号
		show = 3, //分页条显示页的个数
		middle = Math.floor(show/2),
		pagination;
	if(pages === 1) return;
	if(pageNum > 1) { //添加首页和前页
		oNum = pageNum + 1;
		pageStr += "<li><a href='javascoript:void(0)' rel='1'>首页</a></li><li><a href='javascoript:void(0)'rel=" + (pageNum-1) + ">&laquo;</a></li>";
	} if(pages < show) {
		for(var i=1; i <= pages; i++) {
			pageStr += "<li><a href='javascoript:void(0)' rel='" + i + "'>" + i + "</a></li>";
		}
	} else if(pageNum <= middle+1) { //分页头部切换
		for(var i=1; i <= show; i++) {
			pageStr += "<li><a href='javascoript:void(0)' rel='" + i + "'>" + i + "</a></li>";
		}
	} else if((pageNum > middle+1) && (pageNum <= pages - middle)) { //分页中部切换
		for(var i=1,j=pageNum-middle; i <= show; i++,j++) {
			pageStr += "<li><a href='javascoript:void(0)' rel='" + j + "'>" + j + "</a></li>";
		}
		oNum = middle+2;
	} else if(pageNum > pages - middle) { //分页尾部切换
		for(var i=1,j=pages-show+1; i <= show; i++,j++) {
			pageStr += "<li><a href='javascoript:void(0)' rel='" + j + "'>" + j + "</a></li>";
		}
		console.log(pageNum);
		oNum = show-(pages-pageNum)+1;
	} 
	if(pageNum != pages) { //当前页不为末页，添加后页和末页
		pageStr += "<li><a href='javascoript:void(0)' rel="+ (pageNum+1) +">&raquo;</a></li>";
		pageStr += "<li><a href='javascoript:void(0)' rel="+ pages + ">末页</a></li>";
	}
		// console.log('pageNum ' + pageNum +  ' oNum ' + oNum);
	$('#project-pagination').html(pageStr);
	var oli = document.querySelector('#project-pagination').querySelectorAll('li');
	$(oli[oNum]).addClass('active');
}

// 页码切换
$(function() {
	var pagination = document.querySelector('#project-pagination');
	pagination.addEventListener('click', function(event) {
		pageNum = parseInt(event.target.rel);
		if(pageNum) {
			getData(pageNum);
		}
	})
});

/**
 * 搜索项目
 */
function SelectProject() {
	var box = document.querySelector('.projects-selec-top');
	box.addEventListener('click',function(event) {
		var e = event.target || event.srcElement;
		if(e.nodeName.toUpperCase()==='LI'){
			$(e).parent().find('.now').removeClass('now');
			$(e).addClass('now');
			var name = e.id.slice(0,-1); // 所属领域、公司形式、融资阶段、产品类别、面向群体
			var num = e.id.slice(-1); 
			num -= 1;
			if(num == -1) {
				num = ''
			}
			console.log(num)
			selectKeys[name].num = num;
			getData(1, selectKeys.area.num, selectKeys.form.num, selectKeys.stage.num,selectKeys.group.num)
		}
	});
}

SelectProject();

/**
 * 关键词搜索
 * @return {[type]} [description]
 */
function searchProject() {
	var btn = document.querySelector('.projects-search-btn');
	var pages;
	$(btn).click(function () {
		text = $('#search-text').val();
		if(text!='') {
			$.ajax({
					type: "get",
					url: "../../API/index.php/Home/project/wordSelect",
					data: {	word: text }
			}).done(function(result) {
					var data = result.data,
							pages = data.pages;
					console.log(data);
					var template = Handlebars.compile($('#project-template').html()); //注册模板
					var html = template(data); //封装模板
					$('#projects-box').html(html); //插入基础模板中
			}).always(function(){
				getPageBar(1, pages);
				});
		}
	});
}

searchProject();
