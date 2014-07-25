
// wait for jquery to laod
( function( $ ) {
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

	Orix.domElement =  {}
	Orix.fn =  {}
	Orix.get =  {}

	Orix.domElement.mainMenu = ($(".main-navigation .menu .nav-menu")) ? $(".main-navigation .menu .nav-menu") : null;
	Orix.domElement.header = ($("header#masthead").length) ? $("header#masthead") : null;
	Orix.get.isHome = ($("body.home").length) ? true : false;

	// setup ui
	Orix.fn.setupUi = function() {
		// setup parallax
		$('.hero').parallax("center", 0.3);
		$('.hero-article').animate({"opacity":1}, 900)
		$('.hero-article').parallax("center", 1.5, null, true);
	};

	// hide home link
	Orix.fn.hideMainMenuHome = function() {
		return Orix.domElement.mainMenu.find("li")[0].remove();
	};
	
	// sticky header
	Orix.fn.stickyHeader = function() {
		if (Orix.domElement.header) {

			if (Orix.get.isHome) {
				if (Orix.domElement.header.offset().top > 10) {
					// make the header sticky
					Orix.domElement.header.addClass("sticky-header");
				} else {
					// unstick the header
					Orix.domElement.header.removeClass("sticky-header");
				}
			} else {
				
				Orix.domElement.header.addClass("header-inner");

				if (Orix.domElement.header.offset().top > 10) {
					// make the header sticky
					Orix.domElement.header.addClass("sticky");
				} else {
					// unstick the header
					Orix.domElement.header.removeClass("sticky");
				}
			}
		}
	};
	
	// rull loop will update the ui per timeout given
	Orix.fn.runloop = function() {

		setInterval(
			function() {
				// check sticky header
				Orix.fn.stickyHeader();
			},
			100
		)
		
	}
	
	Orix.fn.init = function() {
		// initialize
		Orix.fn.setupUi();
		Orix.fn.runloop();
		Orix.fn.stickyHeader();
		Orix.fn.hideMainMenuHome();
	};
	Orix.fn.init();


// end jquery 
} )( jQuery );
