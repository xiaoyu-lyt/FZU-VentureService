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


var loginbtn = document.querySelector('.login'), //登录按钮
	cancelbtn = document.querySelector('.user-cancel'), //注销按钮
	loginWrapper = document.querySelector('.login-wrapper'), //遮罩层
	loginShow = document.querySelector('.login-signup'), 
	logoutShow = document.querySelector('.center-cancel'), //右侧显示
	loginBox, cancelBox; //弹窗

(function(){
	var userToken = getCookie("token");
	// console.log('token'+ userToken);
	if(userToken) {
		$(logoutShow).show();
		$(loginShow).hide();
	} else {
		$(loginShow).show();
		$(logoutShow).hide();
	}
})();

/**
 * 登录
 */
loginbtn.onclick = function() {
	var _username = '',
		_password = '';
	loginBox = document.querySelector('.login-box');
	loginWrapper.style.display = 'block';
	loginBox.style.display = 'block';
	
	var	loginBox = document.querySelector('.login-box'),
		btn = document.querySelector('#login-btn');
	$(loginBox).keyup(function(event) {
		keycode = event.which || event.keyCode;
		if(keycode == 13) {
			$('#login-btn').trigger('click');
		} 
	});
	$('#login-btn').click(function() {
			_username = $('#username').val(),
			_password = $('#password').val(),
			console.log("hello!");
		$.ajax({
			type: 'post',
			url: "../../API/index.php/home/user/login.html",
			data: {
				username: _username,
				password: _password
			},
			success: function(result) {
				if(result.data) {
					var data = result.data;
					console.log(data);
					$(loginShow).hide();
					$(logoutShow).show();
					$(loginBox).hide();
					$(loginWrapper).hide();
					setCookie("token", data.token);
					setCookie("uid", data.uid);
				} else {
					console.log(result.msg)
				}
			}
		});
	});
}
/**
 * 注销
 */
cancelbtn.onclick = function() {
	cancelBox = document.querySelector('.cancel-box');
	loginWrapper.style.display = 'block'; 
	cancelBox.style.display = 'block';
	var cancel = document.querySelector('#cancel-btn');
	cancel.onclick = function() {
		$.ajax({
			type: 'post',
			url: "../../API/index.php/home/user/logout.html",
			success: function(result) {
				console.log(result);
				loginWrapper.style.display = 'none'; 
				cancelBox.style.display = 'none';
				$(loginShow).show();
				$(logoutShow).hide();
				setCookie("token","");
				setCookie("uid","");
			}
		}); 
	}
}


/**
 * 设置cookie
 * @param {string} c_name cookie名称
 * @param {string} value  cookie的值
 */
function setCookie(c_name, value) {
	document.cookie = c_name + "=" + value;
}

/**
 * 获取cookie
 * @param  {string} c_name cookie名称
 * @return {string}        获取cookie的值
 */
function getCookie(c_name) {
	if(document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + '=');
		if(c_start!=-1) {
			c_start = c_start + c_name.length + 1;
			c_end = document.cookie.indexOf(";", c_start);
			if(c_end == -1) {
				c_end = document.length;
			}
			return document.cookie.substring(c_start, c_end);
		}
	}
	return "";
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
