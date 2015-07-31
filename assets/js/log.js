$(document).ready(function(){


$("#form_adminlog").validationEngine();

$(function(){
       $("#form_adminlog").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          
         $.ajax({
           type: "POST",
           url: base_url + 'admin/validate_member',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           dataType: "json",
           success: function(response){
               	   //alert(response.state);
               if(response.state === "error"){
               	   //alert(response.message);
                   swal({   title: response.subject,   text: response.message,   timer: 3000 });
               }else if(response.state === "success"){
                   window.location.href = 'admin/dashboard' ;
               }
              
              
              
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });



//Function for scroll up button
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
	        scrollText: '<i class="fa fa-arrow-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

// End of function






});