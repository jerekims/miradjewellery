  <div class="twelve columns" style="margin-top:1%;">
    <div class="four columns">
      <nav class="navbar"><!--Navbar for main items--> 
        <div class="nav-wrapper" >
          <ul>
          <h5>Shop by category <span class="caret"></span></h5>
          <?php echo $navbarcategory;?> 
          </ul>
        </div><!-- end of the nav-wrapper -->
      </nav><!--End of navbar main items-->
    </div> <!-- end of the four columns -->
    <div class="eight columns"style="height:300px;">
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
                  <img style="height:100%;"src="<?php echo base_url().'assets/images/bangles_UK_1.jpg'?>" alt=""> 
                </div>
              </div>
          </div> <!--end of the carousel div  -->
    </div><!-- end of the eight columns -->
  </div> <!-- end of twelve columns -->

  <div class="eight columns" style="border-top:1px solid gray;height:400px;margin-top:1%;float:right;">
  <?php 
     foreach ($all_product_category as $key => $value) {
      foreach ($value as $p => $data) {
        for ($i=0; $i <= $key ; $i++) {   ?>

          <div class="singleproduct"  style="width:280px;margin-right:12px;margin-bottom:12px;height:450px;float:left;">
             <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $data['Product ID']?>">
               <div name="product_image">
                 <img style="margin-top:1%;width:100%;"  src="<?php echo base_url().'assets/images/ring1.jpg'?>">
               </div>
                <h5 style="color:maroon;font-size:20px; text-align:center; font-family:'Montserrat:700',GEORGIA;margin:5px 5px;"><?php echo $data['Product Name'];?></h5>
                <h6 style="color:tomato;font-size:18px; text-align:center; font-family:'ABEL',CURSIVE;margin:5px 5px;">Price Kshs:&nbsp;<?php echo $data['Price'];?></h6>
            </a>
            <div><a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $data['Product ID']?>"><button id="cart" type="submit" value="<?php ?>" class="btn btn-primary" style="margin-left:100px;font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
          </div>

      <?php } 

        }    

      }
      ?>
  </div>
  <!-- end of the eight columns div -->