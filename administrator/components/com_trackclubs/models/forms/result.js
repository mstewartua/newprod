/**
 *	result : Validate
 *	Filename : result.js
 *
 *	Author : Michael
 *	Component : TrackClub
 *
 *	Copyright : Copyright (C) 2014. All Rights Reserved
 *	License : GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 *
 **/
window.addEvent('domready', function() {
	document.formvalidator.setHandler('athleteid',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('dnf',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('hidepace',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
});