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


var allBtn = document.querySelectorAll('.admin-th-select'); //全选th
allBtn = [].slice.call(allBtn); 

/**
 * 全选
 */
allBtn.forEach(function(elem) {
	elem.onclick = function() {
		selectAll = elem.querySelector('input');
		var selectBtn = document.querySelectorAll('.' + selectAll.className),
			btn = this.querySelector('input'); //全选btn
		selectBtn = [].slice.call(selectBtn);
		if(btn.checked === true) {
			selectBtn.forEach(function(elem) {
				elem.checked = true;
				elem.onclick = function() {
					if(elem.checked === false) {
						btn.checked = false;
					}
				}
			})
		} else if(btn.checked === false) {
			selectBtn.forEach(function(elem) {
				elem.checked = false;
			})
		}
	}
})


/**
 * 管理操作弹窗
 */
var operation = document.querySelectorAll('.admin-operation');
operation = [].slice.call(operation);
operation.forEach(function(elem,index) {
	elem.onclick = function(event) {
		tr = event.target.parentNode.parentNode;
		if(hasClass(event.target, 'admin-article-delete')){
			var popup = document.querySelector('.popup-delete');
			popup.style.display = 'block';
			popup.onclick = function(e) {
				if(hasClass(e.target, 'yes')) {
					tr.parentNode.removeChild(tr);
					popup.style.display = 'none';
				} else if(hasClass(e.target, 'no')) {
					popup.style.display = 'none';
				}
			}
		} else if(hasClass(event.target, 'admin-refuse')) {
			var popup = document.querySelector('.popup-refuse');
			popup.style.display = 'block';
			popup.onclick = function(e) {
				if(hasClass(e.target, 'yes')) {
					popup.style.display = 'none';
				} else if(hasClass(e.target, 'no')) {
					popup.style.display = 'none';
				}
			}
		}
	}
})

/**
 * 切换选项卡
 */
/*var ul = document.querySelectorAll('.admin-management-ul');
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
		})
		table.forEach(function(elem) {
			elem.style.display = 'none';
		})
		table[li.index].style.display = 'block';
	}
})*/


function publish() {	
	var aricleBox = document.querySelector('.article-publish-wrapper');
	var infoBox = document.querySelector('.admin-info-management');
	var closeBtn = document.querySelector('.publish-close');
	infoBox.style.display = 'none';
	aricleBox.style.display = 'block'; 
	closeBtn.onclick = function() {
		infoBox.style.display = 'block';
		aricleBox.style.display = 'none'; 
	}
}

var psbtn = document.querySelector('.psbtn');

psbtn.onclick = function() {
	var modifyWrapper = document.querySelector('.modify-wrapper');
	modifyWrapper.style.display = 'block';
	modifyWrapper.addEventListener('click',function(e) {
		var dom = e.srcElement || e.target;
		if((dom.className === 'modify-wrapper')||(dom.className === 'close')) {
			modifyWrapper.style.display ='none';
		}
	})
}
