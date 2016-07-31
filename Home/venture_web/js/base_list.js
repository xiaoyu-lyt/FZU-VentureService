var baseList = document.querySelector('#base-list'),
	oli;

getData(0);
/**
 * 初始化基地列表
 * @param  {number} n 列表的第几个
 * @return {[type]}      [description]
 */
function getData(n) {
	var _fid;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/field/list.html",
		dataType: "json",
 		error: function() {
 			console.log("error");
 		},
		success: function(result) {
			var dataArr = result.data;
				li = '';
			// console.log(dataArr);
			// console.log(dataArr);
			// 渲染左侧列表
			$('#base-list').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				li += '<li id=' + elem.fid + '>' + elem.name + '</li>';
			});
			$('#base-list').append(li);
			oli = baseList.querySelectorAll('li');
			$(oli[n]).addClass('now');
			_fid = oli[n].id;
		},
		complete: function() {
			getDetail(_fid);
		}
	});
}

//点击列表获取基地详情、渲染基地列表
$(function(){
	baseList.addEventListener('click', function(event) {
		var e = event.srcElement || event.target;
		if(e.nodeName.toUpperCase() == 'LI') {
			$('li.now').removeClass('now');
			$(e).addClass('now');
			getDetail(e.id);
		}
	},false);
});

/**
 * 渲染基地详情
 * @param  {number} _fid 基地id
 * @return {[type]}      [description]
 */
function getDetail(_fid) {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/field/detail.html",
		dataType: "json",
		data: {
			fid: _fid
		},
 		error: function() {
 			console.log("error");
 		},
		success: function(result) {
			var data = result.data, 
				box;
			console.log(data);
			$('#bases-introduction-box').empty();
			$('#base-title').text(data.name);
			$('#base-introduction').text(data.detail);
		}
	});
}
