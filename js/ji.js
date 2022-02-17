
//Скрипт по медленной прокрутки блоков   

    $(document).ready(function(){
        
            $(document).ready(function(){
            $(".midl-list, .foot-menu, .container").on("click","a", function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 2000);
            });
        }); });
		
		


//запуск и настройка slick слайдера 

	$(document).ready(function(){
		$('.sl').slick({	  

			autoplay: true,
			slidesToShow: 1,
	
				responsive: [
				{
				breakpoint: 1024,
				settings: {
				slidesToShow: 1,

					}
				},
				{
				breakpoint: 850,
				settings: {
				slidesToShow: 1,

				}
				},
				{
				breakpoint: 700,
				settings: {
				slidesToShow: 1,

				}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
				]

	    
			});
		});
		
		 $(document).ready(function(){
	 
	$('.port-kab11').click(function(){
		$("#port-kab11").fadeIn();
		$("#port-kab12").fadeOut();
		$("#port-kab13").fadeOut();
		});	
	
	$('.port-kab12').click(function(){
		$("#port-kab12").fadeIn();
		$("#port-kab11").fadeOut();
		$("#port-kab13").fadeOut();

		});
		 
	$('.port-kab13').click(function(){
		$("#port-kab13").fadeIn();
		$("#port-kab11").fadeOut();
		$("#port-kab12").fadeOut();

		});
		

	
	});
