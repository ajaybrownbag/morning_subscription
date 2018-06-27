class ProductDetails{
	constructor(){
		
	}
	
	sendRequest(url,data,callback){
		$.ajax({
			url:url,
			data: data,
			success:(response)=>{
				callback(response);
			},
			error:()=>{
				callback({status:false,message:"Error: Internal Server Error!"});
			}
		});
	}
}