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

var userList = document.querySelector('.user-sidenav');
var box = document.querySelectorAll('.user-box');

oli = userList.querySelectorAll('li');
oli = [].slice.call(oli);

// switchTab(oli, box, 'now', 'block');



function switchTab(olis, boxs, liClass, boxDisplay){
	olis = [].slice.call(olis);
	boxs = [].slice.call(boxs);
	olis.forEach(function(elem, index) {
		elem.index = index;
		elem.onclick = function() {
			var isClass = this.className.split(' ')[1];
			if(isClass) {
				var tabList = document.querySelector('#' + isClass);
				var lis = tabList.querySelectorAll('li');
				var subxbox = document.querySelectorAll('.' + isClass + '-table');
				switchTab(lis, subxbox, 'now-li', 'block');
			}
			startSwtich(index);

		}
	});
	function startSwtich(i){
		boxs.forEach(function(elem, index){
			elem.style.display = 'none';
			removeClass(olis[index], liClass);
		});
		boxs[i].style.display = boxDisplay;
		addClass(olis[i], liClass);
	}
}

