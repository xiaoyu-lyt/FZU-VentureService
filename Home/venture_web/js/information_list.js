var typeState = [".information-news-detail",".information-notice-detail", ".information-policy-detail"]; //存储类别的类名
var types = {
	news: {
		num: 0,  //类别
		count: 1,  //当前页码
		npage: 0 //总页数
	},
	notice: {
		num: 1,
		count: 1,
		npage: 0
	},

	policy: {
		num: 2,
		count: 1,
		npage: 0
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
		nowType = typeState[_type],
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
		success: function(result) {
			var jsonData = JSON.parse(result),
				dataArr = jsonData.data,
				li = '';
			pages = dataArr.pages; //总页数
			// console.log(pages);
			types[nowType.split('-')[1]].npage = pages;
			$(nowType +' .information-ul').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				li += "<li><a href='article.html?id= "+ elem.nid + "'>" + elem.theme + "</a><span class='information-time pull-right'>" + elem.date +"</span></li>"
			})
			$(nowType + ' .information-ul').append(li);
		},
		complete: function() {
			getPageBar(nowType.split('-')[1], pages);
		}
	});
}

// 获取分页条
function getPageBar(typeName, pages) {
	var pageStr = '',
		pagination,
		pageNum = types[typeName].count;
	// console.log('pageNum ' + pageNum + ' pages ' + pages);
	if(pageNum == 1) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&laquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) - 1) +">&laquo;</a></li>";
	}
	for(var i=1; i <= pages; i++) {
		pageStr += "<li><a href='javascoript:void(0)' rel='" + i + "'>" + i + "</a></li>"
	}
	if(pageNum == types[typeName].npage) {
		pageStr += "<li class='disabled'><a href='javascoript:void(0)'>&raquo;</a></li>";
	} else {
		pageStr += "<li><a href='javascoript:void(0)'rel="+ (parseInt(pageNum) + 1) +">&raquo;</a></li>";
	}
	var pagination = '#' + typeName + '-pagination';
	$(pagination).html(pageStr);
	var oli = document.querySelector(pagination).querySelectorAll('li');
	$(oli[pageNum]).addClass('active');
}

// 资讯类别切换
$(function() {
	var sideNav = document.querySelector('.side-nav'),
		oli = sideNav.querySelectorAll('li');
	sideNav.addEventListener('click', function(event) {
		$('li.active-li').removeClass('active-li');
		$(event.target).addClass('active-li');
		$('.information-detail').each(function() {
			$(this).css("display", "none");
		}) 
		var type = event.target.className.split(' ')[0].slice(-1);
		$(typeState[type]).css("display", "block");
	})
});

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

