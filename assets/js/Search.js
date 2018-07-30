/*-----------------------------------------
# Title			: Search Subscription products
# Author		: Ajay Kumar
# Description	: Module with fully async behaviour
-----------------------------------------*/
class Search{
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
		var self = this;
		return $.ajax({
			url: url, 
			data: data, 
			type: 'POST', 
			dataType:'json',
			beforeSend: function(){self.blockUI(true);},
			success: function(response){
				self.blockUI(false);
				return response;
			},
			error: function(){
				self.blockUI(false);
				return {status:false,message:"Failed to process your request"};
			}
		});
	}
	
	static async calculateDiscount(product_mrp,product_price){
		var discount = parseFloat(100-product_price*100/product_mrp).toFixed(2);
		return (Math.ceil(discount) == parseInt(discount)) ? parseInt(discount) : discount;
	}
	
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
		var itemImage = $('<a href="'+productLink+'" class="item-image">')
			.append($('<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/'+product.product_image_url+'" alt="'+product.product_name+'" />'));
		if(parseFloat(product.product_mrp) > parseFloat(product.product_price)){
			var discount = await self.calculateDiscount(product.product_mrp,product.product_price);
			itemImage.append($('<div class="discount">').text(discount+"% OFF"));
		}
		cell.append(itemImage);
		var itemInfo = $('<div class="item-info">');
		var itemTitle = $('<h4 class="item-title">')
			.append($('<a href="'+productLink+'">').text(product.product_name+" - "+product.unit));
		itemInfo.append(itemTitle);
		var w100 = $('<div class="w-100">')
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
				var ul = $("<ul>").empty();
				days.forEach(function(data){
					var li = $("<li>").text(data.letter);
					var active = (configs.pattern_value[data.day] == "true") ? "active" : "not-active";
					li.addClass(active);
					ul.append(li);
				});
				configContainer.append(ul);
			}else if(configs.pattern == 'alternate'){
				var span = $('<span class="btn btn-xs btn-warning pull-left">').text(configs.pattern_value+" Day(s) Alternate");
				configContainer.append(span);
			}else{
				var span = $('<span class="btn btn-xs btn-warning pull-left">').text(configs.pattern);
				configContainer.append(span);
			}
			itemInfo.append(configContainer);
		}else if(parseInt(product.in_cart)){
			var configContainer = $("<div>").addClass("item-info-day");
			var cartBtn = $("<span>").addClass("fa fa-shopping-cart btn btn-xs btn-default pull-left");
			configContainer.append(cartBtn);
			itemInfo.append(configContainer);
		}
		cell.append(itemInfo);
		return cell;
	}
	
	
	static async createProductCards(products){
		console.log(products);
		var self = this;
		if(!products.length) return null;
		var productContainer = $("#product-container").empty();
		products.forEach(async function(product){
			var card = await self.createCard(product);
			productContainer.append(card);
		});
	}
	
	static async loadMore(options){
		var self = this;
		options.action = "loadMoreSearchResults";
		var url = window.base_url+"ajax/load_more_search_results";
		var response = await self.sendRequest(url,options);
		console.log(response);
		self.createProductCards(response.products);
		
	}
	
	static async filterCategory(data){
		var self = this;
		var url = window.base_url+"ajax/filter_category_search";
		data.action = "filterCategoryResults";
		var response = await self.sendRequest(url,data);
		self.createProductCards(response.products);
	}
	
	static async init(){
		var self = this;
		$("ul.search-category-list a.category-item").on("click",function(){
			var data = {
				term : $(this).data("term"),
				type : $(this).data("type"),
			};
			self.filterCategory(data);
		});
		
		var footerHeight = $("#policy").outerHeight(true) + $("#footer").outerHeight(true) + $("#footer-copyright").outerHeight(true);
		$(".search-sidebar-helper").css({'width':$(".sticky").outerWidth(true)+29});
		$(".sticky").sticky({ 
			topSpacing: $("#header").outerHeight(true)+10,
			bottomSpacing : footerHeight+30,
			getWidthFrom : '.search-sidebar-helper'
		});

	}
}
// Setting static variable for UI Blocking;
Search.requestCount = 0;
