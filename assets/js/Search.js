/*-----------------------------------------
# Title			: Search Subscription products
# Author		: Ajay Kumar
# Description	: Module with fully async behaviour
# Comment		: Please create a copy before any changes
-----------------------------------------*/
class Search{
	// Default Constructor
	constructor(){}

	// listing footer loader
	static async loading(status){
		if(status){
			var loaderImg = window.base_url+"assets/img/loading.gif";
			var loader = $('<div class="col-sm-12 text-center" id="loader" style="padding:10px;"><img src="'+loaderImg+'" ></div>');
			$(".search-item-container").append(loader);
		}else{
			$(".search-item-container").find("#loader").remove();
		}
	}

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

	// Create new url
	static async createUrl(data){
		var url = "q="+data.term;
		if(data.type.length>0) url += "&type="+data.type
		var params=window.location.href.split("?")[0]+"?"+url;
		window.history.pushState(null,null,params);
	}

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

	// Discount Calculate
	static calculateDiscount(product_mrp,product_price){
		var discount = parseFloat(100-product_price*100/product_mrp).toFixed(2);
		return (Math.ceil(discount) == parseInt(discount)) ? parseInt(discount) : discount;
	}

	// Creating product card
	static async createCard(product){
		var self = this;
		var cell = $("<div>").addClass("item item-thumbnail product-cell").attr("title",product.product_name+" - "+product.unit);
		var productLink = window.base_url+"product-details/"+product.seourls;
		var actionBtnTxt = (product.is_subscribed == "1") ? "MODIFY" : "SUBSCRIBE";
		var actionBtn = $('<div class="subscribhob-btn">'
			+'<p align="center">'
			+'<a href="'+productLink+'" class="btn btn-sm btn-green">'+actionBtnTxt+'</a>'
			+'</p>'
			+'</div>');

		cell.append(actionBtn);
		var defaultImage = window.base_url+"assets/img/no-image.png";
		var itemImage = $('<a href="'+productLink+'" class="item-image">')
			.append($('<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/'+product.product_image_url+'" alt="'+product.product_name+'" onerror="this.src=\''+defaultImage+'\';"/>'));
		if(parseFloat(product.product_mrp) > parseFloat(product.product_price)){
			var discount = self.calculateDiscount(product.product_mrp,product.product_price);
			itemImage.append($('<div class="discount">').text(discount+"% OFF"));
		}
		cell.append(itemImage);
		var itemInfo = $('<div class="item-info">');
		var itemTitle = $('<h4 class="item-title text-center">')
			.append($('<a href="'+productLink+'">').text(product.product_short_name+" - "+product.unit));
		itemInfo.append(itemTitle);
		var w100 = $('<div class="w-100  text-center">')
			.append('<span class="item-price">₹'+product.product_price+'</span>');
		if(parseFloat(product.product_mrp) > parseFloat(product.product_price)){
			w100.append(' <span class="item-discount-price">'
				+'₹'+parseFloat(product.product_mrp).toFixed(2)
			+'</span>');
		}
		itemInfo.append(w100);
		if(parseInt(product.is_subscribed)){
			var days = [
					{day:"mon",letter:"M"},
					{day:"tue",letter:"T"},
					{day:"wed",letter:"W"},
					{day:"thu",letter:"T"},
					{day:"fri",letter:"F"},
					{day:"sat",letter:"S"},
					{day:"sun",letter:"S"}
				];
			var configs = product.date_configs;
			var configContainer = $("<div>").addClass("item-info-day");
			if(configs.pattern == 'weekdays'){
				itemInfo.append('<p class="tag">Weekdays</p>');
				var ul = $("<ul>").empty();
				days.forEach(function(data){
					var li = $("<li>").text(data.letter);
					var active = (configs.pattern_value[data.day] == "true") ? "active" : "not-active";
					li.addClass(active);
					ul.append(li);
				});
				configContainer.append(ul);
			}else if(configs.pattern == 'alternate'){
				itemInfo.append('<p class="tag">'+configs.pattern_value+' Day(s) Alternate</p>');
			}else{
				itemInfo.append('<p class="tag">'+configs.pattern+'</p>');
			}
			itemInfo.append(configContainer);
		}else if(parseInt(product.in_cart)){
			var configContainer = $("<div>").addClass("item-info-day");
			var cartBtn = $("<p>").addClass("tag-cart").text("In Cart");
			itemInfo.append(cartBtn);
			itemInfo.append(configContainer);
		}
		cell.append(itemInfo);
		return cell;
	}

	// Adding created product cards
	static async createProductCards(products,productContainer){
		var self = this;
		self.isComplete = products.length < 20 ? true : false;
		if(!products.length) return null;
		products.forEach(async function(product){
			var card = await self.createCard(product);
			productContainer.append(card);
		});
	}

	// Loading more products on scroll
	static async loadMore(data){
		var self = this;
		data.action = "filterCategoryResults";
		var url = window.base_url+"ajax/filter_category_search";
		self.loading(true);
		var response = await self.sendRequest(url,data);
		var productContainer = $("#product-container");
		var index = productContainer.data("index");
		self.createProductCards(response.products,productContainer);
		self.loading(false);
		productContainer.data("index",index+1);
		self.loader = false;

	}

	// Filter category products
	static async filterCategory(data){
		var self = this;
		var url = window.base_url+"ajax/filter_category_search";
		self.createUrl(data);
		data.action = "filterCategoryResults";
		self.blockUI(true);
		var response = await self.sendRequest(url,data);
		self.blockUI(false);
		var productContainer = $("#product-container").empty();
		productContainer.data('index',1);
		self.isComplete = false;
		self.createProductCards(response.products,productContainer);
	}

	// Initializing the default data and binding the events
	static async init(){
		var self = this;
		// Category Clicking handling
		$("ul.search-category-list a.category-item, a.all-category").on("click", async function(){
			$.each($("ul.search-category-list a.category-item"),function(){
				$(this).parent("li").removeClass("active");
			});
			$(this).parent("li").addClass("active");
			self.type = $(this).data("type");
			var data = {
				term : $("#product-container").data("term"),
				type : self.type,
				index : 0
			};
			await self.filterCategory(data);
			$("html, body").animate({ scrollTop: -$(document).height()}, "slow");
		});

		// Category Sticky setup
		var footerHeight = $("#policy").outerHeight(true)
			+ $("#footer").outerHeight(true)
			+ $("#footer-copyright").outerHeight(true);
		if($(window).width() >= 767){
			$(".search-sidebar-helper").css({'width':$(".sticky").outerWidth(true)-1});
			$(".sticky").sticky({
				topSpacing: $("#header").outerHeight(true)+10,
				bottomSpacing : footerHeight+58,
				getWidthFrom : '.search-sidebar-helper'
			});
		}

		// Setup for loading more products on scroll
		$(window).scroll(function(){
			if($(this).scrollTop() > ($(document).height()-(footerHeight+$(window).height()+200))){
				var data = {
					term : $("#product-container").data("term"),
					type : self.type,
					index : $("#product-container").data("index")
				};
				if(!self.loader && !self.isComplete){
					self.loader = true;
					self.loadMore(data);
				}
			}
		});
	}
}

// Setting default values for static variable;
Search.requestCount = 0;
Search.loader = false;
Search.type = $("#product-container").data("type");
Search.isComplete = false;
