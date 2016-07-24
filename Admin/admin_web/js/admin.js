//hasClass
function hasClass(elem, className) {
	return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
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