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
 * 登录界面
 */
var loginbtn = document.querySelector('.login');
var loginWrapper = document.querySelector('.login-wrapper');

(function loginInterface() {
	loginbtn.onclick = function() {
		loginWrapper.style.display = 'block';
	}	
})();

loginWrapper.addEventListener('click',function(e) {
	var dom = e.srcElement || e.target;
	if((dom.className === 'login-wrapper')||(dom.className === 'close')) {
		loginWrapper.style.display ='none';
	}
});

/**
 * 移动端导航
 */
(function mobileNav() {
	var mobileMenu = document.querySelector('.mobile-menu'),
		mobileBar = document.querySelector('.mobile-bar');
	mobileMenu.onclick = function() {
		if(!hasClass(mobileBar, 'open')) {
			addClass(mobileBar, 'open');
		} else {
			removeClass(mobileBar, 'open');
		}
	}
})()



