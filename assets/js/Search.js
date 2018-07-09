/*-----------------------------------------
# Title			: Search Subscription products
# Author		: Ajay Kumar
# Description	: Module with fully async behaviour
-----------------------------------------*/
class Search{
	// Default Constructor
	constructor(){}
	
	// Communicate with server
	static async sendRequest(url,data,callback){
		await (()=>{
			$.ajax({
				url		:url,
				data	:data,
				type	:"POST",
				dataType:"josn",
				success:async (response)=>{
					await callback(response);
				},
				error:async ()=>{
					await callback({status:false,message:"Unable to communicate with server!"});
				}
			});
		})();
	}
}