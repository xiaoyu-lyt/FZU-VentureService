var _fid = window.location.search,
	baseList = document.querySelector('#base-list'),
	oli;
_fid = _fid.replace(/[^0-9]+/, "");

getData(_fid);
/**
 * 初始化基地列表
 * @param  {number} n 列表的第几个
 * @return {[type]}      [description]
 */
function getData(_fid) {
	var n  = 0;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/field/list.html",
		success: function(result) {
			var dataArr = result.data;
				li = '';
			// 渲染左侧列表
			$('#base-list').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				if(elem.fid === _fid) {
					n = index;
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
		success: function(result) {
			var data = result.data, 
				box;

			console.log(data);
			var template = Handlebars.compile($('#base-template').html()); //注册模板
			var html = template(data); //封装模板
			$('#base-box').html(html); //插入基础模板中
	
		}
	});
}
