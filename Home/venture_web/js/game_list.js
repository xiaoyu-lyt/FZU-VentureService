var gameList = document.querySelector('#game-list'),
	oli;

getData(0);
/**
 * 初始化比赛列表
 * @param  {number} n 列表的第几个
 * @return {[type]}      [description]
 */
function getData(n) {
	var _cid;
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/cpt/list.html",
		dataType: "json",
 		error: function() {
 			console.log("error");
 		},
		success: function(result) {

			var dataArr = result.data;
				li = '';
			// console.log(dataArr);
			// 渲染左侧列表
			console.log(dataArr);
			$('#game-list').empty();
			$.each(dataArr, function(index, elem) {
				if(index === 'pages') {
					return false
				}
				li += '<li id=' + elem.cid
				if(elem.status == 0) { //比赛正在进行
					li += ' class=past';
				}
				li += '>' + elem.name + '<span class="isfire"></span></li>';
				
			});
			$('#game-list').append(li);
			oli = gameList.querySelectorAll('li');
			$(oli[n]).addClass('now');
			_cid = oli[n].id;
		},
		complete: function() {
			getDetail(_cid);
		}
	});
}

//点击列表获取比赛详情、渲染比赛列表
$(function(){
	gameList.addEventListener('click', function(event) {
		var e = event.srcElement || event.target;
		if(e.nodeName.toUpperCase() == 'LI') {
			$('li.now').removeClass('now');
			$(e).addClass('now');
			getDetail(e.id);
		}
	},false);
});

/**
 * 渲染比赛详情
 * @param  {number} _cid 比赛id
 * @return {[type]}      [description]
 */
function getDetail(_cid) {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/cpt/detail.html",
		dataType: "json",
		data: {
			cid: _cid
		},
 		error: function() {
 			console.log("error");
 		},
		success: function(result) {
			var data = result.data, 
				box;
				console.log(data);
			$('#game-introduction-box').empty();
			$('#game-title').text(data.name);
			$('#release-time').text(data.issue_time);
			$('#end-time').text(data.deadline);
			$('#game-introduction-box').html(data.description);
			console.log($('#game-apply-btn').attr('href',data.url));
			var times = data.times
			if(times>1) {
				$('#past-games').show();
				// console.log(data.number + ' ' + data.times)
				getPastlist(data.number, data.times);
			} else {
				$('#past-games').hide();
			}
		}
	});
}

/**
 * 获取往届比赛列表
 * @param  {number} _number 比赛编号
 * @param  {number} _times  比赛届数
 * @return {[type]}         [description]
 */
function getPastlist(_number, _times) {
	$.ajax({
		type: "get",
		url: "../../API/index.php/home/cpt//previous.html",
		dataType: "json",
		data: {
			number: _number,
			times: _times
		},
		success: function(result) {
			var dataArr = result.data,
				list = '';
			// console.log(dataArr);
			$('#past-games-list').empty();
			$.each(dataArr, function(index, elem) {
				list += '<a href="javascript:void(0)"'+ 'rel=' + elem.cid + '>' + elem.name +'</a>'
			})
			$('#past-games-list').append(list);
			var pastList = document.querySelector('#past-games-list');
			pastList.addEventListener('click',function(event) {
				var e = event.srcElement || event.target;
				getDetail(e.rel);
			})
		}
	});
}