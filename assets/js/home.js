class Home{
	constructor(){}
	static async init(){
		//================================================
		// Header Autosuggestions
		$("input#search_query, input#mobile_search").easyAutocomplete({ 
			url:window.base_url+"ajax/search_suggestions",
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
			highlightPhrase: true,
			list: {
				maxNumberOfElements: 10,
				onKeyEnterEvent : false,
				showAnimation: { type: "fade", time: 100 },
				hideAnimation: { type: "slide", time: 100 }
			},
			requestDelay: 100,
			adjustWidth: true,
			autocompleteOff: true,
			minCharNumber: 2,
			template: {
				type: "custom",
				method: function(value, item) {
					if(item.type == 'category'){
						var term = $("input#search_query").val();
						return '<a href="'+window.base_url+'search-results?q='+term+'&type='+item.category_url+'" class="text-muted">'+term+'<b> in '+ item.category_name+' category</b></a>'
					}else{
						return '<a href="'+window.base_url+'product-details/'+item.seourls+'" class="text-muted">'+
						'<img src="' + item.product_icon + '" class="img img-responsive pull-left"/>'+
						item.product_name+' - '+item.unit
						'</a>';
					}
				}
			},
			theme: "square"
		});
	}
}
