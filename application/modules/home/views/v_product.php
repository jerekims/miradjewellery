<div class=row>
<?php 
    foreach ($single_product as $key => $value) {?>
  			<!-- start of  the product image -->
			<div class="col-md-4 col-md-offset-1" >
				<img class="img-responsive" style="height:60%;width:100%;" src="<?php echo $value['Image']; ?>">
			</div><!-- end of the product image  -->

			<!-- start of product  details -->
	        <div class="col-md-7">
	        	<h5 class="side-heading" style="text-align:center;">Product Detail</h5>
	        	<div class="col-md-4" style="heightborder-right:1px solid green;">
	        		<p>Product d</p>
	        	</div><!-- end of  the col-md-4 -->
	        	<div class="col-md-3">
	        		
	        	</div><!-- end of col-md-3 -->
				<!-- <div class="product_title">
					<h4 style="border-bottom:1px solid gray; color:tomato;">Product Name :&nbsp;&nbsp;<?php echo $value['Product Name'];?></h4>
					<p style="font-size:20px;font-family:'Montserrat:700',GEORGIA;"><?php echo $value['Description'];?> </p>
					<h5 style="font-size:20px;font-family:'Montserrat:700',GEORGIA;">Product Price Kshs :&nbsp;<?php echo $value['Price'];?></h5>
					<div><a href="<?php echo base_url().'index.php/home/addcart/'?><?php echo $value['Product ID']?>"><button type="submit" class="btn btn-primary" style="font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
				</div> -->
			</div><!-- end of the product details -->
		<?php }?>
</div><!-- end  of the row div -->
