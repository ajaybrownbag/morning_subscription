const addProducts = async function(flkty){
  var products = await (function(){
    return $('<div class="carousel-cell">asd</div>');
  })();
  flkty.insert(products);
}; 

var flkty = new Flickity('.carousel',{freeScroll: true});
flkty.on( 'dragStart', function( event, pointer ) {
  console.log(pointer);
  if(pointer.movementX < 0){
    addProducts(flkty);
  }
});


class AsyncSlider{
	constructor(){}
	// Sending ajax request
	sendRequest(url,data,callback){
		
	}
	
	// a
	async addProducts(slider){
		var $self = this;
		
		var products = await ((response)=>{
			return $('<div class="carousel-cell">asd</div>');
		})();
		slider.insert(products);
	}
	
	
}