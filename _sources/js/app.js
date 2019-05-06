(function(){


	function init(){

		setTimeout(function(){
			onloadAnimation();
		}, 500);

		var portfolio = document.querySelectorAll('.gallery li');
		var close = document.querySelectorAll('.close-gallery');
		var section = document.querySelectorAll(".section__service");
		
		if(portfolio.length > 0) {
			portfolio.forEach(function(item){
				item.addEventListener('click', function(){
					var id = this.dataset.portfolio;
					document.querySelector('#'+id).classList.add('is-active');
				});
			});
		}

		if(close.length > 0) {
			close.forEach(function(item){
				item.addEventListener('click', function(){
					this.parentNode.classList.remove('is-active');
				});
			});	
		}


	}

	function onloadAnimation(){
		var bgImg = document.querySelector('.welcome__bg');
		var quote = document.querySelector('.quote');
		var slider = document.querySelectorAll('.slide');
		if(bgImg) {
			bgImg.classList.add('is-active');
		}
		if(quote) {
			setTimeout(function(){
			quote.classList.add('is-active');	
			}, 500);
		}

		if(slider.length > 0) {
			slider[0].classList.add('is-active');
		}
	}

	init();

})();