$(document).ready(function(){
	// Set active tab
	var url = window.location;
	$('ul.nav a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');

	// Themes vars
	var themesheet = $('.theme-sheet');
	var themetoggle = $(".theme-toggle");
	var themes = {
		"light": "assets/css/flatly.css",
		"dark" : "assets/css/darkly.css",
	}

	// Set the theme
	function setTheme(name) {
		var themeurl = themes[name]; 
		themesheet.attr('href',themeurl);
	}

	// Set initial theme
	var switchOn = $.cookie('switchon') != undefined;
	if(switchOn)
		$.cookie('switchon', 'true', { expires: 3652 }); // "refresh" cookie
	themetoggle.prop('checked', switchOn);
	setTheme(themetoggle.attr(switchOn ? 'data-on-theme' : 'data-off-theme'));

	// Switch toggle event
	themetoggle.bootstrapSwitch();
	themetoggle.on('switchChange.bootstrapSwitch', function(event, state) {
		if(state)
			$.cookie('switchon', 'true', { expires: 3652 });
		else
			$.removeCookie('switchon');
		setTheme($(this).attr(state ? 'data-on-theme' : 'data-off-theme'));
	});
	
	// Blueimp
	var element = document.getElementById('links');
	if (element != null) {
		blueimp.Gallery(
			element.getElementsByTagName('a'),
			{
				container: '#blueimp-gallery',
				carousel: true
			}
		);
	}
});
