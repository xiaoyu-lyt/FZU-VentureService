var password1 = document.querySelectorAll('.password1'),
	password2 = document.querySelectorAll('.password2'),
	email = document.querySelectorAll('.email'),
	verifyPsw = document.querySelectorAll('.verify-psw'),
	identity = document.querySelectorAll('.identity'),
	verifyId = document.querySelectorAll('.verify-id');

password1 = [].slice.call(password1);
password1.forEach(function(elem, index){
	elem.index = index;
	elem.onmousedown = function() {
		console.log(elem);
		var i = this.index;
		console.log(identity[i].value);
		if(identity[i].value.trim() == '') {
			verifyId[i].style.visibility = 'visible';
		} else {
			verifyId[i].style.visibility = 'hidden';
			
		}
	}
})
email = [].slice.call(email);
email.forEach(function(elem, index) {
	elem.index = index;
	elem.onmousedown = function() {
		var i = this.index;
		if(password1[i].value === password2[i].value) {
			verifyPsw[i].style.visibility = 'hidden';
		} else {
			verifyPsw[i].style.visibility = 'visible';
		}

	}
})

