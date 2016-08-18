var typeClass = [".information-news-detail",".information-notice-detail", ".information-policy-detail"]; //存储类别的类名
var TypeState = {
	news: {
		TYPENUM: 0,  //类别
		COUNT: 1,  //当前页码
		PAGES: 0 //总页数
	},
	notice: {
		TYPENUM: 1,
		COUNT: 1,
		PAGES: 0
	},

	policy: {
		TYPENUM: 2,
		COUNT: 1,
		PAGES: 0
	}
};

getData(0,1);
getData(1,1);
getData(2,1);

/**
 * 渲染资讯列表
 * @param  {string} _type 资讯类型
 * @param  {number} _page 当前页码
 */
function getData(_type, _page) {
	var _size = 14, //页大小
		nowType = typeClass[_type], //当前类型
		dataSize, 
		pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/notice/list.html",
		data: {
			type: _type,
			size: _size, //页大小
			page: _page //当前页码
 		}
 	}).done(function(result) {
 		var	dataArr = result.data,
			li = '';
		pages = dataArr.pages; //总页数
		// console.log(dataArr);
		TypeState[nowType.split('-')[1]].PAGES = pages;
		$(nowType +' .information-ul').empty();
		$.each(dataArr, function(index, elem) {
			if(index == 'pages') {
				return false;
			}
			li += "<li><a href='article.html?id="+ elem.nid + "'>" + elem.theme + "</a><span class='information-time pull-right'>" + elem.date +"</span></li>"
		})
		$(nowType + ' .information-ul').append(li);
 	}).always(function() {
 		getPageBar(nowType.split('-')[1], pages);
 	});
}

/**
 * 获取分页条
 * @param  {string} typeName 类别名称：news/notice/policy
 * @param  {string} pages    当前类别总页数
 */
function getPageBar(typeName, pages) {
	var pageStr = '',
		pageNum = parseInt(TypeState[typeName].COUNT), //当前页数
		oNum = 0, //当前li序列号
		show = 3, //分页条显示页的个数
		middle = Math.floor(show/2),
		pagination;
	if(pages === 1) return;
	if(pageNum > 1) { //添加首页和前页
		oNum = pageNum + 1;
		pageStr += "<li><a href='javascript:;' rel='1'>首页</a></li><li><a href='javascript:;'rel=" + (pageNum-1) + ">&laquo;</a></li>";
	} if(pages < show) {
		for(var i=1; i <= pages; i++) {
			pageStr += "<li><a href='javascript:;' rel='" + i + "'>" + i + "</a></li>";
		}
	} else if(pageNum <= middle+1) { //分页头部切换
		for(var i=1; i <= show; i++) {
			pageStr += "<li><a href='javascript:;' rel='" + i + "'>" + i + "</a></li>";
		}
	} else if((pageNum > middle+1) && (pageNum <= pages - middle)) { //分页中部切换
		for(var i=1,j=pageNum-middle; i <= show; i++,j++) {
			pageStr += "<li><a href='javascript:;' rel='" + j + "'>" + j + "</a></li>";
		}
		oNum = middle+2;
	} else if(pageNum > pages - middle) { //分页尾部切换
		for(var i=1,j=pages-show+1; i <= show; i++,j++) {
			pageStr += "<li><a href='javascript:;' rel='" + j + "'>" + j + "</a></li>";
		}
		console.log(pageNum);
		oNum = show-(pages-pageNum)+1;
		console.log('oNum '+oNum);
	} 
	if(pageNum != TypeState[typeName].PAGES) { //当前页不为末页，添加后页和末页
		pageStr += "<li><a href='javascript:;' rel="+ (pageNum+1) +">&raquo;</a></li>";
		pageStr += "<li><a href='javascript:;' rel="+ pages + ">末页</a></li>";
	}
	pagination = '#' + typeName + '-pagination'; //获取导航名
	$(pagination).html(pageStr);
	// console.log('pageNum ' + pageNum + ' oNum ' + oNum);
	var oli = document.querySelector(pagination).querySelectorAll('li');
	$(oli[oNum]).addClass('active');
}

/**
 * 点击侧边导航切换资讯类别
 */
$(function() {
	var sideNav = document.querySelector('.side-nav'),
		oli = sideNav.querySelectorAll('li');
	sideNav.addEventListener('click', function(event) {
		var e = event.target || event.srcElement;
		$('li.active-li').removeClass('active-li');
		$(e).addClass('active-li');
		$('.information-detail').each(function() {
			$(this).css("display", "none");
		}) 
		var type = event.target.className.split(' ')[0].slice(-1);
		$(typeClass[type]).css("display", "block");
	})
});

/**
 * 点击分页导航切换页码
 */
$(function() {
	var paginavs = document.querySelectorAll('.pagination');
	$(paginavs).each(function(index, elem) {
		var type = elem.id.split('-')[0];
		elem.addEventListener('click', function(event) {
			var curType = TypeState[type].TYPENUM,
				pageNum = event.target.rel;
			TypeState[type].COUNT = pageNum;
			// console.log(pageNum);
			if(pageNum) {
				getData(curType, pageNum);
			}
		})
	})
});

