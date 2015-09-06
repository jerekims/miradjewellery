<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <h3 class="side-heading" style="width:80%;">REGISTERED CUSTOMERS</h3>
      <form style="width:80%;"id="loginuser" action="<?php echo base_url(). 'index.php/home/user_login'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST">
        <div class="form-group">
          <label for="customer_email" class="control-label">Customer Email:</label>
          <input type="text" required class="form-control validate[required, custom[email]]" name="customer_email" id="customer_email">
        </div>

         <div class="form-group">
          <label for="customer_pass" class="control-label">Customer Password:</label>
          <input type="password" required class="form-control validate[required]" name="customer_pass" id="customer_pass">
        </div>
        <div>
          <button type="submit" class="btn btn-primary" style="background-color:gray;">Login</button>
        </div>
        <a href="#">Forgot Password</a>
    </form>
  </div><!-- end of the col-md-3 -->

  <div class="col-md-7"><!-- start of the registration form div -->
    <h3 class="side-heading" style="width:80%;">CREATE AN ACCOUNT</h3>
     <form  style="width:80%;"id="createuser" action="<?php echo base_url(). 'index.php/home/addcustomer'?>" name="createuser" role="form" enctype="multipart/form-data" method="POST">
        <div class="form-group">
          <label for="customer_name" class="control-label">Customer Name:</label><?php echo form_error('customername');?>
          <input type="text" class="form-control validate[required]" id="customername" name="customername" value="<?php echo set_value('customername');?>">
        </div>

         <div class="form-group">
          <label for="customer_title" class="control-label">Customer title:</label>
          <select class="form-control" name="customertitle">
            <?php echo $titles?>
          </select>
        </div>

         <div class="form-group">
          <label for="customer_email" class="control-label">Customer Email:</label><?php echo form_error('customeremail');?>
          <input type="text" class="form-control validate[required]" name="customeremail" value="<?php echo set_value('customeremail');?>">
        </div>

        <div class="form-group">
          <label for="customer_pass" class="control-label">Customer Password:</label><?php echo form_error('customerpassword');?>
          <input type="password" class="form-control validate[required]" name="customerpassword" value="<?php echo set_value('customerpassword');?>">
        </div>

        <div class="form-group">
          <label for="customer_pass" class="control-label">Confirm Password:</label><?php echo form_error('confirmpassword');?>
          <input type="password" class="form-control validate[required]" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>">
        </div>
        <div>
          <button type="submit" class="btn btn-primary" style="background-color:gray;">JOIN TODAY</button>
        </div>
    </form>
  </div><!-- end of the registration div -->
  
</div><!-- end of the row div -->


