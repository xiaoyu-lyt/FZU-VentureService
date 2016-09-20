
/**
 * 获取热门资讯列表
 */
function getHotNews() {
	var num;
	$.ajax({
		type: "get",
		url:  baseUrl + "notice/hotList.html",
		dataType: "json",
	}).done(function(result) {
		var data = result.data;
		num = data.length;
		var template = Handlebars.compile($('#hotnews-template').html()); //注册模板
		var html = template(data); //封装模板
		$('#hot-news').html(html); //插入基础模板中
	}).always(function () {
			showNews(num);
	})	
}

/**
 * 获取资讯列表
 * @param  {num} _type 0、新闻热点 1、通知公告 2、最新政策
 * @return {[type]}       [description]
 */
function getInfo(type) {
	var types=['news','notice','policy'];
	$.ajax({
		type: "get",
		url: baseUrl + "notice/list.html",
		dataType: "json",
		data: { type: type }
	}).done(function(result) {
		var data = result.data;
		// console.log(data);

		var template = Handlebars.compile($('#' + types[type] +'-template').html()); //注册模板
		Handlebars.registerHelper("compare1",function(_index, options){
      	 	if(_index < 5){
			//满足添加继续执行
				return options.fn(this);
			}	
		});
		Handlebars.registerHelper("compare2",function(_index, options){
      	 	if(_index >= 5 && _index < 10){
			//满足添加继续执行
				return options.fn(this);
			}	
		});
		var html = template(data); //封装模板
		$('#' + types[type] +'-box').html(html); //插入基础模板中
	});
}

/**
 * 新闻轮播
 */
function showNews(num) {
	var newsBox = document.querySelectorAll('.news-box');
	var newsWrapper = document.querySelector('.news-wrapper');
	var index = -1;
	var timer = null;
	startChange();	
	newsWrapper.onmouseover = function() {
		clearInterval(timer);
	}
	newsWrapper.onmouseout = function() {
		timer = setInterval(startChange,4000); 
	}
	timer = setInterval(startChange,4000); 
	function startChange() {
		var shade = null;
		var alpha = 0;
		index = ++index %num; //newsbox数目
		for(var i = 0, len = newsBox.length; i < len; i++) {
			$(newsBox[i]).removeClass('show');
			startShade(-2,0);
		}
		$(newsBox[index]).addClass('show');
		clearInterval(shade);
		shade = setInterval(function(){
			startShade(2,100);
		},5);
		//切换效果
		function startShade(speed,target) {
			alpha += speed;
			newsBox[index].style.opacity = alpha / 100;
			newsBox[index].style.filter = "alpha(opacity=" + alpha + ")";
			alpha == target && clearInterval(shade);
		}
	}
};

/**
 * 新闻选项卡切换
 */
function tab() {
	var oLi = document.querySelector('.info-nav').children;
	for(var i = 0, len = oLi.length; i < len; i++) {
		oLi[i].index = i;
		oLi[i].onmouseover = function() {
			display(this.index);
		}
	}
	function display(index) {
		var oDiv = document.querySelectorAll('.info-detail-box');
		for(var i = 0, len = oDiv.length; i < len; i++) {
			oDiv[i].style.display = 'none';
			$(oLi[i]).removeClass('hover');
		}
		oDiv[index].style.display = 'block';
		$(oLi[index]).addClass('hover');
		// addClass(oLi[index],'hover');

	}
} 

/**
 * 获取基地展示内容
 */
function getBase() {
	$.ajax({
		type: "get",
		url:  baseUrl + "field/list.html",
		dataType: "json",
	}).done(function(result) {
		var data = result.data;
		console.log(data);
			var template = Handlebars.compile($('#base-template').html()); //注册模板
			Handlebars.registerHelper("compare", function(_index, options){
    	 	if(_index < 3){
				//满足添加继续执行
					return options.fn(this);
				}	
			});
			var html = template(data); //封装模板
			$('#base-box').html(html); //插入基础模板中
	}).always(function() {
		showBases();
	});
}

/*/**
 * 获取项目展示内容
 */
function getProject() {
	$.ajax({
		type: "get",
		url:  baseUrl + "project/list.html"
	}).done(function(result) {
		var data = result.data;
		// console.log(data);

		var template = Handlebars.compile($('#project-template').html()); //注册模板
		Handlebars.registerHelper("compare",function(_index, options){
      	 	if(_index < 4){
			//满足添加继续执行
				return options.fn(this);
			}
		});
		var html = template(data); //封装模板
		$('#project-box').html(html); //插入基础模板中
	}).always(function() {
		showProjects();
	})
}


/**
 *项目瀑布流展示
 */
function showProjects() {
	var cols, minH, index, boxPos, boxHs = [];
	var projectsTop = document.querySelector('.projects-top');
	var projectsBox = document.querySelectorAll('.projects');
	var projectsWrap = document.querySelector('.projects-wrap');
	var boxW = projectsBox[0].offsetWidth;
	projectsBox = [].slice.call(projectsBox);
	waterfall();
	function waterfall() {
		cols = Math.floor( (document.querySelector('.projects-content').offsetWidth) / boxW);
		for(var i=0, len=projectsBox.length; i < len; i++) {
			if(i < cols) {
				boxHs.push(projectsBox[i].offsetHeight);
				// console.log(boxHs);
			} else {
				minH = Math.min.apply(null,boxHs);
				index = boxHs.indexOf(minH);
				boxPos = boxW * index;
				projectsBox[i].style.position = "absolute";
				projectsBox[i].style.top = minH + "px" 
				projectsBox[i].style.left = boxPos + "px";
				boxHs[index] += projectsBox[i].offsetHeight;
				projectsWrap.style.height = boxHs[index] + 'px';
			}
		}
	}
}

/**
 * 基地延迟展示
 */
function showBases() {
	var base = document.querySelector('.base');
	var wscrollTop = document.documentElement.scrollTop||document.body.scrollTop||window.pageYOffset ;
	// console.log(wscrollTop);
	window.onresize = window.onscroll = function() {
		wscrollTop = document.documentElement.scrollTop||document.body.scrollTop||window.pageYOffset ;
		if(wscrollTop > 580) {
			base.style.opacity='1';
		}
		else {
			base.style.opacity='0';
		}
	}
}


/**
 * 初始化函数
 */
function init() {
	getHotNews();
	getInfo(0);
	getInfo(1);
	getInfo(2);
	tab();
	getBase();
	getProject();
}

init();

