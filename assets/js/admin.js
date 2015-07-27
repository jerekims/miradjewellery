$(document).ready(function(){

      $('#category-table').dataTable();
      $('#administrator-table').dataTable();
      $('#orders-table').dataTable();

            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');



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



     // Enables category form with ID to acquire validation
     $("#formaddcategory").validationEngine();
     $("#formaddadministrator").validationEngine();



     // ....Function for adding categories.... //
 $(function(){
       $("#formaddcategory").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          // takes the data into the admin controller, into a function called categoryregistration()
         $.ajax({
           type: "POST",
           url: base_url + 'admin/categoryregistration',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful registration, then....//
              
              swal({   title: "Category Registration",   text: "Category has been registered",   timer: 3000 });
              // pop up for a successful registration 

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //
     // 
     // 
     $(function(){
       $("#formaddadministrator").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          // takes the data into the admin controller, into a function called categoryregistration()
         $.ajax({
           type: "POST",
           url: base_url + 'admin/employeeregistration',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful registration, then....//
              
              swal({   title: "Employee Registration",   text: "Employee has been registered",   timer: 3000 });
              // pop up for a successful registration 

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //
     

     // ....Function for editing categories.... //
 $(function(){
       $("#categoryediting").submit(function(){
          
  
   
       // takes the data into the admin controller, into a function called editcategory()
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editcategory',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful editing, then....//
              
              swal({   title: "Category Editing",   text: "Category has been updated",   timer: 3000 });
              // pop up for a successful registration 
              
             

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //
     // 
     // 
     $(function(){
       $("#employeeediting").submit(function(){
          
  
   
       // takes the data into the admin controller, into a function called editcategory()
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editemployee',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful editing, then....//
              
              swal({   title: "Employee Editing",   text: "Employee has been updated",   timer: 3000 });
              // pop up for a successful registration 
              
             

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //



});