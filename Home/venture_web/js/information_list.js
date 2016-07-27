var _type = 4;

getData(_type);
var sidenav = document.querySelector('.side-nav');
sidenav.addEventListener('click', function(event) {
	var target = event.target.className.split(' ')[0];
	_type = target.slice(-1);
	getData(_type);
})

var typeState = {
	2: ".information-policy-detail",
	3: ".information-notice-detail",
	4: ".information-news-detail"
}

function getData(nowtype) {
	// console.log(nowtype);
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/notice/list.html",
		dataType: "json",
		data: {
			type: nowtype
		},
		success: function(result) {
			var jsonData = JSON.parse(result);
			var dataArr = jsonData.data;
			var li = '';
			// console.log(dataArr);
			$(typeState[nowtype] +' .information-ul').empty();
			$.each(dataArr,function(index, elem) {
				li += "<li><a href='article.html?id= "+ elem.nid + "'>" + elem.theme + "</a><span class='information-time pull-right'>" + elem.date +"</span></li>"
			})
			// console.log($(typeState[nowtype] + ' .information-ul'));
			$(typeState[nowtype] + ' .information-ul').append(li);
		}
	});
}

