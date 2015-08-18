<div class="eight columns" style="box-shadow:-2px 5px 8px 2px #888888;margin-right:225px;float:right; margin-top:1%;">
  <h4  style="text-align:center;">CONTACT FORM</h4> 
  <form name="contactform" method="POST" action="<?php echo base_url().'index.php/home/sendcomment'?>" style="margin-left:10%;width:80%;">
    <h5>Let's keep in touch</h5> 
    <div class="form-group">
      <label>Email :</label><?php echo form_error('user_email');?>
      <input type="text" name="user_email" value="<?php echo set_value('user_email');?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Message :</label><?php echo form_error('message');?>
     <textarea class="form-control" rows=10 cols=10 name="message"><?php echo set_value('message');?></textarea>
    </div>
    <!-- <div class="form-group">
      <label>Captcha</label><?php echo form_error('captcha');?>
      <input  class="form-control" type="text" id="captcha" name="captcha" value="<?php echo set_value('captcha');?>"> 
    </div> -->
    <div>
      <input type="submit" class="btn btn-primary" value="SEND COMMENT" style="width:150px;background-color:gray;">
    </div>
  </form>
</div>