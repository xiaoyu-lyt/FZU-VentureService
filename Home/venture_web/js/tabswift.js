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

var sideNav = document.querySelector('.side-nav');
var signupList = document.querySelector('.signup-role-list');
var userList = document.querySelector('.user-sidenav');
if(sideNav) {
	var oli = sideNav.querySelectorAll('li');
	var box = document.querySelectorAll('.information-detail');
}
else if(signupList) {
	var oli = signupList.querySelectorAll('li');
	var box = document.querySelectorAll('.signup-table');
}

else if(userList) {
	var oli = userList.querySelectorAll('li');
	var box = document.querySelectorAll('.user-box');
}

oli = [].slice.call(oli);
box = [].slice.call(box);

var isClass = hasClass(box[0], 'information-detail');
var isSignup = hasClass(box[0], 'signup-table');

(function switchTab(){
	oli.forEach(function(elem, index) {
		elem.index = index;
		elem.onclick = function() {
			startSwtich(index);
		}
	});
	function startSwtich(i){
		box.forEach(function(elem, index){
			elem.style.display = 'none';
			if(isClass) {
				removeClass(oli[index], 'active');
			}
			else {
				removeClass(oli[index], 'now');
			}
		});
		if(isClass) {
			box[i].style.display = 'block';
			addClass(oli[i], 'active');
			return;
		} else if(isSignup) {
			box[i].style.display = 'table';
		} else {
			box[i].style.display = 'block';
		}
		addClass(oli[i], 'now');
	}
	
})();

