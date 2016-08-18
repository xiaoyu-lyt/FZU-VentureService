var fid = window.location.search,
	fid = fid.replace(/[^0-9]+/, "");

/**
 * 入驻申请表单验证
 */
(function () {
	jQuery.extend(jQuery.validator.messages, {
	  required: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#apply-base-form').validate({
		debug: true,
		rules: {
			introduction : {
				maxlength: 500
			}
		}
	});
})();

/**
 * 提交入驻申请
 */
$('#apply-submit').click(function() {
	var formStr = "fid=" + fid + '&' + $('#apply-base-form').serialize();
	var errors = document.querySelectorAll('label.error').length;
	var file = $('#documents').val();
	// console.log(file);
	if(errors == 0 && file) {
		$.ajax({
		url: "../../API/index.php/home/upload/fileUpload.html",
		type: "post",
		data: new FormData($('#apply-base-form')[0]),
		processData: false,
		cache: false,
		contentType :false
		}).done(function(result) {
			// console.log(result);
		});
	$.ajax({
		url: "../..//API/index.php/home/field/fieldApply.html",
		type: "post",
		data: formStr
		}).done(function(result) {
			alert(result.msg);
		});
	}
	
});