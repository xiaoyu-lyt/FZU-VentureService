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
	// console.log($('#apply-base-form').serialize());
	$.ajax({
		url: "../../API/index.php/home/upload/fileUpload.html",
		type: "post",
		data: new FormData($('#apply-base-form')[0]),
		processData: false,
		cache: false,
		contentType :false
		}).done(function(result) {
			console.log(result);
		});
	$.ajax({
		url: "../..//API/index.php/home/field/fieldApply.html",
		type: "post",
		data: $('#apply-base-form').serialize()
		}).done(function(result) {
			// console.log(result);
		});
});