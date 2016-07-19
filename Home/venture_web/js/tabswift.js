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
if(sideNav) {
	var oli = sideNav.querySelectorAll('li');
	var box = document.querySelectorAll('.information-detail');
}
else if(signupList) {
	var oli = signupList.querySelectorAll('li');
	var box = document.querySelectorAll('.signup-table');
}

oli = [].slice.call(oli);
box = [].slice.call(box);

var isClass = hasClass(box[0], 'information-detail');


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
		} else {
			box[i].style.display = 'table';
			addClass(oli[i], 'now');
		}
	}
	
})();

