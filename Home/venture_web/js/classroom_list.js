$.ajax({
	url: "../../API/index.php/home/class/list.html",
	type: "get",
	data: {
		mode: 0
	},
	success: function(result) {
		var data = result.data;
		// console.log(data);
		var template = Handlebars.compile($('#traning-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#traning-box').html(html); //插入基础模板中
	}
});

$.ajax({
	url: "../../API/index.php/home/class/downloads.html",
	type: "get",
	data: {
		type: 0
	},
	success: function(result) {
		var data = result.data;
		console.log(data);
		var template = Handlebars.compile($('#lessons-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#lessons-box').html(html); //插入基础模板中
	}
});