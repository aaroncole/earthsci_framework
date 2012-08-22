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
        page.animate({ left: '260px' }, '100');
      }, 
      function() {
        page.animate({ left: '0' }, '100');
      }
    );

    // Show/hide search box
    //search.hide();
    //search.css('top','-35px');
    $('.navsearch').toggle( 
      function() {
        //search.show('slow');
	search.animate({ top : '0' }, 'slow');
      }, 
      function() {
        //search.hide('slow');
	search.animate({ top : '-35px' }, 'slow');
      }  
    );
  });
}(jQuery));
