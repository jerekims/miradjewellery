<div class="billboard">
    <div class="row">

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


    </div><!-- end of the row div -->

</div><!-- end of the billboard  div -->


<div class="product" Style="margin-top:10px;margin-bottom:10px;">
    <div class="row">
     <?php 
     foreach ($all_product_category as $key => $value) {
      foreach ($value as $p => $data) {
        for ($i=0; $i <= $key ; $i++) {   ?>

      <div class="three columns" style="height:250px;" style="border:1px solid yellow;">
        <a href="<?php echo base_url().'home/individual_product/$data[Product ID]'?>">
        <!-- <a href="<?php echo base_url().'index.php/home/individual_product/'?>"> -->
        <div name="product_image" style="width:95%; margin:2.5%; height:140px;">
          <img class="thumbnail" src="<?php echo base_url().'assets/images/ring1.jpg'?>">
        </div>
        <div class="des_price" >
          <h5 style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;"><?php echo $data['Product Name'];?></h5>
          <h6 style="color:#F2F2F2;font-size:20px; font-family:'ABEL',CURSIVE;margin:10px 20px;">Price Kshs:&nbsp;<?php echo $data['Price'];?></h6>
        </div>
        </a>

      </div>

      <?php } 

        }    

      }

     // echo "<pre>";print_r($key);echo "</pre>";die();
      ?>

    </div><!-- end of the row div -->

   

    
</div>



