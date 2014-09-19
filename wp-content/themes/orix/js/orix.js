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
		$('.home .hero').parallax("center", 0.3);
		$('.hero-article').animate({
			"opacity": 1
		}, 900)
		$('.hero-article').parallax("center", 1.5, null, true);
	};

	// hide home link
	Orix.fn.hideMainMenuHome = function () {
		return Orix.domElement.mainMenu.find("li")[0].remove();
	};
	// hide news menu item
	Orix.fn.hideMainMenuNews = function () {
		return Orix.domElement.mainMenu.find("#menu-item-427").remove();
	};

	// sticky header
	Orix.fn.stickyHeader = function () {
		if (Orix.domElement.header) {

			if (Orix.get.isHome) {
				if (Orix.domElement.header.offset().top > 35) {
					// make the header sticky
					Orix.domElement.header.addClass("sticky-header");
				} else {
					// unstick the header
					Orix.domElement.header.removeClass("sticky-header");
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
			100
		)

	}


	// set contact form inside modal window
	Orix.fn.contactModal = function() {
		if(Orix.domElement.contactForm ) {
			var btnModal = '<a class="button basic" data-toggle="modal" data-target="#contactModal">Contact</a>',
					form = $(Orix.domElement.contactForm).html(),
					divContactModal = '<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true"><div class="modal-dialog modal-md"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+form+'</div></div></div>';
			Orix.domElement.contactForm.before(btnModal);
			Orix.domElement.contactForm.before(divContactModal);
			Orix.domElement.contactForm.remove();

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
	};
	Orix.fn.init();


	// end jquery 
})(jQuery);