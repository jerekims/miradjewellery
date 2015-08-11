<!--   <form method="">
          <div class="form-group">
            <label for="customer_email" class="control-label">Customer Email:</label>
            <input type="text" class="form-control" name="customer_email" id="customer_email">
          </div>

           <div class="form-group">
            <label for="customer_pass" class="control-label">Customer Password:</label>
            <input type="password" class="form-control" name="customer_pass" id="customer_pass">
          </div>
</form -->

<div class="row ten columns">
      <div class="four columns">
        <form  id="loginuser" action="<?php echo base_url(). 'home/user_login'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST"">
          <div class="form-group">
            <label for="customer_email" class="control-label">Customer Email:</label>
            <input type="text" class="form-control" name="customer_email" id="customer_email">
          </div>

           <div class="form-group">
            <label for="customer_pass" class="control-label">Customer Password:</label>
            <input type="password" class="form-control" name="customer_pass" id="customer_pass">
          </div>
          <div>
            <button type="submit" class="primary">Login</button>
          </div>
          <a href="#">Forgot Password</a>
      </form>
      </div>
      <div class="six columns">
         <form method="POST" name="register''>

                <div class="form-group">
                  <label for="customer_name" class="control-label">Customer Name:</label>
                  <input type="text" class="form-control" id="customername">
                </div>

                 <div class="form-group">
                  <label for="customer_title" class="control-label">Customer title:</label>
                  <input type="text" class="form-control" name="customertitle">
                </div>

                 <div class="form-group">
                  <label for="customer_email" class="control-label">Customer Email:</label>
                  <input type="text" class="form-control" name="customeremail">
                </div>

                <div class="form-group">
                  <label for="customer_pass" class="control-label">Customer Password:</label>
                  <input type="password" class="form-control" name="customerpassword">
                </div>

                <div class="form-group">
                  <label for="customer_pass" class="control-label">Confirm Password:</label>
                  <input type="password" class="form-control" name="confirmpassword">
                </div>
                <div>
                  <input type="submit" class="btn btn-primary"value="JOIN TODAY">
                </div>
              </form>
      </div>
</div>