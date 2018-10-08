class User{
	//Default Constructor
	constructor(){}
	
	// Communicate with server
	static async sendRequest(url,data){
		var self = this;
		return $.ajax({
			url: url, 
			data: data, 
			type: 'POST', 
			dataType:'json',
			beforeSend: function(){},
			success: function(response){
				return response;
			},
			error: function(){
				return {status:false,message:"Failed to process your request"};
			}
		});
	}
	
	// Login Process
	static async login(mobile,password){
		var $self = this;
		var url = window.base_url+"ajax/doLogin";
		
		var response = await $self.sendRequest(url,{action:"doLogin",mobile,password});
		if(response.status){
			window.location.reload();
		}else{
			$("p#error-message").text(response.message).show();
			setTimeout(()=>{
				$("p#error-message").hide();
			},3000);
		}
	}
	
	//Signup User
	static async singnup(data,action){
		var response = {
			status : false,
			message : "Invalid Action"
		};
		switch(action){
			case "step_1":
				var url = window.base_url+"ajax/userActions";
				response = await this.sendRequest(url,data);
			break;
			case "step_2":
				response = await this.sendRequest(url,data);
			break;
			default:
			callback({
				status:false,
				message:"Invalid Action"
			});
		}
	}
	
	// Reset password
	static async resetPassword(){
		
	}
	
	// Initialization of module
	static async init(){
		var self = this;
		$("button#login-button").on("click",function(){
			var mobile = $("form#login-form").find("input[name=mobile]").val();
			var password = $("form#login-form").find("input[name=password]").val();
			self.login(mobile,password);
		});
		// Signup Process
		$("button#signup-button").on("click",()=>{
			var mobile = $("#signup-form").find("input[name=mobile]").val();
			var password = $("#signup-form").find("input[name=password]").val();
			var email = $("#signup-form").find("input[name=email]").val();
			var terms = $("#signup-form").find("input[name=tnc]").val();
			var firstStep = { mobile, email, password, terms };
			self.signup(data,"step_1",(response)=>{
				if(response.status){
					$("#step-1").hide();
					$("#step-2").show();
				}else{
					$.alert({
						title:"Oops!",
						content: response.message,
						type:"red"
					});
				}
			});
		})
		
	}
}