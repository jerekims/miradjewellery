<?php if(isset($cart_products)){?>
<div class="twelve columns">
        <table class="table" style="width:100%;margin-top:0.1%;" >
          <tr>
            <th style="text-align:center;">Item</th>
            <th style="text-align:center;">Product Name</th>
            <th style="text-align:center;">Description</th>
            <th style="text-align:center;">Quantity</th>
            <th style="text-align:center;">Price</th>
          </tr>
             <?php 
            foreach ($cart_products as $key => $value) {
              foreach ($value as $p => $data) {
               for ($i=0; $i <= $key ; $i++) {   ?>
               <tr>
               <td>
                  <div class="form-group image-profile">
                    <img style="width:100px;height:100px;"src="<?php echo base_url().'assets/images/ring1.jpg'?>" alt="Product pic">
                  </div>
               </td>
               <td>
                <h5 style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;text-align:center;"><?php echo $data['Product_name'];?></h5>
               </td>
               <td>
                  <h5 style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px;text-align:center;"><?php echo $data['Product_description'];?></h5>
                  <a href="delete_product?empty=<?php echo $data['Product_id'];?>" style="text-align:center;">(X)Remove</a>
               </td>
               <td>
                 <input value="1" style="width:40px;">
               </td>
               <td>
                 <h5 style="color:tomato;font-size:15px; font-family:'Montserrat:700',GEORGIA;margin:10px 20px; text-align:center;">Kshs:&nbsp;<?php echo $data['Product_price'];?></h5>
               </td>
               </tr>
                <?php }
              }
            } ?>
            <tr>
              
            </tr>
        </table>
</div>
  <div class="twelve columns">
      <div class="total" style="float:right;">
        <h5 style="margin-right:200px;color:black;">Subtotal:</h5>
        <h3 style="margin-right:200px;">Total:</h3>
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
 


