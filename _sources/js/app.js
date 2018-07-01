(function(){



	function init(){

		var portfolio = document.querySelectorAll('.gallery li');
		var close = document.querySelectorAll('.close-gallery');
		
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

	init();

})();