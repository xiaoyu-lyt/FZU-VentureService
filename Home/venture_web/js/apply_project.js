

/**
 * 添加成员信息
 */
function addMember() {
	var _index = 1;
	$('#add-member').click(function() {
		console.log(_index);
		var template = Handlebars.compile($('#member-template').html()); //注册模板
		data = [{ index : ++_index }];
		var html = template(data); //封装模板
		$('#member-info').append(html);
	});
}

function validateForm() {
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
}

/**
 * 提交项目申请
 */
function submitApplyProject() {
	validateForm();
	var formStr= '',
			files;
	$('#step1-btn').click(function() {
		formStr += $('#step1').serialize();
	});
	$('#step2-btn').click(function() {
		formStr += '&' + $('#step2').serialize();

	});
	$('#step3-btn').click(function() {
		formStr += '&' + $('#step3').serialize();
		//上传文件
		$.ajax({
			url:  baseUrl + "upload/fileUpload",
			// url:"../../test.php",
			type: "post",
			data: new FormData($('#step1')[0]),
			processData: false,
			cache: false,
			contentType :false
			}).done(function(result) {
				files = result.data;
			}).always(function () {
				//上传表单
				formStr += '&pic=' + files.pic + '&logo=' + files.logo + '&plan=' + files.plan + '&attachment=' + files.attachment; 
				$.ajax({
					url:  baseUrl + "project/apply",
					type: "post",
					data: formStr
					}).done(function(result) {
						alert(result.msg);
					});
			})
	});
}

/**
 * laydate日期插件
 * @type {String}
 */
laydate({
    elem: '#time1'
});
laydate({
    elem: '#time2'
});

function init() {
	addMember();
	submitApplyProject();
}

init();