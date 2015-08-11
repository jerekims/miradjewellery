<div class="forms " style="margin:30px auto;width:100%;">
      <div class="twelve columns">
        <h3 style="text-align:center;font-size:30px;line-height:10px;margin-bottom:25px;">Login or Sign Up</h3>
      </div>
      <div class="twelve columns">
         <div class="five columns loginform" style="width:45%;border-right:1px solid yellow;" >
      <h5>REGISTRED CUSTOMERS</h5>
        <form id="loginuser" action="<?php echo base_url(). 'index.php/home/user_login'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="customer_email" class="control-label">Customer Email:</label>
            <input type="text" class="form-control validate[required]" name="customer_email" id="customer_email">
          </div>

           <div class="form-group">
            <label for="customer_pass" class="control-label">Customer Password:</label>
            <input type="password" class="form-control validate[required]" name="customer_pass" id="customer_pass">
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <a href="#">Forgot Password</a>
      </form>
      </div>
      <div class="six columns registerform">
      <h5>CREATE AN ACCOUNT</h5>
         <form id="loginuser" action="<?php echo base_url(). 'index.php/home/addcustomer'?>" name="loginuser" role="form" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                  <label for="customer_name" class="control-label">Customer Name:</label>
                  <input type="text" class="form-control validate[required]" id="customername" name="customername">
                </div>

                 <div class="form-group">
                  <label for="customer_title" class="control-label">Customer title:</label>
                  <select class="form-control">
                    <option>Mr</option>
                    <option>Mrs</option>
                    <option>Dr</option>
                    <option>Miss</option>
                  </select>
                </div>

                 <div class="form-group">
                  <label for="customer_email" class="control-label">Customer Email:</label>
                  <input type="text" class="form-control validate[required]" name="customeremail">
                </div>

                <div class="form-group">
                  <label for="customer_pass" class="control-label">Customer Password:</label>
                  <input type="password" class="form-control validate[required]" name="customerpassword">
                </div>

                <div class="form-group">
                  <label for="customer_pass" class="control-label">Confirm Password:</label>
                  <input type="password" class="form-control validate[required]" name="confirmpassword">
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">JOIN TODAY</button>
                </div>
              </form>
      </div>

      </div>
     
</div>
