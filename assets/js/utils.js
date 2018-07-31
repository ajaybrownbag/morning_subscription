/*====================================================
# Author : Ajay Kumar
====================================================*/

Number.prototype.padLeft = function(base,chr){
   var  len = (String(base || 10).length - String(this).length)+1;
   return len > 0? new Array(len).join(chr || '0')+this : this;
}

var niceDate = function(string){
  var d = new Date(string),
	dformat = [d.getDate().padLeft(),(d.getMonth()+1).padLeft(),d.getFullYear()].join('/');
	return dformat;
};
var niceTime = function(string){
	var d = new Date();
	var dateStr = [d.getFullYear(),(d.getMonth()+1).padLeft(),d.getDate().padLeft()].join("-")+" "+string;
	var t = new Date(dateStr);
	var hr = t.getHours();
	var mn = t.getMinutes();
	var ampm = "AM";
	if(hr>12){
		hr -= 12;
		ampm = "PM";
	}
	return hr.padLeft()+":"+mn.padLeft()+ampm;
};

class Utils{
	
	/*====================
	# Default Constructor 
	====================*/
	constructor(){}
	
	/*========================
	# Sending Server Request 
	========================*/
	static async sendRequest(url,data){
		var self = this;
		return $.ajax({
			url: url, 
			data: data, 
			type: 'POST', 
			dataType:'json',
			success: function(response){
				return response;
			},
			error: function(){
				return {status:false,message:"Failed to process your request"};
			}
		});
	}
	/*============= Category Sliders Start ===================*/
	// Creating Product cards
	static async createProductCards(products,slider){
		var productCards = [];
		products.forEach(function(product,idx){
			var discountWrapper = '';
			var discount = 0;
			var cutMrp = '';
			var subOrCart = $("<div></div>");
			// if it is on offer
			if(parseFloat(product.product_price) < parseFloat(product.product_mrp)){
				discount = (100-product.product_price*100/product.product_mrp);
				discountWrapper = '<div class="discount">'+discount.toFixed(2)+'% OFF</div>';
				cutMrp = ' <span class="item-discount-price">₹'+parseFloat(product.product_mrp).toFixed(2)+'</span>';
			}
			// if subscribed
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
				subOrCart.append(configContainer);
			}else if(parseInt(product.in_cart)){
				var configContainer = $("<div>").addClass("item-info-day");
				var cartBtn = $("<span>").addClass("fa fa-shopping-cart btn btn-xs btn-default pull-left");
				configContainer.append(cartBtn);
			}
			var card = document.createElement('div');
			card.className = 'carousel-cell';
			var innerCard = '<div class="item item-thumbnail inner-cell">'
			+'		<a href="'+window.base_url+'product-details/'+product.seourls+');?>" class="item-image">'
			+'			<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/'+product.product_image_url+'" alt="" />'
			+			discountWrapper
			+'		</a>'
			+'		<div class="item-info">'
			+'			<h4 class="item-title">'
			+'				<a href="'+window.base_url+'product-details/'+product.seourls+'">'
			+					product.product_short_name+' - '+product.quantity+product.unit
			+'				</a>'
			+'			</h4>'
			+'			<div class="w-100">'
			+'				<span class="item-price">₹'+product.product_price+'</span>'
			+				cutMrp
			+'			</div>'
			+			subOrCart.html()
			+'		</div>'
			+'	</div>';
			card.innerHTML = innerCard;
			productCards.push(card);
		});
		slider.append(productCards);
	}
	
	// Request to add more products
	static async addProducts(data, slider){
		var self = this;
		var index = data.index+1;
		var sliderContainer = "#catSlider"+data.category_id;
		$(sliderContainer).data("index",index);
		var status = $(sliderContainer).data("status");
		data.action = "loadCategoryProducts";
		
		var url = window.base_url+"ajax/load_category_products";
		if(parseInt(status)){
			var response = await self.sendRequest(url,data);
			if(response.status){
				await self.createProductCards(response.products,slider);
			}else{
				$(sliderContainer).data("status",0);
			}
		}
	}
	
	static async initSlider(){
		var self = this;
		// Product by category sliders
		var productSliders = {};
		$('.categoryslider .carousel').each(function(){	
			var category_id = $(this).data("category");
			var key = "productSlider_"+category_id;
			productSliders[key] = new Flickity(".categoryslider #catSlider"+category_id,{
			  prevNextButtons: false,
			  pageDots: false,
			  contain:true,
			  freeScroll:true,
			  pageDots:false,
			  adaptiveWidth:true,
			  groupCells:true,
			  cellAlign: 'left'
			});
			productSliders[key].on( 'dragStart', async function( event, pointer ){
				if(pointer.movementX < 0){
					if(productSliders[key].slides.length - (productSliders[key].selectedIndex + 1) < 10){
						var index = $("#catSlider"+category_id).data("index");
						await self.addProducts({category_id,index},productSliders[key]);
					}
				}
			});
		});
		$('.button--previous').on( 'click', function() {
			var category_id = $(this).data("category");
			var key = "productSlider_"+category_id;
			productSliders[key].previous();
		});
		$('.button--next').on( 'click', function() {
			var category_id = $(this).data("category");
			var index = $("#catSlider"+category_id).data("index");
			var key = "productSlider_"+category_id;
			productSliders[key].next();
			if(productSliders[key].slides.length - (productSliders[key].selectedIndex + 1) < 10){
				self.addProducts({category_id,index},productSliders[key]);
			}
		});
	}
	/*=========== Category Slider Ends ================*/
	
	/*============ Location Functionality Starts =========== */
	static async createCitySelector(element,state){
		$("button#locationSelectorBtn").attr("disabled",true);
		return await $(element).select2({
			minimumInputLength: 0,
			placeholder: "SELECT CITY",
			ajax: {
				url: window.base_url+"ajax/search_suggestions?action=searchCity&state="+state,
				dataType: 'json',
				type: "POST",
				data: function (term) {return term;},
				processResults: function (data) {
					return {
						results: $.map(data, function (item) {
							return {
								text: item.city_name,
								id: item.city_id,
							};
						})
					};
				}
			}
		});
	}
	
	static async createAreaSelector(element,city_id){
		return await $(element).select2({
			minimumInputLength: 0,
			placeholder: "SELECT AREA",
			ajax: {
				url: window.base_url+"ajax/search_suggestions?action=searchArea&city_id="+city_id,
				dataType: 'json',
				type: "POST",
				data: function (term) {return term;},
				processResults: function (data) {
					return {
						results: $.map(data, function (item) {
							return {
								text: item.area_name,
								id: item.area_id,
							};
						})
					};
				}
			}
		});
	}
	static async createSocietySelector(element,area_id){
		return await $(element).select2({
			minimumInputLength: 0,
			placeholder: "SELECT SOCIETY",
			ajax: {
				url: window.base_url+"ajax/search_suggestions?action=searchSociety&area_id="+area_id,
				dataType: 'json',
				type: "POST",
				data: function (term) {return  term;},
				processResults: function (data) {
					return {
						results: $.map(data, function (item) {
							return {
								text: item.society_name,
								id: item.society_id,
							};
						})
					};
				}
			}
		});
	}
	
	static async setLocation(data){
		var url = window.base_url+"ajax/set_location";
		data.action = "setLocation";
		var response = await this.sendRequest(url,data);
		if(response.status){
			$('#locationSelector').fadeOut(1);
			$("body").css({overflowY:"auto"});
			window.location.reload();
		}
	}
	
	static async checkLocation(){
		var url = window.base_url+"ajax/check_location";
		var data = {
			action : "checkLocation"
		};
		var response = await this.sendRequest(url,data);
		if(!response.status){
			$('#locationSelector').fadeIn(1);
			$("body").css({overflowY:"hidden"});
		}
	}
	
	static async initLocationSelector(){
		var self = this;		
		var citySelector = await self.createCitySelector("select.citySelector","Delhi");
		citySelector.on("select2:select",async function(e){
			$("select.areaSelector").val([]);
			$("select.societySelector").val([]);
			$("button#locationSelectorBtn").attr("disabled",true);
			var city = e.params.data;
			var areaSelector = await self.createAreaSelector("select.areaSelector",city.id);
			areaSelector.on("select2:select",async function(e){
				$("select.societySelector").val([]);
				$("button#locationSelectorBtn").attr("disabled",true);
				var area = e.params.data;
				var societySelector = await self.createSocietySelector("select.societySelector",area.id);
				societySelector.on("select2:select",function(e){
					$("button#locationSelectorBtn").attr("disabled",false);
				});
			});
		});
		$("button#locationSelectorBtn").on("click",function(e){
			e.preventDefault();
			var data = {
				society_id : $("select.societySelector").val()
			};
			self.setLocation(data);
			
		});
		self.checkLocation();
		
	}
	/*========== Location Selector Ends ========== */
}