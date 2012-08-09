// Add text to search box
$(document).ready(function(){
	// Header Drupal Search Box
	$('#header [name=search_theme_form]').val('Search this site...');
	$('#header [name=search_theme_form]').focus(function () {
	$('#header [name=search_theme_form]').val('');
	});
	
	// Hide border for image links
	$('a:has(img)').css('border', 'none');

	if (document.documentElement.clientWidth <= 480) {
	  // Mobile dropdown menu conversion
	  $('.sidebar ul.menu').each(function(){
	  var list=$(this),
		  select=$(document.createElement('select')).insertBefore($(this).hide()).change(function(){
		window.location.href=$(this).val();
	  });
	  $('>li a', this).each(function(){
		var option=$(document.createElement('option'))
		 .appendTo(select)
		 .val(this.href)
		 .html($(this).html());
		if($(this).attr('class') === 'selected'){
		  option.attr('selected','selected');
		}
	  });
	  list.remove();
	  });
	}
});

// Hide Address Bar in Mobile View
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){
		if (window.pageYOffset < 1) {
		window.scrollTo(0, 1);
	}
}


;
// Sticky Footer
function positionFooter() {
  var Footer = $("#footer");
  if ((($(document.body).height() + Footer.height()) < $(window).height() && Footer.css("position") == "fixed") || ($(document.body).height() < $(window).height() && Footer.css("position") != "fixed")) {
	Footer.css({ position: "fixed", bottom: "120px" });
  }
  else {
	Footer.css({ position: "static" });
  }
}

// Sticky Global Footer
function positionGlobalfooter() {
  var Globalfooter = $("#global-footer");
  if ((($(document.body).height() + Globalfooter.height()) < $(window).height() && Globalfooter.css("position") == "fixed") || ($(document.body).height() < $(window).height() && Globalfooter.css("position") != "fixed")) {
	Globalfooter.css({ position: "fixed", bottom: "0px" });
  }
  else {
	Globalfooter.css({ position: "static" });
  }
}

$(document).ready(function () {
  positionFooter();
  $(window).scroll(positionFooter);
  $(window).resize(positionFooter);
  $(window).load(positionFooter);
  positionGlobalfooter();
  $(window).scroll(positionGlobalfooter);
  $(window).resize(positionGlobalfooter);
  $(window).load(positionGlobalfooter);
});;
