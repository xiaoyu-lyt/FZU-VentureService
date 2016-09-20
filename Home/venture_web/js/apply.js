var oli = document.querySelector('.user-apply-sidenav').querySelectorAll('li');
var userBox = document.querySelectorAll('.user-box');
/**
 * 表单步骤切换
 */
function stepChange() {
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
    required: "必填字段",
    maxlength: jQuery.validator.format("超出字数")
  });
}

/**
 * 添加专利信息
 */
function addPatentInfo() {
  var rowspan = index = 2;
  // var index = 2;
  var cols1 = cols2 = 1;
  $('.add-patent').click(function() {
    if($(this).attr('id') == 'add-base-patent') {
      cols1 = 3;
      cols2 = 2;
    }
    var applicationInfo = '<tr><td>申请号</td><td colspan = '+ cols1 +'><input name="patent['+ index +'][application_num]" type="text"></td><td>申请日期</td><td colspan = '+ cols2 +'><input class="application-date" name="patent[' + index + '][application_date]"type="text"></td></tr><tr><td>公告号</td><td colspan = '+ cols1 +'><input name="patent['+ index +'][notification_num]" type="text"></td><td>授权日期</td><td colspan = '+ cols2 +'><input class="authorized-date" name="patent['+ index +'][authorized_date]" type="text"></td></tr>'
    rowspan += 2;
    index++;
    $('#patent-info').attr('rowspan',rowspan);
    $('#apply-step1-table').append(applicationInfo);
  })
}


stepChange();
addPatentInfo();

laydate({
  elem: '.application-date'
});

laydate({
  elem: '.authorized-date'
})