<div class="individual_product">
<?php 
   // echo "<pre>";print_r($single_product);echo "</pre>";die();
    foreach ($single_product as $key => $value) {?>
		<div class="twelve columns" style="height:400px;">
			<div class="six columns">
				<img style="height:100%; width:100%;" src="<?php echo base_url().'assets/images/bangles_UK_1.jpg'?>">
			</div>
			<div class="six columns" style="margin-top:10px;height:100%;">
				<div class="product_title">
					<h4 style="border-bottom:1px solid gray;">Product Name :&nbsp;&nbsp;<?php echo $value['Product Name'];?></h4>
					<p><?php echo $value['Description'];?> </p>
					<h5>Product Price Kshs :&nbsp;<?php echo $value['Price'];?></h5>
					<div><a href="<?php echo base_url().'index.php/home/addcart'?>"><button type="submit" class="btn btn-primary" style="font-size:15px;color:white;background-color:#BFAE9F;">Add To Cart</button></a></div>
				</div>
			</div>
		</div>
		<?php }?>	
</div>
<div class="related" style="border-top:1px solid gray;">
	<div class="twelve columns">
		<div class="six columns">
		 <h4>Related products</h4>
		</div>
		<div class="six columns">
		 <h4>previews</h4>
		</div>
	</div>
</div>