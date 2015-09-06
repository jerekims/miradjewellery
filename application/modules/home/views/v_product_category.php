      <div class="row">
    <!-- Sidebar Starts -->
      <div class="col-md-3 col-md-offset-1">
      <!-- Categories Links Starts -->
        <h3 class="side-heading">Categories</h3>
        <div class="list-group categories">
          <?php echo $navbarcategory;?>
        </div>
      </div>
    <!-- Sidebar Ends -->   
    <!-- Primary Content Starts -->
      <div class="col-md-8">
      <!-- Slider Section Starts -->
        <div class="slider">
          <div id="main-carousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper For Slides Starts -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="<?php echo base_url().'assets/images/bangles_UK_1.jpg'?>" alt="Slider" class="img-responsive" />
              </div>
            </div>
          <!-- Wrapper For Slides Ends -->
          </div>  
        </div>
      <!-- Slider Section Ends -->
        <hr>
   <?php  
      if (isset($all_products)){?>       
        <section class="products-list">     
        <!-- Heading Starts -->
        <!--   <h2 class="product-head"> All Jewellery</h2> -->
        <!-- Heading Ends -->
        <!-- Products Row Starts -->
          <div class="row">
          <!-- Product #1 Starts -->
          <?php 
          foreach ($all_products as $key => $value) {
            foreach ($value as $p => $data) {
              for ($i=0; $i <=$key ; $i++) { ?>
               <div class="col-md-4 col-sm-6">
                  <div class="product-col">
                     <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $data['Product ID']?>">
                    <div class="image">
                      <img src="<?php echo base_url().'assets/images/index.jpg'?>" alt="product" class="img-responsive" />
                    </div>
                    <div class="caption">
                        <h4><?php echo $data['Product Name'];?></h4>
                    </div><!-- end  of the  caption div -->

                    <div class="price">
                      <span class="price-new">Price Kshs:&nbsp;<?php echo $data['Price'];?></span> 
                    </div><!--  end  of  the price  div -->

                   </a><!--  end  of  the href link -->
                  <div class="cart-button">
                    <div><a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $data['Product ID']?>"><button id="cart" type="submit" value="<?php ?>" class="btn btn-primary" style="margin-left:10%;font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
                  </div><!--  end  of  the  cart button div -->

                    
                  </div><!-- end  of the product col div -->
             </div><!--  end of  the  col-md-4 div -->
          <?php    }
            }
          }?>
          </div>
        <!-- Products Row Ends -->
        </section>
<?php }else if(isset($no_product)){?>
        <section class="products-list">     
          <div class="row">
              <h4 style="margin-top:5%;color:maroon;font-size:20px; text-align:center; font-family:'Montserrat:700',GEORGIA;"><?php echo $no_product; ?></h4>
          </div>
        <!-- Products Row Ends -->
        </section>
  <?php }?>
      <!-- Specials Products Ends -->
      </div>
    <!-- Primary Content Ends -->
    </div>



   




