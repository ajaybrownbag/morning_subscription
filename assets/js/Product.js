/*==============================================
# Module: Chackout
# Author: Ajay Kumar
# Comment: Please create a copy before editing
==============================================*/

class Product{
	// Default Constructor
	constructor(){}

	/*==== Blocking UI ==== */
	static async blockUI(status){
		if(status){
			this.requestCount+=1;
			$("#blockUI").remove();
			$("body").append('<div id="blockUI"><div class="message text-center"><span class="processing"><i class="fa fa-sun-o fa-spin fa-3x"></i></span></div></div>');
		}else{
			this.requestCount-=1;
			if(!this.requestCount){
				$("#blockUI").remove();
			}
		}
	}

	// Communicate with server
	static async sendRequest(url,data){
		var $self = this;
		return await $.ajax({
			url: url,
			data: data,
			type: 'POST',
			dataType:'json',
			beforeSend: function(){$self.blockUI(true);},
			success: function(response){
				$self.blockUI(false);
				return response;
			},
			error: function(){
				$self.blockUI(false);
				return {status:false,message:"Failed to process your request"};
			}
		});
	}

	// Getting product Configurations
	static async getConfigurations(product_id){
		var $self = this;
		var url = window.base_url+"ajax/product_details";
		var params = {
			action : "getConfigurstions",
			product_id : product_id
		};
		var response = await $self.sendRequest(url,params);
		return response;
	}

	// Initialize product configurations
	static async initConfigurations(){
		var $self = this;

		$("#config-panel li a").click(async (e)=>{
			var pattern = $(e.target).data("pattern");
			$self.switchPattern(pattern);
		});
		$self.configs.product_id = $("#product").data("id");
		// setting quantity
		$("#product-quantity").on("change",(e)=>{
			$self.configs.quantity = e.target.value;
		});

		var response = await $self.getConfigurations($self.configs.product_id);
		$self.fillConfigs(response.configs);
	}

	static async fillConfigs(configs){
		var $self = this;
		if(configs != null){
			$self.configs.pattern = configs.pattern;
			$self.configs.pattern_value = configs.pattern_value;
			$("#config-panel li a."+$self.configs.pattern).trigger("click");
		}else{

		}

	}

	static async validateConfigs(){
		return ($self.configs != null) ? true : false;
	}

	static async switchPattern(pattern){
		var $self = this;
		switch(pattern){
			case "everyday":
				$self.configs.pattern_value = 1;
				$self.configs.pattern = pattern;
				$self.configs.date_range = $("#"+pattern).find("input.date-range").val();
			break;
			case "alternate":
				$self.configs.pattern_value = $("#alternate #alternateDay").val();
				$self.configs.pattern = pattern;
				$self.configs.date_range = $("#"+pattern).find("input.date-range").val();
				$("#alternate #alternateDay").change((e)=>{
					$self.configs.pattern_value = e.target.value;
				});
			break;
			case "weekdays":
				var pattern_values = {mon:false,tue:false,wed:false,thu:false,fri:false,sat:false,sun:false};
				for(var day in pattern_values){
					$(".weekdaytab .button-checkbox button."+day).on("click",(e)=>{
						e.preventDefault();
						var element = $(e.target).data("day");
						$self.configs.pattern_value[element] = $("input#"+element).is(":checked") ? true : false;
					});
					if($(".weekdaytab #"+day).is(":checked")){
						pattern_values[day] = true;
					}
				}
				$self.configs.pattern_value = pattern_values;
				$self.configs.pattern = pattern;
				$self.configs.date_range = $("#"+pattern).find("input.date-range").val();
			break;
			case "once":
				$self.configs.pattern_value = 1;
				$self.configs.pattern = pattern;
				$self.configs.date_range = $("#"+pattern).find("input.date").val();
			break;
			default: $self.configs.pattern = null;
		}
	}
	// Checkout Initialization
	static async init(){
		var $self = this;
		$self.configs = {
			quantity : 1,
			product_id : null,
			pattern : "everyday",
			pattern_value: 1,
			date_range : null
		};

		$self.initConfigurations();
	}
}

Product.requestCount = 0;
