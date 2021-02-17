/* -------------------------------------------------------------------
 * Template Name         : Feetroqua - Portfolio Template
 * Theme Author Name     : Yucel Yilmaz
 * Author URI            : https://www.aipthemes.com/
 * Created Date          : 10 December 2019
 * Version               : 1.0
------------------------------------------------------------------- */
/* -------------------------------------------------------------------
 [Table of contents]
 * 01.Preloader
 * 02.Main INIT Function
 * 03.Document Ready Trigger
*/

$(function() {
	"use strict";

	// Call all ready functions
	feetroqua_preloader(),
	initializeSite(),
	document_ready_trigger();

});

/* ------------------------------------------------------------------- */
/* 01.Preloader
/* ------------------------------------------------------------------- */

function feetroqua_preloader() {

	"use-strict";

	// Variables
	var preloaderWrap           = $('.preloader-wrap'),
		loaderInner             = $('.preloader-wrap .preloader-inner');

	$(window).load("body",function(){
		loaderInner.fadeOut();
		preloaderWrap.delay(350).fadeOut('slow');
	});
}

/* ------------------------------------------------------------------- */
/* 02.Main INIT Function
/* ------------------------------------------------------------------- */

function initializeSite() {

	"use strict";

	//OUTLINE DIMENSION AND CENTER
	$(function() {
	    function centerInit(){

			var sphereContent = $('.sphere'),
				sphereHeight = sphereContent.height(),
				parentHeight = $(window).height(),
				topMargin = (parentHeight - sphereHeight) / 2;

			sphereContent.css({
				"margin-top" : topMargin+"px"
			});

			var heroContent = $('.hero'),
				heroHeight = heroContent.height(),
				heroTopMargin = (parentHeight - heroHeight) / 2;

			heroContent.css({
				"margin-top" : heroTopMargin+"px"
			});

	    }

	    $(document).ready(centerInit);
		$(window).resize(centerInit);
	});

	// Init effect
	$('#scene').parallax();

}

/* ------------------------------------------------------------------- */
/* 03.Document Ready Trigger
/* ------------------------------------------------------------------- */

function document_ready_trigger() {
	$(function() {

	initializeSite();
	(function() {
		setTimeout(function(){window.scrollTo(0,0);},0);
	})();

});
}




