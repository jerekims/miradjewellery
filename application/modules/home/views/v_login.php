<div class="forms " style="margin-top:2%;margin-left:5%;">
      <div class="twelve columns">
        <h3 style="text-align:center;font-size:30px;line-height:10px;margin-bottom:25px;">Login or Sign Up</h3>
      </div>
      <div class="twelve columns" style="box-shadow:-2px 5px 8px 2px #888888;">
         <div class="five columns loginform">
            <h5 style=" margin-left:2%; margin-top:2%;">REGISTRED CUSTOMERS</h5>
                <form style=" margin-left:2%;width:85%;"id="loginuser" action="<?php echo base_url(). 'index.php/home/user_login'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <label for="customer_email" class="control-label">Customer Email:</label>
                    <input type="text" required class="form-control validate[required, custom[email]]" name="customer_email" id="customer_email">
                  </div>

                   <div class="form-group">
                    <label for="customer_pass" class="control-label">Customer Password:</label>
                    <input type="password" required class="form-control validate[required]" name="customer_pass" id="customer_pass">
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                  <a href="#">Forgot Password</a>
              </form>
          </div>
      <div class="seven columns registerform">
      <h5 style=" margin-left:2%; margin-top:2%;">CREATE AN ACCOUNT</h5>
         <form style="width:85%;"id="createuser" action="<?php echo base_url(). 'index.php/home/addcustomer'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                  <label for="customer_name" class="control-label">Customer Name:</label><?php echo form_error('customername');?>
                  <input type="text" class="form-control validate[required]" id="customername" name="customername" value="<?php echo set_value('customername');?>">
                </div>

                 <div class="form-group">
                  <label for="customer_title" class="control-label">Customer title:</label>
                  <select class="form-control">
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
                  <button type="submit" class="btn btn-primary">JOIN TODAY</button>
                </div>
              </form>
      </div>

      </div>
     
</div>
