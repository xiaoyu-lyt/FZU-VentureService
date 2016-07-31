$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {
		var length = value.length;
		var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
		return this.optional(element) || (length == 11 && mobile.test(value));
	});
	jQuery.validator.addMethod("isUsername", function(value, element) {
		var uname = /^[a-zA-Z0-9_]*$/;
		return this.optional(element) || (uname.test(value));
	});
	jQuery.validator.addMethod("isName", function(value, element) {
		var iname = /^[\u4e00-\u9fa5]+$/;
		return this.optional(element) || (iname.test(value));
	});

	$('#signup-form').validate({
		rules: {
			username: {
				required: true,	
				isUsername: true
			},
			name: {
				required: true,
				isName: true
			},
			password: "required",
			confirm_password: {
				required: true,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			tel: {
				required: true,
				isMobile: true
			}
		},
		messages: {
			username: {
				required: "请输入用户名",
				isUsername: "字母下划线和数字组成"
			},
			name: {
				required: "请输入姓名",
				isName: "姓名不合法"
			},
			password: "请输入密码",
			confirm_password: {
				required: "请输入确认密码",
				equalTo: "两次输入不一致"
			},
			email: {
				required: "请输入邮箱地址",
				email: "邮箱格式不正确"
			},
			tel: {
				required: "请输入手机号",
				isMobile: "手机号不正确"
			}
		}
	})
});

var st = document.querySelectorAll('.st'),
	role = document.querySelectorAll('.role');

st = [].slice.call(st);
$.each(st, function(index, element) {
	element.index = index;

	element.onclick = function() {
		$.each(role, function(index, element) {
			$(element).removeClass('now');
		})
		$(role[this.index]).addClass('now');
	}
})


var sendBtn = document.querySelector('.send-code');
sendBtn.onclick = function () {
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

var _groupid = 0;
var select = document.querySelector('.signup-role-select');

select.addEventListener('click', function(event) {
	_groupid = event.target.id.slice(-1);

})

$('#submit').click(function() {
	var _username = $('#username').val(),
		_name = $('#name').val(),
		_password = $('#password').val(),
		_email = $('#email').val(),
		_tel = $('#tel').val(),
		v_code = $('#v-code').val();

	$.ajax({
		type: "post",
		url: "../../API/index.php/home/user/register.html",
		data: {
			username: _username,
			name: _name,
			password: _password,
			email: _email,
			tel: _tel,
			v_code: v_code,
			groupid: _groupid
		},
		error: function(){
			alert('error!');
		},
		success: function(result) {
			alert(result.msg);
			window.location.href='../venture_web/index.html';
		}
	})
})