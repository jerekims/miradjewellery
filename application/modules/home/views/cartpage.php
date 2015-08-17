<?php if(isset($cart_products)){?>
<div class="twelve columns">
        <table class="table" style="width:100%;margin-top:0.1%;" >
          <tr>
            <th style="text-align:center;">Item</th>
            <th style="text-align:center;">Product Name</th>
            <th style="text-align:center;">Description</th>
            <th style="text-align:center;">Quantity</th>
            <th style="text-align:center;">Price</th>
            <th style="text-align:center;">SubTotal</th>
            <th style="text-align:center;">Remove</th>
          </tr>
             <?php 
             $total=0;
            foreach ($cart_products as $key => $value) {
              foreach ($value as $p => $data) {
               for ($i=0; $i <= $key ; $i++) {   ?>

               <tr>
               <form id="updatecartproduct" action="<?php echo base_url(). 'index.php/home/cartupdate/addquantity/'?><?php echo $data['Product_id']?>" name="updatecartproduct" role="form" enctype="multipart/form-data" method="POST">
               <td>
                  <div class="form-group image-profile">
                    <img style="width:100px;height:100px;"src="<?php echo base_url().'assets/images/ring1.jpg'?>" alt="Product pic">
                  </div>
               </td>
               <td>
                  <h5 name="productname" style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;text-align:center;"><?php echo $data['Product_name'];?></h5>
               </td>
               <td>
                  <h5 name="productdescription" style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;text-align:center;"><?php echo $data['Product_description'];?></h5>
               </td>
               <td>

                 <input name="productquantity" value="<?php echo $data['Product_quantity']?>" style="width:40px;">
                 <button type="submit" class="btn btn-primary">Update</button>
               </td>
               <td>
                 <h5 name="productprice" style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px; text-align:center;">Kshs:&nbsp;<?php echo $data['Product_price'];?></h5>
               </td>
               <td>
                 <?php

                     $subt = $data['Product_price']*$data['Product_quantity'];
                     $total += $subt;
                     echo $subt;
                 ?>
               </td>
               <td>
                  <a href="<?php echo base_url().'index.php/home/cartupdate/removeproduct/'?><?php echo $data['Product_id']?>" style="text-align:center;">Remove</a>
               </td>
               </form>
               
               </tr>
                <?php }
                  }
              } 
            ?>
            <tr>
              
            </tr>
        </table>
</div>
  <div class="twelve columns">
      <div class="total" style="float:right;">
        <h3 style="margin-right:200px;">Total: <?php echo $total;?></h3>
      </div>
  </div>

  <div class="twelve columns">
    <div class="continue_shopping" style="float:left;margin-left:750px;">
      <a href="<?php echo base_url().'index.php/home/'?>"><button class="btn btn-default" style="width:200px;background-color:gray;">CONTINUE SHOPPING</button></a>
    </div>
    <div class="payment" style="float:right;">
      <a href="<?php echo base_url().'index.php/paypal/payment'?>"><button class="btn btn-warning" style="width:200px;background-color:#968477;">CHECKOUT</button></a>
    </div>
  </div>

<div class="clearfix"></div>
        <?php } else {?>
<div class="twelve columns"style="border:1px solid yellow;">
      <table class="table-striped" style="width:100%;">
      <tr>
        <th style="text-align:center;">Item</th>
        <th style="text-align:center;">Product Name</th>
        <th style="text-align:center;">Description</th>
        <th style="text-align:center;">Quantity</th>
        <th style="text-align:center;">Price</th>
      </tr>
      <tr><?php echo "Your cart is Empty";?></tr>
      <tr>
        <div>
        <a href="<?php echo base_url().'index.php/home/'?>" style="color:#F2F2F2;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;">
        <button class="btn btn-default">CONTINUE SHOPPING</button>
        </div>
      </tr>
  <?php } ?>
</div>
 


