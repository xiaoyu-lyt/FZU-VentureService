isPass = ['待审核','审核通过'];
/**
 * 获取个人信息
 * @param  {Number} _uid   当前用户id
 * @param  {String} _token 当前用户token值
 */
function getInfo() {
    $.ajax({
    type: "get",
    url: "../../API/index.php/home/user/getUserInfo.html",
    error: function () {
      console.log("error!");
    },
    success: function(result) {
      var data = result.data;
      console.log(data);
      $('.user-head-portrait').css({"background":"url('"+ data.avatar + "') no-repeat center", "background-size":"cover"});
      $('#user-name').val(data.username);
      $('#name').val(data.name);
      $('#email').val(data.email); 
      $('#tel').val(data.tel);
    }
  });
}

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
  $.ajax({
    type: "post",
    url: "../../API/index.php/home/user/uploadAvatar.html",
    data: new FormData($('#head-form')[0]),
    processData: false,
    cache: false,
    contentType :false
  }).done(function(result) {
    console.log(result);
    var data = result.data;
    // console.log(data);
    $('.user-head-portrait').css({"background":"url('"+ data.avatar + "') no-repeat center", "background-size":"cover"});
    // $('#head-img').attr('src',data.avatar);
  });
}

$('#find-list').click(function() {
  showList('.find-partner-list');
});

$('#myproject').click(function() {
  showList('.myproject-list');
});


/**
 * 点击图标显示按钮
 * @param  {String} listName 寻找合伙人/我的项目
 */
function showList(listName) {
  var find = document.querySelector('.user-student-projects');
  var list = document.querySelector(listName);
  $(find).hide();
  $(list).show();
  $('#find-return').show();
  $('#find-return').click(function() {
    $(list).hide();
    $(find).show();
    $('#find-return').hide();
  });
}

/**
 * 渲染我的寻找合伙人列表
 */
function getFindList(uid) {
  $.ajax({
    type: "get",
    url:"../../API/index.php/home/user/mySeek.html",
    data: {uid: uid }
  }).done(function(result) {
    var dataArr = result.data;
    // console.log(dataArr);
    var li = "";
    if(!dataArr) {
      $('#find-partner-ul').text("暂无信息");
      return;
    }
    $.each(dataArr, function(index, elem) {
      li += '<li><a class="find-theme" href="javascript:;" rel=' + elem.sid +'">' + elem.description + '</a></li>';
    });
    $('#find-partner-ul').html(li);
  }).always(function() {
    var link = document.querySelectorAll('.find-theme');
    $.each(link,function(index, elem) {
      $(elem).click(function() {
        getPartnerInfo(elem.rel);
      });
    });
  })
}


/**
 * 渲染我的入驻申请列表
 */
function getBaseList() {
  $.ajax({
    type: "get",
    url:"../../API/index.php/home/user/myFieldApply.html",
  }).done(function(result) {
  
    var dataArr = result.data;
    // console.log(dataArr);
    var li = "";
    if(!dataArr) {
      $('#enter-base-ul').text("暂无信息");
      return;
    }
    $.each(dataArr, function(index, elem) {
      li += '<li><a class="base-theme" href="javascript:;" rel=' + elem.pid +'">' + elem.name + '</a><span class="base-status">' + isPass[elem.status] + '</span></li>';
    });
    $('#enter-base-ul').html(li);
  });
}

/**
 * 渲染我的项目列表
 */
function getProjectList() {
  $.ajax({
    type: "get",
    url:"../../API/index.php/home/user/myProjects.html",
  }).done(function(result) {
    var dataArr = result.data;
    // console.log(dataArr);
    $('#myproject-ul').empty();
    var li = "";
    if(!dataArr) {
      $('#myproject').text("暂无信息");
      return;
    }
    $.each(dataArr, function(index, elem) {
      li += '<li><a class="project-theme" href="javascript:;" rel=' + elem.pid +'">' + elem.name + '</a><span class="project-status">' + isPass[elem.status] + '</span></li>';
    });
    $('#myproject-ul').html(li);
  });
}
/**
 * 点击寻找队员列表弹出对应寻找记录信息
 * @param  {Number} id 寻找记录编号sid
 */
function getPartnerInfo(_sid) {
  $.ajax({
    url: "../../API/index.php/home/Partner/seekDetail.html",
    type: "get",
    data: { sid: _sid}
  }).done(function(result) {
    var data = result.data;

    // Handlebars
    var template = Handlebars.compile($('#popup1-template').html()); //注册模板
   
    var html = template(data); //封装模板
    $('#popup').html(html); //插入基础模板中

    //寻找具体信息弹窗
    layer.open({  
      title: ['寻找团队成员','font-size:17px; text-align: center'],
      type: 1, 
      area: '600px',
      content: $('#popup')
    });
  })
}



function init() {
  $('#find-return').hide();
  var groupid = getCookie("groupid");
  var uid = getCookie("uid");
  var token = getCookie("token");
  // if(groupid != 4) {
  //   $('#user-sidenav').hide();
  // }
  getInfo();
  getFindList();
  getProjectList();
  getBaseList();
}

init();