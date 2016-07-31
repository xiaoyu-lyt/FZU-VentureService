
/**
 * 上传头像
 * @type {dom}
 */
var submit = document.querySelector('.form-submit');
submit.onclick = function() {
  if($('#head-file').val().length > 0) {
    upload();
  }
}

function upload() {
	console.log($('#head-file').val());
	$.ajax({
    type: "post",
    url:"",
    data: $('#head-form').serialize(),
    suuccess: function(result) {
      data = result.data
    }
  }) 
}


function getCookie(c_name) {
  if(document.cookie.length > 0) {
    c_start = document.cookie.indexOf(c_name + '=');
    if(c_start!=-1) {
      c_start = c_start + c_name.length + 1;
      c_end = document.cookie.indexOf(";", c_start);
      if(c_end == -1) {
        c_end = document.length;
      }
      return document.cookie.substring(c_start, c_end);
    }
  }
  return "";
}

function findPartner() {
	var find = document.querySelector('.user-student-projects');
	var list = document.querySelector('.find-partner-list');
	find.style.display = 'none';
	list.style.display = 'block';
  $.ajax({
    url:"../../API/index.php/home/Partner/search.html"
  }); 
}


function getInfo() {
    $.ajax({
    type: "get",
    url: "../../API/index.php/home/user/getUserInfo.html",
    data: {
      uid: getCookie("uid"),
      token: getCookie("token")
    },
    error: function () {
      console.log("error!");
    },
    success: function(result) {
      var data = result.data;
      // console.log(data);
      $('#user-name').val(data.username);
      $('#name').val(data.name);
      $('#email').val(data.email); 
      $('#tel').val(data.tel);
    }
  });
}

getInfo();
findPartner();