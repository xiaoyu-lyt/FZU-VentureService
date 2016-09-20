var _nid = window.location.search,
	_nid = _nid.replace(/[^0-9]+/, "");

/**
 * Handelbars方法
 * @param  {[type]} result) {				var     data [description]
 * @return {[type]}         [description]
 */

$.ajax({
	type: "get",
	url:  baseUrl + "notice/detail.html",
	data: { nid: _nid }
}).done(function(result) {
	var data = result.data;
		console.log(data);
	
	var template = Handlebars.compile($('#top-template').html()); //注册模板
	var html = template(data); //封装模板
	$('#article-top').html(html); //插入基础模板中
	$('#article-content').html(data.content);
});

