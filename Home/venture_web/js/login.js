var loginbtn = document.querySelector('.login');
var loginWrapper = document.querySelector('.login-wrapper');

(function loginInterface() {
	loginbtn.onclick = function() {
		loginWrapper.style.display = 'block';
	}	
})();

loginWrapper.addEventListener('click',function(e) {
	var dom = e.srcElement || e.target;
	console.log(dom.className);
	if((dom.className === 'login-wrapper')||(dom.className === 'close')) {
		loginWrapper.style.display ='none';
	}
})



