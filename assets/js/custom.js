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
				"light": "assets/bootstrap/css/flatly.min.css",
				"dark" : "assets/bootstrap/css/darkly.min.css",
			}
			
			// Set the theme
			function setTheme(name) {
				var themeurl = themes[name]; 
			    themesheet.attr('href',themeurl);
			}
			
			// Initial theme
			setTheme(themetoggle.attr(themetoggle.is(':checked') ? 'data-on-theme' : 'data-off-theme'));
			
			// Switch toggle event
			themetoggle.bootstrapSwitch();
			themetoggle.on('switchChange.bootstrapSwitch', function(event, state) {
			  setTheme($(this).attr(state ? 'data-on-theme' : 'data-off-theme'));
			});
		});
