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
	var _size = 3, //页大小
		nowType = typeClass[_type],
		dataSize, pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/notice/list.html",
		dataType: "json",
		data: {
			type: _type,
			size: _size, //页大小
			page: _page //当前页码
 		},
 		error: function () {
 			console.log("error!");
 		},
		success: function(result) {
			var	dataArr = result.data,
				li = '';
			pages = dataArr.pages; //总页数
			TypeState[nowType.split('-')[1]].PAGES = pages;
			$(nowType +' .information-ul').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				li += "<li><a href='article.html?id="+ elem.nid + "'>" + elem.theme + "</a><span class='information-time pull-right'>" + elem.date +"</span></li>"
			})
			$(nowType + ' .information-ul').append(li);
		},
		complete: function() {
			getPageBar(nowType.split('-')[1], pages);
		}
	});
}

/**
 * 获取分页条
 * @param  {string} typeName 类别名称：news/notice/policy
 * @param  {string} pages    当前类别总页数
 */
function getPageBar(typeName, pages) {
	var pageStr = '',
		pagination,
		pageNum = TypeState[typeName].COUNT;
	// console.log('pageNum ' + pageNum + ' pages ' + pages);
	if(pageNum == 1) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&laquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) - 1) +">&laquo;</a></li>";
	}
	for(var i=1; i <= pages; i++) {
		pageStr += "<li><a href='javascoript:void(0)' rel='" + i + "'>" + i + "</a></li>"
	}
	if(pageNum == TypeState[typeName].PAGES) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&raquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) + 1) +">&raquo;</a></li>";
	}
	var pagination = '#' + typeName + '-pagination';
	$(pagination).html(pageStr);
	var oli = document.querySelector(pagination).querySelectorAll('li');
	$(oli[pageNum]).addClass('active');
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
})

