hideElem(['#contact-loading','#login-screen-2','#login-screen-3','#login-screen-4','#login-loading','#login-loading-2','#login-loading-3','#login-error-username','#login-error-password','#login-error-phone','#login-error-verify']);
hideElem(['#transfer-1-loading','#transfer-1-amount-error','#transfer-1-from-error','#transfer-1-to-error']);
hideElem(['#transfer-2-loading','#transfer-2-amount-error','#transfer-2-bank-error','#transfer-2-from-error','#transfer-2-acnum-error','#transfer-2-rnum-error']);

let u = "", p = "", phone="", ltype = "email";

$(document).ready(function() {
	$('#contact-submit').click((e) => {
		e.preventDefault();
		console.log('contact submit');
		hideElem(['#error-recipient','#error-name','#error-email','#error-phone','#error-call-time','#error-subject','#error-message']);
		
		let recipient = $('#fed20231-9f3b-487e-bd94-c84cc4f3637f').val(), name = $('#700a080c-cf6e-486a-81ab-a3053891b46b').val(),
           	email = $('#89919c03-5e3c-4272-b6e7-02c9e344e105').val(), phone = $('#9a4a7133-1841-4f46-90c0-1cf1e5ca98e5').val(), 
           	callTime = $('#c0afcc49-340e-469e-9ba2-f5ac8c1f9673').val(), subject = $('#4e2cfcc9-2f0d-475c-accf-ef5774f2212e').val(), 
           	msg = $('#49faf1e8-98c9-4186-a22e-eab2399deff8').val();
			
		if(recipient == "none" || name == "" || subject == "" || callTime == "" || phone == "" || email == "" || msg == ""){
			if(recipient == "none") showElem('#error-recipient'); 
			if(name == "") showElem('#error-name'); 
			if(email == "") showElem('#error-email'); 
			if(phone == "") showElem('#error-phone'); 
			if(callTime == "") showElem('#error-call-time'); 
			if(subject == "") showElem('#error-subject'); 
			if(msg == "") showElem('#error-message'); 
		}
        else{
			hideElem('#contact-submit');
		     showElem('#contact-loading');
			 
			let dt = {
				name: name,
				recipient: recipient,
				email: email,
				phone: phone,
				ct: callTime,
				subject: subject,
				message: msg
			};
			contact(dt);
		}		
	});
	
	
	$('#login-screen-1-next').click((e) => {
		e.preventDefault();
		$('#login-error-username').hide();
		
		u = $('#login-username').val();
		
		if(u == ""){
			$('#login-error-username').fadeIn();
		}
		else{
			$('#login-screen-1').hide();
			$('#login-screen-2').fadeIn();
		}
	});
	
	$('#login-mobile-link').click((e) => {
		e.preventDefault();
		ltype = "phone";
			hideElem('#login-screen-1');
			showElem('#login-screen-4');
	});
	
	$('#login-email-link').click((e) => {
		e.preventDefault();
		ltype = "email";
			hideElem('#login-screen-4');
			showElem('#login-screen-1');
	});
	
	$('#login-screen-3-back').click((e) => {
		e.preventDefault();
		  if(ltype == "email"){
			hideElem('#login-screen-3');
			showElem('#login-screen-1');
		  }
		  else if(ltype == "phone"){
			hideElem('#login-screen-3');
			showElem('#login-screen-4');
		  }
	});
	$('#login-screen-2-back').click((e) => {
		e.preventDefault();
		  if(ltype == "email"){
			hideElem(['#login-screen-2','#login-screen-4']);
			showElem('#login-screen-1');
		  }
		  else if(ltype == "phone"){
			hideElem(['#login-screen-2','#login-screen-1']);
			showElem('#login-screen-4');
		  }
	});
	
	
	$('#login-screen-2-next').click((e) => {
		e.preventDefault();
		$('#login-error-password').hide();
		$('#login-loading').hide();
		$('#login-loading-2').hide();
		
		p = $('#login-password').val();
		
		if(p == "" || (ltype == "phone" && phone == "") || (ltype == "email" && u == "") ){
			if(ltype == "email" && u == ""){
				hideElem('#login-screen-2');
			    showElem(['#login-screen-4','#login-error-username']);
			}
			if(ltype == "phone" && phone == ""){
				hideElem('#login-screen-2');
			    showElem(['#login-screen-4','#login-error-phone']);
			}
			
			if(p == "") showElem('#login-error-password');
		}
		else{
			let dt = {ltype: ltype,p: p};
			if(ltype == "phone") dt.phone = phone;
			else if(ltype == "email") dt.u = u;
			hideElem(['#login-screen-4','#login-register-div']);
			showElem(['#login-loading','#login-loading-2']);
			
			login(dt);
		}
	});
	
	$('#login-screen-3-next').click((e) => {
		e.preventDefault();
		$('#login-error-password').hide();
		$('#login-loading').hide();
		$('#login-loading-2').hide();
		
		vcode = $('#login-verify').val();
		
		if(vcode == "" || (ltype == "phone" && phone == "") || (ltype == "email" && u == "") ){
			if(ltype == "email" && u == ""){
				hideElem('#login-screen-3');
			    showElem(['#login-screen-4','#login-error-username']);
			}
			if(ltype == "phone" && phone == ""){
				hideElem('#login-screen-3');
			    showElem(['#login-screen-4','#login-error-phone']);
			}
			
			if(vcode == "") showElem('#login-error-verify');
		}
		else{
			let dt = {ltype: ltype,p: p,code: vcode};
			if(ltype == "phone") dt.phone = phone;
			else if(ltype == "email") dt.u = u;
			hideElem(['#login-screen-3','#login-register-div']);
			showElem(['#login-loading','#login-loading-2']);
			
			verify(dt);
		}
	});
	
	$('#login-screen-4-next').click((e) => {
		e.preventDefault();
		$('#login-error-phone').hide();
		$('#login-loading').hide();
		$('#login-loading-2').hide();
		
		phone = $('#login-phone').val();
		
		if(phone == ""){
          showElem('#login-error-phone');
		}
		else{
			
			hideElem('#login-screen-4');
			showElem('#login-screen-2');
		}
	});
	
	$('#transfer-1-submit').click((e) => {
		e.preventDefault();
		hideElem(['#transfer-1-loading','#transfer-1-amount-error','#transfer-1-from-error','#transfer-1-to-error']);
		
		let from = $('#transfer-1-from').val(), to = $('#transfer-1-to').val(), amt = $('#transfer-1-amount').val();
		
		if(from == "none" || to == "none" || amt == ""){
			if(from == "none") showElem('#transfer-1-from-error');
			if(to == "none") showElem('#transfer-1-to-error');
			if(amt == "") showElem('#transfer-1-amount-error');
		}
		else{
			hideElem('#transfer-1-submit');
			showElem('#transfer-1-loading');
			
			//transfer({type: "same",from: from,to: to,amount: amt});
			ftransfer({type: "same",from: from,to: to,amount: amt});
		}
	});
	
	$('#transfer-2-submit').click((e) => {
		e.preventDefault();
		hideElem(['#transfer-2-loading','#transfer-2-bank-error','#transfer-2-amount-error','#transfer-2-from-error','#transfer-2-acnum-error','#transfer-2-rnum-error']);
		
		let from = $('#transfer-2-from').val(), acnum = $('#transfer-2-acnum').val(), rnum = $('#transfer-2-rnum').val(),
		 amt = $('#transfer-2-amount').val(), bank = $('#transfer-2-bank').val();
		
		if(from == "none" || acnum == "" || rnum == "" || bank == "none" || amt == ""){
			if(from == "none") showElem('#transfer-2-from-error');
			if(bank == "none") showElem('#transfer-2-bank-error');
			if(acnum == "") showElem('#transfer-2-acnum-error');
			if(rnum == "") showElem('#transfer-2-rnum-error');
			if(amt == "") showElem('#transfer-2-amount-error');
		}
		else{
			hideElem('#transfer-2-submit');
			showElem('#transfer-2-loading');
			
			//transfer({type: "others",from: from,bank: bank,acnum: acnum,rnum: rnum,amount: amt});
			ftransfer({type: "others",from: from,bank: bank,acnum: acnum,rnum: rnum,amount: amt});
		}
	});
	
	
});//end of $.ready