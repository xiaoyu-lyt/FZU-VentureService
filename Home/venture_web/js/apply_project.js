var isMember = false;
$('#now-income').hide();
var isincome = document.querySelectorAll('.isincome');
$(isincome).each(function(index, elem){
	$(elem).click(function(){
		if($(this).val() == 'yes') {
			$('#now-income').show();
		} else {
			$('#now-income').hide();
		}
	});
});

/**
 * 表单验证
 */
$().ready(function() {
	var	oli = document.querySelector('.user-apply-sidenav').querySelectorAll('li');
	var userBox = document.querySelectorAll('.user-box');
	$('.btn-pre').each(function(index, elem) {
		elem.index = index;
		elem.onclick = function() {
			$('.user-box').each(function(i, e){
				e.style.display = 'none';
				$(oli[i]).removeClass('now');
			})
			$('oli.now').removeClass('now');
			userBox[this.index].style.display = 'block';
			$(oli[this.index]).addClass('now')
		}
	});
	jQuery.extend(jQuery.validator.messages, {
	  requiredd: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#step1').validate({
		rules: {
			project_brief: {
				maxlength: 500
			}
		},
		submitHandler:function(form){
           $('.step1').hide();  
           $('.step2').show();
           $(oli[0]).removeClass('now');
           $(oli[1]).addClass('now');
           isMember = true;
       }    
	})
	$('#step2').validate({
		rules: {
			member_work: {
				maxlength : 150
			},
			member_start: {
				maxlength: 150
			}
		},
		submitHandler:function(form) {
			$('.step2').hide();
			$('.step3').show();
			$(oli[1]).removeClass('now');
			$(oli[2]).addClass('now');
		}
	})
	$('#step3').validate();
});

function addMember() {
	var arr = [];
	arr += '<tr><th class="text-center" colspan="4">队员信息</th></tr><tr><td>姓名<span class="star">*</span></td><td><input type="text" name="name" required></td><td>性别<span class="star">*</span></td><td><input type="radio" name="sex" required>男<input type="radio" name="sex" required>女</td></tr><tr><td>专业<span class="star">*</span></td><td><input type="text" name="major" required></td><td>占股比例<span class="star">*</span></td><td><input type="text" name="share_percentage" required></td></tr><tr><td>证件类型<span class="star">*</span></td><td><select name="id_type" id="id-type" required><option></option><option value="stu-card">学生证</option>  <option value="id-card">身份证</option><option value="others">其他</option></select></td><td>证件号<span class="star">*</span></td><td><input type="text" name="id_number" required></td></tr><tr><td>手机<span class="star">*</span></td><td><input type="text" name="tel" required></td><td>邮箱<span class="star">*</span></td><td><input type="text" name="email" required></td></tr><tr><td>主要职责<span class="star">*</span></td><td colspan="3"><input id="duty-technology" type="radio" name="duty" required><label class="radio-inline" for="duty-technology">技术</label><input id="duty-financing" type="radio" name="duty" required><label class="radio-inline" for="duty-financing">融资</label> <input id="duty-operation" type="radio" name="duty" required><label class="radio-inline" for="duty-operation">运营</label><input id="duty-market" type="radio" name="duty" required><label class="radio-inline" for="duty-market">市场</label><input id="duty-others" type="radio" name="duty" required><label class="radio-inline" for="duty-others">其他</label></td></tr><td>工作履历</td><td colspan="3"><textarea name="member1_work"></textarea></td></tr><tr><td>创业履历</td><td colspan="3"><textarea name="member1_start"></textarea></td></tr>';
	$('#member-info').append(arr);
}


