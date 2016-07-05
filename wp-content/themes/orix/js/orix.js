var getAgent = function() {

  var agent = navigator.userAgent.toLowerCase(),
    obj = {
      viewport:
      {
        is:
        {
          ie10    : !!(agent.match(/msie 10.0/)),
          ie9     : !!(agent.match(/msie 9.0/)),
          ie8     : !!(agent.match(/msie 8.0/)),
          ie7     : !!(agent.match(/msie 7.0/)),
          ie6     : !!(agent.match(/msie 6.0/)),
          opera     : !!(agent.match(/opera/)),
          chrome  : !!(agent.match(/chrome/)),
          safari  : !!(agent.match(/safari/)),
          firefox : !!(agent.match(/firefox/)),
          android	: !!(agent.match(/android/)),
          iOS		: !!(agent.match(/iphone/) || agent.match(/ipod/))
        }
      }
    };

  for (var key in obj.viewport) {
    var o = obj.viewport[key];
    for (var prop in o) {
      if(o[prop])
        agent = prop;
    };
  };

  return agent;
};





// wait for jquery to laod
(function ($) {
	/**
	 * Initailize Orix Framework
	 */
	Orix = {

		VERSION: "beta 0.01",
		AUTHOR: "bleonard@credera.com"

	};
	/**
	 * For touch events add FastClick
	 * prevents the 300 milisecond delay
	 */
	//window.addEventListener('load', function() { new FastClick(document.body); }, false);

	Orix.domElement = {}
	Orix.fn = {}
	Orix.get = {}

	Orix.domElement.mainMenu = ($(".main-navigation .menu-main-menu-container .nav-menu")) ? $(".main-navigation .menu-main-menu-container .nav-menu") : null;
	Orix.domElement.contactForm = ($("#main .wpcf7")) ? $("#main .wpcf7") : null;
	Orix.domElement.header = ($("header#masthead").length) ? $("header#masthead") : null;
	Orix.get.isHome = ($("body.home").length) ? true : false;

	// setup ui
	Orix.fn.setupUi = function () {
		// setup parallax
		if(getAgent() != "iOS" && getAgent() != "android") {
			$('.home .hero').parallax("center", 0.3);
			
			$('.hero-article').parallax("center", 1.5, null, true);
		}
		$('.hero-article').animate({
				"opacity": 1
			}, 900)
	};

	// hide home link
	Orix.fn.hideMainMenuHome = function () {
		return Orix.domElement.mainMenu.find("li")[0].remove();
	};
	// hide news menu item
	Orix.fn.hideMainMenuNews = function () {
		return Orix.domElement.mainMenu.find("#menu-item-427").remove();
	};

	if ($(".news-breaking-foo").length) {
		$("#page").css({"top":"60px", "position":"relative"});

	}

	// sticky header
	Orix.fn.stickyHeader = function () {
		if (Orix.domElement.header) {

			if (Orix.get.isHome) {

				if ($(".news-breaking-foo").length) {
					if (Orix.domElement.header.offset().top < 20) {
						Orix.domElement.header.css("top", "75px")
					}
					if (Orix.domElement.header.offset().top > 75) {
						Orix.domElement.header.css("top", "0px")
					}
				}

				if (Orix.domElement.header.offset().top > -1) {
					// make the header sticky
					Orix.domElement.header.addClass("sticky-header");

					/*if(Orix.domElement.header.offset().top >= 51 ) {
						if ($(".news-breaking-foo").length) {
							//Orix.domElement.header.css("top", "0px")
						}
					}else{
						if($(".news-breaking-foo").length){
							//Orix.domElement.header.css("top","50px")
						}
					}*/

				} else {
					// unstick the header
					//Orix.domElement.header.removeClass("sticky-header");

				}

			} else {

				Orix.domElement.header.addClass("header-inner");

				if (Orix.domElement.header.offset().top > 35) {
					// make the header sticky
					Orix.domElement.header.addClass("sticky");
				} else {
					// unstick the header
					Orix.domElement.header.removeClass("sticky");
				}
			}
		}
	};

	// main navigation slide out
	Orix.fn.animateMainMenu = {

		init: function () {
			if (Orix.domElement.mainMenu) {
				// get first level navigation
				var firstLevel = Orix.domElement.mainMenu.children();
				firstLevel.on("mouseover", function (e) {
					Orix.fn.animateMainMenu.handelRollOver(e)
				})
				firstLevel.on("mouseout", function (e) {
					Orix.fn.animateMainMenu.handelRollOut(e)
				})
			}
		},

		handelRollOver: function (e) {
			var currentTarget = $(e.currentTarget),
				target = $(e.target);

			if (currentTarget.parent().hasClass("nav-menu")) {
				currentTarget.addClass("active");
			}

		},

		handelRollOut: function (e) {
			var currentTarget = $(e.currentTarget),
				target = $(e.target);

			if (currentTarget.hasClass("active")) {
				currentTarget.removeClass("active");
			}
		}

	};

	// rull loop will update the ui per timeout given
	Orix.fn.runloop = function () {

		setInterval(
			function () {
				// check sticky header
				Orix.fn.stickyHeader();
			},
			1000
		)

	};

	Orix.fn.fixHeight = function(){

		if ($('body').hasClass('post-type-archive-provensuccess')) {
			$(".deal").matchHeight();
		};
	};


	// set contact form inside modal window
	Orix.fn.contactModal = function() {
		if(Orix.domElement.contactForm ) {
			var btnModal = '<a class="button basic" data-toggle="modal" data-target="#contactModal">Contact</a>';
			var	checker = '<input type="text" name="checker" value="" class="checker" style="color: rgb(205, 205, 205);">';
			Orix.domElement.contactForm.append(checker);
			var	form = $(Orix.domElement.contactForm).html();
			var divContactModal = '<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true"><div class="modal-dialog modal-md"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+form+'</div></div></div>';
			Orix.domElement.contactForm.before(btnModal);
			Orix.domElement.contactForm.before(divContactModal);
			
			// add hiddne input to prevent spam

			$('.checker').hide();
			Orix.domElement.contactForm.remove();


			$(".wpcf7-submit").on('click', function(e){ 
				debugger;
				if($("#contactModal").find('.checker').val().length > 0) {
					e.preventDefault();
				} else {
					if($("#contactModal").find('[name=your-name]').val().length <= 0){
						e.preventDefault();
					}
					if($("#contactModal").find('[name=your-email]').val().length <= 0){
						e.preventDefault();
					}
				}
			});
		}
	}

	

	Orix.fn.init = function () {
		// initialize
		Orix.fn.setupUi();
		Orix.fn.runloop();
		Orix.fn.stickyHeader();
		//Orix.fn.hideMainMenuHome();
		Orix.fn.hideMainMenuNews();
		Orix.fn.animateMainMenu.init();
		Orix.fn.contactModal();

		Orix.fn.fixHeight();

	};
	Orix.fn.init();


	// add print button function
	var printHtmlElement = "<button class='print'>Print</button>";
	//$('body').append(printHtmlElement);
	
	$('.print').on('click', function(){
		
		html2canvas(document.body, {
	        onrendered: function(canvas) {
	        	
	        	$('html').css("width", "670px");
	        	$("#page").hide();
	        	$("footer").hide();
	            document.body.appendChild(canvas);
	            window.print();
	            $('canvas').remove();
	            $("#page").show();
	            $("footer").show();
	            $('html').css("width", "auto");
	        }
	    });
	    
	});

   $( 'a[href="#"]' ).click( function(e) {
      e.preventDefault();
   } );
	
	$(".news-breaking .close").on("click", function(e){
		e.preventDefault();
		$(".news-breaking").remove();
		$(".main-navigation").css("margin-top","0");
	})
	// end jquery 
})(jQuery);






