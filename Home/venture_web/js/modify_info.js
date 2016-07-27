$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {
		var length = value.length;
		var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
		return this.optional(element) || (length == 11 && mobile.test(value));
	});
	$('#modify-tel').validate({
		rules: {
			password: "required",	
			v_code: "required",	
			tel: {
				required: true,
				isMobile: true
			}
		},
		messages: {
			password: "请输入密码",
			v_code: "请输入短信验证码",
			tel: {
				required: "请输入手机号",
				isMobile: "手机号不正确"
			}
		}
	})
	$('#modify-password').validate({
		rules: {
			new_password: "required",	
			v_code: "required",	
			tel: {
				required: true,
				isMobile: true
			}
		},
		messages: {
			new_password: "请输入密码",
			v_code: "请输入短信验证码",
			tel: {
				required: "请输入手机号",
				isMobile: "手机号不正确"
			}
		}
	})
	$('#verify-studnet').validate({
		rules: {
			snum: "required",	
			spassword: "required"
		},
		messages: {
			snum: "请输入学号",
			spassword: "请输入密码"
		}
	})
});



var modifyWrapper = document.querySelector('.modify-wrapper');

function modifyInfo(event) {
	var eventClass = event.className.split(' ')[0];
	var box = document.querySelector('.' + eventClass + '-box');
	modifyWrapper.style.display = 'block';
	box.style.display = 'block';
	modifyWrapper.addEventListener('click',function(e) {
		var dom = e.srcElement || e.target;
		if((dom.className === 'modify-wrapper')||(dom.className === 'close')) {
			modifyWrapper.style.display ='none';
			box.style.display = 'none';
		}
	})
}