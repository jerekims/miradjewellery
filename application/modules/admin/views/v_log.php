


<div class="container login_panel">
  <form id="form_adminlog" name="form_adminlog" action="<?php echo base_url() . 'admin/validate_member'?>" role="form" enctype="multipart/form-data" method="POST">
  <div class="form-group">
    <label for="username">Email Address</label>
    <input type="email" class="form-control validate[required, custom[email]]" name="useremail" id="useremail" placeholder="Enter Your Email Here">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control validate[required]" name="userpassword" id="userpassword" placeholder="Enter Your Password Here">
  </div>
    <button type="submit" class="btn btn-success">Log In</button>
  </form>
</div>