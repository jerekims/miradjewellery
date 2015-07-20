$(document).ready(function(){


    $('.dropdown-button').dropdown({
           inDuration: 300,
           outDuration: 225,
           constrain_width: true, 
           hover: true, 
           gutter: 0, 
           belowOrigin: true 
           }
     );
        
    $(document).ready(function(){
      $('.parallax').parallax();
    });

    $("#contact_mesage").validationEngine();


    $('#facebook').hover(function(){
    	$('#social-facebook').addClass('facebook , ion-social-facebook-outline');
    }, function(){
    	$('#social-facebook').removeClass('facebook , ion-social-facebook-outline');
    });

     $('#instagram').hover(function(){
    	$('#social-instagram').addClass('instagram , ion-social-instagram-outline');
    }, function(){
    	$('#social-instagram').removeClass('instagram , ion-social-instagram-outline');
    });

     $(document).ready(function(){
      $('.slider').slider({
        height:580
      });
    });

    $('.nav li.dropdown').hover(function() {
        $(this).addClass('open');
    }, function() {
        $(this).removeClass('open');
    });

     // ....Function for registering estates.... //
 $(function(){
       $("#contact_mesage").submit(function(){

         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'home/sendcomment',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful registration, then....//
              
              swal({   title: "Comment Sent",   text: "Thank you for your comment",   timer: 3000 });


           },
           error: function(data){
              swal({   title: "Comment Not Sent",   text: "Please contact the administrator via contacts at the bottom of the page",   timer: 3000 });
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //

     $('#twitter').hover(function(){
    	$('#social-twitter').addClass('twitter , ion-social-twitter-outline');
    }, function(){
    	$('#social-twitter').removeClass('twitter , ion-social-twitter-outline');
    });

     $(".button-collapse").sideNav({
      menuWidth: 250, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });
 
     $('#googleplus').hover(function(){
    	$('#social-googleplus').addClass('googleplus , ion-social-googleplus-outline');
    }, function(){
    	$('#social-googleplus').removeClass('googleplus , ion-social-googleplus-outline');
    });

     $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="ion-chevron-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});


    
    
  
    $('.materialboxed').materialbox();
        

});