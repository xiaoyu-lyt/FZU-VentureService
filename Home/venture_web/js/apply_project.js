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
	  required: "必填字段"
	});
	$('#step1').validate({
		submitHandler:function(form){
           $('.step1').hide();  
           $('.step2').show();
           $(oli[0]).removeClass('now');
           $(oli[1]).addClass('now');
       }    
	})
	$('#step2').validate({
		submitHandler:function(form) {
			$('.step2').hide();
			$('.step3').show();
			$(oli[1]).removeClass('now');
			$(oli[2]).addClass('now');
		}
	})
	$('#step3').validate({
		submitHandler:function(form) {
			$('.step3').hide();
			$('.step4').show();
			$(oli[2]).removeClass('now');
			$(oli[3]).addClass('now');
		}
	})
	$('#step4').validate({
		submitHandler:function(form) {
			$('.step4').hide();
			$('.step5').show();
			$(oli[3]).removeClass('now');
			$(oli[4]).addClass('now');
		}
	})
	$('#step5').validate({
		submitHandler:function(form) {
			$('.step5').hide();
			$('.step6').show();
			$(oli[4]).removeClass('now');
			$(oli[5]).addClass('now');
		}
	})
	$('#step6').validate();
});