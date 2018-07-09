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


class AsyncSlider{
	constructor(){}
	// Sending ajax request
	static async sendRequest(options,callback){
		// Preparing and calling the ajax defined in Jquery
		await (()=>{
			$.ajax({
				url: options.url, // defining request url from options
				data: options.data || null, // posting data with request from options
				type: options.type || 'POST', // using the request type
				dataType: options.dataType || 'json',
				success: function(response){ // getting the response back from server
					callback(response); // passing response to callback function
				},
				error: function(){
					// passing error status in callback in case of errors
					callback({status:false,message:"Failed to process your request"});
				}
			});
		})();
	}
	
	static async createProductCards(products,slider){
		await (async ()=>{
			var productCards = [];
			await (()=>{
				products.forEach(function(product,idx){
					var discountWrapper = '';
					var discount = 0;
					var cutMrp = '';
					var subOrCart = $("<div></div>");
					var day_mapping = {"mon":"M","tue":"T","wed":"W","thu":"T","fri":"F","sat":"S","sun":"S"};
					// if it is on offer
					if(product.product_price < product.product_mrp){
						discount = (100-product.product_price*100/product.product_mrp);
						discountWrapper = '<div class="discount">'+discount.toFixed(2)+'% OFF</div>';
						cutMrp = ' <span class="item-discount-price">₹'+product.product_mrp+'</span>';
					}
					
					// if subscribed
					if(parseInt(product.is_subscribed)){
						var day_wrapper = $('<div class="item-info-day"><ul></ul></div>');
						for (var day in day_mapping){
							var $class = (parseInt(product.days_details[day])) ? "active" : ""; 
							day_wrapper.find("ul").append('<li class="'+$class+'">'+day_mapping[day]+'</li>');
						}
						subOrCart.append('<div class="itembox-info-subscribed">'
						+'	<button class="btn btn-xs bg-orange-theme pull-left">'
						+'		<i class="fa fa-check"></i> Subscribed'
						+'	</button>'
						+'	<a href="'+window.base_url+"product-details/"+product.seourls+'" class="btn btn-xs btn-theme-blue pull-right">Modify</a>'
						+'</div>');
						subOrCart.append(day_wrapper);
					}else if(parseInt(product.in_cart)){
						subOrCart.append('<div class="itembox-info-subscribed">'
						+'	<button class="btn btn-xs btn-blue pull-left">In Cart</button>'
						+'	<a href="'+window.base_url+"product-details/"+product.seourls+'" class="btn btn-xs btn-success pull-right">Modify</a>'
						+'</div>');
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
					+					product.product_name+' - '+product.quantity+product.unit
					+'				</a>'
					+'			</h4>'
					+'			<p class="item-desc">'
					+'				<span class="cutofftime">Cut Off Time - '
					+'					<span class="cutofftime-tm">'
					+					niceTime(product.cutoff_time)
					+'					</span>'
					+'				</span>'
					+'			</p>'
					+'			<div class="w-100">'
					+'				<span>Price: </span>'
					+'				<span class="item-price">₹'+product.product_price+'</span>'
					+				cutMrp
					+'			</div>'
					+			subOrCart.html()
					+'		</div>'
					+'	</div>';
					card.innerHTML = innerCard;
					productCards.push(card);
				});
			})();
			slider.append(productCards);
		})();
		
	}
	
	static async addProducts(data, slider){
		var self = this;
		var index = data.index+1;
		var sliderContainer = "#catSlider"+data.category_id;
		$(sliderContainer).data("index",index);
		var status = $(sliderContainer).data("status");
		data.action = "loadCategoryProducts";
		var options = {
			url:window.base_url+"ajax/load_category_products",
			data:data
		};
		if(parseInt(status)){
			await self.sendRequest(options,async (response)=>{
				if(response.status){
					await self.createProductCards(response.products,slider);
				}else{
					$(sliderContainer).data("status",0);
				}
			});
		}
	}
	
	static async init(){
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
						await (()=>{self.addProducts({category_id,index},productSliders[key])})();
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
}