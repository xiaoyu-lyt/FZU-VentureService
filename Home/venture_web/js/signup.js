$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {
		var length = value.length;
		var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
		return this.optional(element) || (length == 11 && mobile.test(value));
	});
	$('#signup-form').validate({
		rules: {
			username: "required",
			name: "required",
			password: "required",
			confirm_password: {
				required: true,
				equalTo: "#apassword"
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
			username: "请输入用户名",
			name: "请输入姓名",
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



var strData = $('.base-information-box input').map(function() {
	return ($(this).attr('name') + '=' + $(this).val());
}).get().join('&');

// var url = "http://api.xiaoyu-lyt.cn/index.php/home/";
$('#submit').click(function() {
	$.ajax({
		url: "http://120.27.114.158/ThinkPHP/API/eGo//index.php/API/Login/loginCheck",
		type: "post",
		// dataType: "jsonp",
		// jsonp: 'jsoncallback',
		data: {
			jwchId: 221300313,
			jwchPassword: 942698 
		},
        error: function(request) {
            alert("Connection error");
        },
		success: function (json) { //客户端jquery预先定义好的callback函数，成功获取跨域服务器上的json数据后，会动态执行这个callback函数    
              if(json.actionErrors.length!=0){    
                  alert(json.actionErrors);    
              }    
          }   
	})
})