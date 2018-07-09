class Home{
	constructor(){}
	static async init(){
		//================================================
		// Header Autosuggestions
		$("input#search_query, input#mobile_search").easyAutocomplete({ 
			url: function() {
				return window.base_url+"ajax/search_suggestions";
			},
			getValue: function(element) { return element.product_name;},
			ajaxSettings: {
				dataType: "json",
				method: "POST",
				data: { action: "getSuggestions" }
			},
			preparePostData: function(data) {
				data.term = ($("input#search_query").val().length) ? $("input#search_query").val() : $("input#mobile_search").val();
				return data;
			},
			list: {
				maxNumberOfElements: 10,
				onSelectItemEvent: function() { return false; },
				showAnimation: { type: "fade", time: 200 },
				hideAnimation: { type: "slide", time: 200 }
			},
			requestDelay: 100,
			adjustWidth: true,
			autocompleteOff: true,
			minCharNumber: 2,
			template: {
				type: "custom",
				method: function(value, item) {
					return '<a href="'+window.base_url+'product-details/'+item.seourls+'" class="text-muted">'+
					'<img src="' + item.product_icon + '" class="img img-responsive pull-left"/>'+
					item.product_name+
					'</a>';
				}
			},
			theme: "square"
		});
		//-------------------------------------------------
	}
}
