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
var oli = sideNav.querySelectorAll('li');
var info = document.querySelectorAll('.information-detail');
oli = [].slice.call(oli);
info = [].slice.call(info);

(function switchTab(){
	oli.forEach(function(elem, index) {
		elem.index = index;
		elem.onclick = function() {
			startSwtich(index);
		}
	});
	function startSwtich(i){
		info.forEach(function(elem, index){
			elem.style.display = 'none';
			removeClass(oli[index], 'active')
		});
		info[i].style.display = 'block';
		addClass(oli[i], 'active');

		oli[i].children[0].children[0].style.backgroundPositionX = '0px0;'
	}
	
})();

