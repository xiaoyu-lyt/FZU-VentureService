$.ajax({
	type: "get",
	url: "../../API/index.php/home/notice/detail.html",
	dataType: "json",
	data: {
		nid: 12
	},
	success: function(result) {
		var jsonData = JSON.parse(result);
		info = jsonData.data;
		// $('.article-publish-time span').innerHTML  = info.date;
		$('#article-publish-time').text("2016-06-25");
		$('#article-publisher').text("林渊腾");
		$('#article-pageview').text('123')
		$('#article-title h1').text('创业教育成为学生发展助推器');
	}
}) 