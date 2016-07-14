//hasClass
function hasClass(elem, className) {
	return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}

// addClass
function addClass(elem, className) {
    if (!hasClass(elem, className)) {
    	elem.className += ' ' + className;
    }
}

// removeClass
function removeClass(elem, className) {
	var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
	if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}

/**
 * 新闻轮播
 */

var newsBox = document.querySelectorAll('.news-box');
var newsWrapper = document.querySelector('.news-wrapper');

(function showNews() {
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
		index = ++index %3;
		for(var i = 0, len = newsBox.length; i < len; i++) {
			removeClass(newsBox[i],'show');
			startShade(-2,0);
		}
		addClass(newsBox[index],'show');
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
})();

// 新闻选项卡切换
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
		for(let i = 0, len = oDiv.length; i < len; i++) {
			oDiv[i].style.display = 'none';
			removeClass(oLi[i],'hover');
		}
		oDiv[index].style.display = 'block';
		addClass(oLi[index],'hover');
		console.log(oLi[index].children[0]);

	}
} 

tab();

// 基地&项目CSS3动画
var cols, minH, index, boxPos,
	projectsTop = document.querySelector('.projects-top'),
	projectsBox = document.querySelectorAll('.projects'),
	projectsWrap = document.querySelector('.projects-wrap'),
	boxW = projectsBox[0].offsetWidth,
	base = document.querySelector('.base'),
	boxHs = [];
projectsBox = [].slice.call(projectsBox);

window.onresize = window.onscroll = function() {
	var wscrollTop = document.documentElement.scrollTop||document.body.scrollTop;
	(function showProjects() {
		if(wscrollTop > 780) {
			addClass(projectsTop, 'down');
			projectsBox.forEach(function(elem) {
				addClass(elem, 'down');
			})
		}

		else {
			removeClass(projectsTop, 'down');
			projectsBox.forEach(function(elem) {
				removeClass(elem, 'down');
			})
		}
		if(wscrollTop > 580) {
			base.style.opacity='1';
			
		}
		else {
			base.style.opacity='0';
		}
	})();
	// waterfall();
}

//项目展示
function waterfall() {
	cols = Math.floor( (document.querySelector('.projects-content').offsetWidth) / boxW);
	for(var i=0, len=projectsBox.length; i < len; i++) {
		if(i < cols) {
			boxHs.push(projectsBox[i].offsetHeight);
			console.log(boxHs);
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

waterfall();