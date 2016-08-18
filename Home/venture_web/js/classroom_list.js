/**
 * 获取培训列表
 */
function getTraningList() {
	$.ajax({
		url: "../../API/index.php/home/class/list.html",
		type: "get",
		data: {	mode: 0 }
	}).done(function(result) {
		var data = result.data;
			// console.log(data);
		var template = Handlebars.compile($('#traning-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#traning-box').html(html); //插入基础模板中
		
	}).always(function() {
		var link = document.querySelectorAll('.classroom-box-mask');
		$.each(link,function(index, elem) {
			$(elem).click(function() {
				getTraningInfo(elem.id);			
			});
		});
	})
}

/**
 * 点击培训课程列表弹出具体课程信息
 * @param  {Number} cid 课程编号cid
 */
function getTraningInfo(_cid) {
	$.ajax({
		url: "../../API/index.php/home/class/detail.html",
		type: "get",
		data: { cid: _cid }
	}).done(function(result) {
		var data = result.data;
		// Handlebars
		var template = Handlebars.compile($('#popup-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#popup').html(html); //插入基础模板中

		//课程具体信息弹窗
		layer.open({  
			title: ['课程信息','font-size:17px; text-align: center'],
		 	type: 1, 
		 	area: '600px',
		 	content: $('#popup')
		});
	})
}

/**
 * 获取教材列表
 */
function getLessonsList() {
	$.ajax({
		url: "../../API/index.php/home/class/downloads.html",
		type: "get",
		data: { type: 0 }
	}).done(function(result) {
		var data = result.data;
		// console.log(data);
		var template = Handlebars.compile($('#lessons-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#lessons-box').html(html); //插入基础模板中
	});
}


/**
 * 我要报名
 * @return {[type]} [description]
 */
function applyTraining(rel) {
	var mask = document.querySelector('.mask');
	$(mask).show();
	$('#snum').val('');
	$('#training-apply').click(function () {
		console.log($('#snum').val());
		if($('#snum').val()=='') {
			alert('请输入学号');
		} else {
				$.ajax({
				url: "../../API/index.php/home/class/enlist.html",
				type: "post",
				data: { uid: getCookie('uid'), cid:rel }
			}).done(function(result) {
				alert(result.msg);
			});
		}
	
	});
	mask.addEventListener('click',function(e) {
		var dom = e.srcElement || e.target;
		if((dom.className === 'mask')||(dom.className === 'close')) {
			$(mask).hide();
		}
	});
}

function init() {
	getTraningList();
	getLessonsList();
}

init();