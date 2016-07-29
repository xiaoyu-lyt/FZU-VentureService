var pageNum=1, pages; //当前页码
getData(pageNum);

/**
 * 渲染项目列表
 * @param  {number} _type 项目类型
 * @param  {number} _page 当前页码
 * @return {[type]}       [description]
 */
function getData(_page) {
	var _size = 3, //页大小
		pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/project/list.html",
		dataType: "json",
		data: {
			size: _size,
			page: _page //当前页码
			// area: 1, //所属领域
			// type: 1, //产品类别
 		},
 		error: function(data) {
 			console.log("error");
 		},
		success: function(result) {
			var dataArr = result.data;
				box = '';
			pages = dataArr.pages; //总页数
			console.log(pages);
			$('#projects-box').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				box += '<div class="projects-expo-box clearfix"><div class="projects-img-box pull-left"><img src="images/projects1.png" alt=""></div><div class="projects-detail-box pull-left"><a href="projects_info.html?id= "' + elem.pid + '><h2 class="projects-detail-title">'+ elem.name + '</h2></a><div class="projects-describe-box"><div class="projects-describe-tags"><span>' + elem.type + '</span><span>' + elem.area + '</span><p>' + elem.synopsis + '</p></div></div></div></div>'
			})
			$('#projects-box').append(box);
		},
		complete: function() {
			getPageBar(pages);
		}
	});
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

