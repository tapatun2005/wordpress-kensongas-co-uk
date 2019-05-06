(function(){

	var active = 0;
	var slider = document.querySelector('.testimonials_wrap');
	var navs = slider.querySelectorAll('._navs > div');
	var items = document.querySelectorAll('.testimonials li');
	var animSlider = setInterval(intervalTrigger, 5000);


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

		for(var i = 0; i < navs.length; i++) {
			navs[i].addEventListener('click', function(){
				var dir = this.id;
				nextSlide(dir);
			});
		}
		
		slider.addEventListener('mouseover', function(){
			clearInterval(animSlider);
		});
		slider.addEventListener('mouseleave', function(){
			animSlider = setInterval(intervalTrigger, 5000);
		});

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

	function nextSlide(dir) {
		var next = dir === 'prev' ? active - 1 : active + 1;
			
		items[active].classList.remove('is-active');
		
		if(dir === 'prev') {
			next = items[next] ? next : items.length - 1;
		} else {
			next = items[next] ? next : 0;
		}

		items[next].classList.add('is-active');
		active = next;
	}

	function intervalTrigger(){
		nextSlide('next');
	}


	init();

})();