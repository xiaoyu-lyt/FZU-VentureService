$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {
		var length = value.length;
		var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
		return this.optional(element) || (length == 11 && mobile.test(value));
	});
	$('#forgot-password').validate({
		submitHandler: function(form) {
		},
		rules: {
			new_password: {
				required: true,
				minlength: 6
			},
			v_code: "required",	
			tel: {
				required: true,
				isMobile: true
			}
		},
		messages: {
			new_password: {
				required: "请输入密码",
				minlength: "密码不得少于{0}位"
			},
			v_code: "请输入短信验证码",
			tel: {
				required: "请输入手机号",
				isMobile: "手机号不正确"
			}
		}
	})
});

var loginbtn = document.querySelector('.login'), //登录按钮
	cancelbtn = document.querySelector('.user-cancel'), //注销按钮
	loginWrapper = document.querySelector('.login-wrapper'), //遮罩层
	loginShow = document.querySelector('.login-signup'), 
	logoutShow = document.querySelector('.center-cancel'); //右侧显示

(function(){
	var uid = getCookie("uid");
	if(uid) {
		$(logoutShow).show();
		$(loginShow).hide();
	} else {
		$(loginShow).show();
		$(logoutShow).hide();
	}
})();

/**
 * 判断是否登录
 * @return {[type]} [description]
 */
function judgeStatus() {
	if(getCookie('uid')) {
		window.location.href='../venture_web/apply_project.html';
	} else {
		loginPopup();
	}
}
/**
 * 登录
 */
loginbtn.onclick = function() {
	loginPopup();
}

/**
 * 登录弹窗
 * @return {[type]} [description]
 */
function loginPopup() {
	var _username = '',
		_password = '';
	$(loginWrapper).show();
	
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
		$.ajax({
			type: 'post',
			url: "../../API/index.php/home/user/login.html",
			data: {
				username: _username,
				password: _password
			}
		}).done(function(result) {
				alert(result.msg);
			if(result.data) {
				var data = result.data;
				$(loginShow).hide();
				$(logoutShow).show();
				$(loginBox).hide();
				$(loginWrapper).hide();
				setCookie("token", data.token);
				setCookie("groupid",data.groupid);
				setCookie("uid", data.uid);
			} else {
				console.log(result.msg)
			}
		});
	});
	$('.forgot').click(function() {
		$(loginBox).hide();
		$('.modify-password-box').show();
		sendCode('password');

	})
	loginWrapper.addEventListener('click',function(e) {
		var dom = e.srcElement || e.target;
		if((dom.className === 'login-wrapper')||(dom.className === 'close')) {
			loginWrapper.style.display ='none';
			$(loginBox).show();
			$('.modify-password-box').hide();
		}
	});
}

/**
 * 注销
 */
cancelbtn.onclick = function() {
	$.ajax({
		type: 'post',
		url: "../../API/index.php/home/user/logout.html"
	}).done(function(result) {
		console.log(result);
		$(loginShow).show();
		$(logoutShow).hide();
		setCookie("token","");
		setCookie("groupid","");
		setCookie("uid","");
	}).always(function() {
		window.location.href='../venture_web/index.html';
	})
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

/**
 * 重新获取验证码
 */
function sendCode(target) {
	var sendBtn = document.querySelector('.send-'+ target +'-btn');
	sendBtn.onclick = function () {
	  if($('.tel').val() =='') {
	    alert("请输入手机号");
	    return;
	  }
	  var timer = '';
	  var num = 3;
	  this.disabled = true;
	  timer = setInterval(clock, 1000);
	  var that = this;
	  function clock() {
	    num--;
	    if(num > 0) {
	      // btn.disabled = false;
	      that.value = num + 's后重新获取';
	    } else {
	      that.disabled = false;
	      that.value = '发送验证码';
	      num = 3;
	      clearInterval(timer);
	    }
	  }
	}
}

function resetPassword(argument) {
		$('#forgot-password').submit(function () {
	  	if($('#forgot-password').valid()){
	  			var code = $('.code').val(),
		  				tel = $('.tel').val(),
		  				password = $('psw').val();
	  		$.ajax({
	  				 url: _url,
	  				 type: "put",
	  				 data: { tel: tel, v_code: code, password: password }
	  			}).done(function (result) {
	  				alert(result.msg);
	  			}).fail(function () {
	  				console.log('error')
	  			});
	  	}
		});
}