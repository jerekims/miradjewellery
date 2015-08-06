$(document).ready(function(){


  

   var pass = $("#employeepassword").val();
   //console.log(pass);


        if(pass !== "e10adc3949ba59abbe56e057f20f883e"){
            $('.passpanel').hide();

           $('#editemployeepassword').prop('required',false);
           $('#editemployeecpassword').prop('required',false);
           
        }else if(pass === "e10adc3949ba59abbe56e057f20f883e"){
           $('.passpanel').show();

           $('#editemployeepassword').prop('required',true);
           $('#editemployeecpassword').prop('required',true);
        }


      



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
     $("#categoryediting").validationEngine();
     $("#formaddproduct").validationEngine();
     $("#productediting").validationEngine();
     $("#formaddadministrator").validationEngine();
     $("#employeeediting").validationEngine();
     $("#orderediting").validationEngine();
     $("#clientediting").validationEngine();
     $("#commentediting").validationEngine();



     // ....Function for adding categories.... //
 $(function(){
       $("#formaddcategory").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          // takes the data into the admin controller, into a function called categoryregistration()
         $.ajax({
           type: "POST",
           // url: base_url + 'admin/categoryregistration',
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

           },error: function(data){
              swal({   title: "Error Registration",   text: "Category has not been registered",   timer: 3000 });
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });




     // ....end of function.... //
     // 
     // 

     // function for adding a product 
     $(function(){
      $("#formaddproduct").submit(function(){
        //alert("clicked");
          var formData = new formData($(this)[0]);

          // passing the data to the addnewproduct in the product controller
          $.ajax({
              type:"POST",
              url: base_url + 'admin/addnewproduct',
              //url: base_url + 'index.php/admin/addnewproduct',
              data:formData,
              async:false,
              cache:false,
              contentType:false,
              processData:false,
              success:function(data){
                // after successful registration of the product
                swal({title:"Product Registration",text:"Product has been added",timer:3000});

              },error: function(data){
              swal({   title: "Error Registration",   text: "Product has not been registered",   timer: 3000 });
           }
          });
          return false;
      });

     });
     // end of the function for adding new  product

    
     $(function(){
       $("#productediting").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          // takes the data into the admin controller, into a function called categoryregistration()
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editproduct',
           //url: base_url + 'index.php/admin/editproduct',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
               // ....After successful registration, then....//
              
              swal({   title: "Product Editing",   text: "Product has been editing",   timer: 3000 });
              // pop up for a successful registration 

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // end of the function for editing  the product details

     $(function(){
       $("#formaddadministrator").submit(function(){
          

        
         var formData = new FormData($(this)[0]);

          // takes the data into the admin controller, into a function called categoryregistration()
         $.ajax({
           type: "POST",
            url: base_url + 'admin/employeeregistration',
           // url: base_url + 'index.php/admin/employeeregistration',
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
           // url: base_url + 'index.php/admin/editcategory',
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


  $(function(){
       $("#orderediting").submit(function(){
          
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editorder',
           // url: base_url + 'index.php/admin/editorder',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
                        
              swal({   title: "Order Editing",   text: "Order has been updated",   timer: 3000 });
 
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

   $(function(){
       $("#commentediting").submit(function(){
          
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editcomment',
           // url: base_url + 'index.php/admin/editcomment',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
                        
              swal({   title: "Comment Editing",   text: "Comment has been updated",   timer: 3000 });
 
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
          
      alert("clecked");
   
       // takes the data into the admin controller, into a function called editcategory()
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editemployee',
           // url: base_url + 'index.php/admin/editemployee',
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
     

      $(function(){
       $("#clientediting").submit(function(){
          
  //alert("clicked");
   
      
         var formData = new FormData($(this)[0]);
 
         $.ajax({
           type: "POST",
           url: base_url + 'admin/editclient',
           // url: base_url + 'index.php/admin/editclient',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data){
              
              
              swal({   title: "Client Editing",   text: "Client has been updated",   timer: 3000 });
           
              
             

           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

     // ....end of function.... //
     // 
     



});