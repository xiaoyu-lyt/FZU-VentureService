var href = window.location.search;
var	id = href.replace(/[^0-9]+/, "");
var type = href.split('')[1];

/**
 * Handelbars方法
 * @param  {[type]} result) {				var     data [description]
 * @return {[type]}         [description]
 */
if(type==='t') {
	$.ajax({
	type: "get",
	url: "../../API/index.php/home/Partner/tutorDetail.html",
	dataType: "json",
	data: id,
	success: function(result) {
		var data = result.data;
		console.log(data);
		
		// var template = Handlebars.compile($('#article-template').html()); //注册模板
		// var html = template(data); //封装模板
		// $('#article-wrapper').html(html); //插入基础模板中
	}
}) 
}
