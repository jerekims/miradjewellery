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
            <img src="<?php echo base_url().'assets/images/banner1.png'?>" alt="">
            
          </div>

          <div class="item">
            <img src="<?php echo  base_url().'assets/images/image2.jpg'?>" alt="">
            
          </div>

          <div class="item">
            <img src="<?php echo base_url().'assets/images/image4.gif'?>" alt="">
            
          </div>

          <div class="item">
            <img src="<?php echo base_url().'assets/images/image4.jpg'?>" alt="">
            
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div> <!--end of the carousel div  -->

</div><!-- end of the billboard  div -->


<div class="homecontent" style="margin-top:10px; padding-top:10px;border-top:1px solid gray;">
  <div class="two columns">
    <nav class="navbar"><!--Navbar for main items--> 

        <div class="nav-wrapper" >
          <ul class="categories">
          <?php echo $navbarcategory;?> 
          </ul>
        </div><!-- end of the nav-wrapper -->
   </nav><!--End of navbar main items-->
  </div>
  <div class="ten columns">
     <?php 
     foreach ($all_product_category as $key => $value) {
      foreach ($value as $p => $data) {
        for ($i=0; $i <= $key ; $i++) {   ?>

      <div class="three columns">
<!--        <a href="<?php echo base_url().'home/individual_product/'?>">
 -->       <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $data['Product ID']?>">
        <div name="product_image">
          <img class="thumbnail" style="width:100%; height:200px" src="<?php echo base_url().'assets/images/ring1.jpg'?>">
        </div>
          <h5 style="color:#F2F2F2;font-size:20px; font-family:'Montserrat:700',GEORGIA;margin:5px 5px;"><?php echo $data['Product Name'];?></h5>
          <h6 style="color:#F2F2F2;font-size:18px; font-family:'ABEL',CURSIVE;margin:5px 5px;">Price Kshs:&nbsp;<?php echo $data['Price'];?></h6>
        </a>
        <div><a href="<?php echo base_url().'index.php/home/addcart'?>"><button type="submit" class="btn btn-primary" style="font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
      </div>

      <?php } 

        }    

      }

     // echo "<pre>";print_r($key);echo "</pre>";die();
      ?>
  </div>
  
</div>
   



