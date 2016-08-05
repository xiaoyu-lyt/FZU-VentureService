/**
 * 发布新寻找表单验证
 */
(function () {
	jQuery.extend(jQuery.validator.messages, {
	  required: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#find-form').validate({
		debug: true,
		rules: {
			description : {
				maxlength: 300
			}
		}
	});
})();

/**
 * 提交新的寻找
 */
$('#apply-submit').click(function() {
	$.ajax({
		url: ".../../API/index.php/home/upload/upload.html",
		type: "post",
		data: $('#find-form').serialize()
		}).done(function(result) {
			alert("result");
		});
});