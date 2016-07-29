var _nid = window.location.search,
	_nid = _nid.replace(/[^0-9]+/, "");

/**
 * Handelbars方法
 * @param  {[type]} result) {				var     data [description]
 * @return {[type]}         [description]
 */
$.ajax({
	type: "get",
	url: "../../API/index.php/home/notice/detail.html",
	dataType: "json",
	data: {
		nid: 4
	},
	success: function(result) {
		var data = result.data;
		console.log(data);
		
		var template = Handlebars.compile($('#article-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#article-wrapper').html(html); //插入基础模板中
	}
}) 
