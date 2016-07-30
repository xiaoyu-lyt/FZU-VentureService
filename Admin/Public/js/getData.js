var curPage = 1;
var total,pageSize,totalPage;

//获取数据 
function getData(page,user){  
    $.ajax({ 
        type: 'POST', 
        url: 'http://127.0.0.1/demo/jyzd/index.php/home/user/student', 
        data: {'pageNum':page-1}, 
        dataType:'json', 
        success:function(json){ 
           alert(json);
        }, 
        complete:function(){ //生成分页条 
            getPageBar(); 
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
}

//获取分页条 
function getPageBar(){ 
    //页码大于最大页数 
    if(curPage>totalPage) curPage=totalPage; 
    //页码小于1 
    if(curPage<1) curPage=1; 
    pageStr = "<span>共"+total+"条</span><span>"+curPage+"/"+totalPage+"</span>"; 
     
    //如果是第一页 
    if(curPage==1){ 
        pageStr += "<span>首页</span><span>上一页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a></span>"; 
    } 
     
    //如果是最后页 
    if(curPage>=totalPage){ 
        pageStr += "<span>下一页</span><span>尾页</span>"; 
    }else{ 
        pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></span>"; 
    } 
         
    $("#pagecount").html(pageStr); 
}