(function($){
  $(window).load(function(){

    // Override Twitter Bootstrap positioning for navbar
    // Showing mobile navigation when icon selected
    $('.navbtn').toggle( 
      function() {
        $('#site-content').animate({ left: '260px' }, '100');
      }, 
      function() {
        $('#site-content').animate({ left: '0' }, '100');
      }
    );

    $('#searchbx').hide();
    $('.navsearch').toggle( 
      function() {
        $('#searchbx').show('slow');
        $('#searchbx').focus();
      }, 
      function() {
        $('#searchbx').hide('slow');
      }  
    );
  });
}(jQuery));
