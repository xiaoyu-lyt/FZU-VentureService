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
var loginbtn = document.querySelector('.login'),
	cancelbtn = document.querySelector('.user-cancel'),
	loginWrapper = document.querySelector('.login-wrapper'),
	loginBox, cancelBox; 

if(loginbtn) {
	loginbtn.onclick = function() {
		loginBox = document.querySelector('.login-box');
		loginWrapper.style.display = 'block';
		loginBox.style.display = 'block';
		var _username = $('#username').val(),
			_password = $('#password').val(),
			loginBox = document.querySelector('.login-box'),
			btn = document.querySelector('#login-btn');
		$(loginBox).keyup(function(event) {
			keycode = event.which || event.keyCode;
			if(keycode == 13) {
				$('#login-btn').trigger('click');
			} 
		});
		$('#login-btn').click(function() {
			$.ajax({
				type: 'post',
				url: "../../API/index.php/home/user/login.html",
				data: {
					username: _username,
					password: _password
				},
				success: function(result) {
					alert(result.data);
				}
			});
		});
	}
} else if(cancelbtn) {
	cancelbtn.onclick = function() {
		cancelBox = document.querySelector('.cancel-box');
		loginWrapper.style.display = 'block'; 
		cancelBox.style.display = 'block';
	}
}



loginWrapper.addEventListener('click',function(e) {
	var dom = e.srcElement || e.target;
	if((dom.className === 'login-wrapper')||(dom.className === 'close')) {
		loginWrapper.style.display ='none';
		loginWrapper.style.display = 'none';
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
})();
