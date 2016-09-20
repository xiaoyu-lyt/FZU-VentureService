var typeArr = ['技术','融资','运营','市场']; //寻找队员需求类型
var has = ['否','是'];
var btn = document.querySelector('#condition-search-btn'),
	input = document.querySelector('#condition-search');

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
					url:  baseUrl + "project/wordSelect",
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

$(btn).click(function() {
	var text = $(input).val();
	if(text!='') {
		$.ajax({
			type: "get",
			url:  baseUrl + "Partner/search.html",
			data: { condition: text },
		}).done(function (result) {
				var data = result.data,
						pages = data.pages;
				console.log(data);
				Handlebars.registerHelper('type',function(){ //helpers返回需求类型
				return typeArr[this.find_type];
				});
				var template = Handlebars.compile($('#partner-template').html()); //注册模板
				var html = template(data); //封装模板
				$('#user-partner-box').html(html); //插入基础模板中
		}).always(function () {
			addPartnerPopup();
		})
	}
});

/**
 * 渲染寻找队员列表	
 */
function getPartnerList(_page) {
	var _size = 5;
	$.ajax({
		type: "get",
		url:  baseUrl + "Partner/seekList.html",
		data: {
			size: _size,
			page: _page
		}
	}).done(function(result) {
		var data = result.data;
		console.log(data);
		var pages = data.pages;
		Handlebars.registerHelper('type',function(){ //helpers返回需求类型
			return typeArr[this.find_type];
		});
		var template = Handlebars.compile($('#partner-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#user-partner-box').html(html); //插入基础模板中
		
		getPageBar('partner',_page, pages); //获取分页条
	}).always(function() {
		addPartnerPopup();
	});
}

/**
 * 点击寻找队员列表弹出对应寻找记录信息
 * @param  {Number} id 寻找记录编号sid
 */
function getPartnerInfo(_sid) {
	$.ajax({
		url:  baseUrl + "Partner/seekDetail.html",
		type: "get",
		data: { sid: _sid}
	}).done(function(result) {
		var data = result.data;
		console.log(data);

		// Handlebars
		var template = Handlebars.compile($('#popup1-template').html()); //注册模板
		Handlebars.registerHelper('type',function(){ //helpers返回需求类型
			return typeArr[this.find_type];
		});
		Handlebars.registerHelper('has',function(){ //helpers返回需求类型
			return has[this.has_experience];
		});
		var html = template(data); //封装模板
		$('#popup').html(html); //插入基础模板中

		//寻找具体信息弹窗
		layer.open({  
			title: ['寻找团队成员','font-size:17px; text-align: center'],
		 	type: 1, 
		 	area: '600px',
		 	content: $('#popup')
		});
	})
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

/**
 * 渲染导师列表	
 */
function getTeacherList(_page) {
var _size = 9;
	$.ajax({
		type: "get",
		url:  baseUrl + "Partner/tutorList.html",
		data: {
			size: _size,
			page: _page
		}
	}).done(function(result) {
		var data = result.data;
		var pages = data.pages;
		// console.log(data);
		var template = Handlebars.compile($('#teachers-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#teachers-box').html(html); //插入基础模板中

		getPageBar('teacher',_page, pages);//获取分页条
	}).always(function() {
		var link = document.querySelectorAll('.teachers-img');
		$.each(link,function(index, elem) {
			$(elem).click(function() {
				getTeacherInfo(elem.rel);
			});
		});
	});
}

/**
 * 点击导师列表弹出对应导师信息
 * @param  {Number} tid 导师编号tid
 */
function getTeacherInfo(_tid) {
	$.ajax({
		url:  baseUrl + "Partner/tutorDetail.html",
		type: "get",
		data: { tid: _tid}
	}).done(function(result) {
		var data = result.data;
		// console.log(data);

		// Handlebars
		var template = Handlebars.compile($('#popup2-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#popup').html(html); //插入基础模板中

		//导师具体信息弹窗
		layer.open({  
			title: ['创业导师','font-size:17px; text-align: center'],
		 	type: 1, 
		 	area: '600px',
		 	content: $('#popup') //这里content是一个普通的String
		});
	})
}

/**
 * 渲染投资人列表	
 */
function getInvestorList(_page) {
	var _size = 9;
	$.ajax({
		type: "get",
		url:  baseUrl + "Partner/investorList.html",
		data: {
			size: _size,
			page: _page
		}
	}).done(function (result) {
		var data = result.data;
		// console.log(data);
		var pages = data.pages;
		var template = Handlebars.compile($('#investors-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#investors-box').html(html); //插入基础模板中

		getPageBar('investor', _page, pages);//获取分页条
	}).always(function() {
		var link = document.querySelectorAll('.investors-img');
		$.each(link,function(index, elem) {
			$(elem).click(function() {
				getInvestorInfo(elem.rel);
			});
		});
	})
}

/**
 * 点击投资人列表弹出对应投资人信息
 * @param  {Number} id 投资人编号id
 */
function getInvestorInfo(_id) {
	$.ajax({
		url:  baseUrl + "Partner/investorDetail.html",
		type: "get",
		data: { id: _id}
	}).done(function(result) {
		var data = result.data;
		// console.log(data);

		// Handlebars
		var template = Handlebars.compile($('#popup3-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#popup').html(html); //插入基础模板中

		//导师具体信息弹窗
		layer.open({  
			title: ['投资人','font-size:17px; text-align: center'],
		 	type: 1, 
		 	area: '600px',
		 	content: $('#popup') //这里content是一个普通的String
		});
	})
}

/**
 * 渲染分页条
 * @param  {string} typeName 类别名称：news/notice/policy
 * @param  {string} pages    当前类别总页数
 */
function getPageBar(typeName, pageNum, pages) {
	var pageStr = '',
		// pageNum = parseInt(TypeState[typeName].COUNT), //当前页数
		oNum = 0, //当前li序列号
		show = 3, //分页条显示页的个数
		middle = Math.floor(show/2),
		pagination;
	if(pages == 1) return;
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
		oNum = show-(pages-pageNum)+1;
	} 
	if(pageNum != pages) { //当前页不为末页，添加后页和末页
		pageStr += "<li><a href='javascoript:void(0)' rel="+ (pageNum+1) +">&raquo;</a></li>";
		pageStr += "<li><a href='javascoript:void(0)' rel="+ pages + ">末页</a></li>";
	}
	pagination = '#' + typeName + '-pagination';
	// console.log(pagination);
	$(pagination).html(pageStr);
	var oli = document.querySelector(pagination).querySelectorAll('li');
	$(oli[oNum]).addClass('active');
}

// 页码切换
$(function() {
	var paginavs = document.querySelectorAll('.pagination'),
		pageNum;
	$(paginavs).each(function(index, elem) {
		var type = elem.id.split('-')[0];
		// console.log(type);
		elem.addEventListener('click', function(event) {
			pageNum = parseInt(event.target.rel);
			if(pageNum) {
				if(type === 'partner') {
					getPartnerList(pageNum);
				} else if(type === 'teacher') {
					getTeacherList(pageNum);
				} else if(type === 'investor') {
					getInvestorList(pageNum);
				}
			}
		})
	})
})

function init() {
	getPartnerList(1);
	getTeacherList(1);
	getInvestorList(1);
}

init();

/**
 * 添加弹窗链接
 */
function addPartnerPopup() {
	var link = document.querySelectorAll('.description-link');
	$.each(link,function(index, elem) {
		$(elem).click(function() {
			getPartnerInfo(elem.rel);
		});
	});
	var plink = document.querySelectorAll('.principal-link');
	$.each(plink,function(index, elem) {
		$(elem).click(function() {
			getPrincipalInfo(elem.rel);
		});
	});
}
