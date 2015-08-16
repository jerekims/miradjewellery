<div class="eight columns" style="float:right; margin-top:1%;border:1px solid gray;">
  <h4  style="text-align:center;">CONTACT FORM</h4> 
  <form name="contactform" method="POST" action="<?php echo base_url().'home/sendcomment'?>">
    <h5>Let's keep in touch</h5>
    <div class="form-group">
      <label>Name :</label><?php echo form_error('user_name');?>
      <input type="text" name="user_name" value="<?php echo set_value('user_name');?>"class="form-control">
    </div>
    <div class="form-group">
      <label>Email :</label><?php echo form_error('user_email');?>
      <input type="text" name="user_email" value="<?php echo set_value('user_email');?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Message :</label><?php echo form_error('message');?>
     <textarea class="form-control" rows=10 cols=10 name="message"><?php echo set_value('message');?></textarea>
    </div>
    <div>
      <input type="submit" class="btn btn-primary" value="SEND">
    </div>
  </form>
</div>