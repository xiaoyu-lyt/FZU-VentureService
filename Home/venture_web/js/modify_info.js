$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {
		var length = value.length;
		var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
		return this.optional(element) || (length == 11 && mobile.test(value));
	});
	$('#modify-tel').validate({
		submitHandler: function(form) {
		},
		rules: {
			password: {
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
			password: {
				required: "请输入密码",
				minlength: "密码不得少于{0}位"
			},
			v_code: "请输入短信验证码",
			tel: {
				required: "请输入手机号",
				isMobile: "手机号不正确"
			}
		}
	});
	$('#modify-password').validate({
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

$('.modify-tel').click(function () {
	modifyInfo('tel');
	
});

$('.modify-password').click(function() {
	modifyInfo('password');
})

/**
 * 修改信息弹窗
 * @param  {String} target 修改手机号：tel、修改密码：password
 * @return {[type]}        [description]
 */
function modifyInfo(target) {
	var _url =  baseUrl + "user/";
	$('.modify-wrapper').show();
	$('.modify-'+ target +'-box').show();
	sendCode(target);
	if(target === 'tel') {
		_url += "phoneModify.html";
	} else if (target === 'password') {
		_url += "setting.html"
	}
	$('form').submit(function () {
		// console.log($('#modify-'+target).valid());
  	if($('#modify-'+target).valid()){
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
	//隐藏弹出层和遮罩层
	modifyWrapper.addEventListener('click',function(e) {
		var dom = e.srcElement || e.target;
		if((dom.className === 'modify-wrapper')||(dom.className === 'close')) {
			$('.modify-wrapper').hide();
			$('.modify-'+ target +'-box').hide();
		}
	});
}

/**
 * 重新获取验证码
 */
function sendCode(target) {
	var sendBtn = document.querySelector('.send-'+ target +'-btn');
	sendBtn.onclick = function () {
	  if($('#modify-'+target).find('.tel').val() =='') {
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
