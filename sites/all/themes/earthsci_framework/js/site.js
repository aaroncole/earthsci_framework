(function($){
  $(window).load(function(){

    // Override Twitter Bootstrap positioning for navbar

    var header = $('#header').css('height'),
	search = $('#searchbx'),
	page = $('#site-content');

    // Move the navigation up to the top of the screen
    $('.region-nav .block-menu-block').css('top', '-' + header);

    // Slide the page to reveal the navigation
    $('.navbtn').toggle( 
      function() {
        page.animate({ left: '260px' }, 'fast');
      }, 
      function() {
        page.animate({ left: '0' }, 'fast');
      }
    );

    // Show/hide search box and set focus on show
    $('.navsearch').toggle( 
      function() {
	$('#keys').focus(); 
	search.animate({ height : '35px' }, 'fast');
      }, 
      function() {
	search.animate({ height : '0' }, 'fast');
      }  
    );
  });
}(jQuery));
