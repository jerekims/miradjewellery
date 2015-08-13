<div class="homecontent">
  <div class="four columns">
    <nav class="navbar navigation" style="border-radius:0px;"><!--Navbar for main items--> 

        <div class="nav-wrapper" class="categories">
          <ul>
          <?php echo $navbarcategory;?> 
          </ul>
        </div><!-- end of the nav-wrapper -->
   </nav><!--End of navbar main items-->
  </div>
  <div class="eight columns">
  <div class="billboard">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" >
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="<?php echo base_url().'assets/images/bangles_UK_1.jpg'?>" alt="">
            
          </div>
        </div>
        
  </div> <!--end of the carousel div  -->

</div><!-- end of the billboard  div -->
     <?php 
     foreach ($cart_products as $key => $value) {
      foreach ($value as $p => $data) {
        for ($i=0; $i <= $key ; $i++) {   ?>

      <div class="three columns" style="height:250px;" style="border:1px solid yellow;">
        
        <div class="form-group image-profile">
             <img style="width:250px;height:250px;" src="<?php echo $data['Product_image']; ?>" alt="Product pic">
        </div>
        <div class="des_price" >
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Product_id'];?></h5>
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Category_id'];?></h5>
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Product_name'];?></h5>
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Product_name'];?></h5>
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Product_description'];?></h5>
          <h6 style="color:#F2F2F2;font-size:20px; font-family:'ABEL',CURSIVE;margin:10px 20px;">Price Kshs:&nbsp;<?php echo $data['Product_price'];?></h6>
        </div>

        </a>
        
      </div>

      <?php } 

        }    

      }

     // echo "<pre>";print_r($key);echo "</pre>";die();
      ?>
  </div>
  
</div>
<!-- <div class="row">
  
</div>

<div class="product" Style="margin-top:10px;margin-bottom:10px;">
    <div class="row">
    

   
   

    
</div>

