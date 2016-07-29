var edit = document.querySelector('#head-file');
edit.onclick = function() {
	if($('#head-file').val().length > 0) {
		upload();
	}
}

function upload() {
	console.log($('#head-file').val());
	$.ajaxFileUpload (
       {
           url: '/Home/Upload', //用于文件上传的服务器端请求地址
           secureuri: false, //一般设置为false
           fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file" name="file" />
           dataType: 'HTML', //返回值类型 一般设置为json
           success: function (data, status)  //服务器成功响应处理函数
           {
               alert(data);
               $("#img1").attr("src", data);
               if (typeof (data.error) != 'undefined') {
                   if (data.error != '') {
                       alert(data.error);
                   } else {
                       alert(data.msg);
                   }
               }
           },
           error: function (data, status, e)//服务器响应失败处理函数
           {
               alert(e);
           }
       }
   )
   return false;
}



function findPartner() {
	var find = document.querySelector('.user-student-projects');
	var list = document.querySelector('.find-partner-list');
	find.style.display = 'none';
	list.style.display = 'block';
	console.log(list);
	// console.log("hello");
}