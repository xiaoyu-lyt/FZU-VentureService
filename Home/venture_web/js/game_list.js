getData();

/**
 * 渲染比赛列表
 */
function getData() {
	var _size = 1, //页大小
		dataSize, pages;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/cpt/list.html",
		dataType: "json",
		data: {
			size: 1
 		},
 		error: function(data) {
 			console.log("error");
 		},
		success: function(result) {
			console.log(result);
		}
	});
}