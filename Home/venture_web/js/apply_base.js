var fid = window.location.search,
	fid = fid.replace(/[^0-9]+/, "");

/**
 * 入驻申请表单验证
 */
function validateForm() {
	jQuery.extend(jQuery.validator.messages, {
	  required: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#step1').validate({
		debug: true,
		rules: {
			introduction : {
				maxlength: 500
			}
		},
		submitHandler:function(form){
		 $('.step1').hide();  
		 $('.step2').show();
		 $(oli[0]).removeClass('now');
		 $(oli[1]).addClass('now');
		 }  
	});
	$('#step2').validate({
		debug: true,
		rules: {
			know_why : {
				maxlength: 300
			},
			develop_status: {
				maxlength: 300
			},
			theoretical_innovation: {
				maxlength: 300
			},
			application_innovation: {
				maxlength: 300
			},
			structure_innovation: {
				maxlength: 300
			},
		},
		submitHandler:function(form){
			 $('.step2').hide();  
			 $('.step3').show();
			 $(oli[1]).removeClass('now');
			 $(oli[2]).addClass('now');
		 }  
	});
};

function submitApplyBase() {
	validateForm();
		var formStr= "fid=" + fid + '&';
		$('#step1-btn').click(function() {
			formStr += $('#step1').serialize();
		});
		$('#step2-btn').click(function() {
			formStr += '&' + $('#step2').serialize();
		});
		$('#step3-btn').click(function() {
			formStr += '&' + $('#step3').serialize();
			$.ajax({
				url: "../..//API/index.php/home/field/fieldApply.html",
				type: "post",
				data: formStr
				}).done(function(result) {
					alert(result.msg);
				});
		})
}

submitApplyBase();

laydate({
    elem: '#setup-time'
});


