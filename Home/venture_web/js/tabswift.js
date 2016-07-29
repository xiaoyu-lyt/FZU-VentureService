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

var sideNav = document.querySelector('.side-nav'),
	signupList = document.querySelector('.signup-role-list'),
	userList = document.querySelector('.user-sidenav');

var tab = sideNav || signupList || userList;
oli = tab.querySelectorAll('li');
oli = [].slice.call(oli);

if(sideNav) {
	var box = document.querySelectorAll('.information-detail');
	switchTab(oli, box, 'active-li');
} else if(signupList) {
	var box = document.querySelectorAll('.signup-form');
	switchTab(oli, box, 'now');
} else if(userList) {
	var box = document.querySelectorAll('.user-box');
	switchTab(oli, box, 'now');
}  


function switchTab(olis, boxs, liClass){
	olis = [].slice.call(olis);
	boxs = [].slice.call(boxs);
	olis.forEach(function(elem, index) {
		elem.index = index;
		elem.onclick = function() {
			// console.log(elem);
			var isClass = this.className.split(' ')[1];
			if(isClass) {
				var tabList = document.querySelector('#' + isClass);
				var lis = tabList.querySelectorAll('li');
				var subxbox = document.querySelectorAll('.' + isClass + '-table');
				switchTab(lis, subxbox, 'now-li');
			}
			startSwtich(index);

		}
	});
	function startSwtich(i){
		boxs.forEach(function(elem, index){
			elem.style.display = 'none';
			// console.log(olis[index]);
			removeClass(olis[index], liClass);
			
		});
		boxs[i].style.display = 'block';
		addClass(olis[i], liClass);
	}
}

