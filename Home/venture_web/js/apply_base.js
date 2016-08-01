(function () {
	jQuery.extend(jQuery.validator.messages, {
	  required: "必填字段",
	  maxlength: jQuery.validator.format("超出字数")
	});
	$('#apply-base-form').validate({
		rules: {
			introduction : {
				maxlength: 500
			}
		}
	});
})();