class Home{
	constructor(){}
	
	
	
	
	
	
	
	init(){
		var productSliders = {};
		$('.categoryslider .carousel').each(function(){	
			var key = "productSlider_"+$(this).data("index");
			productSliders[key] = $(this).flickity({
			  prevNextButtons: false,
			  pageDots: false,
			  contain:true,
			  freeScroll:true,
			  pageDots:false,
			  adaptiveWidth:true,
			  groupCells:true,
			  cellAlign: 'left'
			});
		});
		console.log(productSliders);
		$('.button--previous').on( 'click', function() {
			var $key = "productSlider_"+$(this).data("index");
			productSliders[$key].flickity('previous');
		});
		$('.button--next').on( 'click', function() {
			var $key = "productSlider_"+$(this).data("index");
			productSliders[$key].flickity('next');
		});
		
		
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true
		});
		
		var imagePath = "https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs_50_50/";
		$("input#search_query").easyAutocomplete({
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
				data.term = $("input#search_query").val();
				return data;
			},
			list: {
				maxNumberOfElements: 10,
				onChooseEvent: function() { $("form#searchForm").submit(); },
				showAnimation: { type: "fade", time: 200 },
				hideAnimation: { type: "slide", time: 200 }
			},
			requestDelay: 100,
			template: {
				type: "iconLeft",
				fields: {iconSrc: "product_icon"}
			},
			theme: "square"
		});
	}
}