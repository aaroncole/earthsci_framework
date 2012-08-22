(function($){
  $(window).load(function(){

    // Override Twitter Bootstrap positioning for navbar
    // Showing mobile navigation when icon selected
    $('.btn-navbar').toggle( 
    function() {
        $('#site-content').animate({ left: '260px' }, 'slow');
    }, 
    function() {
        $('#site-content').animate({ left: '0' }, 'slow');
    }
);
  });
}(jQuery));
