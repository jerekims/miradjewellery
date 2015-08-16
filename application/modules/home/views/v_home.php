<div class="products" style="border-left:1px solid gray;margin-left:20px;width:880px;float:right;">
  <?php 
     foreach ($all_product_category as $key => $value) {
      foreach ($value as $p => $data) {
        for ($i=0; $i <= $key ; $i++) { ?>
          <div class="singleproduct"  style="width:280px;margin-right:12px;margin-bottom:12px;height:450px;float:left;">
             <a href="<?php echo base_url().'index.php/home/individual_product/'?><?php echo $data['Product ID']?>">
               <div name="product_image">
                 <img  class="img-rounded" style="width:100%;"  src="<?php echo base_url().'assets/images/index.jpg'?>">
               </div>
                <h5 style="color:maroon;font-size:20px; text-align:center; font-family:'Montserrat:700',GEORGIA;margin:5px 5px;"><?php echo $data['Product Name'];?></h5>
                <h6 style="color:tomato;font-size:18px; text-align:center; font-family:'ABEL',CURSIVE;margin:5px 5px;">Price Kshs:&nbsp;<?php echo $data['Price'];?></h6>
            </a>
            <div><a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $data['Product ID']?>"><button id="cart" type="submit" value="<?php ?>" class="btn btn-primary" style="margin-left:10%;font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
          </div>
           
      <?php } 

        }    

      }


     // echo "<pre>";print_r($key);echo "</pre>";die();
      ?>
</div><!-- end of the product div -->

<div class="clearfix"></div>
</div>

   



