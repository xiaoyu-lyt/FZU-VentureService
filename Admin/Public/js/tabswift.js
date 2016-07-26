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

var ul = document.querySelectorAll('.admin-management-ul');
ul = [].slice.call(ul);
var adminBox = document.querySelectorAll('.sub-management');

ul.forEach(function(elem, index) {
	var oli = elem.querySelectorAll('li');
	var box = adminBox[index];
	oli = [].slice.call(oli);
	oli.forEach(function(e,i) {
		e.index = i;
		e.onclick = function() {
			startSwitch(this);
		}
	})
	function startSwitch(li) {
		var table = box.querySelectorAll('.admin-table');
		table = [].slice.call(table);
		oli.forEach(function(elem) {
			removeClass(elem, 'now-li');
			addClass(li,'now-li');
		});
		table.forEach(function(elem) {
			elem.style.display = 'none';
		});
		table[li.index].style.display = 'block';
	}
})

