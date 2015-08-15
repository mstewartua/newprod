/**
 *	grouprun : Validate
 *	Filename : grouprun.js
 *
 *	Author : Michael
 *	Component : TrackClub
 *
 *	Copyright : Copyright (C) 2014. All Rights Reserved
 *	License : GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 *
 **/
window.addEvent('domready', function() {
	document.formvalidator.setHandler('runname',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('runtime',
		function (value) {
			regex=/^(10|11|12|[1-9]):[0-5][0-9]$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('active',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
});