const addClass = (elem,name) => {
	let el = document.querySelector(elem);
	
	if(el){
	 el.classList.add(name);
	}
	
}

const removeClass = (elem,name) => {
	let el = document.querySelector(elem);
	
	if(el){
	 el.classList.remove(name);
	}
	
}

const showElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		//console.log(names[i]);
		$(names[i]).fadeIn();
	}
}

const hideElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		//console.log(names[i]);
		$(names[i]).hide();
	}
	
}

const OldShowElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		removeClass(names[i],"hh");
	    addClass(names[i],"vv");
	}
}

const oldHideElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		removeClass(names[i],"vv");
    	addClass(names[i],"hh");
	}
	
}

const contact = (data) => {
		
		 let fd = new FormData();
		 fd.append("dt",JSON.stringify(data));
		 fd.append("_token",$('#tk').val());
		 
	
	//create request
	const req = new Request("contact-us",{method: 'POST', body: fd});
	//console.log(req);
	
	
	//fetch request
	fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error", message: "Technical error"};
		   }
	   })
	   .catch(error => {
		   Swal.fire({
			   icon: 'error',
             title: `Failed to send message: ${error}`
           }).then((result) => {
                if (result.value) {
	             hideElem('#contact-loading');
		         showElem('#contact-submit');		
                }
              });	
	   })
	   .then(res => {
		   console.log(res);
          
				 
		   if(res.status == "ok"){
                  Swal.fire({
			   icon: 'success',
             title: `Message sent! We will reply shortly.`
           }).then((result) => {
                if (result.value) {
	             window.location = "/";
                }
              });
		   }
		   else if(res.status == "error"){
			    Swal.fire({
			   icon: 'error',
             title: `An unknown error has occured. Please try again.`
           }).then((result) => {
                if (result.value) {
	             hideElem('#contact-loading');
		         showElem('#contact-submit');		
                }
              });				 
		   } 
	   }).catch(error => {
		    Swal.fire({
			   icon: 'error',
             title: `Failed to send message: ${error}`
           }).then((result) => {
                if (result.value) {
	             hideElem('#contact-loading');
		         showElem('#contact-submit');		
                }
              });	
             	
	   });
}

const login = (data) => {
		 let fd = new FormData();
		 let ltp = data.ltype;
		
		if(ltp == "email"){
		 fd.append("u",data.u);
		}
		else if(ltp == "phone"){
		 fd.append("num",data.phone);
		}
		 fd.append("p",data.p);
		fd.append("ltype",ltp);
		 fd.append("_token",$('#tk').val());
		 
	
	//create request
	const req = new Request("auth",{method: 'POST', body: fd});
	//console.log(req);
	
	
	//fetch request
	fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error", message: "Technical error"};
		   }
	   })
	   .catch(error => {
		   Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	             hideElem(['#login-loading','#login-loading-2']);
	             
	             if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
		         
                }
              });	
	   })
	   .then(res => {
		   console.log(res);
          
				 
		   if(res.status == "ok"){
			/*
                  Swal.fire({
			   icon: 'info',
             title: `A verification code has been sent to your ${data.ltype}`
           }).then((result) => {
                if (result.value) {
	             hideElem(['#login-loading','#login-screen-2','#login-loading-2']);
		         showElem('#login-screen-3');		
                }
              });
			  */
			 window.location.replace('dashboard')
		   }
		   else if(res.status == "error"){
			   let errr = res.message, msg = "";
			
			   if(errr == "auth"){
				msg = `Incorrect username or password. Please try again.`;
               }
               else if(errr == "validation"){
               	msg = `Please fill all required fields and try again.`;
               }
               
			    Swal.fire({
			   icon: 'error',
             title: msg
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });				 
		   } 
	   }).catch(error => {
		    Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });	
             	
	   });
}

const verify = (data) => {
		
		 let fd = new FormData();
		 if(data.ltype == "email"){
		 fd.append("u",data.u);
		}
		else if(data.ltype == "phone"){
		 fd.append("num",data.phone);
		}
		fd.append("p",data.p);
		fd.append("code",data.code);
		fd.append("ltype",data.ltype);
		 fd.append("_token",$('#tk').val());
		 
	
	//create request
	const req = new Request("auth-2",{method: 'POST', body: fd});
	//console.log(req);
	
	
	//fetch request
	fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error", message: "Technical error"};
		   }
	   })
	   .catch(error => {
		   Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });	
	   })
	   .then(res => {
		  // console.log(res);
          
				 
		   if(res.status == "ok"){
                  Swal.fire({
			   icon: 'success',
             title: `Login verified!`
           }).then((result) => {
                if (result.value) {
	            window.location = "dashboard";		
                }
              });
		   }
		   else if(res.status == "error"){
               let msg = `Incorrect verification. Please try again.`;
              
			    Swal.fire({
			   icon: 'error',
             title: msg
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		          showElem('#login-screen-3');
                }
              });				 
		   } 
	   }).catch(error => {
		    Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });	
             	
	   });
}

const transfer = (data) => {
		
		 let fd = new FormData();
		 
		 if(data.type == "same"){
		 fd.append("to",data.to);
		}
		else if(data.type == "others"){
		 fd.append("bank",data.bank);
		 fd.append("acnum",data.acnum);
		 fd.append("rnum",data.rnum);
		}
		
		fd.append("from",data.from);
		fd.append("type",data.type);
		fd.append("amount",data.amount);
		 fd.append("_token",$('#tk').val());
		 
	
	//create request
	const req = new Request("transfer",{method: 'POST', body: fd});
	//console.log(req);
	
	
	//fetch request
	fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error", message: "Technical error"};
		   }
	   })
	   .catch(error => {
		   Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });	
	   })
	   .then(res => {
		  // console.log(res);
          
				 
		   if(res.status == "ok"){
                  Swal.fire({
			   icon: 'success',
             title: `Login verified!`
           }).then((result) => {
                if (result.value) {
	            window.location = "dashboard";		
                }
              });
		   }
		   else if(res.status == "error"){
               let msg = `Incorrect verification. Please try again.`;
              
			    Swal.fire({
			   icon: 'error',
             title: msg
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		          showElem('#login-screen-3');
                }
              });				 
		   } 
	   }).catch(error => {
		    Swal.fire({
			   icon: 'error',
             title: `Failed to log you in: ${error}`
           }).then((result) => {
                if (result.value) {
	              hideElem(['#login-loading','#login-loading-2']);
		         if(data.ltype = "phone"){
		           showElem('#login-screen-2');
                }
                else if(data.ltype = "email"){
		           showElem('#login-screen-4');
                }
                }
              });	
             	
	   });
}

const ftransfer = (data) => {
		 let params = {
			   icon: 'success',
             title: `Transfer successful!`
           };
		   if(stealth) params = {
			   icon: 'error',
             title: `Transfer could not be processed. Please try again later.`
           };
		   
		   setTimeout(() => {
                  Swal.fire(params).then((result) => {
                if (result.value) {
	              //window.location = "dashboard";	
                  if(data.type == "same"){
					 hideElem('#transfer-1-loading');
			         showElem('#transfer-1-submit');
				  }
				  else if(data.type == "others"){
					 hideElem('#transfer-2-loading');
			         showElem('#transfer-2-submit');
				  }				
                }
              });
		   },4000);
		  
}